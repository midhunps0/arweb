<?php
namespace App\Services;

use App\Models\Facility;
use App\Models\MetatagsList;
use App\Models\Translation;
use App\Models\User;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Modules\Ynotz\EasyAdmin\Services\FormHelper;
use Modules\Ynotz\EasyAdmin\Services\IndexTable;
use Modules\Ynotz\EasyAdmin\Traits\IsModelViewConnector;
use Modules\Ynotz\EasyAdmin\Contracts\ModelViewConnector;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\CreatePageData;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\EditPageData;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\ShowPageData;
use Modules\Ynotz\EasyAdmin\Services\ColumnLayout;
use Modules\Ynotz\EasyAdmin\Services\RowLayout;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Ynotz\Metatags\Helpers\MetatagHelper;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class FacilityService implements ModelViewConnector {
    use IsModelViewConnector;
    private $indexTable;

    public function __construct()
    {
        $this->modelClass = Facility::class;
        $this->indexTable = new IndexTable();
        $this->selectionEnabled = false;

        $this->idKey = 'slug';
        // $this->selects = '*';
        // $this->selIdsKey = 'id';
        // $this->searchesMap = [];
        // $this->sortsMap = [];
        // $this->filtersMap = [
        //     'author' => 'user_id' // Example
        // ];
        // $this->orderBy = ['created_at', 'desc'];
        // $this->sqlOnlyFullGroupBy = true;
        // $this->defaultSearchColumn = 'name';
        // $this->defaultSearchMode = 'startswith';
        // $this->relations = [];
        // $this->selectionEnabled = false;
        $this->exportsEnabled = false;
        // $this->downloadFileName = 'results';
    }

    public function getShowPageData($slug): ShowPageData
    {
        MetatagHelper::clearAllMeta();
        MetatagHelper::clearTitle();
        $item = Facility::with(['translations'])
            ->wherehas('translations', function ($q) use ($slug) {
                $q->where('locale', App::currentLocale())
                ->where('slug', $slug);
            })
            ->get()->first();
        if($item == null && App::currentLocale() != config('app_settings.default_locale')) {
            $item = Facility::with(['translations'])
            ->wherehas('translations', function ($q) use ($slug) {
                $q->where('locale', config('app_settings.default_locale'))
                ->where('slug', $slug);
            })
            ->get()->first();
        }
        if($item == null) {
            throw new ResourceNotFoundException("Couldn't find the page you are looking for.");
        }

        $results = DB::table('facilities', 'a')
            ->join('translations as t', 'a.id', '=', 't.translatable_id')
            ->select('t.slug as slug', 't.data as data')
            ->where('t.translatable_type', Facility::class)
            ->where('t.slug', '<>', $slug)
            ->where('t.locale', App::currentLocale())
            ->get();
        $allItems = [];
        foreach ($results as $i) {
            $allItems[] = [
                'slug' => $i->slug,
                'title' => (json_decode($i->data))->title
            ];
        }

        $title = $item->current_translation->data['metatags']['title'] ?? env('APP_NAME');

        $description = $item->current_translation->data['metatags']['description'] ?? env('APP_NAME');

        $this->setMetaTags(
            $title,
            $description,
            Carbon::createFromFormat('Y-m-d H:i:s', $item->current_translation->created_at)->toIso8601String(),
            Carbon::createFromFormat('Y-m-d H:i:s', $item->current_translation->updated_at)->toIso8601String(),
        );

        return new ShowPageData(
            Str::ucfirst($this->getModelShortName()),
            $item,
            [
                'allFacilities' => $allItems
            ]
        );
    }

    protected function relations()
    {
        return [
            // 'author' => [
            //     'search_column' => 'id',
            //     'filter_column' => 'id',
            //     'sort_column' => 'id',
            // ],
            // 'reviewScore' => [
            //     'search_column' => 'score',
            //     'filter_column' => 'id',
            //     'sort_column' => 'id',
            // ],
        ];
    }
    protected function getPageTitle(): string
    {
        return "Facilities";
    }

    protected function getIndexHeaders(): array
    {
        return $this->indexTable->addHeaderColumn(
            title: 'Title',
            // sort: ['key' => 'title'],
        )->addHeaderColumn(
            title: 'Actions'
        )->getHeaderRow();
    }

    protected function getIndexColumns(): array
    {
        return $this->indexTable->addColumn(
            fields: ['defaultTitle'],
        )->addActionColumn(
            viewRoute: $this->getViewRoute(),
            editRoute: $this->getEditRoute(),
            deleteRoute: $this->getDestroyRoute(),
            viewRouteUniqueKey: 'current_translation.slug',
            viewRouteSlug: 'slug',
            component: 'index-actions'
        )->getRow();
    }

    public function getViewRoute()
    {
        return 'facilities.guest.show';
    }

    public function getAdvanceSearchFields(): array
    {
        return [];
        // // Example:
        // return $this->indexTable->addSearchField(
        //     key: 'title',
        //     displayText: 'Title',
        //     valueType: 'string',
        // )
        // ->addSearchField(
        //     key: 'author',
        //     displayText: 'Author',
        //     valueType: 'list_string',
        //     options: User::all()->pluck('name', 'id')->toArray(),
        //     optionsType: 'key_value'
        // )
        // ->addSearchField(
        //     key: 'reviewScore',
        //     displayText: 'Review Score',
        //     valueType: 'numeric',
        // )
        // ->getAdvSearchFields();
    }

    public function getDownloadCols(): array
    {
        return [];
        // // Example
        // return [
        //     'title',
        //     'author.name'
        // ];
    }

    public function getDownloadColTitles(): array
    {
        return [
            'title' => 'Title',
            'author.name' => 'Author'
        ];
    }

    public function getCreatePageData(): CreatePageData
    {
        return new CreatePageData(
            title: 'Create Facility',
            form: FormHelper::makeForm(
                title: 'Create Facility',
                id: 'form_facilities_create',
                action_route: 'facilities.store',
                success_redirect_route: 'facilities.index',
                items: $this->getCreateFormElements(),
                layout: $this->buildCreateFormLayout(),
                label_position: 'top'
            )
        );
    }

    public function getEditPageData($id): EditPageData
    {
        return new EditPageData(
            title: 'Edit Facility',
            form: FormHelper::makeEditForm(
                title: 'Edit Facility',
                id: 'form_facilities_create',
                action_route: 'facilities.update',
                action_route_params: ['id' => $id],
                success_redirect_route: 'facilities.index',
                items: $this->getEditFormElements(),
                label_position: 'top'
            ),
            instance: $this->getQuery()->where('id', $id)->get()->first()
        );
    }

    /*
    public function getShowPageData($id): ShowPageData
    {
        return new ShowPageData(
            Str::ucfirst($this->getModelShortName()),
            $this->getQuery()->where($this->key, $id)->get()->first()
        );
    }
    */

    private function formElements(): array
    {
        return [];
        // // Example:
        // return [
        //     'title' => FormHelper::makeInput(
        //         inputType: 'text',
        //         key: 'title',
        //         label: 'Title',
        //         properties: ['required' => true],
        //     ),
        //     'description' => FormHelper::makeTextarea(
        //         key: 'description',
        //         label: 'Description'
        //     ),
        // ];
    }

    private function getQuery()
    {
        return $this->modelClass::query();
        // // Example:
        // return $this->modelClass::query()->with([
        //     'author' => function ($query) {
        //         $query->select('id', 'name');
        //     }
        // ]);
    }

    public function authoriseIndex(): bool
    {
        return true;
    }

    public function authoriseShow($item): bool
    {
        return true;
    }

    public function authoriseCreate(): bool
    {
        return auth()->user()->hasPermissionTo('Facility: Create');
    }

    public function authoriseStore(): bool
    {
        return auth()->user()->hasPermissionTo('Facility: Create');
    }

    public function authoriseEdit($id): bool
    {
        return auth()->user()->hasPermissionTo('Facility: Edit');
    }

    public function authoriseUpdate($item): bool
    {
        return auth()->user()->hasPermissionTo('Facility: Edit');
    }

    public function authoriseDestroy($item): bool
    {
        return auth()->user()->hasPermissionTo('Facility: Delete');
    }

    public function getStoreValidationRules(): array
    {
        return [
            'locale' => ['required', 'string'],
            'slug' => [
                'required',
                Rule::unique('translations', 'slug')
                ->where(fn ($query) => $query->where('translatable_type', Facility::class))
                ->where('locale', App::currentLocale())
            ],
            'data' => ['required', 'array'],
        ];
    }

    public function getUpdateValidationRules($id): array
    {
        return [
            'locale' => ['required', 'string'],
            'slug' => [
                'required',
                Rule::unique('translations', 'slug')
                ->where(static function ($query) use ($id) {
                        return $query->where('translatable_type', Facility::class)
                        ->where('locale', App::currentLocale())
                        ->whereNotIn('translatable_id', [$id]);
                    }
                )
            ],
            'data' => ['required', 'array'],
        ];
    }

    public function processBeforeStore(array $data): array
    {
        // // Example:
        // $data['user_id'] = auth()->user()->id;

        return $data;
    }

    public function processBeforeUpdate(array $data): array
    {
        // // Example:
        // $data['user_id'] = auth()->user()->id;

        return $data;
    }

    public function processAfterStore($instance): void
    {
        //Do something with the created $instance
    }

    public function processAfterUpdate($oldInstance, $instance): void
    {
        //Do something with the updated $instance
    }

    public function buildCreateFormLayout(): array
    {
        return (new ColumnLayout())->getLayout();
        // // Example
        //  $layout = (new ColumnLayout())
        //     ->addElements([
        //             (new RowLayout())
        //                 ->addElements([
        //                     (new ColumnLayout(width: '1/2'))->addInputSlot('title'),
        //                     (new ColumnLayout(width: '1/2'))->addInputSlot('description'),
        //                 ])
        //         ]
        //     );
        // return $layout->getLayout();
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            $wp = Facility::create();
            $coverImage = $data['data']['cover_image'];
            unset($data['data']['cover_image']);
            $translation = Translation::create(
                [
                    'translatable_id' => $wp->id,
                    'translatable_type' => Facility::class,
                    'locale' => $data['locale'],
                    'slug' => $data['slug'],
                    'data' => $data['data'],
                    'created_by' => auth()->user()->id,
                ]
            );
            $translation->addMediaFromEAInput('cover_image', $coverImage);

            MetatagsList::create([
                'translation_id' => $translation->id,
                'title' => $data['data']['metatags']['title'],
                'description' => $data['data']['metatags']['description'],
                'og_title' => $data['data']['metatags']['og_title'],
                'og_description' => $data['data']['metatags']['og_description'],
                'og_type' => $data['data']['metatags']['og_type'],
            ]);

            DB::commit();
            return $wp->refresh();
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }

    public function update($id, array $data)
    {
        info('inside facility update');
        try {
            DB::beginTransaction();
            info('data');
            info($data['data']);
            $coverImage = $data['data']['cover_image'];
            unset($data['data']['cover_image']);
            /**
             * @var Facility
             */
            $wp = Facility::find($id);
            /**
             * @var Translation
             */
            $translation = $wp->getTranslation($data['locale']);
            if ($translation != null) {
                $translation->data = $data['data'];
                $translation->slug = $data['slug'];
                $translation->last_updated_by = auth()->user()->id;
                $translation->save();
            } else {
                /**
                 * @var Translation
                 */
                $translation = Translation::create(
                    [
                        'translatable_id' => $wp->id,
                        'translatable_type' => Facility::class,
                        'locale' => $data['locale'],
                        'slug' => $data['slug'],
                        'data' => $data['data'],
                        'created_by' => auth()->user()->id,
                    ]
                );
            }

            $translation->syncMedia('cover_image', $coverImage);

            $metatags = MetatagsList::where('translation_id', $translation->id)->get()->first();
            if ($metatags == null) {
                $metatags = new MetatagsList();
                $metatags->translation_id = $translation->id;
            }
            $metatags->title = $data['data']['metatags']['title'];
            $metatags->description = $data['data']['metatags']['description'];
            $metatags->og_title = $data['data']['metatags']['og_title'];
            $metatags->og_description = $data['data']['metatags']['og_description'];
            $metatags->og_type = $data['data']['metatags']['og_type'];
            $metatags->save();

            DB::commit();
            return $wp->refresh();
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }

    private function setMetaTags(
        $title,
        $description,
        $createdAt,
        $updatedAt,
    ){
        MetatagHelper::clearAllMeta();
        MetatagHelper::clearTitle();
        $title = $title ?? env('APP_NAME');
        MetatagHelper::setTitle($title);
        MetatagHelper::addTag('title', $title);
        MetatagHelper::addOgTag('locale', app()->currentLocale() == 'en' ? 'en_US' : 'ar_AE');
        MetatagHelper::addOgTag('site_name', env('APP_NAME'));
        MetatagHelper::addOgTag('type', 'article');
        MetatagHelper::addOgTag('title', $title);

        $description = config('meta_config.our-doctors')['description'];
        $ogDescription = $description;
        MetatagHelper::addTag('description', $description);
        MetatagHelper::addTag('type', 'article');
        MetatagHelper::addOgTag('description', $ogDescription);
        MetatagHelper::addOgTag('type', 'article');

        MetatagHelper::addTagByProps([
            'property' => 'article:published_time',
            'content' => $createdAt
        ]);
        MetatagHelper::addTagByProps([
            'property' => 'article:modified_time',
            'content' => $updatedAt
        ]);
        MetatagHelper::addTagByProps([
            'property' => 'twitter:card',
            'content' => 'summary_large_image'
        ]);
        MetatagHelper::addTagByProps([
            'property' => 'twitter:title',
            'content' => $title
        ]);
        MetatagHelper::addTagByProps([
            'property' => 'twitter:description',
            'content' => $description
        ]);
    }
}

?>
