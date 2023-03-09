<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// UI
include '../public/head.php';
include '../public/nav.php';


if (isset($_POST['send'])) {
    $name =  $_POST['name'];

    $insert = "INSERT into `departments` values(null , '$name',Default)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert");
}
auth();
?>

<h1 class="text-center text-info  mt-2 pt-2">Add Department Page </h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <button name="send" class="btn btn-info m-3"> Send Department </button>
            </form>
        </div>
    </div>
</div>


<?php
include '../public/script.php';
?>