<div class="form-group">
    <label for="">Nombre de usuario</label>
    <input type="text" class="form-control" placeholder="Nombre.." name="nombre" <?php $validador->show_nombre() ?>>
    <?php
    $validador->show_error_nombre();
    ?>
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" placeholder="Email.." name="email" <?php $validador->show_email() ?>>
    <?php
    $validador->show_error_email();
    ?>
</div>
<div class="form-group">
    <label for="">Contrasenha</label>
    <input type="password" class="form-control" placeholder="Contrasenha.." name="pass">
    <?php
    $validador->show_error_pass();
    ?>
</div>
<div class="form-group">
    <label for=""> Repite tu contrasenha</label>
    <input type="password" class="form-control" placeholder="Contrasenha.." name="pass2">
    <?php
    $validador->show_error_pass2();
    ?>
</div>
<br>
<button type="reset" class="">
    Limpiar datos
</button>
<button type="submit" name="enviar" class="btn btn-default btn-primary">
    Enviar datos
</button>