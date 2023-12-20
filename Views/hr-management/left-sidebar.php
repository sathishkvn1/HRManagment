 <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->

        <a href="<?php echo base_url(CONTROLLER_HR);?>" class="brand-link navbar-dark white" >
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
              <?php 
                foreach($mainMenu as $menu):
              ?>
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-cubes"></i>
                    <p>
                    <?php echo $menu->main_menu ;?>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  <?php 
                   $subMenus = $sub_menus[$menu->id]; 
                   foreach($subMenus as $sub):
                  ?>
                    <li class="nav-item">
                  
                      <a href="<?php echo base_url($sub->page_link."/".$sub->id);?>" class="nav-link">
                        <i class="fa fa-building"></i>
                        <p><?php echo $sub->sub_menu ;?></p>
                      </a>
                    </li>
                    <?php 
                      endforeach;
                    ?>                  
                  </ul>
                </li>
                <?php 
                endforeach;
              ?>
              <!--  ./ one section --- -->


 <!--  one section --- -->
                <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-grip-horizontal"></i>
                    <p>Calender
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/calender");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>Calender</p>
                      </a>
                    </li>
                  
                   
                  </ul>
                </li>
              <!-- ./ one section --- -->
            
         <li class="nav-item has-treeview menu-close sidebar-shadow-top-bottom">
                  <a href="#" class="nav-link active bg-purewhite text-dark no-shadow">
                    <i class="fa fa-grip-horizontal"></i>
                    <p>User Rights
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  
                    <li class="nav-item">
                      <a href="<?php echo base_url(CONTROLLER_HR."/user_rights");?>" class="nav-link">
                        <i class="fa fa-check-square"></i>
                        <p>User Rights</p>
                      </a>
                    </li>
                  
                   
                  </ul>
                </li>

           
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
  