<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_medican extends Model
{

    use HasFactory;
    protected $fillable = ['medican_id','service_id'];

}
