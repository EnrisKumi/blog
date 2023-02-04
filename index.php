<?php
include 'partials/header.php';
?>


    <!-- Search -->
    <section class="search_bar">
        <form action="" class="container search_bar-container">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="" placeholder="Search">
            </div>
            <button type="submit" class="btn">Search</button>
        </form>
    </section>
    <!-- End Of Search -->


    <!--Posts-->
    <section class="posts">
      <div id="posts_container" class="container posts_container">

      </div>
    </section>
    <!--End Of Posts-->

    <!--Category-->
    <section class="category_buttons">
      <div class="container category_buttons-container">
        <a href="" class="category_button">Wild</a>
        <a href="" class="category_button">Wild Life</a>
        <a href="" class="category_button">Life</a>
        <a href="" class="category_button">Art</a>
        <a href="" class="category_button">Food</a>
        <a href="" class="category_button">Music</a>
      </div>
    </section>
    <!--End Of Category-->

    <script src="./js/main.js"></script>
    <script src="./js/posts/getAllPosts.js"></script>

  </body>
</html>
