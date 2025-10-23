<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<title>Ensuring Data Storage Security in Cloud Server</title>
	
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">

	<meta name="author" content="">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Icons -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	
	<!-- CSS Styles -->
	<link rel="stylesheet" href="css/screen.css">
	<link rel="stylesheet" href="css/colors.css">
	<link rel="stylesheet" href="css/style2.css">    

	<link rel="stylesheet" href="css/jquery.muon.css">
	<link rel="stylesheet" href="css/jquery.tipsy.css">
	<link rel="stylesheet" href="css/jquery.wysiwyg.css">
	<link rel="stylesheet" href="css/jquery.datatables.css">
	<link rel="stylesheet" href="css/jquery.nyromodal.css">
	<link rel="stylesheet" href="css/jquery.datepicker.css">
	<link rel="stylesheet" href="css/jquery.fileinput.css">
	<link rel="stylesheet" href="css/jquery.fullcalendar.css">
	<link rel="stylesheet" href="css/jquery.visualize.css">

	<link rel="stylesheet" href="css/jquery.snippet.css">
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="css/template.css" type="text/css"/>
     
    <!----> <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.21/themes/ui-lightness/jquery-ui.css" />
	<link rel="stylesheet" media="all" type="text/css" href="css/jquery-ui-timepicker-addon.css" />

<header class="muon">
	
		<div class="navigation-wrapper">
		
			<!-- Logo -->
			
			
			<!-- Root navigation block -->
			<nav>
			
				<!-- Root menu level -->
				<ul>

					
					<!-- Root menu items -->
					<li><a href="index.php" class="muon-no-submenu">Home</a></li>

	
				<!-- End of root menu level -->
				</ul>
				
			<!-- End of root navigation block -->
			</nav>
			
			<!-- User list -->
		
			
		</div>
	
	</header>
</head>
<body onLoad="document.login.loginname.focus()" >
	<div class="login-wrapper">
    <?php
extract($_REQUEST);
if(isset($logout))
$err ="Logout Successfully.";
else if(isset($error) && $error==1)
$err="Your login details are wrong!";
else if(isset($error) && $error=='session')
$err="Session Expired"; ?>
		<!-- Notification -->
        <?php if(isset($err)) { ?>
		<div class="notification error" id="errormsg" >
			<h4>Error notification</h4>
			<p><?php echo $err; ?></p>
		</div>
		<!-- /Notification -->
		<?php }?>
		<!-- Full width content box -->
		<article class="content-box minimizer">
			<header>
				<h2>Admin Login</h2>
			</header>
			<section style="height:160px; overflow:visible;">
				
				<div id="logform">
					<form action="init.php?module=login&action=admin" method="post" name="login" id="login">
						<dl>
							<dt>
								<label>User Name</label>
							</dt>
							<dd>
								<input name="user_login" type="text" tabindex="101" id="user_login" class="validate[required] text-input"  >
							</dd>
							<dt>
								<label>Password</label>
							</dt>
							<dd>
								<input name="user_pass" id="user_pass" type="password" tabindex="102" class="validate[required] text-input" >
							</dd>
						</dl>
						<button type="submit" name="submit" tabindex="2" style="float: right; margin-right: 20px;">Submit</button>

					</form>
				</div>
			</section>
			<footer>
				<ul class="login-links">
					<li></li>
				</ul>
			</footer>
		</article>
		<!-- /Full width content box -->
		
	</div>

	<!-- JavaScript at the bottom for faster page loading -->
	<script src="js/jquery/jquery.tipsy.js"></script>
	<script src="js/jquery-1.6.min.js" type="text/javascript"></script>
	<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#login").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
</body>
</html>