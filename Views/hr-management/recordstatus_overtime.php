
<div id="overtime_request_tab" class="reviewBlock">
        
</div>
                       
<!-- table  -->
    <table id="recordstatus_overtime_data_table" class="table table-striped">
        <thead>
            <tr>    
                <th>ID</th> 
                <th>Overtime Request Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
 <!-- ./ table start -->     
   
  
<?php include("bottom-js.php"); ?>     




<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

$(document).ready(function() {
    $('#recordstatus_overtime_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_recordstatus_overtime_details",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "overtime_request_status" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('recordstatus_overtime_data_table');
        }
    });

});



</script>

