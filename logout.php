<?php
// exclui cookie que armazena usuário logado
setcookie('login', '', time()-1);
// retorna para tela de login
echo "<script language='javascript' type='text/javascript'>
alert('Você saiu do sistema.');window.location.href=
'cadastro.html';</script>";