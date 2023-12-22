<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leave</title>
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
                <li class="nav-item">
                  <a class="nav-link active" id="li_leave_master_tab"data-toggle="tab" href="#leave_master_tab" role="tab"  aria-selected="true">Leave Master</a>
                </li>
                
              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                    <div class="tab-pane fade show active" id="leave_master_tab" role="tabpanel" aria-labelledby="home-tab">
                        <!-- --- discription ---- -->
                          <div id="company_structure_table_top" class="reviewBlock">
                            <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                <button id="leave_master_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                              </div>           
                            </div>
                          </div>
                            <!-- --- ./discription ---- -->
            
                        <!--for loading LeaveMaster DataTable -->
                            <table id="leave_master_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Calender Master</th>
                                    <th>Leave Category</th>
                                    <th>Leaves per Year</th>
                                    <th>Leaves per Month</th>
                                    
                                    <th style="width:200px;text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                    
                                    
                                </tr>
                                
                            
                            </tbody>
                            </table>
                            <!-- ./ for loading LeaveMaster DataTable -->
                    </div>
                  <!-- ./tab1  --- -->
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
     <!-- footer -->
     <div class="common_hidden_fields" style="text-align: end;">
        <input type="hidden" id="flag_id" value="0" >
        <input type="hidden" id="row_id" value="0" >
      </div>


     <?php include("footer.php"); ?> 
     <!-- ./ footer -->





    

     <!-- modal for leave master  -->
      <div class="modal fade data-table-modal" id="leave_master_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Leave Master</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="leave_master_modal_form" class="modal_form">
                 <!--one field  text field---- -->
                 <div class="form-group row">
                    <div class="col-3">
                        <label for="leave_calendar_master_id" class="col-form-label required">Calendar Master</label>
                    </div>
                    <div class="col-8">
                        <select class="form-control select2"  name="calendar_master_id" id="calendar_master_id" style="width:100%">
                        <option value="">Select Year</option>   
                                <?php
                                if (isset($calendar_master_details)):
                                
                                foreach ($calendar_master_details as $row):
                                    $name = $row->year_name;
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
                 <!--one field  text field---- -->
                 <div class="form-group row">
                      <div class="col-3">
                          <label for="leave_category_id" class="col-form-label required">Leave Category</label>
                      </div>
                      <div class="col-8">
                          <select class="form-control select2" name="leave_category_id" id="leave_category_id" style="width:100%">
                              <!-- <-?php
                              if (isset($leave_category_details)):
                                  foreach ($leave_category_details as $row):
                                      $name = $row->leave_category;
                                      $id = $row->id;
                              ?>
                                      <option value="<-?php echo $id; ?>">
                                          <-?php echo $name; ?>
                                      </option>
                              <-?php
                                  endforeach;
                              endif;
                              ?> -->
                          </select>
                      </div>
                  </div>
                 <!-- ./ one field ---- -->                                                             
                 <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="number_of_leaves_per_year" class="col-form-label required">Leaves per Year</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="number_of_leaves_per_year" name="number_of_leaves_per_year">
                    </div>
                  </div>
                 <!-- ./ one field text field---- -->                                
                 <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="maximum_can_be_taken_in_a_month" class="col-form-label required">Leaves per Month</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="maximum_can_be_taken_in_a_month" name="maximum_can_be_taken_in_a_month">
                    </div>
                  </div>
                 <!-- ./ one field text field---- -->                                
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_leave_master_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_leave_master_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.  modal for leave master-->

</div>
<!-- ./wrapper -->


<?php include("bottom-js.php"); ?> 
</body>
</html>



<!-- operations of a data table functions  -->

<script>
 var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";


 $(document).ready( function () {
      
  // load leave master data table
      loadDataTableForLeaveMaster();
     
});

function loadDataTableForLeaveMaster(){
    $('#leave_master_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_leave_master",
            "dataSrc": "data"
            
            
        },
            "columns": [
            { data: "year_name" },
            { data: "leave_category" },
            { data: "number_of_leaves_per_year" },
            { data: "maximum_can_be_taken_in_a_month" },
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="editLeaveMaster(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewLeaveMaster(${id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deleteLeaveMaster(${id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('leave_master_data_table');
        }
    });
}
// ./load leave master data table

$('#leave_master_modal_form').validate({                                    
  rules: {
                    calendar_master_id:{
                        required: true,
                    },
                    leave_category_id:{
                        required: true,
                    },
                    number_of_leaves_per_year:{
                        required: true,
                    },
                    maximum_can_be_taken_in_a_month:{
                        required: true,
                    },
                                              
                },
                messages: {
                    calendar_master_id: "Please select the year",
                    leave_category_id: "Please select the leave category",
                    number_of_leaves_per_year:"Please enter the counts",
                    maximum_can_be_taken_in_a_month:"Please enter the counts",
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

$("#leave_master_data_table_add_new").on("click", function() {
   
    var modalId = "#leave_master_data_table_modal";
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

</script>



<script>
  // for save

    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";
    var token = "<?php echo $_SESSION['li_token']; ?>";

  
  

    $("#btn_leave_master_save").click (function(){
   
      var formData  = new FormData();
          formData.append('calendar_master_id', $("#calendar_master_id").val());
          formData.append('leave_category_id', $("#leave_category_id").val());
          formData.append('number_of_leaves_per_year', $("#number_of_leaves_per_year").val());
          formData.append('maximum_can_be_taken_in_a_month', $("#maximum_can_be_taken_in_a_month").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
          $.ajax({
              url: BASE_URL + "index.php/" + hrController + "/save_leave_master_details",
              type: 'POST',
              data:  formData,
              dataType: "JSON",
              processData: false,
              contentType: false,
              success: function(response) {
                console.log("response",response);
             
                $('#leave_master_data_table_modal').modal('hide');
                $('#leave_master_data_table').DataTable().ajax.reload();

                showToast('success', response.message);
              },
              error: function(xhr, status, error) {
                  console.log(xhr.responseText);
                  console.log(status);
                  console.log(error);
              }
          });
        
}); 
          
  
// ./ for save 

function viewLeaveMaster(row_id) 
{
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_leave_master_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#leave_master_data_table_modal').modal('show');
                $("#calendar_master_id").val(response.data.calendar_master_id);
                $("#leave_category_id").val(response.data.leave_category_id);
                $("#number_of_leaves_per_year").val(response.data.number_of_leaves_per_year);
                $("#maximum_can_be_taken_in_a_month").val(response.data.maximum_can_be_taken_in_a_month);
              
                var disable_data_skills = $("#leave_master_data_table_modal,#calendar_master_id,#leave_category_id,#number_of_leaves_per_year,#maximum_can_be_taken_in_a_month");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
               
                $("#leave_master_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data_skills.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
                
               
            } else {
                console.error('Response does not contain value.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

function editLeaveMaster(row_id) {
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#leave_master_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_leave_master_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
            $('#leave_master_data_table_modal').modal('show');
            $("#calendar_master_id").val(response.data.calendar_master_id);
            $("#leave_category_id").val(response.data.leave_category_id);
            $("#number_of_leaves_per_year").val(response.data.number_of_leaves_per_year);
            $("#maximum_can_be_taken_in_a_month").val(response.data.maximum_can_be_taken_in_a_month);
          
         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}


function deleteLeaveMaster(row_id) {

if (confirm("Are you sure you want to delete ?")) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + "index.php/" + hrController + "/delete_leave_master_by_id",
        data: { row_id: row_id, li_token: token },
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
              showToast('success', response.message); 
                
                $('#leave_master_data_table').DataTable().ajax.reload();
            } else {
                alert("Error deleting value.");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}
}

$("#calendar_master_id").on("change", function() {
    var calendar_master_val = $(this).val();
  //  alert(calendar_master_val);
   
   $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_leave_category_option",
        type: 'POST',
        data: { calendar_master_val: calendar_master_val, li_token: token },
        dataType: 'json',
        success: function(data) {
        
        console.log("data is",data);
            var dropdown = $('#leave_category_id'); 

            dropdown.empty();
            dropdown.append($('<option></option>').attr('value', '0').text('Not Applicable')); 

            $.each(data, function(index, leavecategory) {
                dropdown.append($('<option></option>').attr('value', leavecategory.id).text(leavecategory.leave_category));
            });
            // $('#leave_master_data_table').DataTable().ajax.reload();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
    

});



 </script>

 <!-- ./ operations of a data table functions  -->
