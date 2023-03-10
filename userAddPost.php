<?php
include './partials/header.php';
session_start();
$userId = $_SESSION["id"];
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <section class="form_section">
      <div class="container form_section-container">
        <h2>Add Post</h2>
        <div id="a" class="">
          <p id="errorDiv" ></p>
        </div>
        <form class="formUser" action="" enctype="multipart/form-data">
          <input type="text" id="titleUser" placeholder="Title" />
          <select id="selectCategoriesUser" >
          </select>
          <textarea rows="10" id="summernoteUser" placeholder="body"></textarea>
          <div class="form_control">
            <label id="imageLabel" for="thumbnail">Add Photo</label>
            <input accept=".jpg,.png,.jpeg" type="file" id="imageSelect" />
          </div>
          <button class="btn" id="submitButton" type="submit">Add Post</button>
        </form>
      </div>
    </section>
    <script>
      $('#summernoteUser').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
        ],
        
      });
      $('#summernoteUser').summernote('foreColor', 'white');


    </script>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
    <script src="./js/categories/getCategoriesUser.js"></script>
    <script type="text/javascript">const userId = "<?= $userId ?>";</script>
    <script src="./js/posts/createPostUser.js"></script>
  </body>
</html>
