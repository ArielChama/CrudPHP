<?php
    
    include_once 'php_action/conexao_db.php';
    include_once 'includes/header.php'; 

    if (isset($_GET['id'])) {
        $id = mysqli_escape_string($conexao, $_GET['id']);

        $consulta = "SELECT * FROM clientes WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $consulta);

        $dados = mysqli_fetch_array($resultado);
    }
?>

        <div class="container">
            <div class="mt-5">
                <h3 class="">Editar cliente</h3>
                <form action="php_action/update.php" method="get">
                    <div class="mt-5">
                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                        <label for="lblNome">Nome</label>
                        <input type="text" name="nome" id="lblNome" class="form-control mb-3" value="<?php echo $dados['nome']; ?>">

                        <label for="lblSobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="lblSobrenome" class="form-control mb-3" value="<?php echo $dados['sobrenome']; ?>">

                        <label for="lblEmail">Email</label>
                        <input type="email" name="email" id="lblEmail" class="form-control mb-3" value="<?php echo $dados['email']; ?>">

                        <label for="lblIdade">Idade</label>
                        <input type="number" name="idade" id="lblIdade" class="form-control" value="<?php echo $dados['idade']; ?>">

                        <div class="mt-5">
                            <button type="submit" name="btn-editar" class="btn btn-success">
                                Atualizar
                            </button>

                            <a href="index.php" class="btn btn-primary">
                                Lista de clientes
                            </a>
                        </div>
                        
                    </div>
                </form>    
            </div>
        </div>

<?php include_once 'includes/footer.php'; ?>