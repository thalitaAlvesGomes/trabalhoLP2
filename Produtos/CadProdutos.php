<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/produtos/cadProd.css">
    <title>Cadastro de Produtos</title>
</head>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {
    ?>

    <header class="topo">

        <nav class="menuCabecalho">
            <a class="voltar" href="listarProdutos.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="sair" href="../Login/logout.php">Sair</a>
        </nav>

    </header>

    <body>

        <br>
        <div class="cadastroProd">
                <h2>DADOS DO PRODUTO</h2>
            </div>
        <div class="formulario">
            
            <br>
            <form name="dadosProd" action="novoProduto.php" method="post">
                <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="descricao">Descrição&nbsp;</label></div>
                            <div class="alinha"><input type="text" maxlength="100" size="45" id="descricao" name="descricao"
                                    required>&nbsp;&nbsp;&nbsp;<br>
                            </div>
                        </td>
                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="tipoProd">Tipo do Produto &nbsp; </label></div>
                                <div class="alinha">
                                    <select name="tipoProd" required>
                                        <?php
                                        require_once "../conexao.php";
                                        $sql = "SELECT * from tipo_produto order by descricao";
                                        $resultado = $conexao->query($sql);
                                        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                                            echo "<option value='$linha[codigo]'> 
                                $linha[descricao]</option>";
                                        }
                                        ?>
                                    </select>&nbsp;&nbsp;&nbsp;
                                </div>

                        </td>
                    </tr>
                </table>
                <br>

                <table>
                    <tr>
                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="codFornecedor">Fornecedor &nbsp; </label></div>
                                <div class="alinha"> <select name="codFornecedor" required>
                                        <?php
                                        require_once "../conexao.php";
                                        $sql = "SELECT * from fornecedores order by razaoSocial";
                                        $resultado = $conexao->query($sql);
                                        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                                            echo "<option value='$linha[codigo]'> 
                                $linha[razaoSocial]</option>";
                                        }
                                        ?>
                                    </select>&nbsp;&nbsp;&nbsp;</div>

                        </td>

                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="saldo">Saldo &nbsp; </label></div>
                                <div class="alinha"><input type="text" maxlength="20" size="20" id="saldo" name="saldo"
                                        required>
                                    &nbsp;&nbsp;&nbsp;</div>
                        </td>

                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="unidade">Unidade de Medida &nbsp; </label></div>
                                <div class="alinha"><input type="text" maxlength="20" size="20" id="unidade" name="unidade"
                                        required>
                                    &nbsp;&nbsp;&nbsp;</div>
                        </td>

                    </tr>
                </table>
                <br>

                <input type="submit" id="confirm" value="Confirmar">


            </form>

        </div>

    </body>

    <?php
} else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listarProdutos.php'</script>";
} else header("location: ../usuarioNaoLogado.php");
?>

</html>