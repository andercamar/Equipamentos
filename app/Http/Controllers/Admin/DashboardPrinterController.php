<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Printer;
use App\Models\PrinterReport;

class DashboardPrinterController extends Controller
{
    private $months;
    private $firstDate;
    private $lastDate;
    private $printerNames;

    public function __construct(Printer $printer, PrinterReport $printerReport){
        $this->firstDate = date('Y').'-'.date('m').'-01';
        $this->lastDate = date('Y-m-d');
        $this->printerNames = $printer->returnPrinterName();
        for($i=1;$i<=12;$i++){
            $this->months[$i]=date("F", strtotime("2001-" . $i . "-01"));
        }
    }

    public function index(PrinterReport $printerReport,Request $request){
        $firstDate = $this->firstDate;
        $lastDate = $this->lastDate;
        return view('admin.printer.dashboard', compact('firstDate','lastDate'));  
    }        
    public function monthsPrint(PrinterReport $printerReport, Request $request){
        $year = $request->input('dateI');
        $year = explode("-",$year);
        $monthsPrint = $printerReport->monthsValuePrint($this->printerNames,$year);
        $months = $this->months;
        $result = new \stdClass();
        $result->monthsPrint = $monthsPrint;
        $result->months = $months;
        return Response::json($result);  
    }
    public function monthPrint(PrinterReport $printerReport, Request $request){
        $dateI = $request->input('dateI');
        $dateF = $request->input('dateF');
        $monthPrint = $printerReport->monthPrint($dateI,$dateF);
        $result = new \stdClass();
        $result->monthPrint = $monthPrint;
        return Response::json($result);
    }
    public function colorPrint(Printer $printer,PrinterReport $printerReport, Request $request){
        $dateI = $request->input('dateI');
        $dateF = $request->input('dateF');
        $color = $request->input('color');
        $colorPrint = $printerReport->colorPrint($printer->returnPrinterColor($color),$dateI,$dateF);
        $result = new \stdClass();
        $result->colorPrint = $colorPrint;
        $result->color = $color;
        return Response::json($result);
    }
    public function mostPrinter(Printer $printer,PrinterReport $printerReport, Request $request){
        $dateI = $request->input('dateI');
        $dateF = $request->input('dateF');
        $mostPrinter = $printerReport->periodValue($this->printerNames,$dateI,$dateF);
        $result = new \stdClass();
        $result->mostPrinter = $mostPrinter;
        return Response::json($result);
    }
    public function valuePrinter(Printer $printer,PrinterReport $printerReport, Request $request){
        $dateI = $request->input('dateI');
        $dateF = $request->input('dateF');
        $val = $request->input('val');
        $valuePrint = $printerReport->valuePrint($this->printerNames,$dateI,$dateF,$val);
        foreach ($valuePrint as $key => $value) {
                $value['Printer'] = $printer->returnPrinter($value['Printer'])['printer_name'];
        }
        $result = new \stdClass();
        $result->valuePrinter = $valuePrint;
        return Response::json($result);
    }
    public function typePrint(Request $request,PrinterReport $printerReport){
        $dateI = $request->input('dateI');
        $dateF = $request->input('dateF');
        $typePrint = $printerReport->typePrint($this->printerNames,$dateI,$dateF);
        $result = new \stdClass();
        $result->typePrint = $typePrint;
        return Response::json($result);
    }
    public function peoplePrint(Request $request, PrinterReport $printerReport){
        $dateI = $request->input('dateI');
        $dateF = $request->input('dateF');
        $peoplePrint = $printerReport->peoplePrint($dateI,$dateF);
        $result = new \stdClass();
        $result->peoplePrint = $peoplePrint;
        return Response::json($result);
    }
    public function peopleValuePrint(Request $request, PrinterReport $printerReport){
        $dateI = $request->input('dateI');
        $dateF = $request->input('dateF');
        $peopleValuePrint = $printerReport->peopleValuePrint($this->printerNames,$dateI,$dateF);
        $result = new \stdClass();
        $result->peopleValuePrint = $peopleValuePrint;
        return Response::json($result);
    }
    public function namePrinter(Request $request, Printer $printer){
        $name = $request->input('name');
        $namePrinter = $printer->returnPrinter($name);
        $result = new \stdClass();
        $result->namePrinter = $namePrinter;
        return Response::json($result);

    }

}
