<?php
include 'partials/header.php'
?>
 

    <section class="form_section">
      <div class="container form_section-container-adduser">
        <h2>Sign Up
        </h2>
        <div class="alert_message error">
          <p>This is an error message</p>
        </div>
        <form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
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
            <button class="btn" type="submit" name="submit">Sign Up</button>
          </form>
      </div>
    </section>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
  </body>
</html>
