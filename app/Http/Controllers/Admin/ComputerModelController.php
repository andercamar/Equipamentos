<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComputerModel;
use App\Models\Manufacturer;
use App\Http\Requests\ComputerModelFormRequest;

class ComputerModelController extends Controller
{
    private $type;
    private $manufacturer;
    public function __construct(){
        $this->type = ['Desktop' => 'Desktop', 'Notebook' => 'Notebook'];
        $this->manufacturer = Manufacturer::pluck('manufacturer_name', 'id');
    }
    public function index(){
        $models = ComputerModel::all();
        return view('admin.model.index', compact('models'));
    }
    public function create(){
        $type = $this->type;
        $manufacturer = $this->manufacturer;
        return view('admin.model.create', compact('type','manufacturer'));
    }
    public function store(ComputerModelFormRequest $request){
        $model = new ComputerModel;
        $insert = $model->create($request->all());
        if ($insert) {
            return redirect()
                ->route('model.create')
                    ->with('success', 'Modelo cadastrado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao cadastrar o Modelo');
        }
    }
    public function show($id){
        $search = ComputerModel::findOrFail($id);
        if ($search) {
            return view('admin.model.show', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function edit($id){
        $type = $this->type;
        $manufacturer = $this->manufacturer;
        $search = ComputerModel::findOrFail($id);
        if ($search) {
            return view('admin.model.create', compact('search','type','manufacturer'    ));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function update(ComputerModelFormRequest $request, $id){
        $dataForm = $request->all();
        $model = ComputerModel::findOrFail($id);
        $insert = $model->update($dataForm);
        if ($insert) {
            return redirect()
                ->route('model')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }
        
    }
    public function destroy($id){
        $model = ComputerModel::findOrFail($id);
        $delete = $model->delete();
        if($delete){
            return redirect()
                ->route('model')
                    ->with('success', 'Registro excluido com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir o registro');
        }
    }
}
