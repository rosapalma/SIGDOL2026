PASOS PARA INICIAR CLONAR EL REPOSITORIO

$ git clone https://github.com/rosapalma/sigdol_L11

$ navegue desde una terminal hasta el directorio (cd directorio)

$ composer install

$ npm install 

$ cp .env.example .env Agregue la configuración de su base de datos en el archivo .env (puede consultar mis artículos sobre cómo lograrlo https://devcode.la/tutoriales/laravel-5-base-de-datos-y-environment/ )

$ php artisan key:generate (para laravel genere su propio key 'APP_KEY')

$ php artisan migrate

$ php artisan db:seed

$ php artisan serve (si se abre el servidor, http://127.0.0.1:8000, entonces hemos terminado y tenemos el sistema en ejecucion)
