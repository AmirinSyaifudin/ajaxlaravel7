
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- CRUD AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @stack('select2css')

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    {{-- toastr javascript --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- DataTables css -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> --}}
     <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    {{-- // code Jquery unutk menampilkan tanggal  --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

     {{-- CK Editor amir--}}
     <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>

    {{-- code menampilkan jam beserta detik --}}
    <script type=text/javascript>
        function functionTimer() {
            setInterval(function() {
                myTimer()
            }, 1000);
        }

        function myTimer() {
            var d = new Date();
            var t = d.toLocaleTimeString();
            document.getElementById("demo").innerHTML = t;
        }
    </script>

        {{-- <style>
            .wrapper {
                min-height: 1000px;
                width: 960px;
                margin: auto;
                border: 5px solid #f0f0f0;
                border-radius: 10px;
                moz-boder-radius: 10px;

            }

            .header {
                width: 950px;
                margin: 0 5px;
                height: 150px;
            }

            .header h1 {
                font-size: 50px;
                color: #000000;
            }

            .dataParkir {
                float: left;
                height: 50px;
                width: 950px;
                margin: 5px 5px 5px 5px;
                border-bottom: 1px solid #f0f0f0;

            }

            .dataParkir input[type=submit] {
                background-color: #f1f1f1;
                font-family: 'Unica One';
            }
        </style> --}}

</head>
