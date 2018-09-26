# Product Crawler
Shopify product crawler with Laravel 5.7 & Vue2

## How to install

```
git clone https://github.com/ylnn/product-crawler
```

Copy **.env.example** file to **.env**


Then update database settings in **.env** file.
```
composer install
php artisan migrate 
php artisan db:seed
```

## Panel address
You can add/delete crawling sources in admin panel.
Use this url to login the panel.
```
/login
```

## Admin User
```
email: admin@admin.com
password: demo
```

## Crawler Artisan Command
If you want start crawling, use this command in terminal.
```
php artisan crawl
```



