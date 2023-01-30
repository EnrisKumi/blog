<?php
include 'partials/header.php'
?>

    <section class="form_section">
      <div class="container form_section-container">
        <h2>Edit User</h2>
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="First Name" />
            <input type="text" placeholder="Last Name" />
            <select>
                <option value="0">Normal User</option>
                <option value="1">Admin</option>
            </select>
            <button class="btn" type="submit">Update User</button>
          </form>
      </div>
    </section>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
  </body>
</html>
