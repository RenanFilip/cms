<form class="" action="" method="post">
    <div class="form-group">
      <label for="cat_title">Edit Category</label>
      <?php
          if (isset($_GET['edit'])) {
              $cat_id = $_GET['edit'];
              $query = "select * from categories where cat_id = $cat_id";
              $select_categories_id = mysqli_query($connection, $query);

              while ($row = mysqli_fetch_assoc($select_categories_id)) {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                  ?>
                  <input type="text" class="form-control" name="cat_title" value="<?php if(isset($cat_title)){ echo $cat_title;} ?>">
              <?php }
          }
      ?>
      <?php
          //UPDATE QUERY
          if (isset($_POST['update_category'])) {
              $the_cat_title = $_POST['cat_title'];
              $query = "update categories set cat_title = '$the_cat_title' where cat_id = $cat_id";
              $update_query = mysqli_query($connection, $query);
              if (!$update_query) {
                  die("QUERY FAILED" . mysqli_error($connection));
              }
              header("Location: categories.php");
          }
      ?>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="update_category" value="Update Category">
    </div>
</form>
