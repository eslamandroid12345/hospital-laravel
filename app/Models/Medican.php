<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medican extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['hospital_id','doctor_name','doctor_phone','doctor_address','salary'];
    protected $dates = ['deleted_at'];

    //hospital hasMany Medican
    public function hospital(){

        return $this->belongsTo(Hospital::class,'hospital_id','id');
    }


    //medicans belongsToMany to Service
    public function service(){

        return $this->belongsToMany(Service::class,'service_medicans','medican_id','service_id','id','id');
    }

}

