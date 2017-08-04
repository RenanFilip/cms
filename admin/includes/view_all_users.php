<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "select * from users";
            $select_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$username</td>";
                echo "<td>$user_firstname</td>";

                // $query = "select * from categories where cat_id = $post_category_id";
                // $select_categories_id = mysqli_query($connection, $query);
                //
                // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                //
                //     echo "<td>$cat_title</td>";
                // }

                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";

                // $query = "select * from posts where post_id = $comment_post_id";
                // $select_post_id_query = mysqli_query($connection, $query);
                //
                // while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                //     $post_id = $row['post_id'];
                //     $post_title = $row['post_title'];
                //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                // }
                echo "<td>$user_role</td>";
                echo "<td><a href='users.php?change_to_admin=$user_id' class='btn btn-info'>Admin</a></td>";
                echo "<td><a href='users.php?change_to_sub=$user_id' class='btn btn-warning'>Subscriber</a></td>";
                echo "<td><a href='users.php?source=edit_user&edit_user=$user_id' class='btn btn-success'>Edit</a></td>";
                echo "<td><a href='users.php?delete=$user_id' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<?php
    if (isset($_GET['change_to_admin'])) {
        $the_user_id = $_GET['change_to_admin'];
        $query = "update users set user_role = 'admin' where user_id = $the_user_id";
        $change_to_admin_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }

    if (isset($_GET['change_to_sub'])) {
        $the_user_id = $_GET['change_to_sub'];
        $query = "update users set user_role = 'subscriber' where user_id = $the_user_id";
        $change_to_sub_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }

    if (isset($_GET['delete'])) {
        if (isset($_SESSION['user_role'])) {
            if ($_SESSION['user_role'] == 'admin') {
                $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
                $query = "delete from users where user_id = $the_user_id";
                $delete_user_query = mysqli_query($connection, $query);
                header("Location: users.php");
            }
        }
    }
?>
