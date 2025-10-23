<?php include("includes/header.php"); 
$results1=$objMain->getResults("SELECT * FROM tbl_files where audior_status='yes'");
?>

</head><body>
<?php include("includes/header_menu_auditor.php"); ?>
<!-- Main Content -->


		<div class="clearfix"></div> <article class="content-box minimizer">
			<header>
			
				<h2>Approved Files List</h2>
				<!-- /Content Box Tab Navigation -->
				<?php
    if(isset($msg) && $msg=='approved')
    $msg="File Approved Successfully.";
	?>
                <?php if(isset($msg)) {   ?>
				<div class="notification success" style="float: left; display: block; clear: none; width: 35%; margin: 0px 0pt 0pt 300px;">
							<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
							<h4><?php echo $msg; ?></h4>

				</div>	<?php } ?>	
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
                                     <th>Secrect Code</th>
                                    <th style="width:400px;">Action</th>
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
                                <td><?php echo $res['secret_code']; ?> <input type="hidden" name="file<?php echo $res['file_id'];?>" id="file<?php echo $res['file_id'];?>" value="<?php echo $res['secret_code'];?>"></td>
                                <td style="padding-left:40px;"><a href="<?php echo $res['file_name'];?>" onClick="return secrectcode_validate(<?php echo $res['file_id'];?>)"><button class="icon"><span>Download</span>
<img alt="Edit Page" src="img/icons/buttons/box_Incoming.png" border="0" >
</button></a> 
</td>                                                              
							</tr>
                           <?php } } ?>
						</tbody>
					</table>
					
				</div>
                
			
				<!-- Tab Content #tab2 -->
				

			</section>

		</article>
	
	</section>
	<!-- /Main Content -->
	<script type="text/javascript">
	function secrectcode_validate(fileid)
	{
		var secret_code=prompt("Enter Secret Code"); 
		if (document.getElementById('file'+fileid).value==secret_code) return true; 
		else { alert("Invalid Secrect Code"); return false; }
	}
	</script>
	<?php include('includes/footer.php'); ?>
</body>
</html>