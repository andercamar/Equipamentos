<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\Departament;
use App\Models\Vendor;
use App\Models\ComputerModel;
use App\Models\License;
use App\Models\Hardware;
use App\Models\Software;
use App\Http\Requests\ComputerFormRequest;
use App\Http\Requests\ComputerUpdateFormRequest;
class ComputerController extends Controller
{
    private $departament;
    private $vendor;
    private $type;
    private $modelNotebook;
    private $modelDesktop;
    private $Office;
    private $System;
    private $motherboard;
    private $memory;
    private $processor;
    private $storage;
    private $computers;
    private $computersD;
    private $software;

    public function __construct(){
        $this->type = ['Desktop' => 'Desktop', 'Notebook' => 'Notebook'];
        $this->vendor = Vendor::pluck('vendor_name', 'id');
        $this->departament = Departament::pluck('departament_name','id');
        $this->modelNotebook = ComputerModel::where('model_type', '=', 'Notebook')->pluck('model_name','id');
        $this->modelDesktop = ComputerModel::where('model_type', '=', 'Desktop')->pluck('model_name','id');
        $hardware = new Hardware();
        $this->motherboard = $hardware->fullMotherboard();
        $this->memory = $hardware->fullMemory();
        $this->processor = $hardware->fullProcessor();
        $this->storage = $hardware->fullStorage();
        $license = new License();
        $this->Office =  $license->fullOffice();
        $this->System = $license->fullWindows();
        $this->computers = Computer::where('computer_active', '=', '1')->get();
        $this->computersD = Computer::where('computer_active', '=', '0')->get();
        $this->software = Software::pluck('software_name','id');
    }
    public function index(){
        $computers = $this->computers;
        $computersD = $this->computersD;
        return view('admin.computer.index', compact('computers','computersD'));
    }
    public function create(){
        $type = $this->type;
        $vendor = $this->vendor;
        $departament = $this->departament;
        $modelDesktop = $this->modelDesktop;
        $modelNotebook = $this->modelNotebook;
        $Office = $this->Office;
        $System = $this->System;
        $motherboard = $this->motherboard;
        $memory = $this->memory;
        $processor = $this->processor;
        $storage = $this->storage;
        $Software = $this->software;
        return view('admin.computer.create', compact('departament','vendor','type', 'modelDesktop','modelNotebook', 'Office','System','motherboard','memory','processor','storage','Software'));
    }
    public function store(ComputerFormRequest $request){
        $computer = new Computer;
        $insert = $computer->create($request->all());
        $computerID = Computer::findOrFail($insert->id);
        $computerID->licenses()->attach([$request->office_id,$request->system_id]);
        $computerID->hardware()->attach([$request->motherboard_id,$request->memory_id,$request->processor_id,$request->storage_id]);
        if ($request->software_id) {
            $computerID->softwares()->attach([$request->software_id]);
        }   
        if ($insert) {
            return redirect()
                ->route('computer.create')
                    ->with('success', 'Computador cadastrado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao cadastrar o computador');
        }
    }
    public function show($id){
        $search = Computer::findOrFail($id);
        if ($search) {
            return view('admin.computer.show', compact('search'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function edit($id){
        $search = Computer::findOrFail($id);
        foreach ($search->licenses as $license) {
            if($license->license_type == 'Sistema Operacional'){
                $search->system_id = $license->id;
            }elseif($license->license_type == 'Office'){
                $search->office_id = $license->id;
            }
        }
        foreach ($search->hardware as $hardware) {
            if($hardware->hardware_type == 'Armazenamento'){
                $search->storage_id = $hardware->id;
            }elseif($hardware->hardware_type == 'Placa-Mãe'){
                $search->motherboard_id = $hardware->id;
            }elseif($hardware->hardware_type == 'Memória'){
                $search->memory_id = $hardware->id;
            }elseif($hardware->hardware_type == 'Processador'){
                $search->processor_id = $hardware->id;
            }
        }
        foreach ($search->softwares as $software){
            $search->software_id = $software->id;
        }
        $type = $this->type;
        $vendor = $this->vendor;
        $departament = $this->departament;
        $modelDesktop = $this->modelDesktop;
        $modelNotebook = $this->modelNotebook;
        $Office = $this->Office;
        $System = $this->System;
        $motherboard = $this->motherboard;
        $memory = $this->memory;
        $processor = $this->processor;
        $storage = $this->storage;
        $Software = $this->software;
        if ($search) {
            return view('admin.computer.create', compact('search','departament','vendor','type', 'modelDesktop','modelNotebook', 'Office','System','motherboard','memory','processor','storage','Software'));
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao localizar o registro');
        }
    }
    public function update(ComputerUpdateFormRequest $request, $id){
        $dataForm = $request->all();
        $computer = Computer::findOrFail($id);
        $insert = $computer->update($dataForm);
        $computer->licenses()->allRelatedIds();
        $computer->licenses()->sync([$request->office_id,$request->system_id]);
        $computer->hardware()->allRelatedIds();
        $computer->hardware()->sync([$request->motherboard_id,$request->memory_id,$request->processor_id,$request->storage_id]);
        if ($request->software_id) {
            $computer->softwares()->allRelatedIds();
            $computer->softwares()->sync([$request->software_id]);
        }
        if ($insert) {
            return redirect()
                ->route('computer')
                    ->with('success', 'Registro alterado com sucesso');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao alterar o fornecedor');
        }

    }
    public function destroy($id){
        $computer = Computer::findOrFail($id);

        $delete = $computer->delete();

        if($delete){
            return redirect()
                ->route('computer')
                    ->with('success', 'Registro excluido com sucesso');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir o registro');
        }
    }
    public function active($id){
        $computer = Computer::findOrFail($id);
        $computer['computer_active'] = true;
        $update = $computer->update();
        if ($update) {
            return redirect()
                ->route('computer')
                    ->with('success', 'Computador ativado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao ativar o registro');
        }
    }
    public function deactive($id){
        $computer = Computer::findOrFail($id);
        $computer['computer_active'] = false;
        $update = $computer->update();
        if ($update) {
            return redirect()
                ->route('computer')
                    ->with('success', 'Computador desativado');
        } else {
            return redirect()
                ->back()
                    ->with('error', 'Erro ao desativar o registro');
        }
    }
}
