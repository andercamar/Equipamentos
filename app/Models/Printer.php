<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = ['id','printer_name','printer_color','printer_a3','printer_value'];

    public function returnPrinter($data){
        $pass = $this->where(function ($query) use ($data){
                $query->where('printer_name', '=', $data);
        })->first();
        if ($pass['printer_color'] == True) {
            $pass['printer_name'] = '[COLOR]' . $pass['printer_name'];
        } else {
            $pass['printer_name'] = '[P/B]' . $pass['printer_name'];
        }
        return $pass;
    }

    public function returnPrinterName(){
        $pass = $this->where(function ($query){
        })->orderBy('printer_name')->get();
        return $pass;
    }

    public function returnPrinterColor($data){
        $pass = $this->select('printer_name')
                ->where(function ($query) use ($data){
                $query->where('printer_color', '=', $data);
        })->get();
        return $pass;
    }
}
