<!--BARRA LATERAL-->
<aside id="lateral">
                   
                        <div id="login" class="block_aside">
                            <?php if(!isset($_SESSION['usuario'])){ ?><!--SI NO HAY DATOS DENTRO DE SESSION-->
                            <form action="<?= base_url.'usuario/login';?>" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email1" id="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password1" id="password" class="form-control">
                                </div>
                                    <input type="submit" value="Enviar" class="btn btn-success">
                            </form>
                            <?php }else{
                                    echo 'Bienvenido: '. $_SESSION['usuario']->nombre;
                                }
                                ?>
                            <ul class="nav opciones">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Mis pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Gestionar pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Gestionar categorias</a>
                                </li>
                                <?php if(isset($_SESSION['usuario'])){ ?>
                                <li class="nav-item">
                                    <a href="<?=base_url?>usuario/logout">Salir de sesión</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

</aside>
            </div>
                            
                    <!--CONTENIDO CENTRAL-->
                    <div class="col-md-10">
                <div class="row">
                                <!--CONTENIDO CENTRAL-->
            <div class="col-md-10">
            <div class="row">