<?php include("includes/header.php"); 
$results1=$objMain->getResults("SELECT * FROM tbl_users ORDER BY user_id  ");
?>

</head><body>
<?php include("includes/header_menu_auditor.php"); ?>
<!-- Main Content -->


		<div class="clearfix"></div> <article class="content-box minimizer">
			<header>
			
				<h2>Users List</h2>
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
                                    <th>Full Name</th>
									<th>Email ID</th>
                                    <th>Phone NO</th>
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
                                <td><?php echo $res['fullname']; ?></td>                                
                                <td><?php echo $res['emailid']; ?></td>    
                                 <td><?php echo $res['phoneno']; ?></td>                                
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