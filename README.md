
## Datos de instalacion

Prueba de seleccion ecotierra. para la instalacion se debe clonar el repositorio con el comando `git clone https://github.com/andresp406/Ecotierra-back.git` por consola de comando, luego se debe generar la key por medio del comando `sail artisan key:generate`, esta aplicacion usa docker como servidor en el back-end, luego generamos las migraciones por medio del comando `sail artisan migrate:fresh --seed` a la vez generamos los seeders de prueba para tener ya datos de pruebas en los endpoint solicitados.

## Instalacion de Postman
Nos dirigimos a la pagina oficial de [Postman](https://www.postman.com/) lo instalamos e importamos el json que adjunto para cargar los endpoint. inicialmente habia creado otros endpoint pensando en la autenticacion pero viendo los requerimientos no los use, en ese orden de ideas solo se deben usar los endpoint de 
- datos de usuario autenticados
- busqueda de cliente por search
- guardado de clientes
- guardado por ventas
- filtro de ventas por fecha
- filtro de ventas por id del cliente

## Datos del desarrollo del back-end

para la realizacion del back utilice 2 controladores:
- ClientController: se encarga de recuperar la informacion del cliente con el modelo retornando una respuesta mediante json al front, ademas tiene el metodo store() que se encarga de guardar en base de datos la informacion enviada desde el front
- SalesController: encargado de validar si la venta es mayor de 5 millones aplicar el descuento  e inyectado por un FormRequest para su validacion asi dejando la responsabilidad de la validacion a otra clase, ademas se encarga de guardar en base de datos la venta realizada en el front


cree dos modelos aparte del modelo por defecto de User pero antes como buena practica publique los stubs con el comando sail artisan stub:publish para tener una mejor estructuracion del codigo y una mejor organizacion.

- model Client cree dos mutators para la fecha y retornala como es requerido y para el FullName ya que por defecto se ingresan aparte, cree un queryScope para el filtro por nombre, ademas de una relacion de uno a muchos con el modelo Sales

- model Sales solo se lleno la propiedad fillable para la asignacion masiva.

En el route service provider cree tres archivos de rutas personalizadas con prefijo api/v1/auth las cuales son:

- routes/api/auth.php
- routes/api/client.php
- routes/api/sales.php

las cuales son las encargadas de enviar los datos a los endpoint solicitados

como buena practica de programacion el back genero responsabilidad a Rules para la autorizacion por el parametro de edad y tambien por el pago pendiente los cuales 

el sistema cuenta con migraciones y sus seeder para generar datos de prueba


