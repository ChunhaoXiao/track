<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>产品回溯系统</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div>
            @yield('content')
        </div>
        <p class="text-center">{{cache('setting')->copyright}}</p>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>


