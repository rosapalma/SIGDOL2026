PASOS PARA INICIAR CLONAR EL REPOSITORIO

$ git clone [https://github.com/rosapalma/sigdol_L11](https://github.com/rosapalma/sigdol-L11-2025)

$ navegue desde una terminal hasta el directorio (cd directorio)

$ composer install

$ npm install 

$ cp .env.example .env Agregue la configuración de su base de datos en el archivo .env (puede consultar mis artículos sobre cómo lograrlo https://devcode.la/tutoriales/laravel-5-base-de-datos-y-environment/ )

$ php artisan key:generate (para laravel genere su propio key 'APP_KEY')

$ php artisan migrate

$ php artisan db:seed

$ php artisan serve y x ultimo

$ abra un nuevo cmd/terminal y navegue hasta el directorio del proyecto, escriba alli npm run dev. Entonces hemos terminado y tenemos el sistema en ejecucion.
  Ahora ya puede dirigirse a su navegador web y escribir http://127.0.0.1:8000, 
