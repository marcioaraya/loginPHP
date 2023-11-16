<?php

$login = $_POST['login'];
$senha = md5($_POST['senha']);
$operacao = $_POST['operacao'];
$connect = mysqli_connect('localhost','root', 'senac');
$db = mysqli_select_db($connect,'cliente');
$query_select = "SELECT login FROM usuarios WHERE login = '$login' and senha='$senha'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];

if($login == "" || $login == null){
    
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href=
    'cadastro.html';</script>";
}else{

    if($logarray == $login){
        if ($operacao == 'Cadastrar') {
            echo"<script language='javascript' type='text/javascript'>
            alert('Este login já existe');window.location.href=
            'cadastro.html';</script>";

        } else {
            setcookie('login', $login);
            echo"<script language='javascript' type='text/javascript'>
            window.location.href='index.php';</script>";
        }
    }else{
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
        $insert = mysqli_query($connect,$query);

        if($insert){
            setcookie('login', $login, time()-1);
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso');window.location.href=
            'index.php';</script>"; 
        }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar este usuário');window.location.href=
            'cadastro.html';</script>";
        }
    }
}





