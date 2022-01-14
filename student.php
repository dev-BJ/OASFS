<?php
    ob_start();
	session_start();
	
	require "db/db.php";

    if(isset($_POST['btn_log'])){
        
		$course=$_POST['course'];
		$lt_id=$_POST['lt_id'];
        $sch_id=$_POST['sch_id'];
        $file="files/".$_FILES['upload']['name'];
        $tmp=$_FILES['upload']['tmp_name'];

        if(!file_exists($file)) move_uploaded_file($tmp,$file);
		
        $sql="INSERT INTO `assessment`(`course`,`sch_id`,`lt_id`,`path`) VALUES ('$course','$sch_id','$lt_id','$file')";
		$sql=$db->query($sql);

        if(!$sql) echo $db->error;

}

$ass_list;
    $msg;
	$sql="SELECT * FROM `assessment` WHERE sch_id='".$_SESSION['id']."'";

    $sql=$db->query($sql);
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="initial-scale=1.0,width=device-width" />
            <link href="css/style.css" rel="stylesheet" type="text/css" />
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        </head>
        <body class="app">
            <div class="container-fluid column">
                <div class="head">
                    <img src="img/school_logo.jpg" height="90px" width="90px" />
                    <span class="text-info"><?=$_SESSION['id'];?></span>
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
                                    <th> Lecture's ID </th>
                                    <th> Course code </th>
                                    <th> Grade </th>
                                    <th> Lecture's Comment </th>
                                </tr>
                            <?php
                                while($ass_list=$sql->fetch_assoc()){
                            ?>
                            
                                <tr>
                                    <td> <?=$ass_list['lt_id']; ?> </td>
                                    <td> <?=$ass_list['course']; ?> </td>
                                    <td> <?=isset($ass_list['grade'])?$ass_list['grade']:"not marked"; ?> </td>
                                    <td> <?=isset($ass_list['comment'])?$ass_list['comment']:"not marked"; ?> </td>
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
                    <form method="post" class="form-group" enctype="multipart/form-data" >
                    <input type="text" class="form-control" name="course" placeholder="Course" title="Enter username here" /><br>
                    <input type="text" class="form-control" name="lt_id" placeholder="lecturer's ID" title="Enter lecturer's id" /><br>
                    <input type="text" class="form-control" name="sch_id" value="<?=$_SESSION['id'];?>" style="display:none" />
                    <input type="file" class="form-control" name="upload" accept=".doc ,.docx ,.pdf,.ppt" /><br>

                    <input type="submit" href="#" class="btn btn-default" name="btn_log" value="Submit" style="float: right;"/>
                    </form>
                    </div>
                </div>
            </div>
        </body>
        <footer></footer>
    </html>