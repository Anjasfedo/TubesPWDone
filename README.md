1. Jalankan perintah 
   'composer update'
   dan
   'composer install'

2. Copy file .env dari .env.example cp .env.example .env

3. Konfigurasi file .env 
   DB_CONNECTION=mysql 
   DB_HOST=127.0.0.1 
   DB_PORT=3306 
   DB_DATABASE=(ubah menjadi nama database) 

4. Generate key 
   'php artisan key:generate'

5. Migrate database 
   'php artisan migrate'

6. Seeder database
   'php artisan db:seed'

7. Menjalankan sistem
   'php artisan serve'


email dan password untuk login
'name' => 'Administrator',
'email' => 'admin@gmail.com',
'password' => bcrypt('123456'),
'level' => 1


'name' => 'Kasir',
'email' => 'kasir@gmail.com',
'password' => bcrypt('123456'),
'level' => 2
