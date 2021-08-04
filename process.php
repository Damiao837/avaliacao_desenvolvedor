<?php

require_once 'class/Connectar.php';
require_once 'class/mClientes.php';

$mCli = new mClientes();

$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

$arquivo = file($arquivo_tmp, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($arquivo == false)
    die('Não foi possível abrir o arquivo.');


for ($i = 1; $i < count($arquivo); $i++)
{
    $campos = explode(chr(9), $arquivo[$i]); 
    $mCli->inserir($campos[0], $campos[1], ($campos[2]*100), $campos[3], $campos[4], $campos[5]);
}

header("Location: ./visualizardados.php");
