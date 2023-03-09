<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// ui
include '../public/head.php';
include '../public/nav.php';

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $select = "SELECT * FROM departments where id =$id";
    $s = mysqli_query($conn, $select);
    $row =  mysqli_fetch_assoc($s);

    if (isset($_POST['send'])) {
        $name =  $_POST['name'];
        $update = "UPDATE `departments` SET name = '$name' where id =$id";
        $i = mysqli_query($conn, $update);
        path('departments/list.php');
    }
}

auth();
?>


<h1 class="text-center text-info  mt-2 pt-2">Edit Department Page </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="<?= $row['name'] ?>" name="name">
                </div>
                <button name="send" class="btn btn-danger m-3"> Update Department </button>
            </form>
        </div>
    </div>
</div>


<?php
include '../public/script.php';
?>