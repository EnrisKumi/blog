<?php
include 'partials/header.php'
?>

    <section class="form_section">
      <div class="container form_section-container">
        <h2>Edit User</h2>
        <form class="form" action="" enctype="multipart/form-data">
            <input id="firstname" type="text" placeholder="First Name" />
            <input id="lastname" type="text" placeholder="Last Name" />
            <select id="selectUpdate" >
                <option value="0">Normal User</option>
                <option value="1">Admin</option>
            </select>
            <button class="btn" type="submit">Update User</button>
          </form>
      </div>
    </section>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
    <script src="../js/users/editUser.js"></script>
  </body>
</html>
