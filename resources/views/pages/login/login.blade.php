<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" href="fonts/icomoon/style.css"> -->

    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/loginstyle.css">

    <title>Login</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('imgs/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        
        <div class="row align-items-center justify-content-center">
       
          <div class="col-md-7">
            <div>
              @if (Session::has('fail'))
                <div class="alert alert-danger" role="alert">
                  {{Session::get('fail')}}  
               </div>
               @endif
            </div>
            <h3>Login </h3>
            <form action="{{route('auth.handle')}}" method="post">
              @csrf
              <div class="form-group first">
                <label for="username">Email</label>
                @error('email')
                <p class="text-danger">{{$message}}</p>

                @enderror
                <input type="email" name="email" class="form-control" placeholder="your-email@gmail.com" id="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                @error('password')
                <p class="text-danger">{{$message}}</p>

                @enderror
              <input type="password" class="form-control" name="password" placeholder="Your Password" id="password">
              </div>
              
              <!-- <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div> -->

              <input type="submit" value="Log In" class="btn btn-block submitbtn" style="background-color: rgb(29, 27, 49); color: white;">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Loginmain.js"></script>
  </body>
</html>