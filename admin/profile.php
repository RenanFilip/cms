<?php include "includes/admin_header.php"; ?>

    <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $query = "select * from users where username = '$username'";
            $select_user_profile_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
            }
        }
    ?>

    <?php
        if (isset($_POST['edit_profile'])) {
            $username = $_POST['username'];
            $user_password = $_POST['user_password'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];

            // $user_image = $_FILES['user_image']['name'];
            // $user_image_temp = $_FILES['user_image']['tmp_name'];

            $user_email = $_POST['user_email'];
            $user_role = $_POST['user_role'];
            $randSalt = 0;
            // $post_date = date('d-m-y');

            // move_uploaded_file($user_image_temp, "../images/$user_image");

            $query = "update users set user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_role = '$user_role', username = '$username', user_email = '$user_email', user_password = '$user_password' where username = '$username'";

            $edit_user_query = mysqli_query($connection, $query);
            confirmQuery($edit_user_query);
            // if (empty($post_image)) {
            //     $query = "select * from posts where post_id = $the_post_id";
            //     $select_post_image = mysqli_query($connection, $query);
            // }
        }
    ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
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
                              <input type="submit" class="btn btn-primary" name="edit_profile" value="Update Profile">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>
