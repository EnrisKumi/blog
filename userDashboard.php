<?php
include './partials/header.php';

?>


<section class="dashboard">
  <div class="container dashboard_container">
    <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
    <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
    <aside>
      <ul>
        <li>
          <a href="<?= ROOT_URL ?>userAddPost.php"><i class="uil uil-pen"></i>
            <h5>Add Post</h5>
          </a>
        </li>
        <li>
          <a href="<?= ROOT_URL ?>userDashboard.php" class="active"><i class="uil uil-postcard"></i>
            <h5>Manage Posts</h5>
          </a>
        </li>
      </ul>
    </aside>
    <main>
      <h2>Manage Users</h2>
      <table>
        <thead>
          <th>
            Title
          </th>
          <th>
            Category
          </th>
          <th>
            Edit
          </th>
          <th>
            Delete
          </th>
        </thead>
        <tbody>
          <tr>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
            <td>Art</td>
            <td><a href="<?= ROOT_URL ?>userEditPost.php" class="btn sm">Edit</a></td>
            <td>
              <a href="<?= ROOT_URL ?>admin/delete-posts.php" class="btn sm danger">Delete</a>
            </td>
          </tr>
          <tr>
            <td>Lorem ipsum dolor, sit amet consectetur adipisicing.</td>
            <td>Wild Life</td>
            <td><a href="<?= ROOT_URL ?>userEditPost.php" class="btn sm">Edit</a></td>
            <td>
              <a href="<?= ROOT_URL ?>admin/delete-posts.php" class="btn sm danger">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</section>
<script src="<?= ROOT_URL ?>js/main.js"></script>
</body>

</html>