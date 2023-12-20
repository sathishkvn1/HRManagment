<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hr Management System</title>
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
                                if($tab_item->sub_menu_tab=='Skills')
                                {
                                    $skills_add= $tab_item->is_add_new;
                                     $skills_edit= $tab_item->is_edit;
                                     $skills_view= $tab_item->is_view;
                                     $skills_delete= $tab_item->is_delete;
                                    $tab_id='qualification_skills_tab_link';
                                }
                                else if($tab_item->sub_menu_tab=='Education')
                                {
                                    $education_add=$tab_item->is_add_new;
                                     $education_edit= $tab_item->is_edit;
                                     $education_view= $tab_item->is_view;
                                     $education_delete= $tab_item->is_delete;
                                    $tab_id='qualification_education_tab_link';
                                }
                                 else if($tab_item->sub_menu_tab=='Certification')
                                {
                                    $certificate_add=$tab_item->is_add_new;
                                    $certificate_edit= $tab_item->is_edit;
                                     $certificate_view= $tab_item->is_view;
                                     $certificate_delete= $tab_item->is_delete;
                                    $tab_id='qualification_certification_tab_link';
                                }
                                 else if($tab_item->sub_menu_tab=='Languages')
                                {
                                    $language_add=$tab_item->is_add_new;
                                     $language_edit= $tab_item->is_edit;
                                     $language_view= $tab_item->is_view;
                                     $language_delete= $tab_item->is_delete;
                                    $tab_id='qualification_languages_tab_link';
                                }
                                else
                                {
                                    $proficiency_add=$tab_item->is_add_new;
                                     $proficiency_edit= $tab_item->is_edit;
                                     $proficiency_view= $tab_item->is_view;
                                     $proficiency_delete= $tab_item->is_delete;
                                    $tab_id='qualification_languages_proficiency_tab_link';
                                }
                              ?>
                            <li class="nav-item">
                            <a class="nav-link <?php echo $class;?>" id="<?php echo $tab_id;?>" data-toggle="tab" href="<?php echo $tab_item->page_link ;?>" role="tab" aria-selected="false"><?php echo $tab_item->sub_menu_tab ;?></a>
                            </li>
                            
                             <?php 
                                $is_first='no';
                                endforeach;
                                ?> 
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link  active" id="qualification_skills_tab_link" data-toggle="tab" href="#qualification_skills_tab" aria-controls="company_department"  role="tab"  aria-selected="false">Skills</a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" id="qualification_education_tab_link" data-toggle="tab" href="#qualification_education_tab"   role="tab"  aria-selected="false">Education</a>-->
                    <!--</li>        -->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" id="qualification_certification_tab_link" data-toggle="tab" href="#qualification_certification_tab"   role="tab"  aria-selected="false">Certification</a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" id="qualification_languages_tab_link" data-toggle="tab" href="#qualification_languages_tab"   role="tab"  aria-selected="false">Languages</a>-->
                    <!--</li>  -->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" id="qualification_languages_proficiency_tab_link" data-toggle="tab" href="#languages_proficiency_tab"   role="tab"  aria-selected="false">Languages Proficiency</a>-->
                    <!--</li>         -->
                </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1 (COMPANY STRUCTURE)  ------ -->
                   <div class="tab-pane fade show active" id="qualification_skills_tab" role="tabpanel" aria-labelledby="home-tab">
                        <!----- discription ------>
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                   <?php 
                                        if($skills_add=='yes'):
                                    ?>
                                <button id="skills_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                <?php endif;?>
                              </div>           
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                         <!--for loading Skills DataTable -->
                         
                         <table id="skills_data_table" class="table table-striped" style="width: -webkit-fill-available !important; ">
                          <thead>
                                <tr>
                                    <th>Skill Name</th>
                                    <th>Description</th>
                                    <th style="width:200px;text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Your Company</td>
                                    <td>PO Box 001002 Sample Road, Sample Town</td>
                                    <td class="operations">
                                        <div class="edit"><i class="fas fa-edit"></i>Edit</div>
                                        <div class="view"><i class="fas fa-eye"></i>View</div>
                                        <div class="delete"><i class="fas fa-trash"></i>Delete</div>
                                    </td>
                                </tr>
                            </tbody>
                         </table>
                         <!-- ./ for loading Skills DataTable -->                      
                   </div>
                  <!-- ./tab1 (COMPANY STRUCTURE) --- -->
                    <!--tab 2 (Education)  ------ -->
                   <div class="tab-pane " id="qualification_education_tab" role="tabpanel" aria-labelledby="home-tab">
                      <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                   <?php 
                                        if($education_add=='yes'):
                                    ?>
                                <button id="education_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                              <?php endif;?>
                              </div>           
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                         <!--for loading Skills DataTable -->
                        <table id="education_data_table" class="table table-striped" style="width: -webkit-fill-available !important; ">
                          <thead>
                              <tr>
                                  <th>Education Name</th>
                                  <th>Description</th>
                                  <th style="width:200px;text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Your Company</td>
                                  <td>PO Box 001002 Sample Road, Sample Town</td>
                                  <td class="operations">
                                    <div class="edit"><i class="fas fa-edit"></i>Edit</div>
                                    <div class="view"><i class="fas fa-eye"></i>View</div>
                                    <div class="delete"><i class="fas fa-trash"></i>Delete</div>
                                  </td>
                              </tr>
                          </tbody>
                        </table>
                         <!-- ./ for loading CompanyStructure DataTable -->
                   </div>
                <!-- loading Skills DataTable --- -->
                <!--tab 3 (address)  ------ -->
              <div class="tab-pane fade" id="qualification_certification_tab" role="tabpanel" aria-labelledby="profile-tab">
                 <!-- --- discription ---- -->
                 <div id="company_structure_table_top" class="reviewBlock">
                      <div class="combined_buttons">
                            <div class="add_new_btn_div">
                                 <?php 
                                        if($certification_add=='yes'):
                                    ?>
                              <button id="certification_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                            <?php endif;?>
                            </div>           
                      </div>
                </div>
                <!-- --- ./discription ---- -->
              <!-- table  -->
                <table id="certification_data_table" class="table table-striped">
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
                              <div class="edit"><i class="fas fa-edit"></i>Edit</div>
                              <div class="view"><i class="fas fa-eye"></i>View</div>
                              <div class="delete"><i class="fas fa-trash"></i>Delete</div>
                              <div class="copy"><i class="fas fa-copy"></i>Copy</div>
                           </div>
                          </td>
                      </tr>
                  </tbody>
                </table>
                 <!-- ./ table start -->
                </div>

                   <!--tab 4 (languages)  ------ -->
              <div class="tab-pane fade" id="qualification_languages_tab" role="tabpanel" aria-labelledby="profile-tab">
                 <!-- --- discription ---- -->
                 <div id="company_structure_table_top" class="reviewBlock">
                 <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                   <?php 
                                        if($language_add=='yes'):
                                    ?>
                                <button id="languages_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                              <?php endif;?>
                              </div>           
                            </div>
                </div>
                <!-- --- ./discription ---- -->


              <!-- table  -->
                <table id="languages_data_table" class="table table-striped">
                  <thead>
                      <tr>
                      
                       <th>Language Name</th>
                        <th>Language Code</th>
                          <th style="width:200px;text-align: center;">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                      <td>Your Company</td>
                        <td>PO Box 001002 Sample Road, Sample Town</td>
                       
                          <td>
                            <div class="operations">
                              <div class="edit"><i class="fas fa-edit"></i>Edit</div>
                              <div class="view"><i class="fas fa-eye"></i>View</div>
                              <div class="delete"><i class="fas fa-trash"></i>Delete</div>
                              <div class="copy"><i class="fas fa-copy"></i>Copy</div>
                           </div>
                          </td>
                          
                      </tr>
                  </tbody>
                </table>
                 <!-- ./ table start -->
                </div>
                     <!--tab 5 (languages)  ------ -->
              <div class="tab-pane fade" id="languages_proficiency_tab" role="tabpanel" aria-labelledby="profile-tab">
                 <!-- --- discription ---- -->
                 <div id="company_structure_table_top" class="reviewBlock">
                    <div class="combined_buttons">
                      <div class="add_new_btn_div">
                           <?php 
                                        if($proficiency_add=='yes'):
                                    ?>
                        <button id="languages_proficiency_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                      <?php endif;?>
                      </div>           
                    </div>
                </div>
                <!-- --- ./discription ---- -->
              <!-- table  -->
                <table id="languages_proficiency_data_table" class="table table-striped">
                  <thead>
                      <tr>
                       <th>Language Proficiency</th>
                          <th style="width:200px;text-align: center;">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          
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

     <!-- modal FOR Skills -->

     


      <!-- modal for education-->
       <div class="modal fade data-table-modal" id="education_data_table_modal" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Education</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form class="modal_form" id="education_modal_form">
                    <!--one field  text field---- -->
                    <div class="form-group row">
                        <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        </div>
                        <div class="col-8">
                        <input type="text" class="form-control" id="education_name" name="education_name">
                        </div>
                    </div>
                    <!-- ./ one field ---- -->
                    <!--one field  textarea---- -->
                    <div class="form-group row">
                        <div class="col-3">
                        <label for="message-text" class="col-form-label">Description:</label>
                        </div>
                        <div class="col-8">
                        <textarea class="form-control" id="education_description" name="education_description"></textarea>
                        </div>
                    </div>
                    <!-- ./ one field ---- -->
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" id="btn_education_save"><i class="fas fa-calendar-check"></i>Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade data-table-modal" id="certification_data_table_modal" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Certification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form class="modal_form" id="certification_modal_form">
                    <!--one field  text field---- -->
                    <div class="form-group row">
                        <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        </div>
                        <div class="col-8">
                        <input type="text" class="form-control" id="certification_name" name="certification_name">
                        </div>
                    </div>
                    <!-- ./ one field ---- -->
                    <!--one field  textarea---- -->
                    <div class="form-group row">
                        <div class="col-3">
                        <label for="message-text" class="col-form-label">Description:</label>
                        </div>
                        <div class="col-8">
                        <textarea class="form-control" id="certification_description" name="certification_description"></textarea>
                        </div>
                    </div>
                    <!-- ./ one field ---- -->
                    
            
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" id="btn_certification_save"><i class="fas fa-calendar-check"></i>Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div> 
<!-- ./wrapper -->



   <!-- modal FOR Skills -->

                <div class="modal fade data-table-modal" id="skills_data_table_modal" data-bs-backdrop="static">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Skills</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="modal_form" id="skills_modal_form">
                          <!--one field  text field---- -->
                            <div class="form-group row">
                              <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                              </div>
                              <div class="col-8">
                                <input type="text" class="form-control" id="skill_name" name="skill_name">
                              </div>
                            </div>
                          <!-- ./ one field ---- -->
                          <!--one field  textarea---- -->
                            <div class="form-group row">
                              <div class="col-3">
                                <label for="message-text" class="col-form-label">Description:</label>
                              </div>
                              <div class="col-8">
                              <textarea class="form-control" id="skill_description" name="skill_description"></textarea>
                              </div>
                            </div>
                          <!-- ./ one field ---- -->
                          
                  
                        </form>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn savebtn" id="btn_skills_save"><i class="fas fa-calendar-check"></i>Save</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
             <!--. / modal FOR sskill -->


              <!-- modal FOR language -->

   <div class="modal fade data-table-modal" id="languages_data_table_modal" data-bs-backdrop="static">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Languages</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="modal_form" id="languages_modal_form">
                          <!--one field  text field---- -->
                            <div class="form-group row">
                              <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Language Name:</label>
                              </div>
                              <div class="col-8">
                                <input type="text" class="form-control" id="language_name" name="language_name">
                              </div>
                            </div>
                          <!-- ./ one field ---- -->
                          <!--one field  textarea---- -->
                            <div class="form-group row">
                              <div class="col-3">
                                <label for="message-text" class="col-form-label">Code:</label>
                              </div>
                              <div class="col-8">
                              <textarea class="form-control" id="language_code" name="language_code"></textarea>
                              </div>
                              
                            </div>
                          <!-- ./ one field ---- -->
                          
                  
                        </form>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn savebtn" id="btn_language_save"><i class="fas fa-calendar-check"></i>Save</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
             <!--. / modal FOR language -->

             
              <!-- modal FOR language proficiency -->

          <div class="modal fade data-table-modal" id="languages_proficiency_data_table_modal" data-bs-backdrop="static">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Languages Proficiency</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="modal_form" id="languages_proficiency_modal_form">
                          <!--one field  text field---- -->
                            <div class="form-group row">
                              <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Proficiency</label>
                              </div>
                              <div class="col-8">
                                <input type="text" class="form-control" id="language_proficiency" name="language_proficiency">
                              </div>
                            </div>
                          <!-- ./ one field ---- -->
                       
                          
                  
                        </form>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default cancelbtn" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn savebtn" id="btn_lang_proficiency_save"><i class="fas fa-calendar-check"></i>Save</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
             <!--. / modal FOR sskill -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<?php include("bottom-js.php"); ?> 
</body>
</html>

<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

$(document).ready( function () {
 
   loadDataTableForSkills();
 });


 $("#education_data_table_add_new").on("click", function() {  
  alert("hai");
   $('#education_data_table_modal').modal('show');
});






//  $('#qualification_education_tab_link').on('shown.bs.tab', function (e) {
//    if (!$.fn.DataTable.isDataTable('#education_data_table')) {
//     //    $('#education_data_table').DataTable();
//         loadDataTableForEducation();
//     //    customizeDataTable('education_data_table');
//    }
// });


// $('#qualification_certification_tab_link').on('shown.bs.tab', function (e) {
//     if (!$.fn.DataTable.isDataTable('#certification_data_table')) {
//         loadDataTableForCertification();
//    }
// });

// $('#qualification_languages_tab_link').on('shown.bs.tab', function (e) {
   
//     if (!$.fn.DataTable.isDataTable('#languages_data_table')) {
//         loadDataTableForLanguages();
//    }
// });



// $('#qualification_languages_proficiency_tab_link').on('shown.bs.tab', function (e) {
//     if (!$.fn.DataTable.isDataTable('#languages_proficiency_data_table')) {
//         loadDataTableForProficiency();
//    }
 
    
// });






// save skill
$('#skills_modal_form').validate({
  rules: {
                  skill_name: {
                        required: true,
                    },
                    skill_description: {
                        required: true,
                    }
                },
                messages: {
                  skill_name: "Please enter a skill name",
                  skill_description: "Please enter a skill description"
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


$("#btn_skills_save").click (function(){
  if ($('#skills_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('skill_name', $("#skill_name").val());
          formData.append('skill_description', $("#skill_description").val());  
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
         $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_skills_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);

              $('#skills_data_table_modal').modal('hide');
              $('#skills_data_table').DataTable().ajax.reload();
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

// ./save skill


//save education

$('#education_modal_form').validate({
  rules: {
          education_name: {
                              required: true,
                          },
      education_description: {
                              required: true,
                          }
                },
                messages: {
                  education_name: "Please enter a education name",
                  education_description: "Please enter a education description"
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

$("#btn_education_save").click (function(){
  if ($('#education_modal_form').valid()) {
      var formData  = new FormData();
                  formData.append('education_name', $("#education_name").val());
                  formData.append('education_description', $("#education_description").val());  
      
                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_education_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#education_data_table_modal').modal('hide');
                  $('#education_data_table').DataTable().ajax.reload();

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
     }
      
}); 

// ./ save education

//  save certificate
$('#certification_modal_form').validate({
  rules: {
            certification_name: {
                                      required: true,
                                  },
        certification_description: {
                                      required: true,
                                  }
                },
                messages: {
                  certification_name: "Please enter a certification name",
                  certification_description: "Please enter a certification description"
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
$("#btn_certification_save").click (function(){
  if ($('#certification_modal_form').valid()) {
    var formData  = new FormData();
                formData.append('certification_name', $("#certification_name").val());
                formData.append('certification_description', $("#certification_description").val());  
    
                formData.append('flag_id', $("#flag_id").val()); 
                formData.append('row_id', $("#row_id").val()); 
                formData.append('li_token', token); 
        
          $.ajax({
              url: BASE_URL + "index.php/" + hrController + "/save_certification_details",
              type: 'POST',
              data:  formData,
              dataType: "JSON",
              processData: false,
              contentType: false,
              success: function(response) {
                console.log("response in qualifi",response);
                showToast('success', response.message);
                $('#certification_data_table_modal').modal('hide');
                $('#certification_data_table').DataTable().ajax.reload();
              },
              error: function(xhr, status, error) {
                  console.log(xhr.responseText);
                  console.log(status);
                  console.log(error);
              }
          });
        }
}); 
//  ./ save certificate

// save language 
$('#languages_modal_form').validate({
  rules: {
                   language_name: {
                                      required: true,
                                  },
                  language_code: {
                                      required: true,
                                  }
                },
                messages: {
                  language_name: "Please enter a language name",
                  language_code: "Please enter a language code"
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
$("#btn_language_save").click (function(){
  if ($('#languages_modal_form').valid()) {
    
  var formData  = new FormData();
               formData.append('language_code', $("#language_code").val());
               formData.append('language_name', $("#language_name").val());  
   
               formData.append('flag_id', $("#flag_id").val()); 
               formData.append('row_id', $("#row_id").val()); 
               formData.append('li_token', token); 
       
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_language_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);
              showToast('success', response.message);
              $('#languages_data_table_modal').modal('hide');
             $('#languages_data_table').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
      }
}); 
// ./ save language

// save language Proficiency
$('#languages_proficiency_modal_form').validate({
  rules: {
            language_proficiency: {
                                      required: true,
                                  }
                },
                messages: {
                  language_proficiency: "Please enter a language proficiency"
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


$("#btn_lang_proficiency_save").click (function(){
  if ($('#languages_proficiency_modal_form').valid()) {
  var formData  = new FormData();
               formData.append('language_proficiency', $("#language_proficiency").val());
               formData.append('flag_id', $("#flag_id").val()); 
               formData.append('row_id', $("#row_id").val()); 
               formData.append('li_token', token);
       
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_language_proficiency_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);
              $('#languages_proficiency_data_table_modal').modal('hide');
              $('#languages_proficiency_data_table').DataTable().ajax.reload();
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


// ./ save language Proficiency


function loadDataTableForSkills(){
   
   $('#skills_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_skills_details",
       "dataSrc": "data"
   },
   "columns": [
       { data: "skill_name" },
       { data: "skill_description" },
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations">
                  <?php   if($skills_edit=='yes'): ?>
                    <a href="#" class="edit" onclick="editSkill('${data}');"><i class="fas fa-edit"></i>Edit</a>
                    <?php endif;
                            if($skills_view=='yes'): ?>
                    <a href="#" class="view" onclick="viewSkill('${data}');"><i class="fas fa-eye"></i>View</a>
                    <?php endif;
                            if($skills_delete=='yes'): ?>
                    <a href="#" class="delete"  onclick="deleteSkill('${data}');"><i class="fas fa-trash"></i>Delete</a>
                    <?php endif; ?>
                  </div>`;
            
           }
       }
   ],
   
     "initComplete": function(settings, json) {
      customizeDataTable('skills_data_table');
   }

});
 }

 $("#skills_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#skills_data_table_modal";
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

function  loadDataTableForEducation(){
   
   $('#education_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_education_details",
       "dataSrc": "data"
   },
   "columns": [
       { data: "education_name" },
       { data: "education_description" },
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations">
                  <?php  if($education_edit=='yes'): ?>
                  <a href="#" class="edit"  onclick="editEducation('${data}');"><i class="fas fa-edit"></i>Edit</a>
                  <?php endif;
                            if($education_view=='yes'): ?>
                  <a href="#" class="view" onclick="viewEducation('${data}');"><i class="fas fa-eye" ></i>View</a>
                  <?php endif;
                            if($education_delete=='yes'): ?>
                  <a href="#" class="delete" onclick="deleteEducation('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                  <?php endif; ?>
                  </div>`;
            
           }
           
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('education_data_table');
   }

});
 }

 $("#education_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#education_data_table_modal";
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




function loadDataTableForCertification(){
   
   $('#certification_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_certification_details",
       "dataSrc": "data"
   },
   "columns": [
       { data: "certification_name" },
       { data: "certification_description" },
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                   <?php if($certification_edit=='yes'): ?>
                  <a href="#" class="edit" onclick="editCertification('${data}');"><i class="fas fa-edit" ></i>Edit</a>
                   <?php endif;
                            if($certification_view=='yes'): ?>
                  <a href="#" class="view" onclick="viewCertification('${data}');"><i class="fas fa-eye" ></i>View</a>
                   <?php endif;
                            if($certification_delete=='yes'): ?>
                  <a href="#" class="delete" onclick="deleteCertification('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                   <?php endif; ?>
                  </div>`;
            
           }
       }
   ],
   
     "initComplete": function(settings, json) {
       customizeDataTable('certification_data_table');
   }

});
 }

 $("#certification_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#certification_data_table_modal";
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

 function loadDataTableForLanguages(){
   
   $('#languages_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_language_details",
       "dataSrc": "data"
   },
   "columns": [
       { data: "language_name" },
       { data: "language_code" },
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                  <?php  if($language_edit=='yes'): ?>
                    <a href="#" class="edit" onclick="editLanguages('${data}');"><i class="fas fa-edit" ></i>Edit</a>
                    <?php endif;
                            if($language_view=='yes'): ?>
                    <a href="#" class="view" onclick="viewLanguages('${data}');"><i class="fas fa-eye" ></i>View</a>
                    <?php endif;
                            if($language_delete=='yes'): ?>
                    <a href="#" class="delete" onclick="deleteLanguages('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                    <?php endif; ?>
                  </div>`;
            
           }
       }
   ],
   
     "initComplete": function(settings, json) {
       customizeDataTable('languages_data_table');
   }

});
 }

 $("#languages_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#languages_data_table_modal";
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


 function loadDataTableForProficiency(){
   
   $('#languages_proficiency_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_language_proficiency_details",
       "dataSrc": "data"
   },
   "columns": [
       { data: "language_proficiency" },

       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                  <?php  if($proficiency_edit=='yes'): ?>
                    <a href="#" class="edit" onclick="editLanguagesProficiency('${data}');"><i class="fas fa-edit" ></i>Edit</a>
                    <?php endif;
                            if($proficiency_view=='yes'): ?>
                    <a href="#" class="view" onclick="viewLanguagesProficiency('${data}');"><i class="fas fa-eye" ></i>View</a>
                    <?php endif;
                            if($proficiency_delete=='yes'): ?>
                    <a href="#" class="delete" onclick="deleteLanguagesProficiency('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                    <?php endif; ?>
                   </div>`;
            
           }
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('languages_proficiency_data_table');
   }

});
 }

 $("#languages_proficiency_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#languages_proficiency_data_table_modal";
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

 function viewSkill(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_skills_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#skills_data_table_modal').modal('show');
                $("#skill_name").val(response.data.skill_name);
                $("#skill_description").val(response.data.skill_description);
                // $("#skill_name").prop('readonly', true);
                // $("#skill_description").prop('readonly', true);
                var disable_data_skills = $("#skills_data_table_modal, #skill_name, #skill_description");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#skills_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data_skills.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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

 function viewEducation(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_education_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#education_data_table_modal').modal('show');
                $("#education_name").val(response.data.education_name);
                $("#education_description").val(response.data.education_description);
                var disable_data_education = $("#education_data_table_modal, #education_name, #education_description");
                disable_data_education.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#education_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data_education.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
                // $("#education_name").prop('readonly', true);
                // $("#education_description").prop('readonly', true);
            } else {
                console.error('Response does not contain department_name.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

function viewCertification(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_certification_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#certification_data_table_modal').modal('show');
                $("#certification_name").val(response.data.certification_name);
                $("#certification_description").val(response.data.certification_description);
                var certification_disable_data = $("#certification_name, #certification_description");
                   certification_disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                   $(".modal-footer .savebtn").hide();
                    // Show the .modal-footer when the modal is hidden
                    $("#certification_data_table_modal").on("hidden.bs.modal", function () 
                    {
                      certification_disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                         $(".modal-footer .savebtn").show();
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

function deleteSkill(row_id) {
  
    if (confirm("Are you sure you want to delete this department?")) {
        $.ajax({
            type: 'POST',
            url: BASE_URL + "index.php/" + hrController + "/delete_skill_by_id",
            data: { row_id: row_id, li_token: token },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                  showToast('success', response.message); 
                    
                    $('#skills_data_table').DataTable().ajax.reload();
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

function deleteEducation(row_id) {
  
    if (confirm("Are you sure you want to delete this department?")) {
        $.ajax({
            type: 'POST',
            url: BASE_URL + "index.php/" + hrController + "/delete_education_by_id",
            data: { row_id: row_id, li_token: token },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                  showToast('success', response.message); 
                    
                    $('#education_data_table').DataTable().ajax.reload();
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


function deleteCertification(row_id) {
  
    if (confirm("Are you sure you want to delete this department?")) {
        $.ajax({
            type: 'POST',
            url: BASE_URL + "index.php/" + hrController + "/delete_certification_by_id",
            data: { row_id: row_id, li_token: token },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                    showToast('success', response.message); 
                    
                    $('#certification_data_table').DataTable().ajax.reload();
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


function deleteLanguages(row_id) {
  
    if (confirm("Are you sure you want to delete this department?")) {
        $.ajax({
            type: 'POST',
            url: BASE_URL + "index.php/" + hrController + "/delete_language_by_id",
            data: { row_id: row_id, li_token: token },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                  showToast('success', response.message); 
                    
                    $('#languages_data_table').DataTable().ajax.reload();
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


function deleteLanguagesProficiency(row_id) {
  
    if (confirm("Are you sure you want to delete this department?")) {
        $.ajax({
            type: 'POST',
            url: BASE_URL + "index.php/" + hrController + "/delete_language_proficiency_by_id",
            data: { row_id: row_id, li_token: token },
            dataType: 'json',
            success: function (response) {
                if (response && response.success) {
                  showToast('success', response.message); 
                    
                    $('#languages_proficiency_data_table').DataTable().ajax.reload();
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


 function viewLanguages(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_languages_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#languages_data_table_modal').modal('show');
                $("#language_name").val(response.data.language_name);
                $("#language_code").val(response.data.language_code);
                var language_disable_data = $("#language_name, #language_code");
                language_disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                   $(".modal-footer .savebtn").hide();
                    // Show the .modal-footer when the modal is hidden
                    $("#languages_data_table_modal").on("hidden.bs.modal", function () 
                    {
                      language_disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                         $(".modal-footer .savebtn").show();
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


 function viewLanguagesProficiency(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_languages_proficiency_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#languages_proficiency_data_table_modal').modal('show');
                $("#language_proficiency").val(response.data.language_proficiency);
                var language_proficiency_disable_data = $("#language_proficiency");
                  language_proficiency_disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                   $(".modal-footer .savebtn").hide();
                    // Show the .modal-footer when the modal is hidden
                    $("#languages_proficiency_data_table_modal").on("hidden.bs.modal", function () 
                    {
                      language_proficiency_disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                         $(".modal-footer .savebtn").show();
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


function editSkill(row_id) {
 
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#skills_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_skills_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#skills_data_table_modal').modal('show');
          $("#skill_name").val(response.data.skill_name);
          $("#skill_description").val(response.data.skill_description);
            //  $("#department_name").focus();

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}


function editEducation(row_id) {
  $("#row_id").val(row_id);
  flag_id=$("#flag_id").val("1");
 $('#education_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_education_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#education_data_table_modal').modal('show');
          $("#education_name").val(response.data.education_name);
          $("#education_description").val(response.data.education_description);
            //  $("#department_name").focus();

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}


function editCertification(row_id) {
  $("#row_id").val(row_id);
  flag_id=$("#flag_id").val("1");
 $('#certification_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_certification_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#certification_data_table_modal').modal('show');
          $("#certification_name").val(response.data.certification_name);
          $("#certification_description").val(response.data.certification_description);
            //  $("#department_name").focus();

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}

function editLanguages(row_id) {
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#languages_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_languages_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#languages_data_table_modal').modal('show');
          $("#language_name").val(response.data.language_name );
          $("#language_code").val(response.data.language_code);
            //  $("#department_name").focus();

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}



function editLanguagesProficiency(row_id) {
 
 
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#languages_proficiency_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_languages_proficiency_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#languages_proficiency_data_table_modal').modal('show');
          $("#language_proficiency").val(response.data.language_proficiency );
            //  $("#department_name").focus();

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}


 
</script>
<script>
   $("#qualification_education_tab_link").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#education_data_table')) {
      loadDataTableForEducation();
   }
       
  });

 $("#qualification_certification_tab_link").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#certification_data_table')) {
      loadDataTableForCertification();
   }
       
  });
 $("#qualification_languages_tab_link").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#languages_data_table')) {
      loadDataTableForLanguages();
   }
       
  });
 $("#qualification_languages_proficiency_tab_link").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#languages_proficiency_data_table')) {
      loadDataTableForProficiency();
   }
       
  });
 
  
</script>
<script>
$(document).ready(function() {
  // Initialize Select2 on the select element
  $('.select2').select2();

// Initialize the second Select2 select box
$('#vbcb').select2();


});

</script>