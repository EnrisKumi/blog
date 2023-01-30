<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Project</title>

    <!--Style-->
    <link rel="stylesheet" href="./css/style.css">
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!--End Of Style-->
  </head>
  <body>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Sign Up</h2>
        <div class="alert_message error">
          <p>This is an error message</p>
        </div>
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="First Name" />
          <input type="text" placeholder="Last Name" />
          <input type="text" placeholder="Username" />
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Create Password" />
          <input type="password" placeholder="Confirm Password" />
          <div class="form_control">
            <label for="avatar">Profile Photo</label>
            <input type="file" id="avatar" />
          </div>
          <button class="btn" type="submit">Sign Up</button>
          <small
            >Already have an account? <a href="signin.html">Sign In</a></small
          >
        </form>
      </div>
    </section>
    <script src="main.js"></script>
  </body>
</html>
