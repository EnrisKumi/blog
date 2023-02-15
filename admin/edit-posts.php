<?php
include 'partials/header.php';
?>

    <section class="form_section">
      <div class="container form_section-container">
        <h2>Edit Post</h2>
        <form id="form" action="" enctype="multipart/form-data">
          <input type="text" id="titleEditPost" placeholder="Title" />
          <textarea rows="10" id="descriptionEditPost" placeholder="body"></textarea>
          <div class="form_control">
            <label id="imageLabel" for="thumbnail">Change Photo</label>
            <input accept=".jpg,.png,.jpeg" type="file" id="imageSelect" />
          </div>
          <button class="btn"  id="submitButton" type="submit">Update Post</button>
        </form>
      </div>
    </section>

    <script src="<?= ROOT_URL ?>js/main.js"></script>
    <script src="../js/posts/editPost.js"></script>
  </body>
</html>
