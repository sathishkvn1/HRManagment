<!-- <div id="mySidenav" class="sidenav">      -->
<div  class="sidenav">   
	<!--------- SideBar Navigation - Start ------------------------------------>
	
	<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
				
				

                     <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php
                            
                                foreach($module as $row):
                                    
                            
                            ?>
                            
                             <li>
								<a href='<?php echo base_url($row->page_link );?>'>
									<i class="fa fa-home"></i><?php echo $row->module;?>
								</a>
							</li> 
							<?php endforeach; ?>
                            
                            
                            
                            
       <!--                     <li>-->
							<!--	<a href='<?php echo base_url("$adminController/admin_main/");?>'>-->
							<!--		<i class="fa fa-home"></i>ADMIN-->
							<!--	</a>-->
							<!--</li> -->
							
							<!-- <li>-->
							<!--	<a href='<?php echo base_url("$accountsController/");?>'>-->
							<!--		<i class="fa fa-home"></i>ACCOUNTS-->
							<!--	</a>-->
							<!--</li> -->
							
						 <!--   <li>-->
							<!--	<a href='<?php echo base_url("$hrController/hr_main/");?>'>-->
							<!--		<i class="fa fa-home"></i>HR-->
							<!--	</a>-->
							<!--</li> -->
                           
       <!--                     <li>-->
							<!--	<a href='<?php echo base_url("$payrollController/payroll_main/");?>'>-->
							<!--		<i class="fa fa-home"></i>PAYROLL-->
							<!--	</a>-->
							<!--</li> -->
							
							<!--<li>-->
							<!--	<a href='<?php echo base_url("$leadController/leads/");?>'>-->
							<!--		<i class="fa fa-home"></i>LEADS-->
							<!--	</a>-->
							<!--</li> -->
							<!--	<li>-->
							<!--	<a href='<?php echo base_url("hr-management/HrMaster/");?>'>-->
							<!--		<i class="fa fa-home"></i>HR MANAGEMENT NEW-->
							<!--	</a>-->
							<!--</li> -->
						</ul>	
					</li>
		
                </ul>
				
            </div><!--- // end div nav-scroll --->
        </div><!--- // end div nk-sidebar -------->
		
		<!--------- SideBar Navigation - End ------------------------------------>
	
</div>
//  <script>
// 	console.log($leadController);
// </script> -->