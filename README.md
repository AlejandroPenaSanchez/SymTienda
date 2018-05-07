# SymTienda
Primera pagina en Symfony

Para crear servidor --> php -S 127.0.0.1:8000 -t public 

crear controlador y vista --> php bin/console make:controller

crear db --> php bin/console doctrine:database:create
configurar db en archivo .env

crear entidad --> php bin/console make:entity
crea el archivo de migracion para crear las entidades en la db --> php bin/console make:migration 
ejecutar todas las migraciones --> php bin/console doctrine:migrations:migrate

se pueden usar dos formas para enrutar se puede usar el archivo config\routes\routes.yaml
o se puede importar Symfony\Component\Routing\Annotation\Route y poner la ruta en cada metodo

