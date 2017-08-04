<?php include "db.php"; ?>
<?php session_start(); ?>

<?php
    if (isset($_POST['login'])) {
        // $password = "secret";
        // $has_format = "$2y$10$";
        // $salt = "iusesomecrazystrings22";
        // echo crypt($password);
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];

        $username = mysqli_real_escape_string($connection, $username);
        $user_password = mysqli_real_escape_string($connection, $user_password);

        $query = "select * from users where username = '$username'";
        $select_user_query = mysqli_query($connection, $query);
        if (!$select_user_query) {
            die("QUERY FAILED".mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_user_query)) {
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
        }

        // $user_password = crypt($user_password, $db_user_password);

        if (password_verify($user_password, $db_user_password)) {
            $_SESSION['username'] = $db_username;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            header("Location: ../admin");
        } else {
            header("Location: ../index.php");
        }
    }
?>
