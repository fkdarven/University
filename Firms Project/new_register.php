<!DOCTYPE html>
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
        <h1>Cadastro</h1>
        <hr/>
    </header>
    <body style="background: #212529">
        <div class="form">
            <div class="container" >
                <div class="row">
                        <section class="col-md-12">
                            <form method="POST" action="new.php" >
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fantasy_name" class="col-sm-8 col-form-label">Nome Fantasia</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="fantasy_name" name="fantasy_name"> 
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="social_reason" class="col-sm-8 col-form-label">Razão Social</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="social_reason" name="social_reason">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="phone" name="phone">                  
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-sm-2 col-form-label">CNPJ</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="cnpj" name="cnpj">                  
                                </div>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="endereco" class="col-sm-2 col-form-label">Endereço</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="endereco" name="endereco">                  
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group  col-md-6">
                                <label for="cidade" class="col-sm-2 col-form-label">Cidade</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="cidade" name="cidade">                  
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="estado" name="estado">                  
                                </div>
                            </div>
                        </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </form>
                    </section>
                </div>
            </div>
        </div>
        <?php include_once "src/partials/_footer.php"?>
    </body>
</html>
