<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hr</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
 
     <?php include("top-css.php"); ?> 
     
</head>
<body class="hold-transition sidebar-mini layout-fixed brq-payroll">
<div class="wrapper">

<?php include("top-nav.php"); ?> 

  <!-- Main Sidebar Container -->
  <?php include("left-sidebar.php"); ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row topcard">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>People</h4>

                <p>2 Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">Manage Employees <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Company</h4>

                <p>3 Departments </p>
              </div>
              <div class="icon">
                <i class="ion ion-shuffle"></i>
              </div>
              <a href="#" class="small-box-footer">Manage Company <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-darkyellow">
              <div class="inner">
                <h4 style="color:white">Users</h4>

                <p style="color:white">User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Manage User<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>Projects</h4>

                <p>4 Active Projects</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Manage Client/Projects <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
     <!-- Small Box (Stat card) -->
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="far fa-chart-bar"></i>
                jQuery Knob
              </h4>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                    class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knob" value="15" data-width="90" data-height="90" data-fgColor="#3c8dbc">

                      <div class="knob-label">New Visitors</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knob" value="70" data-width="90" data-height="90" data-fgColor="#f56954">

                      <div class="knob-label">Bounce Rate</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knob" value="-80" data-min="-150" data-max="150" data-width="90"
                            data-height="90" data-fgColor="#00a65a">

                      <div class="knob-label">Server Load</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 col-md-3 text-center">
                      <input type="text" class="knob" value="40" data-width="90" data-height="90" data-fgColor="#00c0ef">

                      <div class="knob-label">Disk Space</div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->

                  <div class="row">
                    <div class="col-6 text-center">
                      <input type="text" class="knob" value="90" data-width="90" data-height="90" data-fgColor="#932ab6">

                      <div class="knob-label">Bandwidth</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 text-center">
                      <input type="text" class="knob" value="50" data-width="90" data-height="90" data-fgColor="#39CCCC">

                      <div class="knob-label">CPU</div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-6">
                 <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h4 class="card-title">Direct Chat</h4>

                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                          data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Working with AdminLTE on a great new app! Wanna join?
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      I would love to.
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
            </div> <!--end col-->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-0">
                    <h4 class="card-title">Products</h4>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Sales</th>
                        <th>More</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Some Product
                        </td>
                        <td>$13 USD</td>
                        <td>
                          <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            12%
                          </small>
                          12,000 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Another Product
                        </td>
                        <td>$29 USD</td>
                        <td>
                          <small class="text-warning mr-1">
                            <i class="fas fa-arrow-down"></i>
                            0.5%
                          </small>
                          123,234 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Amazing Product
                        </td>
                        <td>$1,230 USD</td>
                        <td>
                          <small class="text-danger mr-1">
                            <i class="fas fa-arrow-down"></i>
                            3%
                          </small>
                          198 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Perfect Item
                          <span class="badge bg-danger">NEW</span>
                        </td>
                        <td>$199 USD</td>
                        <td>
                          <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            63%
                          </small>
                          87 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
              </div><!--end col-6-->

          </div>


           



       <div class="small_card_detailes">
        <div class="row">
          <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-darkyellow">
              <div class="inner">
                <h4> Attendance</h4>
                <p>0 Entries Last Week</p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a href="#" class="small-box-footer">
                Monitor Attendence <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- single card end here -->
          <!-- single card start here -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h4>Leave</h4>
                  <p>0 Upcoming</p>
                </div>
                <div class="icon">
                  <i class="ion ion-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Leave Management <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          <!-- single card end here -->
     
         <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-skyblue">
              <div class="inner">
                <h4>Reports</h4>

                <p>View / Download Reports</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="#" class="small-box-footer">
                Generate a Report<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card end here -->
         <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Settings</h4>

                <p>Configure IceHrm</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                ion ion-settings<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here -->  
         <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Active Jobs</h4>
                <p>0 Jobs Posted</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage Jobs<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here -->  
         <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-darkyellow">
              <div class="inner">
                <h4>Training</h4>
                <p>2 Courses</p>
              </div>
              <div class="icon">
                <i class="ion ion-nuclear"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage Training<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here -->  
         <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>Travel</h4>
                <p>Requests</p>
              </div>
              <div class="icon">
                <i class="ion ion-plane"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage Travel<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here -->  
         
         <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Document</h4>
                <p>management</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage Document<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here -->  
          <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Permissioin</h4>
                <p>Management</p>
              </div>
              <div class="icon">
                <i class="ion ion-locked"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage Permission<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here --> 

          <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Billing</h4>
                <p>and Invoice</p>
              </div>
              <div class="icon">
                <i class="ion ion-battery-charging"></i>
              </div>
              <a href="#" class="small-box-footer">
                Make a Payment<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here --> 

          <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-skyblue">
              <div class="inner">
                <h4>HR Form</h4>
                <p>management</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage forms<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here --> 
          <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-darkyellow">
              <div class="inner">
                <h4>Performance</h4>
                <p>Review</p>
              </div>
              <div class="icon">
                <i class="fa fa-crosshairs"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage Review<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here --> 
         
          <!-- single card start here -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-skyblue">
              <div class="inner">
                <h4>Expense</h4>
                <p>Management</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a href="#" class="small-box-footer">
                Manage Expences<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <!-- single card start here --> 

        </div>
       </div>
          
      <!-- /.container-fluid -->

      
    </section>
    <!-- /.content -->
    <?php include("right-sidebar.php"); ?> 
     <!-- footer -->
     <?php include("footer.php"); ?> 
     <!-- ./ footer -->
  </div>
  <!-- /.content-wrapper -->


    <!-- Control sidebar content goes here -->
  </div>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->

<?php include("bottom-js.php"); ?> 

</body>
</html>
