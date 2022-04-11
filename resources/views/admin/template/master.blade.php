<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
  
    @include('admin.template.css')
    
</head>

<body>
    <!-- Left Panel -->
    @include('admin.template.sidebar')
     <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @include('admin.template.header')
        
        @yield('content')

        <div class="clearfix"></div>
        @include('admin.template.footer')
      
    </div>
    @include('admin.template.js')
    <!-- /#right-panel -->

</body>
</html>
