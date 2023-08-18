<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
  <h1></h1>
  <br><br/>
  <h1>Login Admin</h1>
  <br><br/>
    <form action="login_aksi.php" method="post">

      <div class="col-md-3">

        <div class="mb-3">
        <label  class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username?">
        </div>

        <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password?">
        </div>
        <div class="from-group">
                <label for="captcha">Captcha</label>
                <img src="captcha.php" alt="captcha">
                <input type="text" class="from-control" name="captcha">
            </div>
<br></br>
        <div class="mb-3">
          <button class="btn btn-success"type="submit" name="button">Masuk</button>
        </div>


            </div>

    </form>


</body>
</html>
