<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
    <header>
        <h1>Editar Registro</h1>
        <hr/>
    </header>
<?php
    session_start();
    $id = $_GET['id'];
    $line = 1;
    $file = fopen('src/hist_firm.txt','r');
    while(! feof($file)){ 
        $data = fgets($file);
        if ($id==$line){
            $data = explode(",",$data);
            break; 
        }
        $line++;                 
    }
    $new_firm = array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8]);
    $new_firm = implode (',',$new_firm);
    $_SESSION['new_firm'] = $new_firm;
    $_SESSION['id'] = $id;
?>
<body style="background: #212527">
<div class="form">
 <div class="container" >
    <div class="row">
            <section class="col-md-12">
                <form method="POST" action="edit.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="new_fantasy_name" class="col-sm-8 col-form-label">Nome Fantasia</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="new_fantasy_name" name="new_fantasy_name" value="<?=$data[1]?>"> 
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="new_social_reason" class="col-sm-8 col-form-label">Razão Social</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="new_social_reason" name="new_social_reason" value="<?=$data[2]?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="new_email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="new_email" class="form-control" id="new_email" name="new_email" value="<?=$data[3]?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="new_phone" class="col-sm-2 col-form-label">Telefone</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="new_phone" name="new_phone" value="<?=$data[4]?>">                  
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="new_phone" class="col-sm-2 col-form-label">CNPJ</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="new_cnpj" name="new_cnpj" value="<?=$data[5]?>">                  
                            </div>
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="new_endereco" class="col-sm-2 col-form-label">Endereço</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="new_endereco" name="new_endereco" value="<?=$data[6]?>">                  
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group  col-md-6">
                            <label for="new_cidade" class="col-sm-2 col-form-label">Cidade</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="new_cidade" name="new_cidade" value="<?=$data[7]?>">                  
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="new_estado" class="col-sm-2 col-form-label">Estado</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="new_estado" name="new_estado" value="<?=$data[8]?>">                  
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
 </div>
</div>
<?php include_once "src/partials/_footer.php"?>
    <body>
</html>
