<?php

namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\User;


class UserController extends Controller
{
    private $totalpage = 10;
    public function index(){

        $users = User::paginate($this->totalpage);
        return view('admin.users.index', compact('users'));
    }
    public function create(){

        return view('admin.users.create');
    }
    public function store(CreateUserFormRequest $request){
        $user = new User;
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $insert = $user->create($data);

        if ($insert)
            return redirect()
                ->route('users.create')
                ->with('success', 'Senha cadastrada com sucesso!');
                
        return redirect()
                ->route('users.create')
                ->with('error', 'Erro ao cadastrar a senha!');
        
    }
    public function show($id){
        $user = User::findOrFail($id);
        if ($user){
            return view('admin.users.show', compact('user'));
        }else{
            return redirect()
                ->route('users.index')
                    ->with('error', 'Erro ao localizar o usuario');
        }

    }
    public function edit($id){
        $user = User::findOrFail($id);
        
        return view('admin.users.create')->with('user', $user);
    }
    public function update(UpdateUserFormRequest $request, $id, User $users){
        $user = User::findOrFail($id);
        $data = $request->all();

        if($user->password == $data['password'] || $user->password == null){
            unset($data['password']);
        }else{
            $data['password'] = bcrypt($data['password']);
        }
        $update = $user->update($data);

        if ($update){
            return redirect()
                    ->route('users.index')
                        ->with('success', 'Usuario atualizado com sucesso' );
        }else{
            return redirect()
                    ->back()
                        ->with('error', 'Erro ao atualizar o usuarios' );
        }

    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $delete = $user->delete();
        if($delete){
            return redirect()
                ->route('users.index')
                    ->with('success','Registro excluido com sucesso!');
        }else{
            return redirect()
                ->back()
                    ->with('error', 'Erro ao excluir registro');
        }

    }
    public function search(Request $request){
        $dataForm = $request->all();

        $users = DB::table('users')
                ->select(DB::raw('*'))
                    ->where('name', 'LIKE', '%'. $dataForm['name'] .'%')
                    ->where('email', 'LIKE', '%' . $dataForm['email'] . '%')
                    ->get();

       return view('admin.users.index', compact('users', 'dataForm'));

    }

}
