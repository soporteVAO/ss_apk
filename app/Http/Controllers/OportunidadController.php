<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Field;
use App\Models\Guion;
use Exception;
use App\Http\Traits\SharpspringTrait;

class OportunidadController extends Controller
{
    use SharpspringTrait;

    public function index($offset=0){
        try{
            $method = 'getOpportunities';                                                                 
            $params = array('where' => array('ownerID'=>Auth::user()->ss_id), 'offset' => $offset);          
            $requestID = session_id();                                                          
            $data = array(                                                                                
                'method' => $method,                                                                      
                'params' => $params,                                                                      
                'id' => $requestID,                                                                       
            );
            $empresa = Auth::user()->empresa;
            $resultado = $this->getSSResults($data, $empresa);  
            // dd($resultado);
            if (is_null($resultado->result)){
                $msg = "Ha ocurrido un error al obtener las oportunidades";
                return redirect()->back()->with('danger', $msg);   
            }
            $oportunidades = $resultado->result->opportunity;         
            return view('oportunidades.index',array(
                'oportunidades' => $oportunidades,
                'guiones' => Guion::all(),
            ));
        }catch(Exception $e){
            return back()->with('danger', $e->getMessage());
        }   
        
    }

    public function getSSOpportunities($offset=0){
        $method = 'getOpportunities';                                                                 
        $params = array('where' => array('ownerID'=>Auth::user()->ss_id), 'offset' => $offset);          
        $requestID = session_id();                                                          
        $data = array(                                                                                
            'method' => $method,                                                                      
            'params' => $params,                                                                      
            'id' => $requestID,                                                                       
        );
        $resultado = $this->getSSResults($data);
        dd($resultado);
        return $resultado->result->opportunity;
    }

    public function show($oportunidad_id){
        try{
            $method = 'getOpportunities';                                                                 
            $params = array('where' => ['id'=>$oportunidad_id]);          
            $requestID = session_id();                                                          
            $data = array(                                                                                
                'method' => $method,                                                                      
                'params' => $params,                                                                      
                'id' => $requestID,                                                                       
            );
            $empresa = Auth::user()->empresa;
            $oportunidad = $this->getSSResults($data, $empresa);
            $oportunidad = json_decode(json_encode($oportunidad->result->opportunity),true);
            // dd($oportunidad);
            // dd($oportunidad);
            $fields = Field::where('relationship','opportunity')->where('dataType','!=','upload')->get();
            // $fields = Field::all();
            // dd(gettype($fields));
            // dd($fields);
            return view('oportunidades.show',array(
                'fields' => $fields,
                'oportunidad' => $oportunidad[0]
            ));
        }catch(Exception $e){
            return back()->with('danger', $e->getMessage());
        }                                                                     
        
    }

    public function updateOpportunity(Request $request){
        
        try{
            $method = 'updateOpportunities';                                                                 
            $params = [];
            array_push($params,$this->getParamsOpportunity($request));
            $requestID = session_id();                                                          
            $data = array(     
                'id' => $requestID,                                                                             
                'method' => $method,                                                                      
                'params' => [
                    "objects"=> $params
                ],                                                                                                                                              
            );
            // dd($data);
            $oportunidad = $this->getSSResults($data);
            return redirect()->route('oportunidades.index')->with('success','Guion realizado con éxito');
        }catch(Exception $e){
            return redirect()->route('oportunidades.index')->with('danger','Ocurrio un error actualizando el guión');
        }
        return back()->withStatus(__('Se ha actualizado la oportunidad correctamente'));
    }

    /*Recibe $request y devuelve un array formado para enviar a SS*/
    public function getParamsOpportunity(Request $request){
        $params = [];
        foreach ($request->except(['_token','_method']) as $clave => $value) {
            $valor="";
            if ($value!=null){
                if (gettype($value)=='array'){

                    foreach($value as $respuesta){
                       $valor = $valor.$respuesta.','; 
                   }
                }
                else{
                    $valor = $value;
                }
                $params[$clave] = $valor;
            }
            
        }
        return $params;
    }
    


    /*RECIBE $DATA DE SS, REALIZA LA PETICION Y DEVUELVE LOS RESULTADOS*/
    // public function getSSResults($data){
    //     // dd($data);
    //     // $accountID = 'D35C9937ABB07577D7933723D1302E45';
    //     $accountID = Auth::user()->empresa->cuenta_id;
    //     // $secretKey = '14F6F1B3DD91F1FA9CE85F1EA31161B2';  
    //     $secretKey = Auth::user()->empresa->api_key;
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
    //     // dd($result);
    //     return $result;
    // }
}
