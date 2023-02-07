<?php
include 'partials/header.php'
?>

<section class="form_section">
  <div class="container form_section-container">
    <h2>Edit Category</h2>
    <div class="alert_message error">
      <p>This is an error message</p>
    </div>
    <form class="form" action="">
      <input id="title" type="text" placeholder="Title" />
      <textarea id="description" rows="4" placeholder="Description"></textarea>
      <button class="btn" type="submit">Update Category</button>
    </form>
  </div>
</section>
<script src="<?= ROOT_URL ?>js/main.js"></script>
<script src="../js/categories/editCategories.js"></script>
</body>

</html>