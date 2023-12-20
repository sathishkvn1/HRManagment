<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Company Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <?php include("top-css.php"); ?> 


</head>
<body class="hold-transition sidebar-mini layout-fixed brq-payroll company-structure">
   <div class="wrapper">
      <!-- Navbar -->
      <?php include("top-nav.php"); ?> 
      <!-- /.navbar -->
      
      <?php include("left-sidebar.php"); ?> 
      <!-- Content Wrapper. Contains page content -->

    <!-- MAIN  CODE  -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <div class="content-header py-2 px-4">
            <div class="combination_datatable" id="company_strucure">
              <!-- tab start here -->
              <ul class="nav nav-tabs">
                  <?php 
                    $is_first='yes';
                  foreach($tab as $tab_item):
                    if($is_first=='yes')
                        $class='active';
                    else
                        $class='';
                    if($tab_item->sub_menu_tab=='Company')
                    {
                        $company_add= $tab_item->is_add_new;
                        $company_edit= $tab_item->is_edit;
                        $company_view= $tab_item->is_view;
                        $company_delete= $tab_item->is_delete;
                        $aria_controls ="company_structure";
                        $tab_id='';
                    }
                    else if($tab_item->sub_menu_tab=='Branch')
                    {
                        $branch_add=$tab_item->is_add_new;
                        $branch_edit=$tab_item->is_edit;
                        $branch_view=$tab_item->is_view;
                        $branch_delete=$tab_item->is_delete;
                        $aria_controls ="";
                        $tab_id='company_address_tab_link';
                    }
                    else
                    {
                        $department_add=$tab_item->is_add_new;
                        $department_edit=$tab_item->is_edit;
                        $department_view=$tab_item->is_view;
                        $department_delete=$tab_item->is_delete;
                        $aria_controls ="company_department";
                        $tab_id='company_department_tab_link';
                    }
                  ?>
                  <li class="nav-item">
                     
                  <a class="nav-link <?php echo $class; ?>" id="<?php echo $tab_id;?>"  data-toggle="tab" href="<?php echo $tab_item->page_link ; ?>" aria-controls="<?php echo $aria_controls;?>"   role="tab"  aria-selected="true"><?php echo $tab_item->sub_menu_tab ;?></a>
                 
                </li>
                <?php 
                $is_first='no';
                endforeach;
                ?>  
                  
              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1 (COMPANY STRUCTURE)  ------ -->
                   <div class="tab-pane fade show active" id="company_structure_tab" role="tabpanel" aria-labelledby="home-tab">
                      <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                          <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                  <?php 
                                //   print_r($tab);
                                //   foreach($tab as $tab1):
                                //       if($tab1->sub_menu_tab=='Company'):
                                //       if($tab1->is_add_new=='yes'):
                                          
                                  if($company_add=='yes'):

                                  ?>
                                <button id="company_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                <?php 
                                    // endif;
                                    endif;
                                    // endforeach;
                                ?>  
                              </div>           
                          </div>
                        </div>
                        <!-- --- ./discription ---- -->
        
                      <!--for loading CompanyStructure DataTable -->
                        <table id="company_data_table" class="table table-striped" style="width: -webkit-fill-available !important; ">
                          <thead>
                              <tr>
                                  <th>Company Name</th>
                                  <th>Company Profile</th>
                                  <th>Branch Name</th>
                                  <th>Address</th>
                                  
                                  <th style="width:200px;text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Your Company</td>
                                  <td>PO Box 001002 Sample Road, Sample Town</td>
                                  <td>Head Office</td>
                                  <td>United States</td>
                                 
                                  <td class="operations">
                                    <a href="#" class="edit"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="#" class="view"><i class="fas fa-eye"></i>View</a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i>Delete</a>
                                   
                                  </td>
                                  
                              </tr>
                             
                           
                          </tbody>
                        </table>
                         <!-- ./ for loading CompanyStructure DataTable -->
                   </div>
                <!-- ./tab1 (COMPANY STRUCTURE) --- -->

           <!--tab 2 (COMPANY DEPARTMENT)  ------ -->
              <div class="tab-pane fade" id="company_department_tab" role="tabpanel" aria-labelledby="profile-tab">
                 <!-- --- discription ---- -->
                 <div id="company_structure_table_top" class="reviewBlock">
                  <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                  <?php 
                                    if($department_add=='yes'):
                                  ?>
                                <button id="company_department_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                <?php 
                                    endif;
                                ?>
                              </div>           
                        </div>
                </div>
                <!-- --- ./discription ---- -->


              <!-- table  -->
                <table id="company_department" class="table table-striped">
                  <thead>
                      <tr>
                          <th>Department Name</th>
                        
                          <th style="width:200px;text-align: center;">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Your Company</td>
                          
                          <td>
                            <div class="operations">
                              <a href="#" class="edit"><i class="fas fa-edit"></i>Edit</a>
                              <a href="#" class="view"><i class="fas fa-eye"></i>View</a>
                              <a href="#" class="delete"><i class="fas fa-trash"></i>Delete</a>
                              <a href="#" class="copy"><i class="fas fa-copy"></i>Copy</a>
                           </div>
                          </td>
                          
                      </tr>
                  </tbody>
                </table>
                 <!-- ./ table start -->
                </div>

                          <!--tab 3 (address)  ------ -->
              <div class="tab-pane fade" id="company_address_tab" role="tabpanel" aria-labelledby="profile-tab">
                 <!-- --- discription ---- -->
                 <div id="company_structure_table_top" class="reviewBlock">
                  <div class="combined_buttons">
                      <div class="add_new_btn_div">
                          <?php 
                          if($branch_add=='yes'):
                          ?>
                        <button id="company_address_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                      <?php 
                        endif;
                      ?>
                      </div>           
                  </div>
                </div>
                <!-- --- ./discription ---- -->


              <!-- table  -->
                <table id="company_address_data_table" class="table table-striped">
                  <thead>
                      <tr>
                      
                       <th>Branch Name</th>
                        <th>Address</th>
    
                        
                          <th style="width:200px;text-align: center;">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                      <td>Your Company</td>
                        <td>PO Box 001002 Sample Road, Sample Town</td>
                       
                          <td>
                            <div class="operations">
                              <a href="#" class="edit"><i class="fas fa-edit"></i>Edit</a>
                              <a href="#" class="view"><i class="fas fa-eye"></i>View</a>
                              <a href="#" class="delete"><i class="fas fa-trash"></i>Delete</a>
                              <a href="#" class="copy"><i class="fas fa-copy"></i>Copy</a>
                           </div>
                          </td>
                          
                      </tr>
                  </tbody>
                </table>
                 <!-- ./ table start -->
                </div>

              </div>

             
            </div>
            <!-- end combination data table section -->
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        <!-- /.content-header -->
      </div>
     <!-- /. MAIN CODE content-wrapper -->

   
    
     <?php include("right-sidebar.php"); ?> 
    
     
<div class="common_hidden_fields" style="text-align: end;">
    <input type="hidden" id="flag_id" value="0" >
     <input type="hidden" id="row_id" value="0" >
</div>


<!-- footer -->
<?php include("footer.php"); ?> 
    
    <!-- ./ footer -->
    <!-- modal FOR company structure -->

     <div class="modal fade data-table-modal" id="company_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Company </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="modal_form" id="company_modal_form">
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label">Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="company_name" name="company_name">
                    </div>
                  </div>
                <!-- ./ one field ---- -->
                <!--one field  textarea---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Details</label>
                    </div>
                    <div class="col-8">
                    <textarea class="form-control" id="company_profiles" name="company_profiles"></textarea>
                    </div>
                  </div>
                <!-- ./ one field ---- -->
                 <!--one field  text field---- -->
                 <!-- <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label">Branch Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="company_branch_name" name="company_branch_name">
                    </div>
                  </div> -->
                <!-- ./ one field ---- -->

                <!--one field ---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Address</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="company_address_line1" name="company_address_line1" style="height:35px;margin-bottom:10px"></input>
                      <input type="text" class="form-control" id="company_address_line2" name="company_address_line2" style="height:35px;margin-bottom:10px"></input>
                      <input type="text" class="form-control" id="company_address_line3" name="company_address_line3" style="height:35px;margin-bottom:10px" ></input>
                      <input type="text" class="form-control" id="company_address_line4" name="company_address_line4" style="height:35px;margin-bottom:10px"></input>
                    </div>
                  </div>

              <!-- one field Select2 Box-->
              <div class="form-group row">
                <div class="col-3">
                  <label for="message-text" class="col-form-label">Country</label>
                </div>
                <div class="col-8">
                  <select class="form-control select2" id="company_country_id" name="company_country_id" style="width: 100%;">
                    <!-- <option>sample1</option>
                    <option>sample2</option>
                    <option>demo3</option> -->
                    <?php
                        if (isset($country)):
                                                   
                          foreach ($country as $row):
                           $name = $row->country_name;
                            $id = $row->id; 
                     ?>  
                     <option value="<?php echo $id; ?>" 
                       ><?php echo $name; ?>
                    </option>
                    <?php
                    endforeach;
                     endif;
                  ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3">
                  <label for="message-text" class="col-form-label">State</label>
                </div>
                <div class="col-8">
                  <select class="form-control select2" id="company_state_province_id" name="company_state_province_id" style="width: 100%;">

                    <?php
                                                if (isset($states)):
                                                   
                                                    foreach ($states as $row):
                                                        $name = $row->state_name;
                                                        $id = $row->id;
                                                     
                                                       
                                                        ?>
                                                      
                                                         
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                  </select>
                </div>
              </div>
            <!-- ./ one field ---- -->

             
            

            <!--one field  multiple select ---- -->
            <div class="form-group row">
              <div class="col-3">
                <label for="recipient-name" class="col-form-label">Heads</label>
              </div>
              <div class="col-8 select2-common">
                
               
                <select class="form-control select2" id="company_branch_head_id" name="company_branch_head_id">
                  <!-- <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option> -->
                </select>
              </div>
             
            </div>
          <!-- ./ one field ---- -->     
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="btn_company_cancel" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_company_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 <!--. / modal FOR company structure -->



<!-- modal for company department -->
      <div class="modal fade data-table-modal" id="company_department_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Departments</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="modal_form" id="department_form">
                    <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Branch Name:</label>
                      </div>
                      <div class="col-8">
                        <select class="form-control select2" id="branch_id_company" name="branch_id_company">
                        </select>                         
                      </div>
                    </div>
                   
                  <div class="form-group row">                              
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label">Department Name:</label>
                    </div>
                    
                    <div class="col-8">
                      <input type="text" class="form-control" id="department_name" name="department_name">
                    </div>
                    
                  </div>
                <!-- ./ one field ---- -->                              

            
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="btn_department_cancel" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="save_dept_btn"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<!-- /.modal for addresss-->
<div class="modal fade data-table-modal" id="company_address_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Address</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="modal_form" id="address_form">
                  <!--one field  text field---- -->
                  <div class="form-group row">
                    
                    <div class="col-8">
                      <input type="hidden" class="form-control" id="branch_id_hidden_field" name="branch_id_hidden_field">
                    </div>
                  </div>
                <!-- ./ one field ---- -->
               
           
                 <!--one field  text field---- -->
                 <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label">Branch Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="branch_name" name="branch_name">
                    </div>
                  </div>
                <!-- ./ one field ---- -->

                <!--one field ---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label">Address</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="address_line1" name="address_line1" style="height:35px;margin-bottom:10px"></input>
                      <input type="text" class="form-control" id="address_line2" name="address_line2" style="height:35px;margin-bottom:10px"></input>
                      <input type="text" class="form-control" id="address_line3" name="address_line3" style="height:35px;margin-bottom:10px" ></input>
                      <input type="text"  class="form-control" id="address_line4" name="address_line4" style="height:35px;margin-bottom:10px"></input>
                    </div>
                  </div>

              <!-- one field Select2 Box-->
              <div class="form-group row">
                <div class="col-3">
                  <label for="message-text" class="col-form-label">Country</label>
                </div>
                <div class="col-8">
                  <select class="form-control select2" id="country_id" name="country_id" style="width: 100%;">
                    <!-- <option>sample1</option>
                    <option>sample2</option>
                    <option>demo3</option> -->
                    <?php
                        if (isset($country)):
                                                   
                          foreach ($country as $row):
                           $name = $row->country_name;
                            $id = $row->id; 
                     ?>  
                     <option value="<?php echo $id; ?>" 
                       ><?php echo $name; ?>
                    </option>
                    <?php
                    endforeach;
                     endif;
                  ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3">
                  <label for="message-text" class="col-form-label">State:</label>
                </div>
                <div class="col-8">
                  <select class="form-control select2" id="state_province_id" name="state_province_id" style="width: 100%;">

                    <?php
                                                if (isset($states)):
                                                   
                                                    foreach ($states as $row):
                                                        $name = $row->state_name;
                                                        $id = $row->id;
                                                     
                                                       
                                                        ?>
                                                      
                                                         
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                  </select>
                </div>
              </div>
            <!-- ./ one field ---- -->

             
            

            <!--one field  multiple select ---- -->
            <div class="form-group row">
              <div class="col-3">
                <label for="recipient-name" class="col-form-label">Heads</label>
              </div>
              <div class="col-8 ">
                <!-- <select class="select2 form-control" multiple="multiple" data-placeholder="Select a State" id="branch_head_id" name="branch_head_id" style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select> -->

                <select class="form-control select2" id="branch_head_id" name="branch_head_id">
                                      
                        </select>   
              </div>
            
            </div>
          <!-- ./ one field ---- -->     
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="btn_address_cancel" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_address_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 <!--. / modal FOR company structure -->
 
</div> 


<!-- ./wrapper -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<?php include("bottom-js.php");?> 
</body>
</html>

<script>


    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";
   
  
    $(document).ready( function () {
      

      loadDataTableForCompany();
      fetchEmployeeNamesForCompany();
      
    }); //document.ready

 var companyDepartmentTable = null; 
 var companyAddressTable = null;

$(document).ready(function() {


  fetchBranches();
  
    $('#company_department_tab_link').on('click', function() {
    
        if (companyDepartmentTable === null) {
         
            companyDepartmentTable = loadDataTableForDepartment();
        }
    });

    $('#company_address_tab_link').on('click', function() {
  
        if (companyAddressTable) {
            companyAddressTable.destroy();
        }
        companyAddressTable = loadDataTableForAddress();
    });

});



// for company save
$('#company_modal_form').validate({
  rules: {
                  company_name: {
                        required: true,
                    },
                    company_profiles: {
                        required: true,
                    },
                    // company_branch_name: {
                    //     required: true,
                    // },
                    company_address_line1: {
                        required: true,
                    },

                },
                messages: {
                  company_name: "Please enter a Company name",
                  company_profiles: "Please enter the company details",
                  // company_branch_name:"Please enter the branch name",
                  company_address_line1:"Please enter the address",
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

 
$("#btn_company_save").click (function(){

  if ($('#company_modal_form').valid()) {
          var formData  = new FormData();
               formData.append('company_name', $("#company_name").val()); 
               formData.append('company_profile', $("#company_profiles").val());
              //  formData.append('branch_name', $("#company_branch_name").val()); 
               formData.append('address_line1', $("#company_address_line1").val()); 
               formData.append('address_line2', $("#company_address_line2").val()); 
               formData.append('address_line3', $("#company_address_line3").val()); 
               formData.append('address_line4', $("#company_address_line4").val());
               formData.append('state_province_id', $("#company_state_province_id").val()); 
               formData.append('country_id', $("#company_country_id").val()); 
               formData.append('branch_head_id', $("#company_branch_head_id").val()); 
               formData.append('flag_id', $("#flag_id").val()); 
               formData.append('row_id', $("#row_id").val()); 
               formData.append('branch_id_hidden_field', $("#branch_id_hidden_field").val()); 

              
               formData.append('li_token', token); 
          $.ajax({
              url: BASE_URL + "index.php/" + hrController + "/save_company_details",
              type: 'POST',
              data:  formData,
              dataType: "JSON",
              processData: false,
              contentType: false,
              success: function(response) {
                console.log("response",response);
             
                $('#company_data_table_modal').modal('hide');
                $('#company_data_table').DataTable().ajax.reload();
                showToast('success', response.message);
              },
              error: function(xhr, status, error) {
                  console.log(xhr.responseText);
                  console.log(status);
                  console.log(error);
              }
          });
     }
}); 

// for loading the company
// function loadDataTableForCompany(){
   
//    $('#company_data_table').DataTable({
   
//    "ajax": {
//        "url": BASE_URL + "index.php/" +  hrController + "/get_compamny_structure_details",
//        "dataSrc": "data"
//    },
//    "columns": [
//        { data: "company_name" },
//        { data: "company_profile" },
//        { data: "branch_name" },
//        { data: "address_line1" },

//        {
//            data: "company_id",
//            render: function (data, type, row) {
//                return `
//                   <div class="operations"> 
                   
//                     <a href="#" class="edit" onclick="editCompany('${row.id}', '${data}');">
//                     <i class="fas fa-edit"></i>Edit
                    
//                     <a href="#" class="view" onclick="viewCompany('${data}');"><i class="fas fa-eye" ></i>View</a>

//                     <a href="#" class="delete" onclick="deleteCompany('${data}');"><i class="fas fa-trash" ></i>Delete</a>
//                    </div>`;
            
//            }
//        }
//    ],
//    "createdRow": function(row, data, dataIndex)
//      {

//            $(row).addClass("clickable-row");
//      },
//      "initComplete": function(settings, json) {
//        customizeDataTable('company_data_table');
//    }

// });
//  }


function loadDataTableForCompany(){
   
   $('#company_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_compamny_structure_details",
       "dataSrc": "data"
   },
   "columns": [
       { data: "company_name" },
       { data: "company_profile" },
       { data: "branch_name" },
       { data: "address_line1" },

       {
          data: null,
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                   <?php if($company_edit=='yes'): ?>
                  <a href="#" class="edit" onclick="editCompany('${row.company_id}','${row.branch_id}');"><i class="fas fa-edit"></i>Edit</a>
                
                  <?php endif;
                  if($company_view=='yes'): ?>
                    <a href="#" class="view" onclick="viewCompany('${row.company_id}','${row.branch_id}');"><i class="fas fa-edit"></i>View</a>
                    <?php endif;
                  if($company_delete=='yes'): ?> 

                  <a href="#" class="delete" onclick="deleteCompany('${row.company_id}', '${row.branch_id}');"><i class="fas fa-trash"></i>Delete</a>
                    <?php endif; ?>
                   </div>`;
            
           }
       }
   ],

   "createdRow": function(row, data, dataIndex)
     {

           $(row).addClass("clickable-row");
     },
     "initComplete": function(settings, json) {
       customizeDataTable('company_data_table');
   }

});
 }

 $("#company_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#company_data_table_modal";
    $(modalId).modal("show");

    // Clear text fields
    $(modalId + ' input[type="text"]').val('');
    // Reset select2 dropdowns
    $(modalId + ' select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
    });
});

 function fetchEmployeeNamesForCompany() {
  

$.ajax({
    url: BASE_URL + "index.php/" + hrController + "/get_employee_firstname_lastname",
    type: 'GET', 
    dataType: 'json',
    success: function(data) {
      console.log(data);
       
        var dropdown = $('#company_branch_head_id');
       
        
        
         dropdown.empty();
         
        
        $.each(data.employee_names, function(index, employee) {
            dropdown.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
           
        });
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
        console.error(status);
        console.error(error);
    }
});
}


// for viewing the company
function viewCompany(rowId,branchId) {
  
    $("#row_id").val(row_id);
    $("#branch_id_hidden_field").val(branchId);
 flag_id=$("#flag_id").val("1");
    $('#company_data_table_modal').modal('show');
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_company_details_by_id",
        data: {row_id:rowId,branch_id:branchId, li_token: token},
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                console.log(response);
                console.log(response.data.state_name);
               
                $("#company_name").val(response.data.company_name);
                $("#company_profiles").val(response.data.company_profile);
                // $("#company_branch_name").val(response.data.branch_name);
                $("#company_address_line1").val(response.data.address_line1);
                $("#company_address_line2").val(response.data.address_line2);
                $("#company_address_line3").val(response.data.address_line2);
                $("#company_address_line4").val(response.data.address_line4);
                $('#company_state_province_id + .select2 .select2-selection__rendered').text(response.data.state_name);
                $('#company_country_id + .select2 .select2-selection__rendered').text(response.data.country_name);
              

                var disable_data_company = $("#company_data_table_modal, #company_name, #company_profiles,#company_address_line1,#company_address_line2,#company_address_line3,#company_address_line4,.select2");
                disable_data_company.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                $(".modal-footer .savebtn").hide();
                
                $("#company_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data_company.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
                
              

              
            } else {
                console.error('Response does not contain department_name.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

// fr editing the company
function editCompany(rowId, branchId) {
  console.log("Company ID:", rowId);
    console.log("Branch ID:", branchId);
    
 $('#company_data_table_modal').modal('show');
 $("#branch_id_hidden_field").val(branchId);
 $("#row_id").val(rowId);
 flag_id=$("#flag_id").val("1");

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_company_details_by_id",
     type: "GET",
     data: { row_id:rowId,branch_id:branchId, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
            $('#company_data_table_modal').modal('show');
                $("#company_name").val(response.data.company_name);
                $("#company_profiles").val(response.data.company_profile);
                $("#company_address_line1").val(response.data.address_line1);
                $("#company_address_line2").val(response.data.address_line2);
                $("#company_address_line3").val(response.data.address_line2);
                $("#company_address_line4").val(response.data.address_line4);
                $("#company_state_province_id").val(response.data.state_province_id);
                $("#company_country_id").val(response.data.country_id);
                $("#company_branch_head_id").val(response.data.branch_head_id);
                $('#company_state_province_id + .select2 .select2-selection__rendered').text(response.data.state_name);
                $('#company_country_id + .select2 .select2-selection__rendered').text(response.data.country_name);

           
             $("#company_name").focus();

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}

function deleteCompany(rowId, branchId) {
  console.log("Company ID:", rowId);
    console.log("Branch ID:", branchId);

    if (confirm("Are you sure you want to delete this company?")) {
        $.ajax({
            type: 'POST',
            url: BASE_URL + "index.php/" + hrController + "/delete_company_by_id",
            data: {row_id:rowId,branch_id:branchId, li_token: token },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                  showToast('success', response.message); 
                    
                    $('#company_data_table').DataTable().ajax.reload();
                } else {
                    alert("Error deleting department.");
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
            }
        });
    }
}


$('#department_form').validate({
                rules: {
                  department_name: {
                        required: true,
                    },
              
                },
                messages: {
                  department_name: "Please enter the department_name"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

$("#save_dept_btn").click (function(){
      
  if ($('#department_form').valid()) {
              var formData  = new FormData();
               formData.append('department_name', $("#department_name").val()); 
               formData.append('branch_id', $("#branch_id_company").val()); 
               formData.append('flag_id', $("#flag_id").val()); 
               formData.append('row_id', $("#row_id").val()); 
               formData.append('li_token', token); 
               $.ajax({
                  url: BASE_URL + "index.php/" + hrController + "/save_department_details",
                  type: 'POST',
                  data:  formData,
                  dataType: "JSON",
                  processData: false,
                  contentType: false,
                  success: function(response) {
                    console.log("response",response);
                    showToast('success', response.message);
                    $('#company_department_modal').modal('hide');
                    $('#company_department').DataTable().ajax.reload();
                    $('.modal_form')[0].reset();
                   
                    
                  },
                  error: function(xhr, status, error) {
                      console.log(xhr.responseText);
                      console.log(status);
                      console.log(error);
                  }
              });
                      }

}); //btn_company_save


//save for addresssing saving


        // validation code
              $('#address_form').validate({
                rules: {
                  branch_name: {
                        required: true,
                    },
                  address_line1: {
                        required: true,
                    },
                   

                },
                messages: {
                  branch_name: "Please enter Employment Status",
                  address_line1: "Please enter a adress "
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        // ./ validation code    

    $("#btn_address_save").click (function(){
      if ($('#address_form').valid()) {
                  var formData  = new FormData();
                  formData.append('branch_name', $("#branch_name").val()); 
                  formData.append('address_line1', $("#address_line1").val()); 
                  formData.append('address_line2', $("#address_line2").val()); 
                  formData.append('address_line3', $("#address_line3").val()); 
                  formData.append('address_line4', $("#address_line4").val());
                  formData.append('state_province_id', $("#state_province_id").val()); 
                  formData.append('country_id', $("#country_id").val()); 
                  formData.append('branch_head_id', $("#branch_head_id").val()); 
                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
          $.ajax({
              url: BASE_URL + "index.php/" + hrController + "/save_address_details",
              type: 'POST',
              data:  formData,
              dataType: "JSON",
              processData: false,
              contentType: false,
              success: function(response) {
                console.log("response",response);
                 showToast("success",response.message)
                 
                $('#_modal').modal('hide');
                // $('#company_address_data_table').DataTable().ajax.reload();
                  console.log("response",response);
                  console.log(response.message);
                  $('#company_address_data_table_modal').modal('hide');
                  $('#company_address_data_table').DataTable().ajax.reload();
                  showToast('success', response.message);  

              },
              error: function(xhr, status, error) {
                  console.log(xhr.responseText);
                  console.log(status);
                  console.log(error);
              }
          });  
        }   
    }); 
//btn_company_save














function loadDataTableForDepartment(){


    $('#company_department').DataTable({
    
    "ajax": {
        "url": BASE_URL + "index.php/" +  hrController + "/get_department_details",
        "dataSrc": "data"
    },
    "columns": [
        { data: "department_name" },
        
        {
            data: "id",
            render: function (data, type, row) {
            return `
                    <div class="operations"> 
                     <?php if($department_edit=='yes'): ?>
                      <a href="#" class="edit"  onclick="editDepartment('${data}');"><i class="fas fa-edit"></i>Edit</a>
                      <?php endif;
                      if($department_view=='yes'):
                      ?>
                      <a href="#" class="view" onclick="viewDepartment('${data}');"><i class="fas fa-eye" ></i>View</a>
                      <?php endif;
                      if($department_delete=='yes'):
                      ?>
                      <a href="#" class="delete" onclick="deleteDepartment('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                      <?php endif;?>
                    </div>`;
            }
        }
    ],
    "createdRow": function(row, data, dataIndex)
      {

          //  $(row).addClass("clickable-row");
      },
      "initComplete": function(settings, json) {
        customizeDataTable('company_department');
        fetchBranches();
    }

  });
}

$("#company_department_add_new").on("click", function() {
  
    $("#flag_id").val("0");

    var modalId = "#company_department_modal";
    $(modalId).modal("show");

    // Clear text fields
    $(modalId + ' input[type="text"]').val('');
    // Reset select2 dropdowns
    $(modalId + ' select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
    });
});

function viewDepartment(id) {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_department_by_id",
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            if (response && response.department_name) {
                console.log(response);
                $('#company_department_modal').modal('show');
                $("#department_name").val(response.department_name);
                var disable_data = $("#department_name,#branch_id_company");
                disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                $(".modal-footer .savebtn").hide();
                $("#company_department_modal").on("hidden.bs.modal", function () 
                    {
                        $(".modal-footer .savebtn").show();
                        disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                    });
                
               
            } else {
                console.error('Response does not contain department_name.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

function deleteDepartment(id) {
    if (confirm("Are you sure you want to delete this department?")) {
        $.ajax({
            type: 'POST',
            url: BASE_URL + "index.php/" + hrController + "/delete_department_by_id",
            data: { id: id, li_token: token },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                     showToast('success', response.message); 
                    
                    $('#company_department').DataTable().ajax.reload();
                } else {
                    alert("Error deleting department.");
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
            }
        });
    }
}

function editDepartment(id) {
 
   $('#company_department_modal').modal('show');
   $("#row_id").val(id);
    flag_id=$("#flag_id").val("1");

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_department_details_by_id",
       type: "POST",
       data: { id: id, li_token: token,flag_id: $("#flag_id").val() },
       dataType: "json",
       success: function (response) {
            console.log("response is" ,response);
           if (response.success) {
               $('#company_department_modal').modal('show');
               $("#branch_id_company").val(response.data.branch_id).trigger('change');
               $("#department_name").val(response.data.department_name);
               $("#branch_id_company").focus();
  
           } else {
               alert("Failed.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error in fetching .");
       }
   });
 }

 function loadDataTableForAddress()
{
  
   $('#company_address_data_table').DataTable().destroy(); 
  $('#company_address_data_table').DataTable({
    
    "ajax": {
        "url": BASE_URL + "index.php/" +  hrController + "/get_address_details",
        "dataSrc": "data"
    },
    "columns": [
      { data: "branch_name" },
      { data: "address_line1" },
        
        {
            data: "id",
            render: function (data, type, row) {
            return `
                     <div class="operations"> 
                    <?php  if($branch_edit=='yes'):
                      ?>
                      <a href="#" class="edit" onclick="editAddress('${data}');"><i class="fas fa-edit" ></i>Edit</a>
                      <?php endif;
                      if($branch_view=='yes'):
                      ?>
                      <a href="#" class="view" onclick="viewAddress('${data}');"><i class="fas fa-eye" ></i>View</a>
                      <?php endif;
                      if($branch_delete=='yes'):
                      ?>
                      <a href="#" class="delete" onclick="deleteAddress('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                      <?php endif;?>
                    </div>`;
            }
        }
    ],
    "createdRow": function(row, data, dataIndex)
      {

          //  $(row).addClass("clickable-row");
      },
      "initComplete": function(settings, json) {
        customizeDataTable('company_address_data_table');
    }

  });
}

$("#company_address_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#company_address_data_table_modal";
    $(modalId).modal("show");

    // Clear text fields
    $(modalId + ' input[type="text"]').val('');
    // Reset select2 dropdowns
    $(modalId + ' select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
    });
});


function viewAddress(row_id) {
    $("#company_address_data_table_modal").modal("show");
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_address_details_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
        console.log("response in address is",response);
           if (response.success) {
             $("#company_address_data_table_modal").modal("show");
               $("#branch_name").val(response.data.branch_name);
               $("#address_line1").val(response.data.address_line1);
               $("#address_line2").val(response.data.address_line2);
               $("#address_line3").val(response.data.address_line3);
               $("#address_line4").val(response.data.address_line4);
               $('#country_id + .select2 .select2-selection__rendered').text(response.data.country_name);
               $('#state_province_id + .select2 .select2-selection__rendered').text(response.data.state_name);
               var disable_data = $("#branch_name, #address_line1,#address_line2,#address_line3,#address_line4,.select2");
               disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#company_address_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
           } else {
               alert("Failed to fetch job title details.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching job title details.");
       }
   });
}

function deleteAddress(row_id){
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_address_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {

                $('#company_address_data_table_modal').modal('hide');
                showToast('success', response.message); 
                 $('#company_address_data_table').DataTable().ajax.reload();
                 fetchBranches();
                  
                  // alert(response.message);
            },
            error: function (xhr, status, error) {
                
                // alert_message("failure", "Error", "Error delete job title item.");
            }
        });
    }
}


function editAddress(row_id) {
  alert(row_id);
    $("#company_address_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_address_details_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response is" ,response);
           if (response.success) {
          
               $("#branch_name").val(response.data.branch_name);
               $("#address_line1").val(response.data.address_line1);
               $("#address_line2").val(response.data.address_line2);
               $("#address_line3").val(response.data.address_line3);
               $("#address_line4").val(response.data.address_line4);
               $('#country_id + .select2 .select2-selection__rendered').text(response.data.country_name);
               $('#state_province_id + .select2 .select2-selection__rendered').text(response.data.state_name);
               $("#company_address_data_table_modal").modal("show");
            
           } else {
               alert("Failed.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error in fetching.");
       }
   });
}

 $("#btn_company_cancel").on("click",function() {  
    $('.modal_form')[0].reset();

 })

 $("#btn_department_cancel").on("click",function() {  
    $('.modal_form')[0].reset();

 })

 $(document).ready( function () {
    $('#company_address_data_table').DataTable();

    customizeDataTable('company_address_data_table');

    
  });

  // Function to fetch branch data 
function fetchBranches() {
    $.ajax({
      url: BASE_URL + "index.php/" + hrController + "/get_branch_details",
        type: 'GET', 
        dataType: 'json',
        success: function (response) {
           
            $('#branch_id_company').empty();
            // branch_head_id
            $('#branch_id_company').html('<option value="">Select Branch</option>');
            $.each(response, function (index, branch) {

              $('#branch_id_company').append(
                    $('<option></option>').val(branch.id).text(branch.branch_name)
                );
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
            
        }
    });


  

}




 
</script>
<script>


</script>
