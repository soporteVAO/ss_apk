<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Field;
use App\Models\Option;
use App\Models\FieldsCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\SharpspringTrait;
use Exception;


class FieldController extends Controller
{
    use SharpspringTrait;

    public function index(Field $model){
        $empresa_id = Auth::user()->empresa->id;
        return view('Fields.index',[
            'fields'=>$model::where('relationship','opportunity')->where('empresa_id',$empresa_id)->orderBy('categoria_id','DESC')->get(),
            'categories' => FieldsCategory::all()
        ]);
    }

    public function update(Request $request){
        // dd($request->all());
        $field = Field::find($request->field_id);
        $field->update($request->except(['_token','field_id']));

        return redirect()->back()->with('success','Campo actualizado correctamente');
    }

    public function getFieldsSS(){
        try{
            $method = 'getFields';                                                                 
            $params = array('where' => array());          
            $requestID = session_id();                                                          
            $data = array(                                                                                
                'method' => $method,                                                                      
                'params' => $params,                                                                      
                'id' => $requestID,                                                                       
            );
            $empresa = Auth::user()->empresa;
            $fields_result = $this->getSSResults($data, $empresa);
            $fields = $fields_result->result->field;
            
            foreach ($fields as $field){
                Field::updateOrCreate(
                    ['id'=> $field->id,],
                    ['relationship'=>$field->relationship, 'systemName'=> $field->systemName, 'label'=> $field->label,
                     'dataType'=>$field->dataType, 'isRequired'=> $field->isRequired, 'isAvailableInContactManager'=>$field->isAvailableInContactManager, 'empresa_id'=> Auth::user()->empresa->id]
                );
                if (Arr::has($field,'options')){
                    foreach ($field->options as $option){
                        Option::updateorCreate(
                            ['field_id'=> $field->id, 'label'=>$option->label,],
                            ['value'=>$option->value,'displayOrder'=>$option->displayOrder,]
                        );
                    }                
                }
                
            }
            return redirect()->back()->with('success','Se han sincronizado los datos correctamente');
        }catch(Exception $e){
            return back()->with('danger', $e->getMessage());
        }
        
        //return back()->with('success','Se han sincronizado los datos correctamente');
        return back()->withStatus(__('Se han sincronizado los datos correctamente'));
        
    }

    public function create($field){
        // dd($field);
        Field::updateOrCreate(
            ['id' => $field->id],
            ['relationship' => 99, 'discounted' => 1]
        );  
        return;
    }

    /*RECIBE $DATA DE SS, REALIZA LA PETICION Y DEVUELVE LOS RESULTADOS*/
    // public function getSSResults($data){
    //     $accountID =  Auth::user()->empresa->cuenta_id;
    //     $secretKey =  Auth::user()->empresa->api_key;  
    //     $queryString = http_build_query(array('accountID' => $accountID, 'secretKey' => $secretKey)); 
    //     $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";                             
                                                                                                        
    //     $data = json_encode($data);                                                                   
    //     $ch = curl_init($url);                                                                        
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                              
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                  
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                               
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                   
    //         'Content-Type: application/json',                                                         
    //         'Content-Length: ' . strlen($data),
    //         'Expect: '                                                        
    //     ));                                                                                           
                                                                                                        
    //     $result = curl_exec($ch);                                                                     
    //     curl_close($ch);                                                                 
    //     $result = json_decode($result);
    //     return $result;
    // }
}
