<?php include("includes/header.php"); 
$results1=$objMain->getResults("SELECT * FROM tbl_files where audior_status='yes' and admin_status='no' and admin_request='requested' ");
?>

</head><body>
<?php include("includes/header_menu.php"); ?>
<!-- Main Content -->


		<div class="clearfix"></div> <article class="content-box minimizer">
			<header>
			
				<h2>Secrect Code Requested Files List By Admin</h2>
				<!-- /Content Box Tab Navigation -->
				<?php
    if(isset($msg) && $msg=='approv')
    $msg="File Requested Approved Successfully.";
	?>
                <?php if(isset($msg)) {   ?>
				<div class="notification success" style="float: left; display: block; clear: none; width: 35%; margin: 0px 0pt 0pt 200px;">
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
                                <td><a href="init.php?module=admin&action=file&do=approve&id=<?php echo $res['file_id'];?>"><button class="icon"><span>Approve Request</span>
<img alt="Edit Page" src="img/icons/buttons/unlocked.png" border="0" >
</button></a></td>                                                              
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
	
	<?php include('includes/footer.php'); ?>
</body>
</html>