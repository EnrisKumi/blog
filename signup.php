<?php
include 'partials/header.php'

?>
 

    <section class="form_section">
      <div class="container form_section-container-adduser">
        <h2>Sign Up
        </h2>
        <span>
        <?php if (isset($_GET['msg'])) {
          $error = $_GET['msg'];
          printf('<div class="alert_message error">%s</div><br><br?',$error);
        }
        ?>
      </span>
        <form action="./includes/singup.inc.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="firstName" placeholder="First Name" />
            <input type="text" name="lastName" placeholder="Last Name" />
            <input type="text" name="username" placeholder="Username" />
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Create Password" />
            <input type="password" name="confirmPassword" placeholder="Confirm Password" />
            <div class="form_control">
              <label for="avatar">Profile Photo</label>
              <input type="file" id="avatar" />
            </div>
            <button class="btn" type="submit" name="submit">Sign Up</button>
          </form>
      </div>
    </section>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
  </body>
</html>
