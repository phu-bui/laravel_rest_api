<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Models\NotiTemplate;

class NotiTemplateRepository
{
    private NotiTemplate $noti_template;
    public function __construct(NotiTemplate $noti_template) 
    {
        $this->noti_template = $noti_template;
    }

    public function getAllNotiTemplate()
    {
        return $this->noti_template->all();
    }

    public function getNotiTemplateById($notiTemplateId)
    {
        return $this->noti_template->findOrFail($notiTemplateId);
    }

    public function createNotiTemplate(Request $storeNotiTemplateRequest)
    {
        return $this->noti_template->create($storeNotiTemplateRequest->toArray());
    }

    public function updateNotiTemplate($notiTemplateId, Request $updateNotiTemplateRequest)
    {
        $noti_template = $this->noti_template->find($notiTemplateId);
        if($noti_template) {
            $noti_template->update($updateNotiTemplateRequest->toArray());
        }
    }

    public function deleteNotiTemplate($notiTemplateId)
    {
        $this->noti_template->destroy($notiTemplateId);
    }
}
