<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hardware;
use App\Http\Requests\HardwareFormRequest;


class HardwareController extends Controller
{
    private $type;
    private $memory;
    private $storage;

    public function __construct(){
        $this->type = ['Armazenamento' => 'Armazenamento', 'Memória' => 'Memória', 'Placa-Mãe' => 'Placa-Mãe', 'Processador' => 'Processador'];
        $this->memory = ['DDR1'=>'DDR1','DDR2'=>'DDR2','DDR3'=>'DDR3','DDR4'=>'DDR4'];
        $this->storage = ['HD' => 'HD', 'SSD' => 'SSD'];
    }
    public function index(){
        $hardwares = Hardware::all();
        return view('admin.hardware.index', compact('hardwares'));
    }
    public function create(){
        $type = $this->type;
        $memory = $this->memory;
        $storage = $this->storage;
        return view('admin.hardware.create', compact('type','memory','storage'));
    }
    public function store(HardwareFormRequest $request){
        $hardware = new Hardware;
        $insert = $hardware->create($request->all());
        if ($insert) {
            return redirect()
                ->route('hardware.create')
                    ->with('success', 'Hardware cadastrado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao cadastrar o Hardware');
        }   

    }
    public function show($id){
        $search = Hardware::findOrFail($id);
        if ($search) {
            return view('admin.hardware.show', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function edit($id){
        $type = $this->type;
        $memory = $this->memory;
        $storage = $this->storage;
        $search = Hardware::findOrFail($id);
        if ($search) {
            return view('admin.hardware.create', compact('search','type','memory','storage'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }

    }
    public function update(HardwareFormRequest $request, $id){
        $dataForm = $request->all();
        $hardware = Hardware::findOrFail($id);
        $insert = $hardware->update($dataForm);
        if ($insert) {
            return redirect()
                ->route('hardware')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }
    }
    public function destroy($id){
            $hardware = Hardware::findOrFail($id);
            $delete = $hardware->delete();
            if($delete){
                return redirect()
                    ->route('hardware')
                        ->with('success', 'Registro excluido com sucesso');
            }else{
                return redirect()
                    ->back()
                        ->with('error', 'Erro ao excluir o registro');
            }
    }
}
