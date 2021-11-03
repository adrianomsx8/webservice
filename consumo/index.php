<?php

class SinteseNet {

    
    private $soapClient;
    private $Urlwsdl =   'http://localhost:8087/wsdl/index.php?wsdl';

    public function __construct($params)
    {
        $this->soapClient = new SoapClient($this->Urlwsdl, $params);
    }
    
    public function gerarUrl($arguments)
    {      
        $function = 'createToken';
        return $this->soapClient->__soapCall($function, $arguments);   
    }

}

$contextOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    ));
    
$sslContext = stream_context_create($contextOptions);
$params = array(
    'trace' => 1,
    'exceptions' => true,
    'cache_wsdl' => WSDL_CACHE_NONE,
    'stream_context' => $sslContext
    );
    
$sintesenet  = new SinteseNet($params);

$arguments= array('createToken' => array(
    'usuarioWS' => 'CSB18135',
    'senhaWS' => 'CSB18135',
    'usuarioProduto' => 'iob.00000',
    'senhaProduto' => '1111111',
    'idContrato' => '2222222',
    'produto' => 'SNE'
    ));


echo '<pre>'.'Response: ';
var_dump($sintesenet->gerarUrl($arguments));

?>
