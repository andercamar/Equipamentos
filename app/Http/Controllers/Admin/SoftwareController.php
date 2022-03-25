<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SoftwareFormRequest;
use App\Models\Software;

class SoftwareController extends Controller
{
    public function __construct(){
    }
    public function index(){
        $data = Software::all();
        return view('admin.software.index', compact('data'));
    }
    public function create(){
        return view('admin.software.create');
    }
    public function store(SoftwareFormRequest $request){
        $software = new Software;
        $insert = $software->create($request->all());
        if($insert){
            return redirect()
                ->route('software.create')
                    ->with('success', 'Cadastro realizado');
        }else{
            return redirect()
                ->back()
                    ->with('error','Erro ao cadastrar');
        }
    }
    public function show($id){
        $search = Software::findOrFail($id);
        if ($search){
            return view('admin.software.show', compact('search'));
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o Registro');
        }
    }
    public function edit($id){
        $search = Software::findOrFail($id);
        if ($search){
            return view('admin.software.create', compact('search'));
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o Registro');
        }
    }
    public function update(SoftwareFormRequest $request, $id){
        $dataForm = $request->all();
        $software = Software::findOrFail($id);
        $insert = $software->update($dataForm);
        if($insert){
            return redirect()
                ->route('software')
                    ->with('success', 'Registro alterado com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }
    }
    public function destroy($id){
        $software = Software::findOrFail($id);
        $delete = $software->delete();
        if($delete){
            return redirect()
                ->route('software')
                    ->with('success', 'Registro excluido com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir o registro');
        }
    }
}
