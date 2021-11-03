<?php

//https://rogertakemiya.com.br/como-criar-um-web-service-com-o-php/

require_once('nusoap/src/nusoap.php');

$server = new soap_server();

//definindo o encode
$server->soap_defencoding = 'UTF-8';
$server->decode_utf8 = false;
$server->encode_utf8 = true;

//configurando o wsdl 
$server->configureWSDL('testws', 'urn:testws');

//registrando um método
$server->register('processar_nome',array('nome' => 'xsd:string', 'sobrenome' => 'xsd:string'),array('nomecompleto' => 'xsd:string'),'xsd:testws');


function processar_nome($nome,$sobrenome){
    return $nome. " " . $sobrenome;
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ''; 
$server->service($HTTP_RAW_POST_DATA);

