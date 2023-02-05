<?php
include './partials/header.php'
?>


    <section class="form_section">
      <div class="container form_section-container">
        <h2>Add Post</h2>
        <div class="alert_message error">
          <p>This is an error message</p>
        </div>
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="Title" />
          <select>
            <option value="1">Wild Life</option>
            <option value="2">Travel</option>
            <option value="3">Art</option>
          </select>
          <textarea rows="10" id="summernote" placeholder="body"></textarea>
          <div class="form_control">
            <label for="thumbnail">Add Photo</label>
            <input type="file" id="thumbnail" />
          </div>
          <button class="btn" type="submit">Add Post</button>
        </form>
      </div>
    </section>
    <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
        ],
        
      });
      $('#summernote').summernote('foreColor', 'white');


    </script>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
  </body>
</html>
