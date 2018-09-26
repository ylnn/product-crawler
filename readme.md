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
php artisan key:generate
php artisan migrate 
php artisan db:seed
```

Permission settings for Ubuntu OS:
```
sudo chown -R YOUR_USERNAME:www-data storage
sudo chown -R YOUR_USERNAME:www-data bootstrap/cache

sudo chmod -R gu+w storage
sudo chmod -R gu+w bootstrap/cache
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



