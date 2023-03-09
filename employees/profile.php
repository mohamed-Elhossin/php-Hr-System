<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// UI
include '../public/head.php';
include '../public/nav.php';


if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `employeeswithdepartments` where id =  $id ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}


auth();
?>
<h1 class="text-center text-info  mt-2 pt-2">Lsit Employees Page </h1>

<div class="container col-md-5">

    <div class="card">
        <img src="./upload/<?= $row['image'] ?>" class="img-top" alt="">
        <div class="card-body">
            Name : <?= $row['empName'] ?>
            <hr>
            salary : <?= $row['salary'] ?>
            <hr>
            department : <?= $row['depName'] ?>
            <hr>
            <a class="btn btn-info" href="/com/employees/edit.php?edit=<?= $row['id'] ?> ">Edit</a>
            <a onclick="return confirm('are You Sure ?')" class="btn btn-danger" href="/com/employees/list.php?delete=<?= $row['id'] ?> ">Reomve</a>
        </div>
    </div>
</div>




<?php
include '../public/script.php';
?>