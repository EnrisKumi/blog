<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web Project</title>

  <!--Style-->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <!--End Of Style-->
</head>

<body>
  <section class="form_section">
    <div class="container form_section-container">
      <h2>Sign In</h2>
      <span>
        <?php if (isset($_GET['msg'])) {
          $error = $_GET['msg'];
          printf('<div class="alert_message error">%s</div><br><br?',$error); 
        }
        ?>
      </span>
      <form action="./includes/login.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username or Email" />
        <input type="password" name="password" placeholder="Password" />
        <button class="btn" type="submit" name="submit">Sign In</button>
        <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
      </form>
    </div>
  </section>
  <script src="main.js"></script>
</body>

</html>