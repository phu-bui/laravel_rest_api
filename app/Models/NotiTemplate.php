<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotiTemplate extends Model
{
    protected $table = 'noti_templates';

    protected $fillable = [
        'type',
        'template',
    ];
}
