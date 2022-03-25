<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorFormRequest;
use App\Http\Requests\VendorUpdateFormRequest;
use App\Models\Vendor;
class VendorController extends Controller
{

    public function __construct(){
    }
    public function index(){
        $vendors = Vendor::all();
        return view('admin.vendor.index', compact('vendors'));
    }
    public function create(){
        return view('admin.vendor.create');
    }
    public function store(VendorFormRequest $request){
        $vendor = new Vendor;
        $insert = $vendor->create($request->all());
        if ($insert) {
            return redirect()
                ->route('vendor.create')
                    ->with('success', 'Fornecedor cadastrado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao cadastrar o fornecedor');
        }
        
    }
    public function show($id){
        $search = Vendor::findOrFail($id);
        if ($search) {
            return view('admin.vendor.show', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function edit($id){
        $search = Vendor::findOrFail($id);
        if ($search) {
            return view('admin.vendor.create', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function update(VendorUpdateFormRequest $request, $id){
        $dataForm = $request->all();
        $vendor = Vendor::findOrFail($id);
        $insert = $vendor->update($dataForm);
        if ($insert) {
            return redirect()
                ->route('vendor')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }
        
    }
    public function destroy($id){
        $vendor = Vendor::findOrFail($id);

        $delete = $vendor->delete();

        if($delete){
            return redirect()
                ->route('vendor')
                    ->with('success', 'Registro excluido com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir o registro');
        }
    }
}
