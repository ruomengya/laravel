<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jqery-1.12.4.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    @if($is_login == 1)

                        <a href="{{ url('/home') }}">Home</a>

                        <a href="{{ url('http://whwpp.anjingdehua.cn/quit') }}">Quit</a>
                    @else
                        <a href="http://whwpp.anjingdehua.cn/login?url={{$url}}">Login</a>
                        <a href="{{ url('http://passport.cms.com/login') }}">Register</a>
                    @endif
                </div>


            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    setInterval(function(){
        $.ajax({
            url:'/islogin',
            type:"GET",
            data_type:'json',
            success:function(data){
                if(data.error == 0){
                    alert('强制下线');
                    location.href='/'
                }

            }
        })
    },2000);
    setTimeout(timeOut,1000*10);
    function timeOut(){

        $.ajax({
            url:'/user/timeout',
            type:'GET',
            data_type:'json',
            success:function(data){
                if(data.error == 0){
                    alert(data.msg);
                    location.href='/'
                }else{
                    timeOut();
                }

            }
        })
    }

</script>
