 <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo base_url("HrMaster");?>" class="brand-link navbar-dark white" >
          <img src="<?php  echo base_url("hrmanagement/dist/img/logo.png");?>" alt="AdminLTE Logo" class="brand-image"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Home</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-cubes"></i>
                    <p>
                      Admin
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                
                    <li class="nav-item">
                  
                      <a href="<?php echo base_url(CONTROLLER_HR."/company");?>" class="nav-link">
                        <i class="fa fa-building"></i>
                        <p>Company Structure</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/job_details");?>" class="nav-link">
                        <i class="fa fa-columns"></i>
                        <p>Job Details Setup</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/qualification");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Qualification</p>
                      </a>
                    </li>
                   
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/record_status");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>RecordStatus</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/setup_data");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Setup Data</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/assets");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Assets</p>
                      </a>
                    </li>

                  </ul>
                </li>
              <!--  ./ one section --- -->

               <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-grip-horizontal"></i>
                    <p>
                    Employees
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <!-- <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>Employees</p>
                      </a>
                    </li> -->
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/employee");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Employee</p>
                      </a>
                    </li>

                    <!-- <li class="nav-item">
                      <p><-?php echo "controller" . CONTROLLER_HR. "/employee; " ?> </p>
                       
                    </li> -->

                    
                  
                    
                  
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/teams");?>" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>Teams</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- ./ one section --- -->

                <!--  one section  for loan--- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-grip-horizontal"></i>
                    <p>
                    Loan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                 
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/loan_request");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Request</p>
                      </a>
                    </li>
                    
                  </ul>
                </li>
              <!-- ./ one section --- -->

                <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-grip-horizontal"></i>
                    <p>Travel Management
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <!-- <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>Employees</p>
                      </a>
                    </li> -->
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/travel");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Travel</p>
                      </a>
                    </li>
                  
                   
                  </ul>
                </li>
              <!-- ./ one section --- -->
            



      
           





         

           
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
  