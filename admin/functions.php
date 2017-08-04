<?php
    function escape($string){
        global $connection;
        return mysqli_real_escape_string($connection, trim($string));
    }

    function usersOnline(){
        // if (isset($_GET['onlineusers'])) {
            global $connection;
            if (!$connection) {
                session_start();
                include("../includes/db.php");
            }
            $session = session_id();
            $time = time();
            $time_out_in_seconds = 30;
            $time_out = $time - $time_out_in_seconds;

            $query = "select * from users_online where session = '$session'";
            $send_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($send_query);

            if ($count == NULL) {
                mysqli_query($connection, "insert into users_online(session, time) values('$session', '$time')");
            } else {
                mysqli_query($connection, "update users_online set time = '$time' where session = '$session'");
            }

            $users_online_query = mysqli_query($connection, "select * from users_online where time > '$time_out'");
            return $count_user = mysqli_num_rows($users_online_query);
        // } //get request isset()
    }

    // usersOnline();

    function insertCategories() {
        global $connection;
        if (isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];
            if ($cat_title == '' || empty($cat_title)) {
                echo "This Field Should Not Be Empty";
            } else {
                $query = "insert into categories(cat_title) values ('$cat_title')";

                $create_category_query = mysqli_query($connection, $query);

                if (!$create_category_query) {
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }
        }
    }

    function findAllCategories() {
        global $connection;
        $query = "select * from categories";
        $select_categories = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            echo "<td>$cat_id</td>";
            echo "<td>$cat_title</td>";
            echo "<td><a href='categories.php?edit=$cat_id' class='btn btn-success'>Edit</a> ";
            echo " &emsp;<a href='categories.php?delete=$cat_id' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function deleteCategories() {
        global $connection;
        if (isset($_GET['delete'])) {
            $the_cat_id = $_GET['delete'];
            $query = "delete from categories where cat_id = $the_cat_id";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }

    function confirmQuery($result) {
        global $connection;
        if (!$result) {
            die("QUERY FAILED".mysqli_error($connection));
        }
    }
?>
