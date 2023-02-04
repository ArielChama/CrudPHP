<?php
session_start();
include_once 'includes/header.php';
include_once 'php_action/conexao_db.php';
include_once 'includes/message.php';
?>

<div class="row">
    <div class="col s12 m-6 mt-5">
        <h3 class="mb-5">Clientes</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome: </th>
                    <th>Sobrenome: </th>
                    <th>Email: </th>
                    <th>Idade: </th>
                </tr>
            </thead>
            <tbody <?php
                    $consulta = $pdoConnection->prepare("SELECT * FROM clientes");
                    $consulta->execute();
                    while ($dados = $consulta->fetch(PDO::FETCH_ASSOC)) :
                    ?> <tr>
                <td><?php echo $dados['nome']; ?></td>
                <td><?php echo $dados['sobrenome']; ?></td>
                <td><?php echo $dados['email']; ?></td>
                <td><?php echo $dados['idade']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn btn-warning">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                        </svg>
                    </a>
                </td>
                <td>
                    <a href="#myModal<?php echo $dados['id']; ?>" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </a>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Opa !</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <p>Tem a certeza que quer excluir ? </p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>

                                    <form action="php_action/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                        <button type="submit" name="btn-deletar" class="btn btn-danger">Sim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                </tr>

            <?php
                    endwhile;
            ?>
            </tbody>
        </table>
        <br>
        <a href="add.php" class="btn btn-primary">
            Add Cliente
        </a>
    </div>
</div>
<div class="lead mt-5">
    <p class="text-success">Todos os direitos e créditos ao Ariel Chama</p>
</div>

<?php include_once 'includes/footer.php'; ?>