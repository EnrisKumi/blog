<?php
include 'partials/header.php'
?>


<section class="form_section">
  <div class="container form_section-container-adduser">
    <h2>Add User</h2>
    <!-- <div class="alert_message error">
          <p>This is an error message</p>
        </div> -->
    <form class="form" method="POST" enctype="multipart/form-data">
      <input id="firstname" type="text" name="firstname" placeholder="First Name" />
      <input id="lastname" type="text" name="lastname" placeholder="Last Name" />
      <input id="username" type="text" name="username" placeholder="Username" />
      <input id="email" type="email" name="email" placeholder="Email" />
      <input id="password" type="password" name="password" placeholder="Create Password" />
      <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Confirm Password" />
      <!-- <input type="text" name="isAdmin" placeholder="User Type" /> -->
      <select id="selectUserType">
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
<script src="../js/users/addUser.js"></script>
</body>

</html>