<?php


function testMessage($condation, $message)
{

    if ($condation) {
        echo "
        <div class='alert alert-success col-5 mx-auto'>
        $message Successuflly
        </div>
        ";
    } else {
        echo "
        <div class='alert alert-danger col-5 mx-auto'>
        $message Failed
        </div>
        ";
    }
}




function path($go)
{
    echo "<script> window.location.replace('/com/$go') </script>";
}



function auth()
{
    if (!$_SESSION['admin']) {
        header("location:/com/admin/login.php");
    }
}
