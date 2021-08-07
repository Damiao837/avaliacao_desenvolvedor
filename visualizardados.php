
<?php
require_once 'class/Connectar.php';
require_once 'class/mClientes.php';

$mCli = new mClientes();

$dados = $mCli->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Importar arquivo txt</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    </head>
    <body>
        <?php
        if (is_array($dados) and count($dados))
        {
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Comprador</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Qnt.</th>
                        <th>End.</th>
                        <th>Fornecedor</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $receitabruta = 0;
                    foreach ($dados as $v)
                    {
                        $receitabruta += ($v['preco'] / 100) *$v['quantidade'];
                        ?>
                        <tr>
                            <th><?= stripslashes($v['comprador']) ?></th>
                            <th><?= stripslashes($v['descricao']) ?></th>
                            <th><?= 'R$ ' . number_format(($v['preco'] / 100), 2, ',', ''); ?></th>
                            <th><?= $v['quantidade'] ?></th>
                            <th><?= stripslashes($v['endereco']) ?>.</th>
                            <th><?= stripslashes($v['fornecedor']) ?></th>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        Receita bruta : <?= 'R$ ' . number_format($receitabruta, 2, ',', '');?>
            <?php
        }
        else
        {
            ?>
          Arquivo vazio
        <?php } ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </body>
</html>