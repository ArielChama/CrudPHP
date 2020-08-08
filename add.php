<?php include_once 'includes/header.php'; ?>

        <div class="container">
            <div class="mt-5">
                <h3 class="">Novo cliente</h3>
                <form action="php_action/create.php" method="get">
                    <div class="mt-5">
                        <label for="lblNome">Nome</label>
                        <input type="text" name="nome" id="lblNome" class="form-control mb-3">

                        <label for="lblSobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="lblSobrenome" class="form-control mb-3">

                        <label for="lblEmail">Email</label>
                        <input type="email" name="email" id="lblEmail" class="form-control mb-3">

                        <label for="lblIdade">Idade</label>
                        <input type="number" name="idade" id="lblIdade" class="form-control">

                        <div class="mt-5">
                            <button type="submit" name="btn-cadastrar" class="btn btn-success">
                                Cadastrar
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