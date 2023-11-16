<?php

$login = $_POST['login'];
$senha = md5($_POST['senha']);
$operacao = $_POST['operacao']; // operacao poderá ser "Cadastrar" ou "Login"
// conecta no banco de dados
$connect = mysqli_connect('localhost','root', 'senac');
// escolhe o schema que irá usar
$db = mysqli_select_db($connect,'cliente');
// prepara consulta para verificar se login e senha existem na tabela usuarios
$query_select = "SELECT login FROM usuarios WHERE login = '$login' and senha='$senha'";
// executa a instrução (todas linhas recuperadas estarão associadas a variável $select)
$select = mysqli_query($connect,$query_select);
// transfere a primeira linha lida do banco de dados para o vetor $array
// os nomes das colunas da tabela usuarios serão os índices do vetor
$array = mysqli_fetch_array($select);
// recupera a informação da coluna login da tabela usuarios
$logarray = $array['login'];

// se no formulário não informou login, dá mensagem de erro
// e retorna para tela de cadastro
// window.location.href faz o navegador 
// carregar a página indicada "cadastro.html"
if($login == "" || $login == null){
    
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href=
    'cadastro.html';</script>";
}else{
    // se o login existe no banco de dados ($logarray)
    // e é igual ao login informado no formulário ($login)
    if($logarray == $login){
        // se o botão pressionado foi "Cadastrar"
        if ($operacao == 'Cadastrar') {
            // dá mensagem de erro e retorna para
            // tela de login "cadastro.html"
            echo"<script language='javascript' type='text/javascript'>
            alert('Este login já existe');window.location.href=
            'cadastro.html';</script>";

        } else {
            // se o botão foi "Login"
            // grava o cookie 'login'
            // vai para a tela principal do sistema "index.php" 
            setcookie('login', $login);
            echo"<script language='javascript' type='text/javascript'>
            window.location.href='index.php';</script>";
        }
    }else{
        if ($operacao == 'Cadastrar') {
        // Se o usuário / senha não existem então
        // insere o usuário/senha na tabela usuarios
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
        $insert = mysqli_query($connect,$query);

        if($insert){
            // se cadastrar novo usuário, então
            // apaga o cookie 'login' (time()-1 cria um cookie vencido = apagado)
            setcookie('login', $login, time()-1);
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso');window.location.href=
            'index.php';</script>"; 
        }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar este usuário');window.location.href=
            'cadastro.html';</script>";
        }

        } else {
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário não existe!');window.location.href=
            'cadastro.html';</script>";
        }
    }
}





