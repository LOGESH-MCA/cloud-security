<?php
require_once 'lib/common.php';
$module = @$_REQUEST['module'];
$action = @$_REQUEST['action'];

switch ($module) {

	case 'login':
	switch ($action) {
	case 'validate':
	$user_login  = $_REQUEST['user_login'];
	$user_pass   = $_REQUEST['user_pass'];	
	$result = mysql_query("SELECT * FROM `tbl_users` WHERE `username` = '".$user_login."' AND `userpass` = '".$user_pass."'");
	$chk=mysql_num_rows($result);
	  if ($chk>0) 
	  {
		  $res1=mysql_fetch_array($result);
		$_SESSION['admin_id'] =  $res1['user_id'];
	    header("location:userdashboard.php");  }
	  else {
	  	 header("location:clouduserlogin.php?error=1");
	  }
	break;
	case 'auditor':
	$user_login  = $_REQUEST['user_login'];
	$user_pass   = $_REQUEST['user_pass'];	
	$result = mysql_query("SELECT * FROM `tbl_auditor` WHERE `username` = '".$user_login."' AND `userpass` = '".$user_pass."'");
	$chk=mysql_num_rows($result);
	  if ($chk>0) 
	  {
		$_SESSION['admin_id'] =  $_REQUEST['user_login'];
	    header("location:auditordashboard.php");  }
	  else {
	  	 header("location:auditorlogin.php?error=1");
	  }
	break;
	case 'admin':
	$user_login  = $_REQUEST['user_login'];
	$user_pass   = $_REQUEST['user_pass'];	
	$result = mysql_query("SELECT * FROM `tbl_admin` WHERE `username` = '".$user_login."' AND `userpass` = '".$user_pass."'");
	$chk=mysql_num_rows($result);
	  if ($chk>0) 
	  {
		$_SESSION['admin_id'] =  $_REQUEST['user_login'];
	    header("location:admindashboard.php");  }
	  else {
	  	 header("location:adminlogin.php?error=1");
	  }
	break;
	}
	break;
		case 'userlogout':
		session_destroy();
		header("location:clouduserlogin.php?logout=1");
		break;
		case 'auditorlogout':
		session_destroy();
		header("location:auditorlogin.php?logout=1");
		break;
		case 'adminlogout':
		session_destroy();
		header("location:adminlogin.php?logout=1");
		break;
	case 'user':
		switch($action){
			case 'register':
			extract($_REQUEST);
			mysql_query("insert into tbl_users set fullname='".$fullname."',emailid='".$emailid."',phoneno='".$phoneno."',username='".$username."',userpass='".$userpass."'") or die(mysql_error());
			header("location:clouduserlogin.php?msg=register");
			break;
			case 'file':
				$do = @$_REQUEST['do'];
				$id = @$_REQUEST['id'];
				if($do=='add') {
				if($_FILES['file_name']['name']!='') {
				  $destinationpath="upload/";
				  $rno=rand(9999, 100000);
				  $file_name = $destinationpath.$rno.$_FILES['file_name']['name'];
				  $targetpath=$destinationpath.$rno.basename($_FILES['file_name']['name']);
				  move_uploaded_file($_FILES['file_name']['tmp_name'],$targetpath);
			}
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

			$size = strlen( $chars );
			for( $i = 0; $i < 15; $i++ ) {
				$secret_code .= $chars[ rand( 0, $size - 1 ) ];
			}
	
			$sql= "INSERT INTO tbl_files set file_name='".$file_name."',secret_code='".$secret_code."',user_id ='".$_SESSION['admin_id']."'";
			mysql_query($sql)or die(mysql_error());
			header("location:files.php?msg=suc");
		} else if($do=='delete') {
			$res=mysql_fetch_array(mysql_query("select * from tbl_files where file_id=".$id)) or die(mysql_error());
			unlink($res['file_name']);
			mysql_query("delete from tbl_files where file_id=".$id) or die(mysql_error());
			header("location:files.php?msg=del");
		}
	}
	break;
	case 'auditor':
	  switch($action) {
		  case 'file':
		  		$do = @$_REQUEST['do'];
				$id = @$_REQUEST['id'];
				if($do=='request') {
					mysql_query("update tbl_files set auditor_request='requested' where file_id=".$id)  or die(mysql_error());
					header("location:audit_requested_files.php?msg=req");
				} else if($do=='approve') {
					mysql_query("update tbl_files set auditor_request='approved' where file_id=".$id)  or die(mysql_error());
					header("location:audit_requested_files_user.php?msg=approv");
				} else if($do=='approved') {
					mysql_query("update tbl_files set auditor_request='closed',audior_status='yes' where file_id=".$id)  or die(mysql_error());
					header("location:audit_approved_files.php?msg=approved");
				} else if($do=='rejected') {
					mysql_query("update tbl_files set auditor_request='closed',audior_status='rejected' where file_id=".$id)  or die(mysql_error());
					header("location:audit_approved_files.php?msg=approved");
				}
				
				
		  	
	  }
		break;
	case 'admin':
	  switch($action) {
		  case 'file':
		  		$do = @$_REQUEST['do'];
				$id = @$_REQUEST['id'];
				if($do=='request') {
					mysql_query("update tbl_files set admin_request='requested' where file_id=".$id)  or die(mysql_error());
					header("location:admin_requested_files.php?msg=req");
				} else if($do=='approve') {
					mysql_query("update tbl_files set admin_request='approved' where file_id=".$id)  or die(mysql_error());
					header("location:admin_requested_files_user.php?msg=approv");
				} else if($do=='approved') {
					mysql_query("update tbl_files set admin_request='closed',admin_status='yes' where file_id=".$id)  or die(mysql_error());
					header("location:admin_approved_files.php?msg=approved");
				}  else if($do=='rejected') {
					mysql_query("update tbl_files set admin_request='closed',admin_status='rejected' where file_id=".$id)  or die(mysql_error());
					header("location:admin_approved_files.php?msg=approved");
				}
				
				
		  	
	  }

}	

?>