<?php
include_once "Controller/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro de produtos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="Imagens/oferta.avif" alt="imagem" class="img-produto">
            </div>
            <div class="col-8">
                <form method="GET" action="Controller/salvar.php">
                    <div class="mt-3 form-floating">
                        <input type="number" class="form-control desabilitado" id="codigo" name="codigo" readonly 
                        value="<?php echo filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS); ?>">
                        <label form="codigo" class="form-label">Código</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="nome" name="nome" 
                        value="<?php echo filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); ?>">
                        <label form="nome" class="form-label">Nome do produto</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="valor" name="valor"
                        value="<?php echo filter_input(INPUT_GET, 'valor', FILTER_SANITIZE_SPECIAL_CHARS); ?>">
                        <label form="valor" class="form-label">Valor</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <div class="row">
                            <div class="col">
                                <a href="index.php">
                                   <button type="button" class="btn btn-primary form-control botao_novo">Novo</button>
                                </a>
                                
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary form-control botao_salvar">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Produtos cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do produto</th>
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM produtos ";
                    $pesquisar = mysqli_query($link, $sql);
                    if ($pesquisar) {
                    while ($linha = $pesquisar->fetch_assoc()) {
                    echo " <tr>
                            <td>".$linha['prod_id']."</td>
                            <td>".$linha['prod_nome']."</td>
                            <td>".$linha['prod_valor']."</td>
                            <td>
                                <a href='?
                                codigo=".$linha['prod_id']."&
                                nome= ".$linha['prod_nome']."&
                                valor= ".$linha['prod_valor'].
                                "'>
                                    <img src='Imagens/edit.svg'>
                                </a>
                            </td>
                            <td>
                                <a href='Controller/excluir.php?codigo=".$linha['prod_id']."'>
                                    <img src='Imagens/delete.svg' >
                                </a>
                            </td>
                        </tr>
                    " ; } } else { echo "Erro ao realizar pesquisa." ; } mysqli_close($link); 
                    ?>
                    </tbody>
            </table>
            </div>
        </div>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>
