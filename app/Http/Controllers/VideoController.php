<?php

namespace App\Http\Controllers;

use App\Models\PageTemplate;
use App\Models\Video;
use App\Services\VideoService;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class VideoController extends SmartController
{
    use HasMVConnector;

    public function __construct(Request $request, VideoService $service)
    {
        parent::__construct($request);
        $this->connectorService = $service;
        // $this->itemName = null;
        // $this->unauthorisedView = 'easyadmin::admin.unauthorised';
        // $this->errorView = 'easyadmin::admin.error';
        // $this->indexView = 'easyadmin::admin.indexpanel';
        // $this->showView = 'easyadmin::admin.show';
        // $this->createView = 'easyadmin::admin.form';
        // $this->editView = 'easyadmin::admin.form';
        // $this->itemsCount = 10;
        // $this->resultsName = 'results';
    }

    public function create()
    {
        $template = PageTemplate::where('template_file', config('app_settings.vtestimonial_translation_component'))
            ->get()->first();
            // dd($template);
        return $this->buildResponse(
            'admin.vtestimonials.create',
            [
                'templateId' => $template->id
            ]
        );
    }

    public function edit($id)
    {
        $vtestimonial = Video::find($id);

        $template = PageTemplate::where('template_file', config('app_settings.vtestimonial_translation_component'))
            ->get()->first();
        return $this->buildResponse(
            'admin.vtestimonials.edit',
            [
                'video' => $vtestimonial,
                'videoId' => $vtestimonial->id,
                'templateId' => $template->id
            ]
        );
    }
}
