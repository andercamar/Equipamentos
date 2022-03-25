<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrinterFormRequest;
use App\Http\Requests\PrinterUpdateFormRequest;
use App\Models\Printer;
use App\Models\PrinterReport;

class PrinterController extends Controller
{
    private $printers;
    private $report;
    private $color;
    private $a3;

    public function __construct(){
        $this->printers = Printer::all();
        $this->color = ['1' => 'Sim', '0' => 'Não'];
        $this->a3 = ['1' => 'Sim', '0' => 'Não'];
    }
    public function index(){
        $printers = $this->printers;
        return view('admin.printer.index', compact('printers'));
    }
    public function create(){
        $color = $this->color;
        $a3 = $this->a3;
        return view('admin.printer.create', compact('color','a3'));        
    }
    public function store(PrinterFormRequest $request){
        $dataForm = $request->all();
        $printer = new Printer;
        $insert = $printer->create($request->all());
        if ($insert) {
            return redirect()
                ->route('printer.create')
                    ->with('success', 'Impressora Cadastrada');
        } else {
            return redirect()
                ->route('printer.create')
                    ->with('error', 'Erro ao cadastrar Impressora');
        }
    }
    public function show($id){
        $search = Printer::findOrFail($id);
        if($search){
            return view('admin.printer.show', compact('search'));
        }else{
            return redirect()
                ->back()
                    ->with('error','Erro ao localalizar o registro');
        }
    }
    public function edit($id){
        $color = $this->color;
        $a3 = $this->a3;
        $search = Printer::findOrFail($id);
        if($search){
            return view('admin.printer.create', compact('search','color','a3'));
        }else{
            return redirect()
                ->back()
                    ->with('error','Erro ao localalizar o registro');
        }
    }
    public function update(PrinterUpdateFormRequest $request, $id){
        $dataForm = $request->all();
        $printer = Printer::findOrFail($id);
        $insert = $printer->update($dataForm);
        if($insert){
            return redirect()
                ->route('printer')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }
    }

    public function destroy($id){
        $printer = Printer::findOrFail($id);
        $delete = $printer->delete();
        if($delete){
            return redirect()
                ->route('printer')
                    ->with('success', 'Registro excluido com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir o registro');
        }
    }
    public function active($id){
        $printer = Printer::findOrFail($id);
        $printer['printer_active'] = true;
        $update = $printer->update();
        if ($update) {
            return redirect()
                ->route('printer')
                    ->with('success', 'Impressora ativada');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao ativar o registro');
        }
    }
    public function deactive($id){
        $printer = Printer::findOrFail($id);
        $printer['printer_active'] = false;
        $update = $printer->update();
        if ($update) {
            return redirect()
                ->route('printer')
                    ->with('success', 'Impressora desativada');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao desativar o registro');
        }
    }
    public function report(){
        $report = $this->report;
        $printers = $this->printers;
        return view('admin.printer.report', compact('report','printers'));  
    }

}
