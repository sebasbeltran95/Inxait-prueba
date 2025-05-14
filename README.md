<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/img/logo.png" width="400" alt="InnClod"></a></p>

## Inxait

Se realiza prueba tecnica de la empresa Inxait en el  framework laravel 10, livewire 2, bootstrap y MySQL las instrucciones de despliegue son las siguientes:

- Clonar el repositorio (https://github.com/sebasbeltran95/Inxait-prueba.git).
- Descomprimir los archivos vendor.rar y .rar.
- Realizar un composer update.
- Ejecutar la migracion (php artisan migrate).
- Entrar a base de datos en la tabla users puede crear el usuario con el que ingresara al aplicativo o puede ir a la siguiente  ruta dentro del proyecto (routes/web.php), dentro del archivo web encontrara la siguiente linea Auth::routes(['register' => false]);, lo que tiene que hacer es borrar lo quee sta dentro del parentesis Auth::routes(); y con esto se habilitara la ruta register, entrando a esta ruta puede crear los accesos para poder ingresar al aplicativo.
- Para poder inicializar el servidor hacemos lo siguiente: abre el proyecto con visual studio code, luego se procede a abrir la terminar, se ingresa el comando php artisan serve, este comando arrojara la siguiente url http://127.0.0.1:8000, esta url se copia y se pega en el navegador de su preferencia, este paso se realiza despues de haber echo la migracion o de haberse importado la base de datos que se encuentra en el proyecto.

## Vistas

Para poder ingresar a la vista clientes lo hacemos a traves de la siguiente URL /clientes, en esta vista podemos encontrar un CRUD echo a traves de modales, en la tabla se evidenciara la siguiente informacion, nombre, apellido, cedula, departamento, ciudad, celular, email, habeas_data y la fecha en la que se creo, tambien se puede descargar un excel de la informacion que se esta visualizando. 

Para poder ingresar a la vista usuarios lo hacemos a traves de la siguiente URL /usuarios, en la tabla se evidenciara la siguiente informacion, name_ email, rol, password y la fecha en la que se creo.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
