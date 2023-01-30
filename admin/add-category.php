<?php
include 'partials/header.php'
?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Add Category</h2>
        <div class="alert_message error">
          <p>This is an error message</p>
        </div>
        <form action="">
          <input type="text" placeholder="Title" />
          <textarea rows="4" placeholder="Description"></textarea>
          <button class="btn" type="submit">Add Category</button>
        </form>
      </div>
    </section>

    <script src="<?= ROOT_URL ?>js/main.js"></script>
  </body>
</html>
