<?php
    if (isset($_GET['edit_user'])) {
        $the_user_id = escape($_GET['edit_user']);
        $query = "select * from users where user_id = $the_user_id";
        $select_users_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
        if (isset($_POST['edit_user'])) {
            $username = escape($_POST['username']);
            $user_password = escape($_POST['user_password']);
            $user_firstname = escape($_POST['user_firstname']);
            $user_lastname = escape($_POST['user_lastname']);

            // $user_image = $_FILES['user_image']['name'];
            // $user_image_temp = $_FILES['user_image']['tmp_name'];

            $user_email = escape($_POST['user_email']);
            $user_role = escape($_POST['user_role']);
            $randSalt = 0;
            // move_uploaded_file($user_image_temp, "../images/$user_image");

            if (!empty($user_password)) {
                $query_password = "select user_password from users where user_id = $the_user_id";
                $get_user_query = mysqli_query($connection, $query_password);
                confirmQuery($get_user_query);
                $row = mysqli_fetch_array($get_user_query);
                $db_user_password = $row['user_password'];
                if ($db_user_password != $user_password) {
                    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
                }
                $query = "update users set user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_role = '$user_role', username = '$username', user_email = '$user_email', user_password = '$hashed_password' where user_id = $the_user_id";

                $edit_user_query = mysqli_query($connection, $query);
                confirmQuery($edit_user_query);
                echo "User Updated: " . " " . " <a href='users.php'>View Users</a>";
            }
            // if (empty($post_image)) {
            //     $query = "select * from posts where post_id = $the_post_id";
            //     $select_post_image = mysqli_query($connection, $query);
            // }
        }
    } else {
        header("Location: index.php");
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="user_firstname">Fist Name</label>
      <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
      <label for="user_lastname">Last Name</label>
      <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
      <select class="" name="user_role">
          <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
          <?php
              if ($user_role == 'admin') {
                  echo "<option value='subscriber'>subscriber</option>";
              } else {
                  echo "<option value='admin'>admin</option>";
              }
          ?>
      </select>
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
      <label for="user_email">Email</label>
      <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
    </div>
    <!-- <div class="form-group">
      <label for="user_image">Image</label>
      <input type="file" name="user_image" class="btn btn-warning">
    </div> -->
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
    </div>
</form>
