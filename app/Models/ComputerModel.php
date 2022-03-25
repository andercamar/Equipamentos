<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComputerModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['model_type', 'model_name', 'manufacturer_id'];

    
    public function manufacturers(){
        return $this->hasOne('App\Models\Manufacturer', 'id', 'manufacturer_id');
    }
}
