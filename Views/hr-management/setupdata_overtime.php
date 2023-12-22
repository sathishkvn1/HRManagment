
<div id="overtime_type_tab" class="reviewBlock">
        <div id="" class="reviewBlock">
             <div class="combined_buttons">
                 <div class="add_new_btn_div">
                   <button id="setupdata_overtime_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="transportation_data_table"><i class="fas fa-plus"></i> Add New</button>
                  </div>
                
              
             </div>
          </div>
</div>
                       
<!-- table  -->
    <table id="setupdata_overtime_data_table" class="table table-striped">
        <thead>
            <tr>     
                <th>Category</th>
                <th>Rate </th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
 <!-- ./ table start -->     
 
    <!-- modal overtime -->
    <div class="modal fade data-table-modal" id="setupdata_overtime_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Overtime</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="setupdata_overtime_status_modal_form" class="modal_form">      
                <!--one field  text field---- -->
                <div class="form-group row">
                    <div class="col-3">
                      <label for="overtime_category" class="col-form-label required">Category</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="overtime_category" name="overtime_category">
                    </div>
                  </div>
                <!-- ./ one field ---- -->  
                <!--one field  text field---- -->
                <div class="form-group row">
                    <div class="col-3">
                      <label for="overtime_rate" class="col-form-label required">Rate</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="overtime_rate" name="overtime_rate">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="overtime_description" class="col-form-label required">Description</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="overtime_description" name="overtime_description">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                                  
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_setupdata_overtime_status_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_setupdata_overtime_details_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.modal for company department-->



     

   <!-- ./modal overtime -->

  
    
     
  
<?php include("bottom-js.php"); ?>     




<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {

    $('#setupdata_overtime_data_table').DataTable({
       "ajax": {
        "url": BASE_URL + "index.php/" +  hrController + "/get_setupdata_overtime_details",
        "dataSrc": "data"
    },
    "columns": [
       
        { data: "overtime_category"},
        { data: "overtime_rate"},
        { data: "overtime_description"},
        {
            data: "id",
            render: function (data, type, row) {
                return `
                    <div class="operations"> 
                    <a href="#" class="edit"  onclick="editOvertime('${data}');"><i class="fas fa-edit"></i>Edit</a>
                    <a href="#" class="view"   onclick="viewOvertime('${data}');"><i class="fas fa-eye" ></i>View</a>
                    <a href="#" class="delete" onclick="deleteOvertime('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                    </div>`;
            }
        }
    ],
    
        "initComplete": function(settings, json) {
        customizeDataTable('setupdata_overtime_data_table');
    }

});


//
$('#setupdata_overtime_status_modal_form').validate({
  rules: {
                overtime_category: {
                  required: true,
                },
                overtime_rate :{
                  required: true,
                },
                overtime_description :{
                  required: true,
                }
                },
                messages: {
                overtime_category: "Please enter a category",
                overtime_rate: "Please enter the rate",
                overtime_description:"Give a description about it"
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

});

  
  
$("#btn_setupdata_overtime_details_save").click (function(){
  if ($('#setupdata_overtime_status_modal_form').valid()) {
      var formData  = new FormData();
                  formData.append('overtime_category', $("#overtime_category").val());
                  formData.append('overtime_rate', $("#overtime_rate").val());  
                  formData.append('overtime_description', $("#overtime_description").val());
                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_setupdata_overtime_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#setupdata_overtime_data_table_modal').modal('hide');
                  $('#setupdata_overtime_data_table').DataTable().ajax.reload();
                 

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
     }
      
}); 


function viewOvertime(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_setupdata_overtime_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
          
            if (response) {
               
            $('#setupdata_overtime_data_table_modal').modal('show');
            $("#overtime_category").val(response.data.overtime_category);
              $("#overtime_rate").val(response.data.overtime_rate);
              $("#overtime_description").val(response.data.overtime_description);

              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#setupdata_overtime_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disableElements.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
         
            } else {
                console.error('Response does not contain overtime details.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}


function editOvertime(row_id) {
  alert(row_id);
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#setupdata_overtime_data_table_modal').modal('show');

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_setupdata_overtime_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
              console.log("response certi is" ,response);
            if (response.success) {
              $("#overtime_category").val(response.data.overtime_category);
              $("#overtime_rate").val(response.data.overtime_rate);
              $("#overtime_description").val(response.data.overtime_description);
              

            } else {
                alert("Failed.");
            }
        },
        error: function (xhr, status, error) {
            alert("Error in fetching .");
        }
    });
}



function deleteOvertime(row_id){
    alert(row_id);
   
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_setupdata_overtime_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#setupdata_overtime_data_table_modal').modal('hide');
                showToast('success', response.message); 
                $('#setupdata_overtime_data_table').DataTable().ajax.reload();
               
            },
            error: function (xhr, status, error) {
                // Handle error
            }
        });
    }
}




$("#setupdata_overtime_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#setupdata_overtime_data_table_modal";
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

