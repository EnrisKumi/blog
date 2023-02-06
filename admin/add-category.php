<?php
include 'partials/header.php'
?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Add Category</h2>
        <div class="alert_message error">
          <p>This is an error message</p>
        </div>
        <form class="form" action="" enctype="multipart/form-data">
          <input id="titleArea" type="text" placeholder="Title" />
          <textarea id="descriptionArea" rows="4" placeholder="Description"></textarea>
          <button class="btn" type="submit">Add Category</button>
        </form>
      </div>
    </section>

    <script src="<?= ROOT_URL ?>js/main.js"></script>
    <script src="../js/categories/createCategory.js"></script>
  </body>
</html>
