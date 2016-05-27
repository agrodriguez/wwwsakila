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


