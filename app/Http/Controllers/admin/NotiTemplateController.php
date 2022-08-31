<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotiTemplate;
use App\Repositories\NotiTemplateRepository;

class NotiTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $model;

    public function __construct(NotiTemplate $noti_template)
    {
       // set the model
       $this->model = new NotiTemplateRepository($noti_template);
    }

    public function index()
    {
        //
        $noti_templates = $this->model->getAllNotiTemplate();
        return view('admin.notiTemplate.notiTemplateList', ['noti_templates' => $noti_templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.notiTemplate.notiTemplateCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->model->createNotiTemplate($request);
        return redirect()->route('admin.getAllNotiTemplate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $noti_template = $this->model->getNotiTemplateById($id);
        return response()->json($noti_template);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $noti_template = $this->model->getNotiTemplateById($id);
        return view('admin.notiTemplate.notiTemplateEdit', ['id' => $id, 'noti_template' => $noti_template]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->model->updateNotiTemplate($id, $request);
        return redirect()->route('admin.getAllNotiTemplate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->model->deleteNotiTemplate($id);
        return redirect()->route('admin.getAllNotiTemplate');
    }
}
