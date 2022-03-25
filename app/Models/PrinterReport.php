<?php

namespace App\Models;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PrinterReport extends Model
{
    public $timestamps = false;
    
    public function monthPrint($dateI, $dateF){
        $pass = $this
            ->select(DB::raw('sum(Copies*Pages) as Total'))
            ->where('Time','>=',$dateI)
            ->where('Time','<=',$dateF)
            ->first();
        return $pass['Total'];
    }
    public function colorPrint($data,$dateI,$dateF){
        $count = 0;
        foreach ($data as $value) {
            $pass = $this->select(DB::raw('sum(Copies*Pages) as Total'))
                            ->where('Printer','=',$value['printer_name'])
                            ->where('Time','>=',$dateI)
                            ->where('Time','<=',$dateF)
                            ->first();
            $count = $count + $pass['Total'];
        }
        return $count;
    }
    public function periodValue($data,$dateI,$dateF){
        $result = 0;
        $pass = $this->select(DB::raw('Printer,sum(Copies*Pages) as Total'))
                        ->where('Time','>=',$dateI)
                        ->where('Time','<=',$dateF)
                        ->groupBy('Printer')
                        ->get();
        foreach ($pass as $key => $value) {
            foreach ($data as $printer) {
                if ($value['Printer'] == $printer['printer_name']){
                    $result =$result +$printer['printer_value'] * $value['Total'];
                }
            }
        }
        return($result);
    }
    public function mostPrinter($dateI, $dateF){
        $pass = $this->select(DB::raw('Printer,sum(Copies*Pages) as Total'))
            ->where('Time','>=',$dateI)
            ->where('Time','<=',$dateF)
            ->groupBy('Printer')
            ->orderBy('Total', 'DESC')
            ->first();
        return $pass['Printer'];
    }
    public function valuePrint($data,$dateI,$dateF,$val){
        $printercount = [];
        $pass = $this->select(DB::raw('Printer,sum(Copies*Pages)as Total'))
                    ->where('Time','>=',$dateI)
                    ->where('Time','<=',$dateF)
                    ->groupBy('Printer')
                    ->orderBy('Total', 'Desc')
                    ->get();
        foreach ($pass as $key => $value) {
            foreach ($data as $printer) {
                if ($printer['printer_name'] == $value['Printer']) {
                    if (empty($printercount[$key]['Value'])) {
                        $printercount[$key]['Value'] = $value['Total']*$printer['printer_value'];
                        $printercount[$key]['Printer'] = $value['Printer'];
                    }
                }
            }
        }
        if ($val == 'Value') {
            return $printercount;
        } elseif ($val == 'Total') {
            return $pass;
        } 
    }

    public function typePrint($data,$dateI,$dateF){
        $countColor = ['color' =>'0','color_price' => '0','black' => '0','black_price' => '0'];
        $pass = $this->select(DB::raw('Printer,sum(Copies*Pages) as Total'))
                        ->where('Time','>=',$dateI)
                        ->where('Time','<=',$dateF)
                        ->groupBy('Printer')
                        ->orderBy('Total','Desc')
                        ->get();
        foreach ($pass as $key => $value) {
            foreach ($data as $i =>$printer) {
                if($value['Printer'] == $printer['printer_name']){
                    if($printer['printer_color'] == TRUE){
                        $countColor['color'] += $value['Total'];
                        $countColor['color_price'] += ($value['Total']*$printer['printer_value']);
                    }elseif ($printer['printer_color'] == FALSE) {
                        $countColor['black'] += $value['Total'];
                        $countColor['black_price'] += ($value['Total']*$printer['printer_value']);
                    }
                    break;
                }
            }
        }
        return $countColor;   
    }

    public function monthsValuePrint($data,$year){
        $monthcount = [];
        $pass = $this->select(DB::raw('Printer,month(Time) as Time,sum(Copies*Pages) as Total'))
        ->whereYear('Time','=',$year)
        ->groupBy('Printer')
        ->groupBy(DB::raw('month(Time)'))
        ->orderBy(DB::raw('month(Time)'))
        ->get();
        foreach($pass as $key => $value){
            foreach ($data as $printer) {
                $value['Color'] = 0;
                $value['Black'] = 0;
                if($value['Printer'] == $printer['printer_name']){
                    $value['Value'] = $value['Total'] * $printer['printer_value'];
                }
            }
        }foreach ($pass as $key => $value) {
            foreach ($data as $printer) {
                if ($printer['printer_name'] == $value['Printer']) {
                    if ($printer['printer_color']) {
                        $value['Color'] = $value['Total'];
                        $value['Color_value'] = $value['Value'];
                    } else {
                        $value['Black'] = $value['Total'];
                        $value['Black_value'] = $value['Value'];
                    }
                    
                    if(empty($monthcount[$value['Time']])){
                        $monthcount[$value['Time']] = ['Total' => $value['Total'],'Value' => $value['Value'], 'Color' => $value['Color'], 'Black' => $value['Black'],'Color_value' => $value['Color_value'],'Black_value' => $value['Black_value']];
                    }else{
                        $monthcount[$value['Time']] = ['Total' => $monthcount[$value['Time']]['Total'] + $value['Total'],'Value' => $monthcount[$value['Time']]['Value'] + $value['Value'], 'Color' => $monthcount[$value['Time']]['Color'] + $value['Color'],  'Black' => $monthcount[$value['Time']]['Black'] + $value['Black'],'Color_value' => $monthcount[$value['Time']]['Color_value'] + $value['Color_value'],'Black_value' => $monthcount[$value['Time']]['Black_value'] + $value['Black_value']];
                    }  
                }
            }
        }
        return $monthcount;
    }

    public function peoplePrint($dateI,$dateF){
        $pass = $this->select(DB::raw('User,sum(Copies*Pages)as Total'))
                    ->where('Time','>=',$dateI)
                    ->where('Time','<=',$dateF)
                    ->groupBy('User')
                    ->orderBy('Total','desc')
                    ->limit('50')
                    ->get();
        return $pass;
    }

    public function peopleValuePrint($data,$dateI,$dateF){
        $valuePrinter = [];
        $pass = $this->select(DB::raw('Printer,User,sum(Copies*Pages)as Total'))
                    ->where('Time','>=',$dateI)
                    ->where('Time','<=',$dateF)
                    ->groupBy('User')
                    ->groupBy('Printer')
                    ->orderBy('Total','desc')
                    ->get();
        foreach ($pass as $key => $value) {
            foreach ($data as $printer) {
                if ($printer['printer_name'] == $value['Printer']) {
                    if (empty($valuePrinter[$value['User']])) {
                        $valuePrinter[$value['User']] = ['Total' => $printer['printer_value']*$value['Total'], 'User' => $value['User']];
                    } else {
                        if($value['User']==$valuePrinter[$value['User']]['User']){
                            $valuePrinter[$value['User']]['Total'] = $valuePrinter[$value['User']]['Total'] + $printer['printer_value']*$value['Total'];
                        }
                    }
                    
                }
            }
        }
        arsort($valuePrinter);
        return array_slice($valuePrinter,0,10);
    }
}

