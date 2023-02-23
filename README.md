Hi! ![Man Raising Hand on Microsoft Teams 1.0](https://em-content.zobj.net/source/microsoft-teams/337/man-raising-hand_1f64b-200d-2642-fe0f.png)

# Welcome to Custom Laravel Job

## How To Run

First Clone The Project and Then Run These Commands

```bash
cd custom-jobs-laravel
composer install
php artisan migrate:fresh
php artisan serve
```
## Then Open a new terminal 

```bash
php artisan schedule:work
or
php artisan schedule:run
```
To Start processing Jobs

To add jobs in queue Open http://127.0.0.1:8000/ click on add jobs to queue button
