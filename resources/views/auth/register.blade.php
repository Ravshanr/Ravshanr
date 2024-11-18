
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registration</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="/css/login.css" />
  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Register</h1>
          <form action="{{ route('register.store') }}" method="POST">
            @csrf
              <div class="txt_field">
                  <input type="text" name="name" required>
                  <span></span>
                  <label>Name</label>
              </div>
              <div class="txt_field">
                  <input type="email" name="email" required>
                  <span></span>
                  <label>Email</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="password" required>
                  <span></span>
                  <label>Password</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="password_confirmation" required>
                  <span></span>
                  <label>Confirm Password</label>
              </div>
              <input name="submit" type="Submit" value="Sign Up">
              <div class="signup_link">
                Ruyxatdan utganmisiz ? <a href="{{ route('login') }}">Kirish</a>
              </div>
          </form>
      </div>
  </div>
  </body>
</html>