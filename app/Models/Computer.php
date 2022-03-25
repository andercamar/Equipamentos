<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = ['id','computer_patrimony','computer_name','computer_user','computer_purchase','computer_invoice','computer_type','setor_id','model_id','vendor_id','departament_id','System','codTI'];
    public function licenses(){
        return $this->belongsToMany(License::class);
    }
    public function hardware(){
        return $this->belongsToMany(Hardware::class);
    }
    public function softwares(){
        return $this->belongsToMany(Software::class);
    }
    public function departament(){
        return $this->hasOne('App\Models\Departament','id','departament_id');
    }
    public function model(){
        return $this->hasOne('App\Models\ComputerModel','id','model_id');
    }
    public function vendor(){
        return $this->hasOne('App\Models\Vendor','id','vendor_id');
    }
}
