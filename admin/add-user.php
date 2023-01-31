<?php
include 'partials/header.php'
?>
 

    <section class="form_section">
      <div class="container form_section-container-adduser">
        <h2>Add User</h2>
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
            <select id="">
                <option value="0">Normal User</option>
                <option value="1">Admin</option>
            </select>
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