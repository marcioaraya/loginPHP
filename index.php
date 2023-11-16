<?php

        if(isset($_COOKIE['login'])){
            $login_cookie = $_COOKIE['login'];
            echo "<h1>Bem-vindo, $login_cookie </h1>";
            echo "<p style='color:blue'>Acesso permitido </p>";
            echo "<form action=\"logout.php\" method=\"POST\">";
            echo "<input type=\"submit\" value=\"Sair do sistema\">";
            echo "</form>";
                      
        }else{
            echo"<h1>Bem-vindo convidado</h1>";
            echo"<p style='color:red'> Acesso não permitido</p>";
            echo"<p><a href='cadastro.html'>Faça login</a></p>";
        }