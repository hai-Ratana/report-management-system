<!DOCTYPE html>
<html lang="en">

<head>

    @include('parts.user.meta')

    <title>Working Report System</title>
    <link rel="icon" type="image/x-icon" href="img/PPIT-logo.png">
    @include('parts.user.style')

</head>

<body>

   

    @include('parts.user.header')
    <br>
    <!-- Page Content --> 
    <content>

        <div class="container">

            @yield('content')

            @include('parts.user.footer')

        </div>
        <!-- /.container -->
    </content>
    

    
 @include('parts.user.script')
    

</body>

</html>
