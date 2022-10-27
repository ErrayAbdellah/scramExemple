<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
     

    function getTasks($todo,$pr)
    {
        
        //CODE HERE
        $qry = $GLOBALS['qry'];
        $result = $qry->get_result();
        $con = $GLOBALS['con'];
        //SQL SELECT
        while($row = $result->fetch_array())
            { 
                if($row['status_id']==2 && $todo == 1 && $pr ==0) 
                {
                    ?>
                        <button class="border-1 border-secondary d-flex btnBtn" >
                            <div class="col-1">
                                <i class="bi bi-question-circle text-success fa-2x"></i>
                            </div>
                            <div class="text-start col-11 ">
                                <div class="fw-bold"><?php echo $row['title']; ?></div>
                                <div class="mt-1">
                                    <div class="text-secondary-300"><?php echo "#".$row['id']." created in ".$row['task_datetime']; ?></div>
                                    <div class="mt-1" title="<?php  echo $row['description'];  ?>"><?php echo substr($row['description'],0,55)?>...</div>
                                </div>
                                <div class="my-1">
                                    <span class="btn btn-info rounded-pill"><?php echo $row['priorities']?></span>
                                    <span class="btn btn-gray-500 rounded-pill"><?php echo $row['type']?></span>
                                </div>
                            </div> 
                        </button>
                    <?php
                }elseif($row['status_id']==1 && $todo == 0 && $pr == 1 )
                {
                    // echo "<hr>" ;
                    // echo "inprogresse" ;
                        
                    // echo "<hr>" ;
                   
                    ?>
                        <button class="border-1 border-secondary d-flex btnBtn" >
                            <div class="col-1">
                                <i class="spinner-border spinner-border-sm text-success"></i> 
                            </div>	
                            <div class="text-start col-11 ">
                                <div class="fw-bold"><?php echo $row['title']; ?></div>
                                <div class="mt-1">
                                    <div class="text-secondary-300"><?php echo "#".$row['id']." created in ".$row['task_datetime']; ?></div>
                                    <div class="mt-1" title="<?php  echo $row['description'];  ?>"><?php echo substr($row['description'],0,55)?>...</div>
                                </div>
                                <div class="my-1">
                                    <span class="btn btn-info rounded-pill"><?php echo $row['priorities']?></span>
                                    <span class="btn btn-gray-500 rounded-pill"><?php echo $row['type']?></span>
                                </div>
                            </div> 
                        </button>
                    <?php

                    //}elseif($row['status_id']==3){
                    //     return $row ;
                    // }
                }
                    //echo "Fetch all tasks";
            }
        
    }
    function saveTask()
    {
        //CODE HERE
        //SQL INSERT
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>