<?php 
    session_start();
    require_once "src/Firm.php";
    $line = 1;
    $id = $_GET['id'];
    $file = fopen('src/hist_firm.txt','r');
    while(! feof($file)){ 
        $data = fgets($file);
        if ($id==$line){
            $data = explode(",",$data);
            break; 
        }
        $line++;                 
    }
    $new_firm = array("$data[0]","$data[1]","$data[2]","$data[3]","$data[4]","$data[5]","$data[6]","$data[7]","$data[8]");
    Firm::delete_Register($new_firm);
?>
<html>
    <?php 
        include_once "src/partials/_head.php";
        header("Refresh:5;url=index.php");
    ?>
    <body style="background:#212529">
        <div class="msg">
            <h2> Empresa excluída com sucesso!</h2>
            <h3> Você será redirecionado a página principal em 5 segundos...</h3>
        </div>
    </body>
</html>
