<?php
$urlWsdl = 'http://www.webservicex.net/airport.asmx?WSDL';
try {
$soapClient = new \SoapClient($urlWsdl, [
        'exceptions' => true
    ]);
$requestData = [ 'country' => 'brazil' ];
$response = $soapClient->GetAirportInformationByCountry($requestData);
} catch (SoapFault $exception) {
echo $exception->getMessage();
return;
}
?>