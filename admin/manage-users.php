<?php
include 'partials/header.php'
?>

    <section class="dashboard">
      <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
          <ul>
            <li>
              <a href="<?= ROOT_URL ?>admin/add-post.php"
                ><i class="uil uil-pen"></i>
                <h5>Add Post</h5></a
              >
            </li>
            <li>
              <a href="<?= ROOT_URL ?>admin/dashboard.php"
                ><i class="uil uil-postcard"></i>
                <h5>Manage Posts</h5></a
              >
            </li>
            <li>
              <a href="<?= ROOT_URL ?>admin/add-user.php"
                ><i class="uil uil-user-plus"></i>
                <h5>Add User</h5></a
              >
            </li>
            <li>
              <a href="<?= ROOT_URL ?>admin/manage-users.php" class="active"
                ><i class="uil uil-users-alt"></i>
                <h5>Manage Users</h5></a
              >
            </li>
            <li>
              <a href="<?= ROOT_URL ?>admin/add-category.php"
                ><i class="uil uil-edit"></i>
                <h5>Add Category</h5></a
              >
            </li>
            <li>
              <a href="<?= ROOT_URL ?>admin/manage-categories.php" 
                ><i class="uil uil-list-ul"></i>
                <h5>Manage Categories</h5></a
              >
            </li>
          </ul>
        </aside>
        <main>
          <h2>Manage Users</h2>
          <table>
            <thead>
              <th>
                Name
              </th>
              <th>
                Username
              </th>
              <th>
                Edit
              </th>
              <th>
                Delete
              </th>
              <th>
                Admin
              </th>
            </thead>
            <tbody id="tableBody">
              <!-- <tr>
                <td>Enris</td>
                <td>Stimpy</td>
                <td><a href="<?= ROOT_URL ?>admin/edit-user.php" class="btn sm">Edit</a></td>
                <td>
                  <a href="<?= ROOT_URL ?>admin/delete-user.php" class="btn sm dange r"
                    >Delete</a
                  >
                </td>
                <td>Yes</td>
              </tr> -->
            </tbody>
          </table>
        </main>
      </div>
    </section>   
    <script src="<?= ROOT_URL ?>js/main.js"></script>
    <script src="../js/users/getAllUsers.js"></script>
  </body>
</html>
