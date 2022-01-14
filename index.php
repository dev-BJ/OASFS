<?php
    ob_start();
	session_start();
	
	require "db/db.php" ;
	$msg;
	if(isset($_POST['btn_log'])){
		$user=strtoupper($_POST['user']);
		$pwd=strtoupper($_POST['pwd']);
		
        $sql="SELECT * FROM user WHERE sch_id='$user' AND pwd='$pwd'";
		$sql=$db->query($sql);

			if($sql->num_rows>0){
				$row=$sql->fetch_assoc();
					$_SESSION["role"]=$row["role"];
                    $_SESSION["id"]=$row["sch_id"];
                    header("Location: ".$_SESSION['role'].".php");
            }else{
                $msg="user doesn't exist";
            }
}

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
            <div class="container-fluid">
                <div class="bleft">
                    <form action="" method="post" class="login-form">
                    <input type="text" class="form-control" name="user" placeholder="ID" title="Enter ID here" /><br>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" title="Enter username here" /><br>
                    <input type="submit" href="#" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
                    </form>
                    <?php if(isset($msg)) echo "<div class='text text-warning'>$msg</div>"; ?>
                </div>
                <div class="bright">
                    <img src="./img/school_logo.jpg" height="200px" width="200px" />
                    <span class=" text text-info">Online assignment and feedback system</span>
                </div>
            </div>
        </body>
        <footer></footer>
    </html>