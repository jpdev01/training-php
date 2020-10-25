<?php

// session_start();
// if((!isset($_SESSION['idsessao']))||(($_SESSION['idsessao'])!=session_id())){
//   //nao autenticado
//   // $pag_anterior = $_SERVER['HTTP_REFERER'];
//   $pag_anterior   = $_SERVER['HTTP_REFERER'];
//   echo $pag_anterior;
//   if ((strpos($pag_anterior,"main") == true)|| ($pag_anterior=="")){
//     //veio da main
//     // echo "veio da main";
// header("Location: ../index.php");
//   }
//   else{
//     //nao veio da main
//     // echo "n veio da main";
// header("Location: ../../index.php");
//   }
//   exit(); //ou die();
// }

session_start();
if(!isset($_SESSION['idsessao'])||($_SESSION['idsessao']!= session_id())){
  header("Location: /projectone/index.php");
  exit;
}

?>
