<?php

  session_start();//pega a sessão
  session_unset();//limpa as variaveis da sessão
  session_destroy();//destroi a sessão
  header("Location: ../../index.php");

 ?>
