<?php
    if (isset($_GET['p_id'])) {
        $the_post_id = escape($_GET['p_id']);
    }
    $query = "select * from posts where post_id = $the_post_id";
    $select_posts_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['post_id'];
        $post_user = $row['post_user'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }

    if (isset($_POST['update_post'])) {
        $post_user = escape($_POST['post_user']);
        $post_title = escape($_POST['post_title']);
        $post_category_id = escape($_POST['post_category']);
        $post_status = escape($_POST['post_status']);

        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = escape($_POST['post_tags']);
        $post_content = escape($_POST['post_content']);

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if (empty($post_image)) {
            $query = "select * from posts where post_id = $the_post_id";
            $select_post_image = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post_image)) {
                $post_image = $row['post_image'];
            }
        }

        $query = "update posts set post_title = '$post_title', post_category_id = '$post_category_id', post_date = now(), post_user = '$post_user', post_status = '$post_status', post_tags = '$post_tags', post_content = '$post_content', post_image = '$post_image' where post_id = $the_post_id";

        $update_post = mysqli_query($connection, $query);

        confirmQuery($update_post);

        echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id=$the_post_id'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
      <label for="categories">Categories</label>
      <select class="" name="post_category">
          <?php
              $query = "select * from categories";
              $select_categories = mysqli_query($connection, $query);
              confirmQuery($select_categories);

              while ($row = mysqli_fetch_assoc($select_categories)) {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                  echo "<option value='$cat_id'>$cat_title</option>";
              }
          ?>
      </select>
    </div>
    <div class="form-group">
      <label for="post_user">Users</label>
      <select class="" name="post_user">
          <?php echo "<option value='$post_user'>$post_user</option>"; ?>
          <?php
              $users_query = "select * from users";
              $select_users = mysqli_query($connection, $users_query);
              confirmQuery($select_users);

              while ($row = mysqli_fetch_assoc($select_users)) {
                  $user_id = $row['user_id'];
                  $username = $row['username'];
                  echo "<option value='$username'>$username</option>";
              }
          ?>
      </select>
    </div>
    <!-- <div class="form-group">
      <label for="post_author">Post Author</label>
      <input type="text" class="form-control" name="post_author" value="<?php //echo $post_author; ?>">
    </div> -->
    <div class="form-group">
        <select class="" name="post_status">
            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
            <?php
                if ($post_status == 'published') {
                    echo "<option value='draft'>draft</option>";
                } else {
                    echo "<option value='published'>published</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
      <img width="100" src="../images/<?php echo $post_image; ?>" alt="image">
      <input type="file" name="post_image" class="btn btn-warning">
    </div>
    <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea class="form-control" name="post_content" rows="10" cols="30"><?php echo $post_content; ?>
      </textarea>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>
