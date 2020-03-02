<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <title>{{config('app.name')}} - {{$title??'Home'}}</title>
    <meta name="keywords" content="Bank, Internet Banking" />
    <meta name="description" content="Fifth Third Online Banking website">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Theme CSS -->
    <link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet" media="screen">
    <!-- Responsive CSS -->
    <link href="{{asset('assets/front/css/theme-responsive.css')}}" rel="stylesheet" media="screen">
    <!-- Skins Theme -->
    <link href="#" rel="stylesheet" media="screen" class="skin">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('assets/front/img/icons/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/front/img/icons/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/front/img/icons/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/front/img/icons/apple-touch-icon-114x114.png')}}">

    <!-- Head Libs -->
    <script src="{{asset('assets/front/js/libs/modernizr.js')}}"></script>

    <!--[if IE]>
        <link rel="stylesheet" href="{{asset('assets/front/css/ie/ie.css')}}">
    <![endif]-->

    <!--[if lte IE 8]>
        <script src="{{asset('assets/front/js/responsive/html5shiv.js')}}"></script>
        <script src="{{asset('assets/front/js/responsive/respond.js')}}"></script>
    <![endif]-->
</head>
