<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $fillable = ['id','license_key','license_type','license_name','license_version'];
    public function computers(){
        return $this->belongsToMany(Computer::class);
    }

    public function fullOffice(){
        $plucked = [];
        $lic = $this->where(function($query){
            $query->where('license_type','=','Office')
            ->where('license_active','=','1');
        })->get(['license_type','license_name','license_key','id']);
        foreach ($lic as $item) {
            $plucked[$item->id] =$item->license_type . ' '. $item->license_name . ' - Serial:' . $item->license_key;
        }
        return $plucked;
    }
    
    public function fullWindows(){
        $plucked = [];
        $lic = $this->where(function($query){
            $query->where('license_type','=','Sistema Operacional')
            ->where('license_active','=','1');
        })->get(['license_type','license_name','license_key','id']);
        foreach ($lic as $item) {
            $plucked[$item->id] ='SO: '. $item->license_name . ' - Serial: ' . $item->license_key;
        }
        return $plucked;
    }
}
