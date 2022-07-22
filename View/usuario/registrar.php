<div class="row justify-content-md-center">
    <div class="col-4 bg-secondary  p-3 rounded-3 " style=" margin-top: 1cm;  margin-bottom:1cm ; ">
        <h2 class="text-center text-uppercase mt-1">Registra tu usuario</h2>

        <?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 'complete') : ?>
          <div class="bg-success text-center p-2" >
            <strong class="Dark link"'>Registro Completo</strong>
          </div>
    <?php header("location:" . base_url . 'Usuarios/login'); ?> 

<?php elseif (isset($_SESSION['registro']) && $_SESSION['registro'] == 'failed') : ?> 
    <div class="bg-danger text-center p-2">  
        <strong class="Dark link">Registro fallido. introduce bien los datos</strong>
    </div>
<?php endif; ?> 
<!--cierra el if -->
<?php utils::deleteSession('registro') ?>

<div class=" justify-content-center text-center ">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 w-50 p-1" viewBox="0 0 20 20" fill="white">
        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
    </svg>
</div>

<!-- <form action="index.php?controller=Usuarios&action=save" method="POST"> -->
    
<form action="<?= base_url ?>Usuarios/save" method="POST">
<div class=" justify-content-center text-center pt-1">
<label class="fw-bold" for="nombre">CORREO ELECTRONICO</label>
</div>
<div class=" justify-content-center text-center pt-2">
<input class="form-control" id="nombre" type="email" name="email" require>
</div>
<div class=" justify-content-center text-center pt-2">
<label class="fw-bold" for="pass">PASSWORD</label>
</div>
<div class=" justify-content-center text-center pt-2">
<input class="form-control" id="pass" type="password" name="password" require>
</div>
<div class=" justify-content-center text-center pt-2">
<input class="btn btn-primary p-1 rounded-1 border border-light " style="width: 120px;" type="submit" value="Entrar">
</div>

</form>
</div>
</div>