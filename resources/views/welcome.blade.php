<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Product Crawler - Yalın</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container d-flex justify-content-center">
                <div class="title p-5">
                    ProductCrawler
                </div>
        </div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="app">
                    <products-component url="{{Request::url()}}"></products-component>
                </div>
            </div>
        </div>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
