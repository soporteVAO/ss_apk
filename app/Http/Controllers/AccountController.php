<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AccountController extends Controller
{
    public function index(){
        $method = 'getAccounts';                                                                 
        $params = array('where' => array(), 'offset' => 0);          
        $requestID = session_id();                                                          
        $data = array(                                                                                
            'method' => $method,                                                                      
            'params' => $params,                                                                      
            'id' => $requestID,                                                                       
        );
        $resultado = $this->getSSResults($data);
        $accounts = $resultado->result->account;
        // $accounts = $this->arrayToModel($accounts);
        dd($accounts);
        // dd($resultado->result->account);
        return view('accounts.index',['accounts'=>$accounts]);
    }

    public function show($account){
        // dd($account);
        $method = 'getAccount';       
        // dd($account_id);                                                          
        $params = ['id'=>$account];          
        $requestID = session_id();                                                          
        $data = array(                                                                                
            'method' => $method,                                                                      
            'params' => $params,                                                                      
            'id' => $requestID,                                                                       
        );
        $resultado = $this->getSSResults($data);
        // dd($resultado);
        $account = $resultado->result->account;
        $account = $this->arrayToModel($account);
        // dd($account);
        // dd($resultado->result->account);
        return view('accounts.show',['account'=>$account]);
    }

    public function arrayToModel($accounts){
        

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

    /*RECIBE $DATA DE SS, REALIZA LA PETICION Y DEVUELVE LOS RESULTADOS*/
    public function getSSResults($data){
        // dd($data);
        // $accountID = 'D35C9937ABB07577D7933723D1302E45';
        $accountID = Auth::user()->empresa->cuenta_id;
        // $secretKey = '14F6F1B3DD91F1FA9CE85F1EA31161B2';  
        $secretKey = Auth::user()->empresa->api_key;
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
        // dd($result);
        return $result;
    }
}
