<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// UI
include '../public/head.php';
include '../public/nav.php';



if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $select = "SELECT * FROM admins where name = '$name' and password='$password'";
    $s = mysqli_query($conn, $select);
    $numOfRows = mysqli_num_rows($s);
    if ($numOfRows == 1) {
        $_SESSION['admin']   = $name;
        path("/");
    } else {
        echo "False Admin";
    }
}


print_r($_SESSION);

// session_unset();
// session_destroy();

?>

<h1 class="text-center text-info  mt-2 pt-2">Login Page </h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button name="login" class="btn btn-info m-3">Login</button>
            </form>
        </div>
    </div>
</div>


<?php
include '../public/script.php';
?>