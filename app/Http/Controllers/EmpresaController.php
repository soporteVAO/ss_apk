<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\Empresas\StoreEmpresaRequest;
use App\Models\Empresa;
use Exception;

class EmpresaController extends Controller
{
    public function index(Empresa $model){
        // $empresas = Empresa::paginate(10);
        try{
            return view('empresas.index',[
                'empresas'=> $model->paginate(10)
            ]);
        }catch(Exception $e){
            return redirect()->route('dashboard')->with('danger',$e->getMessage());;
        }
        
    }
    /* DEVUELVE LA VISTA PARA DAR DE ALTA UNA NUEVA EMPRESA*/
    public function create(){
        return view('empresas.create');
    }
    /*Recibe $request con los datos para dar de alta una empresa*/
    public function store(StoreEmpresaRequest $request){
        try{
            // if (!$this->comprobar_conexion($request->cuenta_id, $request->api_key)){
            //     return redirect()->route('empresas.index')->with('danger','No se ha creado la empresa, las claves API no coinciden');
            // }else{
                
            // }
            $empresa = Empresa::create([
                'nombre'=>$request->nombre,
                'cuenta_id'=>$request->cuenta_id,
                'api_key' => $request->api_key,
            ]);
            
            return redirect()->route('empresas.index')->with('success','Empresa creada satisfactoriamente');
        }catch(Exception $e){
            return redirect()->back()->with('danger',$e->getMessage());
        }
        

    }
    /*DEVUELVE LA VISTA PARA EDITAR LOS DATOS DE UNA EMPRESA*/
    public function edit(Empresa $empresa){
        return view('empresas.edit', [
            'empresa'=> $empresa
        ]);
    }

    /*DEVUELVE LA VISTA PARA VER LOS DATOS DE UNA EMPRESA*/
    public function show(Empresa $empresa){
        return view('empresas.show',[
            'empresa'=> $empresa
        ]);
    }

    /*RECIBE $REQUEST Y LA EMPRESA PARA ACTUALIZAR LOS DATOS*/ 
    public function update(Request $request, Empresa $empresa){
        try{
            $request->validate([
                'nombre'=> [Rule::unique('empresas')->ignore($empresa->id)]
            ]);
            Empresa::find($empresa->id)->update($request->except(['_token']));

            return redirect()->route('empresas.show',$empresa)->with('success','Empresa actualizada correctamente');
        }catch(Exception $e){
            return redirect()->route('empresas.show',$empresa)->with('danger', $e->getMessage());
        }
    }

    /**/
    public function destroy(Empresa $empresa){
        try{
            $empresa->delete();
            return redirect()->back()->with('success','Todo lo relacionado con la empresa ha sido eliminado con éxito');
        }catch(Exception $e){
            return redirect()->back()->with('danger',$e->getMessage());
        }
        

    }

    
}
