<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// UI
include '../public/head.php';
include '../public/nav.php';
$select = "SELECT * FROM `employeeswithdepartments`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $selectImage = "SELECT `image` FROM `employees` WHERE id = $id ";
    $RunSelect = mysqli_query($conn, $selectImage);
    $row = mysqli_fetch_assoc($RunSelect);
    $image = $row['image'];
    echo $image;
    unlink("./upload/$image");
    $delete = "DELETE FROM employees where id = $id";
    mysqli_query($conn, $delete);
    path("employees/list.php");
}


auth();

?>
<h1 class="text-center text-info  mt-2 pt-2">Lsit Employees Page </h1>

<div class="container col-md-9">
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

                    <th colspan="2">Action</th>
                </tr>
                <?php
                foreach ($s as $data) :  ?>
                    <tr>
                        <td> <?= $data['id'] ?> </td>
                        <td> <?= $data['empName'] ?> </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"  href="/com/employees/edit.php?edit=<?= $data['id'] ?> "><i class="text-info fa-solid fa-pen-to-square"></i></a></li>
                                    <li><a class="dropdown-item"  class="text-danger"  href="/com/employees/list.php?delete=<?= $data['id'] ?> "><i class="text-danger  fa-solid fa-trash"></i></a></li>
                                    <li><a class="dropdown-item"  class="text-danger"  href="/com/employees/profile.php?show=<?= $data['id'] ?> "><i class="fa-solid fa-eye"></i></a></li>

                                </ul>
                            </div>
                        </td>

                    </tr>
                <?php endforeach;  ?>
            </table>
        </div>
    </div>
</div>




<?php
include '../public/script.php';
?>