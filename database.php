<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI

use LDAP\Result;

   // $con = mysqli_connect("localhost","root","","youcodescumboard");
    
    //$qry = mysqli_query($con,"select * from tasks");
    
    $con = new mysqli("localhost","root","","youcodescumboard");
    
    if (!$con) {
        echo "Can't connect to MySQL Server. Errorcode: %s\n". Mysqli_connect_error();
        exit;
    }else
    {
        $qry = $con->prepare("  SELECT  tasks.id ,`title`, type.name as 'type', priorities.name as 'priorities', `status_id`, `task_datetime`, `description` 
                                FROM `tasks` 
                                INNER JOIN type  on   type.id = type_id  INNER JOIN priorities on priorities.id = priority_id");
        $qry->execute();
    }
    

?>