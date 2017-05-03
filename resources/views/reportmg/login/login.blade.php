@extends('layouts.app2')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">login to working report management</h1>

            <div class="account-wall">
                <img class="profile-img" src="img/PPIT-logo.png" alt="">
                     <p class="text-center text-primary profile-title">Phnom Penh Institute of Technology</p>
                <form class="form-signin">

                <input type="text" class="form-control" placeholder="username" required autofocus>
                <input type="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                login</button>
                <button class="btn btn-lg btn btn-danger btn-block" type="submit">
                forget password</button>
              
              
                
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection