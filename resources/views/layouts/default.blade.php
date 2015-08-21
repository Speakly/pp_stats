<!DOCTYPE html>

<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="_token" content="{!! csrf_token() !!}"/> --}}
    <link href="{{ URL::asset('assets/css/all.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/skin-orange.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.less') }}" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <link href="{{ URL::asset('assets/css/app.css')}}" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/skin-orange.css') }}" type="text/css">
    <!--<link href="{{ URL::asset('assets/css/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" type="text/css">
    

    @yield('css')
   

    <title>Profilplayers Basket - @yield('title', 'Suis tes performances !')</title>
</head>

<body>
    <div class="st-container">
        @include('layouts.sidebar')
        <div class="st-pusher" id="content">
            
            @yield('content')
        </div>
    </div>
<script>BASE_URL = '{{ URL::to("/") }}/' </script>

<script type="text/javascript" src="{{ URL::asset('assets/js/vendor/all.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        function stripTrailingSlash(str) {
            if(str.substr(-1) == '/') {
              return str.substr(0, str.length - 1);
            }
            return str;
        }

        var url = window.location.pathname;  
        var activePage = stripTrailingSlash(url);

        $('.nav li a').each(function(){  
            var currentPage = stripTrailingSlash($(this).attr('href'));

            if (activePage == currentPage) {
                $(this).parent().addClass('active'); 
            } 
        });
    });

</script>

@yield('scripts')

</body>
</html>