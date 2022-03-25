<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\License;
use App\Http\Requests\LicenseFormRequest;
use App\Http\Requests\LicenseUpdateFormRequest;

class LicenseController extends Controller
{
    private $type;
    private $nameW;
    private $nameO;
    private $version;
    private $licensesA;
    private $licensesD;

    public function __construct(){
        $this->type = [null=>'Selecione','Sistema Operacional'=>'Sistema Operacional','Office'=>'Office'];
        $this->nameW = [null=>'Selecione','Windows 10'=>'Windows 10','Windows 7'=>'Windows 7','Windows 8'=>'Windows 8','Windows 8.1'=>'Windows 8.1'];
        $this->nameO = [null=>'Selecione','365'=>'365','Home and Bussines 2010'=>'Home and Bussines 2010','Home and Bussines 2013'=>'Home and Bussines 2013','Home and Bussines 2016'=>'Home and Bussines 2016','Standard 2010'=>'Standard 2010','Standard 2013'=>'Standard 2013','Basic 2007'=>'Basic 2007','Small and Business 2007'=>'Small and Business 2007','Sem Office'=>'Sem Office','LibreOffice'=>'LibreOffice'];
        $this->version = [null=>'Selecione','OEM'=>'OEM','OPEN'=>'OPEN','FPP'=>'FPP'];
        $this->licensesA = License::where('license_active', '=', '1')->get();
        $this->licensesD = License::where('license_active', '=', '0')->get();
    }
    public function index(){
        $licensesA = $this->licensesA;
        $licensesD = $this->licensesD;
        return view('admin.license.index', compact('licensesA', 'licensesD'));
    }
    public function create(){
        $type = $this->type;
        $nameW = $this->nameW;
        $nameO = $this->nameO;
        $version = $this->version;
        return view('admin.license.create', compact('type','nameW','nameO','version'));
    }
    public function store(LicenseFormRequest $request){
        $license = new License;
        $insert = $license->create($request->all());
        if ($insert) {
            return redirect()
                ->route('license.create')
                    ->with('success', 'Licença cadastrado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao cadastrar a Licença');
        }    
    }
    public function show($id){
        $search = License::findOrFail($id);
        if ($search) {
            return view('admin.license.show', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }

    }
    public function edit($id){
        $type = $this->type;
        $nameW = $this->nameW;
        $nameO = $this->nameO;
        $version = $this->version;
        $search = License::findOrFail($id);
        if ($search) {
            return view('admin.license.create', compact('search','type','nameW','nameO','version'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function update(LicenseUpdateFormRequest $request,$id){
        $dataForm = $request->all();
        $license = License::findOrFail($id);
        $insert = $license->update($dataForm);
        if ($insert) {
            return redirect()
                ->route('license')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }
    }
    // public function destroy($id){
    //     $model = License::findOrFail($id);
    //     $delete = $model->delete();
    //     if($delete){
    //         return redirect()
    //             ->route('model')
    //                 ->with('success', 'Registro excluido com sucesso');
    //     }else{
    //         return redirect()
    //             ->back()
    //                 ->with('error', 'Erro ao excluir o registro');
    //     }
    // }
    public function active($id){
        $license = License::findOrFail($id);
        $license['license_active'] = true;
        $update = $license->update();
        if ($update) {
            return redirect()
                ->route('license')
                    ->with('success', 'Licença ativada');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao ativar o registro');
        }
    }
    public function deactive($id){
        $license = License::findOrFail($id);
        $license['license_active'] = false;
        $update = $license->update();
        if ($update) {
            return redirect()
                ->route('license')
                    ->with('success', 'Licença desativada');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao desativar o registro');
        }
    }
}
