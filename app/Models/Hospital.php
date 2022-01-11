<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['hospital_name','hospital_address','build_number','image'];
    protected $dates = ['deleted_at'];


    public function medican(){

        return $this->hasMany(Medican::class,'hospital_id');
    }


}
