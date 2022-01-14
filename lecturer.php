<?php
    ob_start();
	session_start();
	
	require "db/db.php";

    if(isset($_GET['action']) && $_GET['action']=="del"){
        $sql=$db->query("DELETE FROM `assessment` WHERE `id`=".$_GET['id']);
        if($sql) header("Location: lecturer.php");
    }

    if(isset($_POST['btn_log'])){
        
		$grade=$_POST['grade'];
		$comment=$_POST['comment'];
        $id=$_POST['ass_id'];
		
        $sql="UPDATE `assessment` SET `grade`='$grade' , `comment`='$comment' WHERE `id`='$id'";
		$sql=$db->query($sql);

        if(!$sql) echo $db->error;
        else header("Location: lecturer.php");

}


$ass_list;
    $msg;
	$sql="SELECT * FROM assessment WHERE lt_id='".$_SESSION['id']."'";

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
                    <?php 
                    if(isset($_SESSION['role']) && $_SESSION['role']=="lecturer"){
                        echo '<div><a class="btn btn-warning" href="add_user.php" >Admin</a></div>';
                    }
                    ?>
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
                                    <th> Student's ID </th>
                                    <th> Course code </th>
                                    <th> Assignment </th>
                                    <th> Grade </th>
                                    <th> Delete </th>
                                </tr>
                            <?php
                                while($ass_list=$sql->fetch_assoc()){
                            ?>
                            
                                <tr>
                                    <td> <?=$ass_list['id']; ?> </td>
                                    <td> <?=$ass_list['sch_id']; ?> </td>
                                    <td> <?=$ass_list['course']; ?> </td>
                                    <td> <a href="<?=$ass_list['path']; ?>" class="btn btn-secondary " download><i class="fa fa-download"></i></a> </td>
                                    <td> <a href="lecturer.php?id=<?=$ass_list['id']; ?>" class="btn btn-info"><i class="fa fa-check"></i></a> </td>
                                    <td> <a href="lecturer.php?action=del&id=<?=$ass_list['id']; ?>" class="btn btn-warning error"><i class="fa fa-times"></i></a> </td>
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
                        <?php
                        if(isset($_GET['id']) && !isset($_GET['action'])):
                        ?>
                    <form method="post" class="form-group" enctype="multipart/form-data" >
                    <input type="text" class="form-control" name="grade" placeholder="Grade" title="Enter username here" /><br>
                    <textarea class="form-control" name="comment" placeholder="Comment" title="Enter username here" ></textarea><br>
                    <input type="text" class="form-control" name="ass_id" value="<?=$_GET['id'];?>" style="display:none" />

                    <input type="submit" href="#" class="btn btn-default" name="btn_log" value="Submit" style="float: right;"/>
                    </form>
                    <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </body>
        <footer></footer>
    </html>