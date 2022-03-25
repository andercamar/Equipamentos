<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = ['software_name', 'software_version', 'software_active'];
    
    public function computers(){
        return $this->belongsToMany(Computer::class);
    }
}
