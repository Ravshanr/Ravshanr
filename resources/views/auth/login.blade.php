
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="/css/login.css" />
  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Kirish</h1>
          <form action="{{ route('login.store') }}" method="POST">
            @csrf
             
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
              <input name="submit" type="Submit" value="Sign Up">
              <div class="signup_link">
                  Ruyxatdan o`tmadingizmi ? <a href="{{ route('register') }}">Ruyxatdan o`ting</a>
              </div>
          </form>
      </div>
  </div>
  </body>
</html>