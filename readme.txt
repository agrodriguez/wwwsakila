Requerimientos
•	Php 5.6.2
•	MySQL 5.7.12
•	Composer ultima versión
•	Node.js 4.4.3
•	Laravel 5.2
Tareas
•	crear proyecto laravel new <<appname>>
•	configurar archivo hosts wwwsakila.dev
•	configurar servidor web
•	dar permiso a carpetas \storage, \database y \bootstrap\cache
•	crear directorio tmp en c:php y dar permisos para permitir uploads 
•	dirigir upload_tmp_dir en php.ini al directorio creado
•	crear y dar permiso \public\images\uploads
Instalar paquetes
•	composer require doctrine/dbal, para modoficar campos con migraciones
•	composer require illuminate/html para utiliza request y formas
•	composer require intervention/image
•	modificar config/app.php para la base de datos ,timezone, providers y aliases
	•	'timezone' => 'America/Mexico_City
	•	Illuminate\Html\HtmlServiceProvider::class,
	•	Intervention\Image\ImageServiceProvider::class,
	•	App\Providers\ViewControllerServiceProvider::class,

	•	'Form' => Illuminate\Html\FormFacade::class,
	•	'Html' => Illuminate\Html\HtmlFacade::class,
	•	'Image' => Intervention\Image\Facades\Image::class,

corregir error bind shared en laravel
[Symfony\Component\Debug\Exception\FatalErrorException]  Call to undefined method Illuminate\Foundation\Application::bindShared()
bindShared() have been replaced with singleton()
It is located here: /path-to-your-project/vendor/illuminate/html/HtmlServiceProvider.php
change on line no : 36 and 49
Instalar Node.js
Para poder utilizer gulp se require Node
•	npm install
•	$ npm install --global gulp-cli
•	$ npm install --save-dev gulp
•	$ gulp
Default Login
•	Email.: Mike.Hillyer@sakilastaff.com
•	Password: 111111
rutas

+--------+-----------+---------------------------+-------------------+--------------------------------------------------------+------------+
| Domain | Method    | URI                       | Name              | Action                                                 | Middleware |
+--------+-----------+---------------------------+-------------------+--------------------------------------------------------+------------+
|        | GET|HEAD  | /                         |                   | App\Http\Controllers\PagesController@index             | web        |
|        | GET|HEAD  | about                     |                   | App\Http\Controllers\PagesController@about             | web        |
|        | GET|HEAD  | actors                    | actors.index      | App\Http\Controllers\ActorsController@index            | web,auth   |
|        | POST      | actors                    | actors.store      | App\Http\Controllers\ActorsController@store            | web,auth   |
|        | GET|HEAD  | actors/{actor}            | actors.show       | App\Http\Controllers\ActorsController@show             | web,auth   |
|        | GET|HEAD  | api/cities                |                   | App\Http\Controllers\ApiController@cities              | web        |
|        | GET|HEAD  | api/inventories           |                   | App\Http\Controllers\ApiController@inventories         | web        |
|        | GET|HEAD  | contact                   |                   | App\Http\Controllers\PagesController@contact           | web        |
|        | GET|HEAD  | customers                 | customers.index   | App\Http\Controllers\CustomersController@index         | web,auth   |
|        | POST      | customers                 | customers.store   | App\Http\Controllers\CustomersController@store         | web,auth   |
|        | GET|HEAD  | customers/create          | customers.create  | App\Http\Controllers\CustomersController@create        | web,auth   |
|        | GET|HEAD  | customers/{customer}      | customers.show    | App\Http\Controllers\CustomersController@show          | web,auth   |
|        | DELETE    | customers/{customer}      | customers.destroy | App\Http\Controllers\CustomersController@destroy       | web,auth   |
|        | PUT|PATCH | customers/{customer}      | customers.update  | App\Http\Controllers\CustomersController@update        | web,auth   |
|        | GET|HEAD  | customers/{customer}/edit | customers.edit    | App\Http\Controllers\CustomersController@edit          | web,auth   |
|        | POST      | films                     | films.store       | App\Http\Controllers\FilmsController@store             | web,auth   |
|        | GET|HEAD  | films                     | films.index       | App\Http\Controllers\FilmsController@index             | web,auth   |
|        | GET|HEAD  | films/create              | films.create      | App\Http\Controllers\FilmsController@create            | web,auth   |
|        | DELETE    | films/{film}              | films.destroy     | App\Http\Controllers\FilmsController@destroy           | web,auth   |
|        | GET|HEAD  | films/{film}              | films.show        | App\Http\Controllers\FilmsController@show              | web,auth   |
|        | PUT|PATCH | films/{film}              | films.update      | App\Http\Controllers\FilmsController@update            | web,auth   |
|        | GET|HEAD  | films/{film}/edit         | films.edit        | App\Http\Controllers\FilmsController@edit              | web,auth   |
|        | GET|HEAD  | home                      |                   | App\Http\Controllers\PagesController@index             | web        |
|        | POST      | inventories               |                   | App\Http\Controllers\ApiController@storeInventory      | web        |
|        | POST      | login                     |                   | App\Http\Controllers\Auth\AuthController@login         | web,guest  |
|        | GET|HEAD  | login                     |                   | App\Http\Controllers\Auth\AuthController@showLoginForm | web,guest  |
|        | GET|HEAD  | logout                    |                   | App\Http\Controllers\Auth\AuthController@logout        | web        |
|        | GET|HEAD  | rentals                   | rentals.index     | App\Http\Controllers\RentalsController@index           | web,auth   |
|        | POST      | rentals                   | rentals.store     | App\Http\Controllers\RentalsController@store           | web,auth   |
|        | PUT|PATCH | rentals/{rental}          | rentals.update    | App\Http\Controllers\RentalsController@update          | web,auth   |
|        | GET|HEAD  | rentals/{rental}          | rentals.show      | App\Http\Controllers\RentalsController@show            | web,auth   |
|        | GET|HEAD  | rentals/{rental}/payment  | rentals.payment   | App\Http\Controllers\RentalsController@payment         | web,auth   |
|        | POST      | rentals/{rental}/payment  | rentals.payUp     | App\Http\Controllers\RentalsController@payUp           | web,auth   |
|        | GET|HEAD  | staffs                    | staffs.index      | App\Http\Controllers\StaffsController@index            | web,auth   |
|        | POST      | staffs                    | staffs.store      | App\Http\Controllers\StaffsController@store            | web,auth   |
|        | GET|HEAD  | staffs/create             | staffs.create     | App\Http\Controllers\StaffsController@create           | web,auth   |
|        | GET|HEAD  | staffs/{staff}            | staffs.show       | App\Http\Controllers\StaffsController@show             | web,auth   |
|        | DELETE    | staffs/{staff}            | staffs.destroy    | App\Http\Controllers\StaffsController@destroy          | web,auth   |
|        | PUT|PATCH | staffs/{staff}            | staffs.update     | App\Http\Controllers\StaffsController@update           | web,auth   |
|        | GET|HEAD  | staffs/{staff}/edit       | staffs.edit       | App\Http\Controllers\StaffsController@edit             | web,auth   |
+--------+-----------+---------------------------+-------------------+--------------------------------------------------------+------------+

