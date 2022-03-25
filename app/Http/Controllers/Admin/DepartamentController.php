<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Departament;
use App\Http\Requests\DepartamentFormRequest;
use App\Http\Requests\DepartamentUpdateFormRequest;

class DepartamentController extends Controller
{
    public function __construct(){

    }
    public function index(){
        $departaments = Departament::all();
        return view('admin.departament.index', compact('departaments'));
    }
    public function create(){
        return view('admin.departament.create');        
    }
    public function store(DepartamentFormRequest $request){
        $departament = new Departament;
        $insert = $departament->create($request->all());
        if ($insert) {
            return redirect()
                ->route('departament.create')
                    ->with('success', 'Setor cadastrado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao cadastrar o Setor');
        }    

    }
    public function show($id){
        $search = Departament::findOrFail($id);
        if ($search) {
            return view('admin.departament.show', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function edit($id){
        $search = Departament::findOrFail($id);
        if ($search) {
            return view('admin.departament.create', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function update(DepartamentUpdateFormRequest $request, $id){
        $dataForm = $request->all();
        $departament = Departament::findOrFail($id);
        $insert = $departament->update($dataForm);
        if ($insert) {
            return redirect()
                ->route('departament')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }

    }
    public function destroy($id){
        $departament = Departament::findOrFail($id);
        $delete = $departament->delete();
        if($delete){
            return redirect()
                ->route('departament')
                    ->with('success', 'Registro excluido com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir o registro');
        }
    }

}
