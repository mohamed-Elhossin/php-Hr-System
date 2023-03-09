<?php

session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location:/com/admin/login.php");
}


?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Instant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/com/index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Departments
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/com/departments/add.php">Add Department</a></li>
                            <li><a class="dropdown-item" href="/com/departments/list.php">List Department</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Employees
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/com/employees/add.php">Add Employee</a></li>
                            <li><a class="dropdown-item" href="/com/employees/list.php">List Employee</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="d-flex" role="search">
                <?php if (!isset($_SESSION['admin'])) : ?>
                    <a class="btn btn-outline-success" href="/com/admin/login.php">Login</a>
                <?php else : ?>
                    <form action="">
                        <button name="logout" class="btn btn-danger" href="/com/admin/login.php">logout</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>