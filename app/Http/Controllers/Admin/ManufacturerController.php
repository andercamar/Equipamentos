<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerFormRequest;
use App\Http\Requests\ManufacturerUpdateFormRequest;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function __construct(){

    }
    public function index(){
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturer.index', compact('manufacturers'));
    }
    public function create(){
        return view('admin.manufacturer.create');
    }
    public function store(ManufacturerFormRequest $request){
        $manufacturer = new Manufacturer;
        $insert = $manufacturer->create($request->all());
        if ($insert) {
            return redirect()
                ->route('manufacturer.create')
                    ->with('success', 'Fornecedor cadastrado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao cadastrar o fornecedor');
        }
    }
    public function show($id){
        $search = Manufacturer::findOrFail($id);
        if ($search) {
            return view('admin.manufacturer.show', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function edit($id){
        $search = Manufacturer::findOrFail($id);
        if ($search) {
            return view('admin.manufacturer.create', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function update(ManufacturerUpdateFormRequest $request, $id){
        $dataForm = $request->all();
        $manufacturer = Manufacturer::findOrFail($id);
        $insert = $manufacturer->update($dataForm);
        if ($insert) {
            return redirect()
                ->route('manufacturer')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }
        
    }
    public function destroy($id){
        $manufacturer = Manufacturer::findOrFail($id);

        $delete = $manufacturer->delete();

        if($delete){
            return redirect()
                ->route('manufacturer')
                    ->with('success', 'Registro excluido com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir o registro');
        }
    }
}
