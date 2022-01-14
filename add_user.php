<?php
    ob_start();
	session_start();
	
	require "db/db.php";

    if(isset($_GET['action']) && $_GET['action']=="del"){
        $sql=$db->query("DELETE FROM `user` WHERE `id`=".$_GET['id']);
        if($sql) header("Location: add_user.php");
    }

    if(isset($_POST['btn_log'])){
        
		$name=Strtoupper($_POST['name']);
		$pwd=$_POST['pwd'];
        $id=strtoupper($_POST['sch_id']);
        $role='student';
		
        $sql="INSERT INTO user(`name`,`pwd`,`role`,`sch_id`) VALUES ('$name','$pwd','$role','$id')";
        var_dump($sql);
		$sql=$db->query($sql);

        if(!$sql) echo $db->error;
        else header("Location: add_user.php");

}


$ass_list;
    $msg;
	$sql="SELECT * FROM user WHERE role='student'";

    $sql=$db->query($sql);
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="initial-scale=1.0,width=device-width" />
            <link href="css/style.css" rel="stylesheet" type="text/css" />
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
            <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        </head>
        <body class="app">
            <div class="container-fluid column">
                <div class="head">
                    <img src="img/school_logo.jpg" height="90px" width="90px" />
                    <span class="text-info"><?=$_SESSION['id'];?></span>
                    <div><a class="btn btn-warning" href="lecturer.php" >Go back</a></div>
                    <div><a class="btn btn-warning" href="logout.php" >Logout</a></div>
                </div>
                <div class=" container-fluid body">
                    <div class="sleft">
                        <div>
                            <?php
                            if($sql->num_rows>0){
                            ?>
                            <table class="table">
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Student's ID </th>
                                    <th> Delete </th>
                                </tr>
                            <?php
                                while($ass_list=$sql->fetch_assoc()){
                            ?>
                            
                                <tr>
                                    <td> <?=$ass_list['id']; ?> </td>
                                    <td> <?=$ass_list['name']; ?> </td>
                                    <td> <?=$ass_list['sch_id']; ?> </td>
                                    <td> <a href="add_user.php?action=del&id=<?=$ass_list['id']; ?>" class="btn btn-warning error"><span class="fa fa-times"></span></a> </td>
                                </tr>
                            <?php
                            }
                            ?>
                            </table>
                            <?php
                            }else{
                                echo "Nothing yet";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="sright">
                       
                    <form method="post" class="form-group"  >
                    <input type="text" class="form-control" name="name" placeholder="Fullname" title="Enter Fullname here" /><br>
                    <input type="text" class="form-control" name="pwd" placeholder="Password" title="Enter Password here" /><br>
                    <input type="text" class="form-control" name="sch_id" placeholder="ID" title="Enter ID here" /><br>
                
                    <input type="submit" href="#" class="btn btn-default" name="btn_log" value="Submit" style="float: right;"/>
                    </form>
                    
                    </div>
                </div>
            </div>
        </body>
        <footer></footer>
    </html>