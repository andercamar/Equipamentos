<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senhas extends Model
{
    protected $fillable = ['portal', 'usuario', 'senha', 'descricao', 'exclusao'];

    public function search(Array $data){

        $pass = $this->where(function ($query) use ($data){
                $query->where('portal', 'like', '%'. $data['search'] .'%')
                ->orwhere('usuario', 'like', '%'. $data['search'] .'%')
                ->orwhere('senha' , 'like', '%'. $data['search']. '%')
                ->where('exclusao', '=', '0');
        })->get();
        return $pass;
    }

    public function lista(){

        $pass = $this->where(function ($query){
            $query->where('exclusao', '=', false);
        })->get();
        return $pass;
    }
}
    