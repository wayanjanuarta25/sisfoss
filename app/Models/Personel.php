<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    protected $fillable = [
        'nama',
        'pangkat',
        'nrp',
        'matra',
        'corps',
        'tmt_tni',
        'tmt_jabatan',
        'foto',
        'jabatan',
        'satuan_pelaksana',
    ];
}
