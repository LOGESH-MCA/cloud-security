<?php include("includes/header.php"); 
$results1=$objMain->getResults("SELECT * FROM tbl_files where user_id=".$_SESSION['admin_id']." ORDER BY file_id ");
?>

</head><body>
<?php include("includes/header_menu.php"); ?>
<!-- Main Content -->


		<div class="clearfix"></div> <article class="content-box minimizer">
			<header>
			
				<h2>My Files</h2>
<?php
    if(isset($msg) && $msg=='upd')
    $msg="File Updated Successfully.";
    if(isset($msg) && $msg=='suc')
	$msg="File added Successfully.";
    if(isset($msg) && $msg=='del')
    $msg="File deleted Successfully.";
	?>
                <?php if(isset($msg)) {   ?>
				<div class="notification success" style="float: left; display: block; clear: none; width: 35%; margin: 0px 0pt 0pt 300px;">
							<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
							<h4><?php echo $msg; ?></h4>

				</div>	<?php } ?>	
				
				<!-- Content Box Tab Navigation -->
				<nav>
					<ul class="tab-switch">
						<li><a class="default-tab tooltip" href="#tab1" title="Files List">Files</a></li>
						<li><a class="tooltip" href="#tab2" title="Upload New File">Upload New File</a></li>
					</ul>

				</nav>
				<!-- /Content Box Tab Navigation -->
				
			</header>
			<section>
			
				<!-- Tab Content #tab1 -->
				<div class="tab default-tab" id="tab1">
					
					<!-- Sample Data table for jQuery Visualize plugin. Use attribute chart-type for different visualization -->

					<!-- Sample jQuery DataTable  -->
					<table class="datatable">

						<thead>
							<tr>
									<th>S.No</th>
                                    <th>File Name</th>
									<th>Secret Code</th>
                                    <th>Auditor Approval Staus</th>
                                    <th>Admin Approval Staus</th>
									<th>Action</th>                                    
								</tr>
						</thead>
						<tbody>
                        <?php
						if(!empty($results1))
						{
							$sno=0;
							foreach($results1 as $res)
							{
								$sno++;
								
						?>
							<tr class="gradeX">
                            	<td><?php echo $sno; ?></td>
                                <td><?php echo substr($res['file_name'],7); ?></td>                                
                                <td><?php echo $res['secret_code']; ?></td>                                
                                <td><?php if($res['audior_status']=='yes') echo "<span class='tag green'>Approved</span>"; else if($res['audior_status']=='rejected') echo "<span class='tag red'>Rejected</span>"; else echo "<span class='tag orange'>Waiting</span>"; ?></td>  
                                <td><?php if($res['admin_status']=='yes')echo "<span class='tag green'>Approved</span>"; else if($res['admin_status']=='rejected') echo "<span class='tag red'>Rejected</span>"; else echo "<span class='tag orange'>Waiting</span>"; ?> </td>  
								<td>
                                <?php if($res['admin_status']!='rejected' and $res['audior_status']!='rejected') { ?>
<a href="init.php?module=user&action=file&do=delete&id=<?php echo $res['file_id'];?>"  title="Delete" onClick="return checkDelete('Are You sure to Remove ?');"><button class="icon"><span>Delete</span>
<img alt="Edit Page" src="img/icons/buttons/trashcan.png" border="0" >
</button></a>  <?php } else echo "<span class='tag red' style='width: 200px; margin-left: 0px;'>File Rejected</span>"; ?>
<?php if($res['admin_status']=='yes') { ?>
<a href="<?php echo $res['file_name'];?>"  title="Download"><button class="icon"><span>Download</span><img alt="Edit Page" src="img/icons/buttons/box_Incoming.png" border="0" >
</button></a>                              <?php } ?> 
</td>
							</tr>
                           <?php } } ?>
						</tbody>
					</table>
					
				</div>
                
			
				<!-- Tab Content #tab2 -->
				<div class="tab" id="tab2">
					<h3>Upload New File</h3>
					
					<!-- Horizontal form (default) -->
					<form class="horizontal-form" id="admin" name="admin" enctype="multipart/form-data" method="post" action="init.php?module=user&action=file&do=add">
						<!-- Inputs -->
						<!-- Use class .small, .medium or .large for predefined size -->
						<fieldset>

							<legend>File Details</legend> 
							<dl>
                                <dt>	<label class="mandatory">Upload File</label>
								</dt>
								<dd>
									<input type="file" class="validate[required] text-input small" name="file_name" style="width:200px;" id="file_name"> </dd>
                                 
                                    
							</dl>
						</fieldset>
						
						<button type="submit" id="submit" name="submit">Submit</button> 

					</form>
					
				</div>

			</section>

		</article>
	
	</section>
	<!-- /Main Content -->
	
	<?php include('includes/footer.php'); ?>
<script type="text/javascript">
$(function() {

	//add input
	$('a#add').click(function() {
		$('<dt><label class="mandatory">Event Image</label></dt><dd><input type="file" class="validate[required] text-input small" name="file[]" style="width:200px;" id="file"> &nbsp;&nbsp;Alt Tag <input type="text" class="validate[required] text-input small" name="imgalt[]" value="" id="imgalt">&nbsp;&nbsp;<a href="#imgup" class="remove">Remove</a><p>Jpg/jpeg files only accepted</p></dd>').fadeIn("slow").appendTo('#productimages'); 
		return false;
	});

	//fadeout selected item and remove
	$('.remove').live('click', function() {
	    $(this).parent().fadeOut(300, function(){ 
	    	$(this).empty();
	    	return false;
		});
	});

});
</script>
</body>
</html>