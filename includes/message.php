<?php
    if (isset($_SESSION['mensagem'])): ?>
        <div class="alert alert-primary alert-dismissable fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $_SESSION['mensagem']; ?>
        </div>
<?php 
    endif; 
    session_unset();
?>