<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Empresa;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\SharpspringTrait;
use Exception;

class UserController extends Controller
{
    use SharpspringTrait;
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create(){
        return view('users.create',['empresas'=> Empresa::all(), 'roles' => Role::all()]);
    }

    public function store(UserRequest $request){
        try{
            $empresa = Empresa::find($request->empresa_id);
            $user_id = $this->getSSProfile($empresa, $request->email);
            // dd($user);
            $request->merge(['ss_id'=>$user_id]);
            $user = User::create($request->merge(['password' => Hash::make($request['password'])])->except(['_token']) );

            if (!$user_id){
                $msg = "Usuario creado pero el correo no coincide con ningún perfil en SS";
                return redirect()->route('users.index')->with('warning', $msg);   
            }
            else{
                $msg = "Usuario creado exitosamente";            
                return redirect()->route('users.index')->with('success', $msg);   
            }
        }catch(Exception $e){
            return redirect()->back()->with('danger', $e->getMessage());   
        }
                

    }

    public function show(User $user){
        return view('users.show',['user'=>$user]);
    }

    public function edit(User $user){
        return view('users.edit',['user'=>$user, 'empresas'=> Empresa::all(), 'roles' => Role::all()]);
    }

    public function update(Request $request, User $user){
        try{
            $empresa = Empresa::find($request->empresa_id);
            $user_id = $this->getSSProfile( $empresa, $request->email);
            $request->merge(['ss_id'=>$user_id]);
            // dd($request->all());
            $user->update($request->except(['_token','_method']));

            if (!$user_id){
                $msg = "Usuario actualizado pero el correo no coincide con ningún perfil en SS";
                return redirect()->back()->with('warning', $msg);   
            }
            else{
                $msg = "Usuario actualizado exitosamente";            
                return redirect()->back()->with('success', $msg);   
            }
        }catch(Exception $e){
            return redirect()->back()->with('danger', $e->getMessage());   
        }     
              
    }

    public function destroy(User $user){
        try{
            $user->delete();
            return redirect()->back()->with('success','Usuario eliminado satisfactoriamente');
        }catch(Exception $e){
            return redirect()->back()->with('danger',$e->getMessage());
        }
    }
}
