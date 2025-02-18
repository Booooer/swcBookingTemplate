# Тестовое задание для компании "Центр Программного Обеспечения"

- Кандидат: Цуркан Максим

Задача: Создайте API для системы управления бронированием ресурсов </br></br>
Документация и само тестирование API проводилось в Postman: </br>
`https://www.postman.com/crimson-meteor-304239/swcbookingtest/documentation/hh9uose/swc` </br>

## Локальная установка
`Laravel Framework 11.42.1`

1) Склонируйте репозиторий
```
git clone https://github.com/Booooer/swcBookingTemplate.git
```
2) Сгенерируйте artisan key и подтяните все composer зависимости
```
php artisan key:generate
composer install
```
3) Публикуем все скачанные пакеты в наш проект из папки vendor
```
php artisan vendor:publish
```
4) Далее создайте дополнительно два конфигурационных файла .env и .env.testing (для среды тестирования)
5) Для удобства локальной разработки был использован пакет sail. После настройки файлов .env и .env.testing
необходимо выполнить мирграцию для основной бд и для тестовой бд (которая будет задействована при feature/unit тестах)
```
sail up -d
sail artisan migrate
```

`Настройка завершена`


