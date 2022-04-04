<?php

namespace App\Http\Traits;
use App\Models\Oportunidad;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Exceptions\FailSSConnection;

trait SharpspringTrait {
    
    
    public function getSSOpportunities(){
        $method = 'getOpportunities';                                                                 
        $params = array('where' => []);          
        $requestID = session_id();                                                          
        $data = array(                                                                                
            'method' => $method,                                                                      
            'params' => $params,                                                                      
            'id' => $requestID,                                                                       
        );
        $oportunidades = $this->getSSResults($data);
        return $oportunidades;
    }
    public function getSSFields(){
        $method = 'getFields';                                                                 
        $params = array('where' => []);          
        $requestID = session_id();                                                          
        $data = array(                                                                                
            'method' => $method,                                                                      
            'params' => $params,                                                                      
            'id' => $requestID,                                                                       
        );
        $fields = $this->getSSResults($data);
        return $fields;       
    }
    
    

    public function arrayToCollection($oportunidades){

            if (count($accounts)==1){
                $model = new Account($accounts[0]);
                return $model;
    
            }else{
                $models = [];
                foreach ($accounts as $account){
                    $model = new Account($account);
                    array_push($models,$model);
                }
                return $models;
            }
       
    }

    /*Devuelve el ID de perfil de SS del usuario*/
    public function getSSProfile(Empresa $empresa,$email){
        $method = 'getUserProfiles';                                                                 
        $params = array('where' => ['emailAddress'=>$email]);          
        $requestID = session_id();                                                          
        $data = array(                                                                                
            'method' => $method,                                                                      
            'params' => $params,                                                                      
            'id' => $requestID,                                                                       
        );
        $user = $this->getSSResults($data, $empresa);
        // if ($user=='Unable to determine clusterID from provided accountID/secretKey'){
        //     throw new FailSSConnection('No se ha podido establecer una conexión con Sharpspring, revise sus claves');
        // }
        
        if (count($user->result->userProfile)>0){
            $user_id = $user->result->userProfile[0]->id;
            return $user_id;      

        }else{
            return null;
        }
        
        
    }

    /*RECIBE $DATA DE SS, REALIZA LA PETICION Y DEVUELVE LOS RESULTADOS*/
    public function getSSResults($data, Empresa $empresa){
        // dd($data);
        // $accountID = 'D35C9937ABB07577D7933723D1302E45';
        $accountID = $empresa->cuenta_id;
        // $secretKey = '14F6F1B3DD91F1FA9CE85F1EA31161B2';  
        $secretKey = $empresa->api_key;
        $queryString = http_build_query(array('accountID' => $accountID, 'secretKey' => $secretKey)); 
        $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";                             
                                                                                                        
        $data = json_encode($data);                                                                   
        $ch = curl_init($url);                                                                        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                              
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                               
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                   
            'Content-Type: application/json',                                                         
            'Content-Length: ' . strlen($data),
            'Expect: '                                                        
        ));                                                                                           
                                                                                                        
        $result = curl_exec($ch);                                                                     
        curl_close($ch);                                                                 
        $result = json_decode($result);
        if ($result=='Unable to determine clusterID from provided accountID/secretKey'){
            throw new FailSSConnection('No se ha podido establecer una conexión con Sharpspring, revise sus claves');
        }
        // dd($result);
        return $result;
    }
}