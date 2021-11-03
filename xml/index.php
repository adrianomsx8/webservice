<?php

require_once('Xml.Class.php');
require_once('config.php');

$xml = new Xml();


$erro = 0;

$idProduto = $_GET['id'];
$xml->createOpenXmlTag();
$xml->openTag("response");
$msgerro = '';

if($idProduto == ''){
   $erro = 1;
   $msgerro = 'Código Inválido!';  
}else{
   $rs =  pg_query($bdcon, "select * from produto where id=$idProduto");

   if (pg_num_rows($rs) > 0 ){
       $reg  = pg_fetch_object($rs);
       $xml->addTag('nome_produto', $reg->nome_produto);
       $xml->addTag('valor', $reg->valor);
   }else{
       $erro = 2;
       $msgerro = 'Produto não encontrado';
   }
}

$xml->addTag('erro', $erro);
$xml->addTag('msgErro', $msgerro);

$xml->closeTag("response");

echo $xml;


?>