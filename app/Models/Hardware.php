<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $fillable = ['hardware_model','hardware_specification','hardware_type'];
    public function computers(){
        return $this->belongsToMany(Computer::class);
    }

    public function fullMotherboard(){
        $plucked = [];
        $lic = $this->where(function($query){
            $query->where('hardware_type','=','Placa-Mãe');
        })->get(['hardware_model','hardware_specification','id']);
        foreach ($lic as $item) {
            $plucked[$item->id] =$item->hardware_model . ' - '. $item->hardware_specification;
        }
        return $plucked;
    }
    
    public function fullMemory(){
        $plucked = [];
        $lic = $this->where(function($query){
            $query->where('hardware_type','=','Memória');
        })->get(['hardware_model','hardware_specification','id']);
        foreach ($lic as $item) {
            $plucked[$item->id] =$item->hardware_model . ' - '. $item->hardware_specification;
        }
        return $plucked;
    }
    public function fullProcessor(){
        $plucked = [];
        $lic = $this->where(function($query){
            $query->where('hardware_type','=','Processador');
        })->get(['hardware_model','hardware_specification','id']);
        foreach ($lic as $item) {
            $plucked[$item->id] =$item->hardware_model . ' - '. $item->hardware_specification;
        }
        return $plucked;
    }
    public function fullStorage(){
        $plucked = [];
        $lic = $this->where(function($query){
            $query->where('hardware_type','=','Armazenamento');
        })->get(['hardware_model','hardware_specification','id']);
        foreach ($lic as $item) {
            $plucked[$item->id] =$item->hardware_model . ' - '. $item->hardware_specification;
        }
        return $plucked;
    }
}
