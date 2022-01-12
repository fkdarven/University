<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Gerenciador de Empresas</title>
</head>
<body style="background: #212529">
    <header>
        <h1>Empresas Cadastradas</h1>
        <hr/>
        <div class="new">
            <h5><a href="new_register.php"> Nova Empresa </a></h5>
        </div>
</header>   
    <div class="data">    
        <table class="table table-dark" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Fantasia</th>
                    <th>Razão Social</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CNPJ</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <?php
                $i = 1;
                $file = fopen('src/hist_firm.txt','r');
                while(! feof($file)){ 
                    $data = fgets($file);                        
                    if ($data != "") {
                        $data = explode(',', $data); ?>
                        <tr>
                            <td><?= $data[0] ?></td>
                            <td><?= $data[1] ?></td>  
                            <td><?= $data[2] ?></td>
                            <td><?= $data[3] ?></td>
                            <td><?= $data[4] ?></td>
                            <td><?= $data[5] ?></td>
                            <td><?= $data[6] ?></td>
                            <td><?= $data[7] ?></td>
                            <td><?= $data[8] ?></td>
                            <td>
                                <a href="edit_register.php?id=<?=$i?>">Editar</a>
                                <a href="delete.php?id=<?=$data[0]?>">Deletar</a>
                            </td>
                        </tr>
                    <?php
                    }$i++;
                }?>
            </table>
    </div>
    <div class="push"></div>    
    <?php include_once "src/partials/_footer.php"?>
</body>
</html>
