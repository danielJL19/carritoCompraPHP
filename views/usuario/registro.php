<?php 
    function eliminarSession(){
        $util = new Utils();
        $util::deleteSession('register');
        $util::deleteSession('errores');
    }
?>

<h1 class="text-center">Registrarse</h1>

<!--el envio sera el URL para el metodo save de la clase Usuario-->
<form action="guardarRegistro" method="POST">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>
    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-success">Registrar Usuario</button>
</form>
<?php
//luego de registrar la cuenta o si hubo un fallo 
//  1-si es verdadero se registrara que fue con exito
//  2-si es falso NO se registrara la cuenta
//  3-si no hay nada se reiniciara la session de register
if (isset($_SESSION['register']) && $_SESSION['register']=='completado') {
    echo $_SESSION['register'];
}else if(isset($_SESSION['register']) && $_SESSION['register']=='fallido'){
    echo $_SESSION['register'];
}else if(isset($_SESSION['register']) && $_SESSION['register']=='rellene todos los datos por favor'){
    echo $_SESSION['register'];
}
if(isset($_SESSION['errores'])){
    foreach ($_SESSION['errores'] as $errores){
        echo '<div class="bg-danger my-2 fs-3 rounded-pill text-light">' .$errores .'</div>'.'<br>';
    }
}
eliminarSession();
