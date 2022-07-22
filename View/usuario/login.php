<div class="row justify-content-md-center ">
    <div class="col-4 bg-secondary m-3 p-3 rounded-3 ">
    <h2 class="text-center text-uppercase ">login</h2>
        <?php if (!isset($_SESSION['Identificado'])) : ?>
                     <div class=" justify-content-center text-center pt-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 w-50 p-1" viewBox="0 0 20 20" fill="white">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                       </svg>
                    </div>
            <form action="<?= base_url ?>Usuarios/login" method="POST">
                    <div class=" justify-content-center text-center pt-2">
                        <label class="fw-bold"  for="email">CORREO ELECTRONICO</label>
                    </div>
                    <div class="justify-content-center text-center">
                        <input class="form-control" id="email" type="email" name="email" require>
                    </div>
                
                
                    <div class="justify-content-center text-center ">
                        <label class="fw-bold" for="password">PASSWORD</label>
                    </div>
                    <div class=" justify-content-center text-center">
                        <input class="form-control" id="password" type="password" name="password" require>
                    </div>
                
                
                    <div class="justify-content-center text-center mt-3 mb-3  ">
                        <input  class=" btn btn-primary p-1 rounded-1 border border-light "  style="width: 120px;" type="submit" value="Entrar">
                    </div>
                
            </form>
        <?php else : ?>
            <?php header("location:" . base_url . 'Estudiantes/index'); ?>
        <?php endif; ?>
    </div>
</div>