 <!-- esto le aparece a los que estan loguiados -->
 <div class="row p-1 px-3 ">
     <div class="col-3 bg-primary text-white rounded-3 p-3" style="height: 14cm ;">
         <?php if (isset($EDITAR) && isset($Re_editar) && is_object($Re_editar)) : ?>
             <h4 class="titulo_categoria">Editar el estudiante <br><?= $Re_editar->nombre ?></h4>
             <!--para que me muestre el nombre del producto que voy a editar -->
             <?php $Url_action = base_url . 'Estudiantes/save&id=' . $Re_editar->id; ?>
             <!--para que me  muestre el nimero id-->
         <?php else : ?>
             <h4 class="titulo_categoria">Formulario de estudiantes</h4>
             <?php $Url_action = base_url . 'Estudiantes/save'; ?>
         <?php endif; ?>

         <form class="form_tabla" method="POST" action="<?= $Url_action ?>">

             <!-- Me muestra  se registro -->
             <?php if (isset($_SESSION['estudiante']) && $_SESSION['estudiante'] == 'Completo') : ?>
                <div class="bg-success text-center p-2" >
                 <strong class="Dark link"'>Registro Completo</strong> 
                </div>
            <?php elseif (isset($_SESSION['estudiante']) && $_SESSION['estudiante'] == 'fallo') : ?> 
                <div class="bg-danger text-center p-2" >
                <strong class="Dark link">Registro fallido. introduce bien los datos</strong>
                </div>
            <?php endif; ?> 
            <!--cierra el if -->
            <?php utils::deleteSession('estudiante') ?>     
     
        <div class=" justify-content-center pt-1">
        <label for="Nombre">Nombre</label>
        </div>
        <div class=" justify-content-center  pt-1">
        <input class="form-control" id="Nombre" type="text" name="nombre" require value="<?= isset($Re_editar) && is_object($Re_editar) ? $Re_editar->nombre : '' ?>">
        </div>
        <div class=" justify-content-center  pt-1">
        <label for="Apellido">Apellido</label>
        </div>
        <div class=" justify-content-center pt-1">
        <input class="form-control" id="Apellido" type="text" name="apellido" require value="<?= isset($Re_editar) && is_object($Re_editar) ? $Re_editar->apellido : '' ?>">
        </div>
        <div class=" justify-content-center  pt-1">
        <label for="Sexo">Sexo</label>
        </div>
        <div class=" justify-content-center  pt-1">
        <select class="form-select" id="Sexo" name="sexo" >
            <option value="<?= isset($Re_editar) && is_object($Re_editar) ? $Re_editar->sexo : '' ?>"></option>
            <option value="Heterosexual">Heterosexual</option>
            <option value="Homosexuales">Homosexuales</option>
            <option value="Bisexual">Bisexual</option>
            <option value="Pansexual">Pansexual</option>
            <option value="Asexual">Asexual</option>
            <option value="Demisexual">Demisexual</option>
        </select>
        </div>
        <div class=" justify-content-center  pt-1">
        <label for="Edad">Edad</label>
        </div>
        <div class=" justify-content-center  pt-1">
        <input class="form-control" id="Edad" type="text" name="edad" require value="<?= isset($Re_editar) && is_object($Re_editar) ? $Re_editar->edad : '' ?>">
        </div>
        <div class=" justify-content-center  pt-1">
        <label for="Telefono">Telefono</label>
        </div>
        <div class=" justify-content-center  pt-1">
        <input  class="form-control" id="Telefono" type="text" name="telefono" require value="<?= isset($Re_editar) && is_object($Re_editar) ? $Re_editar->telefono : '' ?>">
        </div>
        <div class=" justify-content-center  pt-1">
        <input class="btn btn-light mt-3 p-1 rounded-1 " type="submit" value="Guardar">
        </div>
             
    </form>
</div> 
     <div class="col-9 bg-light  p-3">

 <!-- Mustrar un  aviso si se elimina o no      -->
<?php if (isset($_SESSION['Delete']) && $_SESSION['Delete'] == 'complete') : ?> 
<strong class="Alerta_verde">¡SE ELIMINO!</strong>
<?php elseif (isset($_SESSION['Delete']) && $_SESSION['Delete'] != 'complete') : ?> 
<strong class="Alerta_roja">¡FALLO!. El datos no se elimino</strong>
<?php endif; ?> <!--cierra el if -->
<?php utils::deleteSession('Delete'); ?> 

     <table class="table table-striped table-hover text-center" border="1">
<tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Sexo</th>
    <th>Edad</th>
    <th>Telefono</th>
    <?php if (isset($EDITAR) && isset($Re_editar) && is_object($Re_editar)) : ?>
    <?php else : ?>   
    <th>Editar</th>
    <th>Eliminar</th>
    <?php endif; ?>


   
</tr>
<?php if (isset($EDITAR) && isset($Re_editar) && is_object($Re_editar)) : ?>
    <td><?= $Re_editar->nombre; ?></td>
    <td><?= $Re_editar->apellido; ?></td>
    <td><?= $Re_editar->sexo; ?></td>
    <td><?= $Re_editar->edad; ?></td>
    <td><?= $Re_editar->telefono; ?></td>

<?php else : ?>    
<?php while ($todo =  $estudiante->fetch_object()) : ?>

<tr>
    <td><?= $todo->nombre; ?></td>
    <td><?= $todo->apellido; ?></td>
    <td><?= $todo->sexo; ?></td>
    <td><?= $todo->edad; ?></td>
    <td><?= $todo->telefono; ?></td>
    <td><a class="d-block " href="<?= base_url ?>Estudiantes/Editar&id=<?= $todo->id ?>">
    <svg  style="height: 1cm;" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="green">
    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
    </svg></a>
    </td>
    <td><a class="d-block "  href="<?= base_url ?>Estudiantes/remove&id=<?= $todo->id ?>">
    <svg style="height: 1cm;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
    </svg></a>
    </td>
</tr>
<?php endwhile;  ?>
<?php endif;  ?>
</table>
     </div>
</div> 

 </div>