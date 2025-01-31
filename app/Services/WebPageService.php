<?php
namespace App\Services;

use App\Models\Article;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\HilightFeature;
use App\Models\MetatagsList;
use App\Models\News;
use App\Models\PageTemplate;
use App\Models\Photo;
use App\Models\Review;
use App\Models\Translation;
use App\Models\Video;
use App\Models\VideoTestimonial;
use App\Models\WebPage;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\Ynotz\EasyAdmin\Services\FormHelper;
use Modules\Ynotz\EasyAdmin\Services\IndexTable;
use Modules\Ynotz\EasyAdmin\Traits\IsModelViewConnector;
use Modules\Ynotz\EasyAdmin\Contracts\ModelViewConnector;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\CreatePageData;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\EditPageData;
use Modules\Ynotz\EasyAdmin\Services\ColumnLayout;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Ynotz\EasyAdmin\RenderDataFormats\ShowPageData;
use Modules\Ynotz\Metatags\Helpers\MetatagHelper;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class WebPageService implements ModelViewConnector {
    use IsModelViewConnector;
    private $indexTable;

    public function __construct()
    {
        $this->modelClass = WebPage::class;
        $this->indexTable = new IndexTable();
        // $this->selectionEnabled = true;

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
        $this->selectionEnabled = false;
        $this->exportsEnabled = false;
        // $this->downloadFileName = 'results';
    }

    public function getShowPageData($slug): ShowPageData
    {

        $item = WebPage::with(['translations'])
            ->wherehas('translations', function ($q) use ($slug) {
                $q->where('locale', App::currentLocale())
                ->where('slug', $slug);
            })
            ->get()->first();
        if($item == null && App::currentLocale() != config('app_settings.default_locale')) {
            $defaultLocale = config('app_settings.default_locale');
            $route = Route::currentRouteName();
            if ($slug == 'home') {
                $canonicalUrl = route('home');
            } else {
                $canonicalUrl = route($route, ['locale' => $defaultLocale, 'slug' => $slug]);
            }
            session()->put('canonical_url', $canonicalUrl);
            $item = WebPage::with(['translations'])
            ->wherehas('translations', function ($q) use ($slug, $defaultLocale) {
                $q->where('locale', $defaultLocale)
                ->where('slug', $slug);
            })->get()->first();
        } else {
            // $defaultLocale = config('app_settings.default_locale');
            $route = Route::currentRouteName();
            if ($slug == 'home') {
                $canonicalUrl = route('home');
            } else {
                $canonicalUrl = route('webpages.guest.show', ['locale' => App::currentLocale(),'slug' => $slug]);
            }
            session()->put('canonical_url', $canonicalUrl);
        }
        if($item == null) {
            throw new ResourceNotFoundException("Couldn't find the page you are looking for.");
        }

        $title = $item->current_translation->data['metatags']['title'] ?? env('APP_NAME');

        $description = $item->current_translation->data['metatags']['description'] ?? env('APP_NAME');

        $this->setMetaTags(
            $title,
            $description,
            Carbon::createFromFormat('Y-m-d H:i:s', $item->current_translation->created_at)->toIso8601String(),
            Carbon::createFromFormat('Y-m-d H:i:s', $item->current_translation->updated_at)->toIso8601String(),
        );

        $thedata = [];
        if ($slug == 'home') {
            // $hfeatures = HilightFeature::all();
            // foreach ($hfeatures as $f) {
            //     $thedata['hfeatures'][$f->display_location] = $f;
            // }
            // $thedata['reviews'] = Review::orderBy('id', 'desc')->limit(12)->get();
            // $thedata['videos'] = VideoTestimonial::orderBy('id', 'desc')->limit(6)->get();
            // $thedata['doctors'] = Doctor::orderBy('id', 'desc')->limit(6)->get();
            // $thedata['newsitems'] = News::orderBy('id', 'desc')->limit(6)->get();
            $thedata['articles'] = Article::orderBy('id', 'desc')->limit(6)->get();
            // dd($thedata['doctors']);
        }

        return new ShowPageData(
            title: Str::ucfirst($this->getModelShortName()),
            instance: $item,
            data: $thedata
        );
    }

    public function getHomeArticles($locale)
    {
        return Article::orderBy('id', 'desc')->limit(8)->get();
    }

    public function getHomeReviews($locale)
    {
        return Review::orderBy('display_priority', 'desc')->limit(12)->get();
    }

    public function getNewsData($locale)
    {
        return News::paginate(30);
    }

    public function getBlogData($locale)
    {
        $defaultLocale = config('app_settings.default_locale');
        $route = Route::currentRouteName();
        $canonicalUrl = route($route, ['locale' => $defaultLocale]);
        session()->put('canonical_url', $canonicalUrl);

        MetatagHelper::clearAllMeta();
        MetatagHelper::clearTitle();
        $this->setMetaTags(
            config('meta_config.our-blogs')['title'],
            config('meta_config.our-blogs')['description'],
            config('meta_config.our-blogs')['created_at'],
            config('meta_config.our-blogs')['updated_at'],
        );

        return Article::paginate(30);
    }

    public function getDepartmentsData($locale)
    {
        $defaultLocale = config('app_settings.default_locale');
        $route = Route::currentRouteName();
        $canonicalUrl = route($route, ['locale' => $defaultLocale]);
        session()->put('canonical_url', $canonicalUrl);

        MetatagHelper::clearAllMeta();
        MetatagHelper::clearTitle();
        $this->setMetaTags(
            config('meta_config.our-departments')['title'],
            config('meta_config.our-departments')['description'],
            config('meta_config.our-departments')['created_at'],
            config('meta_config.our-departments')['updated_at'],
        );
        return Department::all();
    }

    public function getDoctorsData($locale)
    {
        $defaultLocale = config('app_settings.default_locale');
        $route = Route::currentRouteName();
        $canonicalUrl = route($route, ['locale' => $defaultLocale]);
        session()->put('canonical_url', $canonicalUrl);

        $doctors = Doctor::active()
            ->orderBy('department_id')
            ->get();
        $data = [];
        foreach ($doctors as $d) {
            $data[$d->default_department][] = $d;
        }
        return $data;
    }

    public function getPhotosData($locale)
    {
        $defaultLocale = config('app_settings.default_locale');
        $route = Route::currentRouteName();
        $canonicalUrl = route($route, ['locale' => $defaultLocale]);
        session()->put('canonical_url', $canonicalUrl);

        return Photo::paginate(30);
    }

    public function getVideosData($locale)
    {
        $defaultLocale = config('app_settings.default_locale');
        $route = Route::currentRouteName();
        $canonicalUrl = route($route, ['locale' => $defaultLocale]);
        session()->put('canonical_url', $canonicalUrl);

        return Video::paginate(30);
    }

    // public function getVideoTestomonialsData($locale)
    // {
    //     return VideoTestimonial::paginate(30);
    // }

    // public function getReviewsData($locale)
    // {
    //     return Review::paginate(30);
    // }

    public function getFileFields(): array
    {
        return ['cover_image'];
    }

    protected function relations()
    {
        return [
            'pageTemplate' => [
                'search_column' => 'id',
                'filter_column' => 'id',
                'sort_column' => 'id',
            ],
            'translations' => [],
        ];
    }
    protected function getPageTitle(): string
    {
        return "Web Pages";
    }

    protected function getIndexHeaders(): array
    {
        return $this->indexTable->addHeaderColumn(
            title: 'Title',
            // sort: ['key' => 'title'],
        )
        ->addHeaderColumn(
            title: 'Slug',
        )
        ->addHeaderColumn(
            title: 'Page Template',
            filter: ['key' => 'pageTemplate', 'options' => PageTemplate::all()->pluck('name', 'id')]
        )
        ->addHeaderColumn(
            title: 'Actions'
        )->getHeaderRow();
    }

    protected function getIndexColumns(): array
    {
        return $this->indexTable->addColumn(
            fields: ['defaultTitle'],
        )
        ->addColumn(
            fields: ['default_slug'],
        )
        ->addColumn(
            fields: ['template_file'],
            relation: 'pageTemplate'
        )
        ->addActionColumn(
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
        return 'webpages.guest.show';
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
            title: 'Create WebPage',
            form: FormHelper::makeForm(
                title: 'Create WebPage',
                id: 'form_webpages_create',
                action_route: 'webpages.store',
                success_redirect_route: 'webpages.index',
                items: $this->getCreateFormElements(),
                layout: $this->buildCreateFormLayout(),
                label_position: 'top'
            )
        );
    }

    public function getEditPageData($id): EditPageData
    {
        return new EditPageData(
            title: 'Edit WebPage',
            form: FormHelper::makeEditForm(
                title: 'Edit WebPage',
                id: 'form_webpages_create',
                action_route: 'webpages.update',
                action_route_params: ['id' => $id],
                success_redirect_route: 'webpages.index',
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
        return auth()->user()->hasPermissionTo('Web Page: Create');
    }

    public function authoriseStore(): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Create');
    }

    public function authoriseEdit($id): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Edit');
    }

    public function authoriseUpdate($item): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Edit');
    }

    public function authoriseDestroy($item): bool
    {
        return auth()->user()->hasPermissionTo('Web Page: Delete');
    }

    public function getStoreValidationRules(): array
    {
        return [
            'template' => ['required', 'string'],
            'locale' => ['required', 'string'],
            'slug' => [
                'required',
                Rule::unique('translations', 'slug')
                ->where(fn ($query) => $query->where('translatable_type', WebPage::class))
                ->where('locale', App::currentLocale())
            ],
            'data' => ['required', 'array'],
        ];
    }

    public function getUpdateValidationRules($id): array
    {
        return [
            'template' => ['required', 'string'],
            'locale' => ['required', 'string'],
            'slug' => [
                'required',
                Rule::unique('translations', 'slug')
                ->where(static function ($query) use ($id) {
                        return $query->where('translatable_type', WebPage::class)
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
            $wp = WebPage::create([
                    'template_id' => $data['template']
                ]
            );
            $coverImage = $data['data']['cover_image'] ?? null;
            if ($coverImage) {
                unset($data['data']['cover_image']);
            }

            $translation = Translation::create(
                [
                    'translatable_id' => $wp->id,
                    'translatable_type' => WebPage::class,
                    'locale' => $data['locale'],
                    'slug' => $data['slug'],
                    'data' => $data['data'],
                    'created_by' => auth()->user()->id,
                ]
            );
            if ($coverImage) {
                $translation->addMediaFromEAInput('cover_image', $coverImage);
            }

            MetatagsList::create([
                'translation_id' => $translation->id,
                'title' => $data['data']['metatags']['title'],
                'description' => $data['data']['metatags']['description'],
                'og_title' => $data['data']['metatags']['title'],
                'og_description' => $data['data']['metatags']['description'],
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
        info('inside update');
        try {
            DB::beginTransaction();
            info('data');
            info($data['data']);
            $coverImage = $data['data']['cover_image'] ?? null;
            if ($coverImage) {
                unset($data['data']['cover_image']);
            }
            /**
             * @var WebPage
             */
            $wp = WebPage::find($id);
            $wp->template_id = $data['template'];
            $wp->save();
            $wp->refresh();
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
                        'translatable_type' => WebPage::class,
                        'locale' => $data['locale'],
                        'slug' => $data['slug'],
                        'data' => $data['data'],
                        'created_by' => auth()->user()->id,
                    ]
                );
            }

            MetatagsList::where('translation_id', $translation->id)
                ->updateOrCreate(
                    ['translation_id' => $translation->id],
                    [
                        'title' => $data['data']['metatags']['title'],
                        'description' => $data['data']['metatags']['description'],
                        'og_title' => $data['data']['metatags']['title'],
                        'og_description' => $data['data']['metatags']['description'],
                        'og_type' => $data['data']['metatags']['og_type'],
                ]);

            if ($coverImage) {
                $translation->syncMedia('cover_image', $coverImage);
            }


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

        // $description = config('meta_config.our-doctors')['description'];
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
