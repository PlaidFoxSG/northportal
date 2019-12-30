<!DOCTYPE html>
<html lang="en">

@include('head')

<body id="page-top">

  <!-- Navigation -->
  
 <header class="masthead">
 <div class="logo">
 	<div class="container-fluid">
    	<img src="img/logow.png" alt="" >
    </div>
 </div>
 <img src="{{asset('img/loginbg.jpg')}}" class="bg">
    <div class="container login">
      <div class="intro-text">
        <div class="log">Login</div>
       <form action="/action_page.php">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Remember me
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a>Forgot your password?</a>
        </form>
      </div>
    </div>
  </header>

 @include('footer')

</body>

</html>
