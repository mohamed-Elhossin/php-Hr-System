<?php
// Connect 
include '../App/config.php';
include '../App/functions.php';
// UI
include '../public/head.php';
include '../public/nav.php';
$select = "SELECT * FROM departments";
$departments = mysqli_query($conn, $select);
if (isset($_POST['send'])) {
    
    $name = strip_tags( $_POST['name']);
    $salary =  $_POST['salary'];

    // Image Code
    $image_name = rand(0 , 90000000) .  $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;

    move_uploaded_file($tmp_name, $location);


    $depId =  $_POST['depId'];
    $insert = "INSERT into `employees` values(null , '$name', $salary ,'$image_name',$depId,Default)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert");
}

// post ,get ,request , $_FIILES > Upload File

// Database Name image > image upload Copy folder 
auth();
?>

<h1 class="text-center text-info  mt-2 pt-2">Add Employees Page </h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Salary</label>
                    <input type="text" class="form-control" name="salary">
                </div>
                <!-- Upload File form User -->
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label for="">Department ID</label>
                    <select name="depId" class="form-control">
                        <?php foreach ($departments as $data) : ?>
                            <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name="send" class="btn btn-info m-3"> Send Employees </button>
            </form>
        </div>
    </div>
</div>


<?php
include '../public/script.php';
?>