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
                      <a href="<?php echo base_url("HrMaster");?>" class="nav-link active">
                        <i class="fa fa-desktop"></i>
                        <p>Dashboard</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url("HrMaster/company");?>" class="nav-link">
                        <i class="fa fa-building"></i>
                        <p>Company Structure</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url("HrMaster/job_details");?>" class="nav-link">
                        <i class="fa fa-columns"></i>
                        <p>Job Details Setup</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url("HrMaster/qualification");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Qualification</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                     <a href="<?php echo base_url("HrMaster/projects");?>" class="nav-link">
                        <i class="fa fa-columns"></i>
                        <p>Project</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="./index4.html" class="nav-link">
                        <i class="fa fa-user-circle"></i>
                        <p>Clients</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="./index4.html" class="nav-link">
                        <i class="fa fa-code"></i>
                        <p>Custom Fields</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="./index4.html" class="nav-link">
                        <i class="fa fa-compass"></i>
                        <p>Audit Log</p>
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
                    <li class="nav-item">
                      <a href="<?php echo base_url("HrMaster/employee");?>" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>Employees</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-tasks"></i>
                        <p>Employee History</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url("HrMaster/teams");?>" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>Teams</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- ./ one section --- -->
            
              <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-compress"></i>
                    <p>
                    Manage
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-file-alt"></i>
                        <p>Documents</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-clock"></i>
                        <p>Attendance</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-bezier-curve"></i>
                        <p>Performance</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-pause"></i>
                        <p>Leave</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-archive"></i>
                        <p>Company Assets</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-bars"></i>
                        <p>Expenses</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-folder"></i>
                        <p>Data Colluctions</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-briefcase faa-horizontal animated"></i>
                        <p>Training</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-plane"></i>
                        <p>Travel</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-align-center"></i>
                        <p>Overtime</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-money-check"></i>
                        <p>Loans</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- ./ one section --- -->

               <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                    <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                      <i class="fa fa-book-reader"></i>
                      <p>
                      Admin Reports
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fa fa-window-maximize"></i>
                          <p>Reports</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fa fa-file-export"></i>
                          <p>Report Files</p>
                        </a>
                      </li>
                      
                    </ul>
                  </li>
              <!-- ./ one section --- -->
              <!--  one section --- -->
                 <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-cogs"></i>
                    <p>
                    System
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-cogs"></i>
                        <p>Settings</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Users</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-folder-open"></i>
                        <p>Manage Modules</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-unlock"></i>
                        <p>Manage Permissions</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-shopping-cart"></i>
                        <p>Billing</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-microchip"></i>
                        <p>Manage Metadata</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-database"></i>
                        <p>Data </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-ruler-horizontal"></i>
                        <p>Field Names</p>
                      </a>
                    </li>
                    
                  </ul>
                </li>
              <!-- ./ one section --- -->

               <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                      <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                        <i class="fa fa-book-reader"></i>
                        <p>
                        Insights
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-user-clock"></i>
                            <p>Time and Attendence</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-calendar-alt"></i>
                            <p>Leave TimeLine</p>
                          </a>
                        </li>
                        
                      </ul>
                  </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                      <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                        <i class="fa fa-file-archive"></i>
                        <p>
                        Payroll
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-money-check-alt"></i>
                            <p>Salary</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-cogs"></i>
                            <p>Payroll Reports</p>
                          </a>
                        </li>
                        
                      </ul>
                </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                      <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                        <i class="fa fa-th"></i>
                        <p>
                        Recruitment
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-random"></i>
                            <p>Requirement Setup</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-columns"></i>
                            <p>Job Positions</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-users"></i>
                            <p>Candidates</p>
                          </a>
                        </li>
                        
                      </ul>
                </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                      <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                        <i class="fa fa-th"></i>
                        <p>
                        Personal Information
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-desktop"></i>
                            <p>Dashbord</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-user"></i>
                            <p>Basic Information</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-graduation-cap"></i>
                            <p>Qualification</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-expand"></i>
                            <p>Dependents</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fa fa-phone-square"></i>
                            <p>Emergency Contacts</p>
                          </a>
                        </li>
                        
                      </ul>
                </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                        <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                          <i class="fa fa-file-archive"></i>
                          <p>
                        Leave
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="fa fa-share-alt"></i>
                              <p>Leave Management</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="fa fa-calendar"></i>
                              <p>Leave Calender</p>
                            </a>
                          </li>
                          
                        </ul>
                  </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                  <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-hourglass-half"></i>
                            <p>
                              Time Management
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-clock"></i>
                                <p>Attendance</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-stopwatch"></i>
                                <p>Time Sheets</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-calendar-plus"></i>
                                <p>Overtime Request</p>
                              </a>
                            </li>
                            
                          </ul>
                    </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                  <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-file-alt"></i>
                            <p>
                              Documents
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-file"></i>
                                <p>My Documents</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-folder"></i>
                                <p>HR Forms</p>
                              </a>
                            </li>
                            
                          </ul>
                    </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                  <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-building"></i>
                            <p>
                              Company
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-user"></i>
                                <p>Staff Directory</p>
                              </a>
                            </li>
                            
                            
                          </ul>
                    </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                  <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-briefcase"></i>
                            <p>
                             Training
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-briefcase"></i>
                                <p>Training</p>
                              </a>
                            </li>
                            
                            
                          </ul>
                    </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                  <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-bezier-curve"></i>
                            <p>
                             Performance
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-compress-arrows-alt"></i>
                                <p>Reviews</p>
                              </a>
                            </li>
                            
                            
                          </ul>
                    </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
                  <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-globe"></i>
                            <p>
                              Travel Management
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="<?php echo base_url("HrMaster/travel");?>" class="nav-link">
                                <i class="fa fa-bezier-curve"></i>
                                <p>Travel</p>
                              </a>
                            </li>
                            
                            
                          </ul>
                    </li>
              <!-- ./ one section --- -->
               <!--  one section --- -->
               <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-calculator"></i>
                            <p>
                              Finance
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-bars"></i>
                                <p>Expenses</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-calculator faa-horizontal animated"></i>
                                <p>Salary</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-money-check faa-horizontal animated"></i>
                                <p>Loans</p>
                              </a>
                            </li>
                            
                            
                          </ul>
                    </li>
              <!-- ./ one section --- -->

               <!--  one section --- -->
                  <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                          <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                            <i class="fa fa-book-reader"></i>
                            <p>
                            User Reports
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-window-maximize faa-horizontal animated"></i>
                                <p>Reports</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-file-export faa-horizontal animated"></i>
                                <p>Remort Files</p>
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
  