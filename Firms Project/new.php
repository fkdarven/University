<?php
    require_once "src/Firm.php";
    $fantasy_name = $_POST['fantasy_name'];
    $social_reason = $_POST['social_reason'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $file = fopen('src/hist_firm.txt','r');
    $id = 0;
    while(! feof($file)){ 
        fgets($file);
        $id++;                
    }
    $new_firm = array("$id","$fantasy_name","$social_reason","$email","$phone","$cnpj","$endereco","$cidade","$estado");
    Firm::new_Register($new_firm);
    ?>
<html>
    <?php 
        include_once "src/partials/_head.php";
        header("Refresh:5;url=index.php");
    ?>
    <body style="background:#212529">
        <div class="msg">
            <h2> Empresa cadastrada com sucesso!</h2>
            <h3> Você será redirecionado a página principal em 5 segundos...</h3>
        </div>
    </body>
</html>

