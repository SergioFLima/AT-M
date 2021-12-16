<?php
  
class ATM {
  
    private $usuario;
    private $senha;
    private $codigo;
    private $xml;
    private $auth;
  
    public function logar(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://webserver.averba.com.br/rest/Auth",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode(['usuario' => $this->usuario, 'senha' => $this->senha, 'codigoatm' => $this->codigo]),
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-type: application/json"
          ),
        ));

        $res = curl_exec($curl);
        $obj = json_decode($res, true);
        $err = curl_error($curl);
        curl_close($curl);
        $this->auth = $obj['Bearer'];
        return $obj['Bearer'];
    }
    public function nfe(){
        $xml = $this->xml;
        $token = $this->auth;
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => "webserver.averba.com.br/rest/NFE",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $xml,
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$token,
            "Accept: application/json",
            "Content-type:  application/xml"
          ),
        ));
    
        $res = curl_exec($curl);
        $obj = json_decode($res, true);
        $err = curl_error($curl);
        curl_close($curl);
        return $obj;
    }
    public function cte(){
        $xml = $this->xml;
        $token = $this->auth;
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => "webserver.averba.com.br/rest/CTE",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $xml,
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$token,
            "Accept: application/json",
            "Content-type:  application/xml"
          ),
        ));
    
        $res = curl_exec($curl);
        $obj = json_decode($res, true);
        $err = curl_error($curl);
        curl_close($curl);
        return $obj;
    }
    
    public function mdfe(){
      $xml = $this->xml;
      $token = $this->auth;
      $curl = curl_init();
  
      curl_setopt_array($curl, array(
        CURLOPT_URL => "webserver.averba.com.br/rest/MDFE",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $xml,
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer ".$token,
          "Accept: application/json",
          "Content-type:  application/xml"
        ),
      ));
  
      $res = curl_exec($curl);
      $obj = json_decode($res, true);
      $err = curl_error($curl);
      curl_close($curl);
      return $obj;
  }
}
