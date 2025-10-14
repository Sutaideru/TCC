<?php
    if (isset($SESSION['mensagem']));
?>

<div class = "alert alert-warning alert-dismissible fade-show" role = "alert">
    <?= $SESSION['mensagem'];?>
    <button type='button' class="button-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
    unset($SESSION['mensagem']);
endif;
?>