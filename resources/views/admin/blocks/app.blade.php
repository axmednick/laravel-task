<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{url('/')}}/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <script src="https://kit.fontawesome.com/c7f95ec2ef.js"></script>
    <!-- MORRIS CHART STYLES-->
    <link href="{{url('/')}}/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


    <!-- CUSTOM STYLES-->
    <link href="{{url('/')}}/assets/css/custom.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Binary admin</a>
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="{{route('admin.logout')}}" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="{{url('/')}}/assets/img/find_user.png" class="user-image img-responsive"/>
                </li>

                <li  >
                    <a  href="{{route('blog.index')}}"><i class="fa fa-square-o "></i> Blog</a>
                </li>
                <li  >
                    <a  href="{{route('roles.index')}}"><i class="fa fa-square-o "></i> Roles</a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <script type="text/javascript">
                                alertify.error('{{$error}}');
                            </script>
                        @endforeach
                    @endif
                    @if(session()->has('success'))
                        <script type="text/javascript">
                            alertify.success('{{session()->get('success')}}');
                        </script>
                    @endif


                    @yield('content')
                </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>



</body>
</html>
