## Редакционно-издательский центр СГУ

![screenshot](https://user-images.githubusercontent.com/49368556/220342797-cf901ffa-67a6-47af-a6cd-b94474c05dbf.png)

Приложение для просмотра и ведения статистики по выполнению плана издания учебной и учебно-методической литературы.

-   Laravel 9
-   Vite
-   Vue 3
-   Tailwind CSS 3.2
-   PHP 8.1^

Для разработки можно использовать Laravel Homestead и Vagrant.

## Установка

1. `composer install`
2. `yarn install`
3. `php artisan generate:key`
4. `php artisan migrate --seed`
5. `yarn build`
6. `php artisan queue:work --queue="email"`
