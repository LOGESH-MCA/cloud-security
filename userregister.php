<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <title>Ensuring Data Storage Security in Cloud Server</title>
    <meta charset="UTF-8">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="copyright">
    <meta content="" name="author">
    <meta content="English" name="language">
    <meta content="index, follow" name="robots">
    <meta content="XXX" property="fb:page_id">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/screen.css" rel="stylesheet">
    <link href="css/colors.css" rel="stylesheet">
    <link href="css/jquery.tipsy.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet">
   	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="css/template.css" type="text/css"/>


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
			<h4><?php echo $err; ?></h4>
		</div>
		<!-- /Notification -->
		<?php }?>
		<!-- Full width content box -->
		<article class="content-box minimizer">
			<header>
				<h2>Cloud User Registration</h2>
			</header>
			<section style="height:auto; padding-bottom:40px; overflow:visible;">
				
				<div id="logform">
					<form action="init.php?module=user&action=register" method="post" name="login" id="login">
						<dl>
							<dt>
								<label>Name</label>
							</dt>
							<dd>
								<input name="fullname" type="text" tabindex="101" id="fullname" class="validate[required] text-input"  >
							</dd>
                            <dt>
								<label>Email ID</label>
							</dt>
							<dd>
								<input name="emailid" type="text" tabindex="101" id="emailid" class="validate[required,custom[email]] text-input"  >
							</dd>
                            <dt>
								<label>Phone No</label>
							</dt>
							<dd>
								<input name="phoneno" type="text" tabindex="101" id="phoneno" class="validate[required] text-input"  >
							</dd>
                            <dt>
								<label>User Name</label>
							</dt>
							<dd>
								<input name="username" type="text" tabindex="101" id="username" class="validate[required] text-input"  >
							</dd>
							<dt>
								<label>Password</label>
							</dt>
							<dd>
								<input name="userpass" id="userpass" type="password" tabindex="102" class="validate[required] text-input" >
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