<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="icon" type="image/png" sizes="16x16" href="/plugins/images/favicon.png">

  <title>@yield('title')</title>


    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Typehead CSS -->
    <link href="/plugins/bower_components/typeahead.js-master/dist/typehead-min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="/css/colors/default.css" id="theme" rel="stylesheet">
      

</head>

<body>

   

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/css/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
    <!--Counter js -->
    <script src="/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/js/custom.min.js"></script>
    <script src="/js/dashboard1.js"></script>
    <!--Style Switcher -->
    <script src="/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

     @yield('content')
</body>

</html>
