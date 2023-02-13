<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="utf-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="description" content="">

   <meta name="author" content="">

   <title>SB Admin 2 - Bootstrap Admin Theme</title>

   <!-- Bootstrap Core CSS -->

    <!-- Styles -->
 <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('public/css/font-face.css') }}" rel="stylesheet">
 <link href="{{ asset('public/css/theme.css') }}" rel="stylesheet">
 <link href="{{ asset('public/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
   
   <!-- MetisMenu CSS -->

   <link href="{{ asset('public/theme/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

   <!-- Custom CSS -->

   <link href="{{ asset('public/theme/dist/css/sb-admin-2.css') }}" rel="stylesheet">

   <!-- Morris Charts CSS -->

   <link href="{{ asset('public/theme/vendor/morrisjs/morris.css') }}" rel="stylesheet">

   <!-- Custom Fonts -->

   <link href="{{ asset('public/theme/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

   <div id="wrapper">

       <!-- Navigation -->
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include('header')
           @include('sidebar')

       </nav>

       <div id="page-wrapper">

           @yield('content')

      </div>

       <!-- /#page-wrapper -->

   </div>

   <!-- /#wrapper -->


   <!-- jQuery -->

   <script src="{{ asset('public/theme/vendor/jquery/jquery.min.js') }}"></script>

   <!-- Bootstrap Core JavaScript -->

   <script src="{{ asset('public/theme/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

   <!-- Metis Menu Plugin JavaScript -->

   <script src="{{ asset('public/theme/vendor/metisMenu/metisMenu.min.js') }}"></script>

   <!-- Morris Charts JavaScript -->

   <script src="{{ asset('public/theme/vendor/raphael/raphael.min.js') }}"></script>

   <script src="{{ asset('public/theme/vendor/morrisjs/morris.min.js') }}"></script>

   <script src="{{ asset('public/theme/data/morris-data.js') }}"></script>

   <!-- Custom Theme JavaScript -->
   <script src="{{ asset('public/theme/dist/js/sb-admin-2.js') }}"></script>

</body>



</html>