<?php

$con_string = "host=localhost port=5432 dbname=ws user=postgres password=postgres";
$bdcon = pg_connect($con_string) or
die ("Não foi possível conectar ao servidor PostGreSQL"); 

