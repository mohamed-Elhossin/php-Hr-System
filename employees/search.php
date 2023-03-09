<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// UI
include '../public/head.php';
include '../public/nav.php';

if (isset($_GET['search'])) {
    $nameValue = $_GET['nameValue'];
    $select = "SELECT * FROM `employeeswithdepartments` where empName like '%$nameValue%' ";
    $s = mysqli_query($conn, $select);
}



auth();




?>
<h1 class="text-center text-info  mt-2 pt-2">Lsit Employees Page </h1>

<div class="container col-9">
    <form action="./search.php" method="get">
        <div class="row my-3">
            <div class="col-md-10">
                <div class="form-group ">
                    <input type="text" id="myInput" name="nameValue" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-grid">
                    <button name="search" class="btn btn-info"> Search </button>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-body">
            <table id="myTable" class="table table-dark">
                <tr>
                    <th> ID </th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Image</th>
                    <th>Department ID</th>
                    <th>Created_at</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                foreach ($s as $data) :  ?>
                    <tr>
                        <td> <?= $data['id'] ?> </td>
                        <td> <?= $data['empName'] ?> </td>
                        <td> <?= $data['salary'] ?> </td>
                        <td> <img width="80" src="./upload/<?= $data['image'] ?>" alt=""> </td>
                        <td> <?= $data['depName'] ?> </td>
                        <td> <?= substr($data['create_at'], 10, 9)  ?> </td>
                        <td> <a class="btn btn-info" href="/com/employees/edit.php?edit=<?= $data['id'] ?> ">Edit</a> </td>
                        <td> <a onclick="return confirm('are You Sure ?')" class="btn btn-danger" href="/com/employees/list.php?delete=<?= $data['id'] ?> ">Reomve</a> </td>
                    </tr>
                <?php endforeach;  ?>
            </table>
        </div>
    </div>
</div>




<?php
include '../public/script.php';
?>