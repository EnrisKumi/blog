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
        <article class="post">
          <div class="post_thumbnail">
            <img src="./images/blog2.jpg" alt="Image not found" />
          </div>
          <div class="post_info">
            <a href="" class="category_button">Wild Life</a>
            <h3 class="post_title">
              <a id="title" href="<?= ROOT_URL ?>/post.php">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum,et.</a
              >
            </h3>
            <p class="post_body">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
              labore voluptatum quam fugiat consequuntur, accusantium dolorem id
              repellendus facere iste?
            </p>
            <div class="post_author">
              <div class="post_author-avatar">
                <img src="./images/avatar3.jpg" alt="Image not found" />
              </div>
              <div class="post_author-info">
                <h5>By: Test Test</h5>
                <small>June, 12, 2022 - 07:23</small>
              </div>
            </div>
          </div>
        </article>
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
