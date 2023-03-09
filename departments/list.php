<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// UI
include '../public/head.php';
include '../public/nav.php';
$select = "SELECT * FROM departments";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = "DELETE FROM departments where id = $id";
    mysqli_query($conn,$delete);
path("departments/list.php");
}



auth();


?>
<h1 class="text-center text-info  mt-2 pt-2">Lsit Department Page </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th> ID </th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                foreach ($s as $data) {  ?>
                    <tr>
                        <td> <?= $data['id'] ?> </td>
                        <td> <?= $data['name'] ?> </td>
                        <td> <?= substr($data['created_at'], 10, 9)  ?> </td>
                        <td> <a class="btn btn-info" href="/com/departments/edit.php?edit=<?= $data['id'] ?> ">Edit</a> </td>
                        <td> <a onclick="return confirm('are You Sure ?')" class="btn btn-danger" href="/com/departments/list.php?delete=<?= $data['id'] ?> ">Reomve</a> </td>
                    </tr>
                <?php  }  ?>
            </table>
        </div>
    </div>
</div>




<?php
include '../public/script.php';
?>