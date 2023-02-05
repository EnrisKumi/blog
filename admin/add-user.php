<?php
include 'partials/header.php'
?>
 

    <section class="form_section">
      <div class="container form_section-container-adduser">
        <h2>Add User</h2>
        <!-- <div class="alert_message error">
          <p>This is an error message</p>
        </div> -->
        <form action="../admin/includesA/signup.admin.inc.php" enctype="multipart/form-data">
        <input type="text" name="firstNameA" placeholder="First Name" />
            <input type="text" name="lastNameA" placeholder="Last Name" />
            <input type="text" name="usernameA" placeholder="Username" />
            <input type="email" name="emailA" placeholder="Email" />
            <input type="password" name="passwordA" placeholder="Create Password" />
            <input type="password" name="confirmPasswordA" placeholder="Confirm Password" />
            <input type="text" name="isAdminA" placeholder="User Type" />
            <div class="form_control">
              <label for="avatar">Profile Photo</label>
              <input type="file" id="avatar" />
            </div>
            <button class="btn" type="submit">Add User</button>
          </form>
      </div>
    </section>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
  </body>
</html>
