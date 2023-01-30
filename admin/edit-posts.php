<?php
include 'partials/header.php'
?>



    <section class="form_section">
      <div class="container form_section-container">
        <h2>Edit Post</h2>
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="Title" />
          <select>
            <option value="1">Wild Life</option>
            <option value="2">Travel</option>
            <option value="3">Art</option>
          </select>
          <textarea rows="10" placeholder="body"></textarea>
          <div class="form_control">
            <label for="thumbnail">Update Photo</label>
            <input type="file" id="thumbnail">
          </div>
          <button class="btn" type="submit">Update Post</button>
        </form>
      </div>
    </section>

    <script src="<?= ROOT_URL ?>js/main.js"></script>
  </body>
</html>
