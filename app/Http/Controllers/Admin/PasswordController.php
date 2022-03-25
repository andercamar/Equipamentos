<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordValidationFormRequest;
use App\Models\Senhas;

class PasswordController extends Controller
{

    public function index(Senhas $senha){
        //Recupera senhas no banco
        $senhas = $senha->lista();

        //redireciona para o index passsando os itens recuperados no banco
        return view('admin.password.index', compact('senhas'));
    }
    public function create(){
        //redireciona para o formulario de criação
        return view('admin.password.create');
    }
    public function store(PasswordValidationFormRequest $request){
        //Cria uma nova senha
        $senha = new Senhas;
        $dataForm = $request->all();

        if(isset($dataForm['exclusao'])){
            $dataForm['exclusao'] = 0;
        }else{
            $dataForm['exclusao']= 1;
        }
        //Tenta inserir no banco os dados os itens do formulario
        $insert = $senha->create($dataForm);

        //verifica se inseriu os dados
         if ($insert)
             return redirect()
                 ->route('password.create')
                ->with('success', 'Senha cadastrada com sucesso!');
                
        return redirect()
                ->route('password.create')
                ->with('error', 'Erro ao cadastrar a senha!');
    }

    public function show($id){
        $senha = Senhas::find($id);
        if ($senha){
            return view('admin.password.show', compact('senha'));
        }else{
            return redirect()
                ->route('password')
                    ->with('error', 'Erro ao localizar a ID');
        }
    }

    public function edit($id){

        //Procura no banco pela ID e recupera os dados
        $senha = Senhas::findOrFail($id);

        //redireciona para o formulario enviando os dados daID recuperada
        return view('admin.password.create')
            ->with('senha', $senha);

    }
    public function update(PasswordValidationFormRequest $request, $id){

            //Recupera dados do formulario
            $dataForm = $request->all();

            if(isset($dataForm['exclusao'])){
                $dataForm['exclusao'] = 0;
            }else{
                $dataForm['exclusao']= 1;
            }
            //Procura o registro 
            $senha = Senhas::find($id);

            //Insere os dados da edição no banco
            $insert = $senha->update($dataForm);

            //verifica se inseriu com sucesso
            if($insert){
                return redirect()
                    ->route('password')
                    ->with('success', 'Registro alterado com sucesso');
            }else{
                return redirect()
                    ->route('password.edit', $id)
                    ->with('error', 'Erro ao alterar o registro');
            }
    }
    public function destroy($id){
        //Procura o registro no banco e deleta
        $senha = Senhas::findOrFail($id);
        // $delete = $senha->delete();
        $senha['exclusao'] = 1;
        $delete = $senha->update();

        if($delete){
            return redirect()
                ->route('password')
                    ->with('success','Registro excluido com sucesso!');
        }else{
            return redirect()
                ->route('password')
                    ->with('error', 'Erro ao excluir registro');
        }
    }

    public function search(Request $request, Senhas $senha){
        $dataForm = $request->except('_token');
        $senhas = $senha->search($dataForm);

        return view('admin.password.index', compact('senhas', 'dataForm'));

    }

}
