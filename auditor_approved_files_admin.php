<?php include("includes/header.php"); 
$results1=$objMain->getResults("SELECT * FROM tbl_files where audior_status='yes' and admin_status='no' and admin_request='' ");
?>

</head><body>
<?php include("includes/header_menu_admin.php"); ?>
<!-- Main Content -->


		<div class="clearfix"></div> <article class="content-box minimizer">
			<header>
			
				<h2>Auditor Approved Files List</h2>
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
									<th>Request</th>
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
                                <td><a href="init.php?module=admin&action=file&do=request&id=<?php echo $res['file_id'];?>"><button class="icon"><span>Secrect Code Request</span>
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