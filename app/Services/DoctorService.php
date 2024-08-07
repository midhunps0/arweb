<?php
namespace App\Services;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\MetatagsList;
use App\Models\Translation;
use Exception;
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
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Illuminate\Support\Str;

class DoctorService implements ModelViewConnector {
    use IsModelViewConnector;
    private $indexTable;

    public function __construct()
    {
        $this->modelClass = Doctor::class;
        $this->indexTable = new IndexTable();
        $this->selectionEnabled = false;

        // $this->idKey = 'id';
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
        $this->exportsEnabled = false;
        // $this->downloadFileName = 'results';
        $this->searchesMap = [
            'name' => 'defaultTranslation'
        ];
        // $this->filtersMap = [
        //     'department' => 'id'
        // ];
    }

    // public function getShowPageData($slug): ShowPageData
    // {
    //     $item = Doctor::with(['translations'])
    //         ->wherehas('translations', function ($q) use ($slug) {
    //             $q->where('locale', App::currentLocale())
    //             ->where('slug', $slug);
    //         })
    //         ->get()->first();
    //     if($item == null) {
    //         throw new ResourceNotFoundException("Couldn't find the page you are looking for.");
    //     }
    //     return new ShowPageData(
    //         Str::ucfirst($this->getModelShortName()),
    //         $item
    //     );
    // }

    protected function relations()
    {
        return [
            'defaultTranslation' => [
                'search_column' => '',
                'filter_column' => '',
                'search_fn' => function ($query, $op, $val) {
                    $query->whereHas('translations', function($q) use($val) {
                        return $q->where('data->name', 'LIKE', '%'.$val.'%')
                            ->orWhere('data->name', 'LIKE', '%'.Str::lower($val).'%')
                            ->orWhere('data->name', 'LIKE', '%'.Str::upper($val).'%')
                            ->orWhere('data->name', 'LIKE', '%'.Str::studly($val).'%')
                            ->orWhere('data->name', 'LIKE', '%'.Str::camel($val).'%');
                    });
                }
            ],
            'department' => [
                'filter_column' => 'id',
                'filter_fn' => function ($query, $op, $val) {
                    $query->whereHas('department', function($q) use($val) {
                        return $q->where('id', $val);
                    });
                }
            ]
        ];
        // // Example:
        // return [
        //     'author' => [
        //         'search_column' => 'id',
        //         'filter_column' => 'id',
        //         'sort_column' => 'id',
        //     ],
        //     'reviewScore' => [
        //         'search_column' => 'score',
        //         'filter_column' => 'id',
        //         'sort_column' => 'id',
        //     ],
        // ];
    }



    protected function getPageTitle(): string
    {
        return "Doctors";
    }

    protected function getIndexHeaders(): array
    {
        return $this->indexTable->addHeaderColumn(
            title: 'Name',
            search: ['key' => 'name', 'condition' => 'st', 'label' => 'Search Doctors' ]
        )
        ->addHeaderColumn(
            title: 'Designation',
        )
        ->addHeaderColumn(
            title: 'Department',
            filter: ['key' => 'department', 'options' => Department::all()->pluck('default_title', 'id')]
        )
        ->addHeaderColumn(
            title: 'Actions'
        )->getHeaderRow();
    }

    protected function getIndexColumns(): array
    {
        return $this->indexTable->addColumn(
            fields: ['default_name'],
        )->addColumn(
            fields: ['default_designation'],
        )->addColumn(
            fields: ['default_department'],
        )->addActionColumn(
            editRoute: $this->getEditRoute(),
            deleteRoute: $this->getDestroyRoute(),
        )->getRow();
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
            title: 'Create Doctor',
            form: FormHelper::makeForm(
                title: 'Create Doctor',
                id: 'form_doctors_create',
                action_route: 'doctors.store',
                success_redirect_route: 'doctors.index',
                items: $this->getCreateFormElements(),
                layout: $this->buildCreateFormLayout(),
                label_position: 'top'
            )
        );
    }

    public function getEditPageData($id): EditPageData
    {
        return new EditPageData(
            title: 'Edit Doctor',
            form: FormHelper::makeEditForm(
                title: 'Edit Doctor',
                id: 'form_doctors_create',
                action_route: 'doctors.update',
                action_route_params: ['id' => $id],
                success_redirect_route: 'doctors.index',
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
        return auth()->user()->hasPermissionTo('Doctor: Create');
    }

    public function authoriseStore(): bool
    {
        return auth()->user()->hasPermissionTo('Doctor: Create');
    }

    public function authoriseEdit($id): bool
    {
        return auth()->user()->hasPermissionTo('Doctor: Edit');
    }

    public function authoriseUpdate($item): bool
    {
        return auth()->user()->hasPermissionTo('Doctor: Edit');
    }

    public function authoriseDestroy($item): bool
    {
        return auth()->user()->hasPermissionTo('Doctor: Delete');
    }

    public function getStoreValidationRules(): array
    {
        return [
            'locale' => ['required', 'string'],
            // 'slug' => ['required', 'string'],
            'department_id' => ['required', 'integer'],
            'is_active' => ['required', 'boolean'],
            'photo' => ['required', 'string'],
            'data' => ['required', 'array'],
        ];
    }

    public function getUpdateValidationRules($id): array
    {
        return [
            'locale' => ['required', 'string'],
            // 'slug' => ['required', 'string'],
            'department_id' => ['required', 'integer'],
            'is_active' => ['required', 'boolean'],
            'photo' => ['required', 'string'],
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
            $wp = Doctor::create([
                'department_id' => $data['department_id'],
                'is_active' => $data['is_active']
            ]);
            $wp->addMediaFromEAInput('photo', $data['photo']);

            $translation = Translation::create(
                [
                    'translatable_id' => $wp->id,
                    'translatable_type' => Doctor::class,
                    'locale' => $data['locale'],
                    // 'slug' => $data['slug'],
                    'data' => $data['data'],
                    'created_by' => auth()->user()->id,
                ]
            );

            // MetatagsList::create([
            //     'translation_id' => $translation->id,
            //     'title' => $data['data']['metatags']['title'],
            //     'description' => $data['data']['metatags']['description'],
            //     'og_title' => $data['data']['metatags']['title'],
            //     'og_description' => $data['data']['metatags']['description'],
            //     'og_type' => $data['data']['metatags']['og_type'],
            // ]);

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
        info('inside Doctor update');
        try {
            DB::beginTransaction();
            info('data');
            info($data['data']);
            /**
             * @var Doctor
             */
            $wp = Doctor::find($id);
            $wp->department_id = $data['department_id'];
            $wp->is_active = $data['is_active'];
            info('department_id');
            info($data['department_id']);
            $wp->save();
            $wp->refresh();
            $wp->syncMedia('photo', $data['photo']);
            /**
             * @var Translation
             */
            $translation = $wp->getTranslation($data['locale']);
            if ($translation != null) {
                $translation->data = $data['data'];
                // $translation->slug = $data['slug'];
                $translation->last_updated_by = auth()->user()->id;
                $translation->save();
            } else {
                /**
                 * @var Translation
                 */
                $translation = Translation::create(
                    [
                        'translatable_id' => $wp->id,
                        'translatable_type' => Doctor::class,
                        'locale' => $data['locale'],
                        // 'slug' => $data['slug'],
                        'data' => $data['data'],
                        'created_by' => auth()->user()->id,
                    ]
                );
            }
            DB::commit();
            return $wp->refresh();
        } catch (\Throwable $e) {
            DB::rollBack();
            info($e->__toString());
            throw new Exception($e->__toString());
        }
    }
}

?>
