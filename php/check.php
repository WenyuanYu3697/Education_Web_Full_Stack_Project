<?php
    $con = mysqli_connect("localhost","root","Toronto2019","web_education_full_stack_project");

    if(!$con){
        echo mysqli_connect_error();
        die();
    }

    echo "database connect succesfully";
?>