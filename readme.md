

## About 

This is a simple news website and API developed using Laravel. You can add and delete news from the frontend. There are APIs to fetch all news and a specific news.  To get started,

- Git clone and cd to project folder
- Run [composer install]
- Set up your .env file with the appropiate credentials especially database credentials.
- Run [php artisan migrate] for your migrations
- Run [php artisan db:seed] to seed the news categories table. 
- Run [php artisan serve] to start your application and use accordingly.

API endpoints

- GET /api/articles [fetch all news]
- GET /api/article/{id} [fetch a specific news item]


