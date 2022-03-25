<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class ConfigController extends Controller
{
    public function index(){
        return view('admin.config.index');
    }
    public function profile(){
        return view('admin.config.profile');
    }
    public function profileUpdate(UpdateProfileFormRequest $request){
        $user = auth()->user();
        $data = $request->all();
        if ($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }

        $update = $user->update($data);

        if ($update){
            return redirect()
                    ->route('profile')
                        ->with('success', 'Perfil atualizado com sucesso' );
        }else{
            return redirect()
                    ->back()
                        ->with('error', 'Erro ao atualizar o perfil' );
        }
    }

    public function users(){
        return view('admin.config.users');
    }
}

