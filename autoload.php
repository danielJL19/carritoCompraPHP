<?php 

//PARA CONTROLADORES,ESTO HACE UN INCLUDE PARA CADA UNO DE ELLOS
function controllers_autoload($classname){
    include 'controllers/' . $classname . '.php';;
}
spl_autoload_register('controllers_autoload');