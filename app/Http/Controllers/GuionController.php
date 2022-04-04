<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Guion;
use App\Models\FieldsCategory;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
// use App\Http\Traits\SharpspringTrait;


class GuionController extends Controller
{
    // use SharpspringTrait;

    public function index(Guion $model){
        $empresa = Auth::user()->empresa;
        return view('guiones.index',['guiones'=>$model::where('empresa_id',$empresa->id)->get()]);
    }

    public function create(){
        // $sharpspring = new SharpspringTrait();
        // $fields = $this->getSSFields();
        // dd($fields);
        $empresa_id= Auth::user()->empresa->id;
        // $fields = Field::where('relationship','opportunity')->where('empresa_id',$empresa_id)->get();
        $categories = FieldsCategory::all();
        return view('guiones.create',['categories'=>$categories]);
    }

    public function store(Request $request){
        try{
             // dd($request->except(['_token']));
        $request->validate([
            'nombre'=>'required|unique:guiones'
        ]);
        $cuestionario = Guion::create([
            'nombre' => $request->nombre,
            'empresa_id' => Auth::user()->empresa->id
        ]);
        // dd($cuestionario);
        //$cuestionario->fields()->syncWithPivotValues($request->fields,['order'=>0]);
        $cuestionario->fields()->attach($request->fields,['order'=>0]);
        if ($cuestionario){
            $msg = "Guion creado satisfactoriamente";
            return redirect()->back()->with('success', $msg);
        }
        $msg = "Ocurrio un error creando el guión";
        return redirect()->back()->with('danger', $msg);
        }catch(Exception $e){
                    return redirect()->back()->with('danger', $e->getMessage());

        }
       
    }

    public function show(Guion $guion){
        return view('guiones.show',[
            'guion'=>$guion
        ]);
    }

    public function edit(Guion $guion){
        return view('guiones.edit',[
            'guion' => $guion
        ]);
    }

    public function update(Guion $guion, Request $request){
        try{
            $ordered_items = $request->order;            
            $order = 0;
            $guion->fields()->detach();
            //$data = array();
            foreach($ordered_items as $item){
                $field = Field::where('label', $item)->first();                
                $guion->fields()->attach($field->id, ['order'=>$order]);
                $order++;
                // array_push($data,$data_sync);
            }
            // dd($data);
            // dd($request->order);
            // $guion->fields()->sync($request->orderº);
            return redirect()->route('guiones.index')->with('success','Guion actualizado con éxito');
        }catch(Exception $e){
            return redirect()->route('guiones.index')->with('danger', $e->getMessage());
        }
        
        // $guion->fields()->updateExistingPivot();
    }

    /**/
    public function destroy(Guion $guion){
        // dd($guion);
        try {
            $guion->fields()->detach();
            $guion->delete();
            $msg = "Guion eliminado satisfactoriamente";
            return redirect()->back()->with('success', $msg);
        }catch(Exception $e){
            $msg = $e->getMessage();
            return redirect()->back()->with('danger', $msg);
        }
    }

    public function showError(){
        $message = 'Necesita sincronizar los campos para comenzar a usar los guiones';
        return view('guiones.error', [
            'message' => $message
        ]);
    }

    public function startEntrevista(Guion $guion){
        return view('guiones.entrevista', ['guion'=>$guion]);
    }

    public function prueba(){
        echo 'hola';
    }

    public function initEntrevista(Request $request){
        // dd($request->all());
        //DB::enableQueryLog();
        
        $oportunidad_id = $request->opportunity_id;
        $guion = Guion::find($request->guion_id);
        $fields = $guion->fields;
        
        //$quries = DB::getQueryLog();

  

        //dd($quries);
        // dd($guion->getOrderedFields());
        return view('guiones.entrevista-oportunidad',[
            'guion' => $guion,
            'oportunidad_id' => $oportunidad_id
        ]);
    }
}
