<?php
    session_start();
    require_once "src/Firm.php";
    $new_fantasy_name = $_POST['new_fantasy_name'];
    $new_social_reason = $_POST['new_social_reason'];
    $new_email = $_POST['new_email'];
    $new_phone = $_POST['new_phone'];
    $new_cnpj = $_POST['new_cnpj'];
    $new_endereco = $_POST['new_endereco'];
    $new_cidade = $_POST['new_cidade'];
    $new_estado = $_POST['new_estado'];
    $id = $_SESSION['id'];
    $new_firm = $_SESSION['new_firm'];
    $updated_new_firm = array("$id","$new_fantasy_name","$new_social_reason","$new_email","$new_phone","$new_cnpj",$new_endereco,$new_estado,$new_cidade);
    Firm::edit_Register($new_firm,$updated_new_firm);
?>
<html>
    <?php 
        include_once "src/partials/_head.php";
        header("Refresh:5;url=index.php");
    ?>
    <body style="background:#212529">
        <div class="msg">
            <h2> Empresa editada com sucesso!</h2>
            <h3> Você será redirecionado a página principal em 5 segundos...</h3>
        </div>
    </body>
</html>

