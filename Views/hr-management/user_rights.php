<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hr</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <style>
       label:not(.form-check-label):not(.custom-file-label) {
    color: black!important;
    }
    .custom-list {
        list-style: none;
       
       
    }
 /*table {*/
 /*           border-collapse: collapse;*/
 /*           width: 100%;*/
 /*       }*/

 /*       table, th, td {*/
 /*           border: 1px solid black;*/
 /*       }*/

 /*       th, td {*/
 /*           padding: 8px;*/
 /*           text-align: left;*/
 /*       }*/

</style>
     <?php include("top-css.php"); ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed brq-payroll">
<div class="wrapper">
<?php include("top-nav.php"); ?> 

  <!-- Main Sidebar Container -->
  <?php include("left-sidebar.php"); ?> 
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
        
                                      
                                      ?>
                                    <li class="nav-item">
                                    <a class="nav-link <?php echo $class;?>" id="<?php echo $tab_id;?>" data-toggle="tab" href="<?php echo $tab_item->page_link ;?>" role="tab" aria-selected="false"><?php echo $tab_item->sub_menu_tab ;?></a>
                                    </li>
                                    
                                     <?php 
                                        $is_first='no';
                                        endforeach;
                                        ?> 
                                      <li class="nav-item">
                                          <a class="nav-link active" id="li_user_permission_tab"data-toggle="tab" href="#user_permission_tab" role="tab"  aria-selected="true">User Rights</a>
                                        </li>
                     </ul>
                     <div class="tab-content">
                           <!--tab 1  ------ -->
                            <div class="tab-pane fade show active" id="user_permission_tab" role="tabpanel" aria-labelledby="home-tab">
                                <!-- --- discription ---- -->
                                  <div id="user_permission_table_top" class="reviewBlock">
                                    <div class="combined_buttons">
                                        <div><h2><?php echo $Success?></h2></div>
                                     </div>
                                  </div>
        
        
                                	<form action="<?php echo base_url('hr-management/HrMaster/save_menu_permission')?>" method="POST" >
                                		
                                		
                                 	<label for="user_role"><b>Select User Role</b></label>
                                   
                                    <select id='user_role' name='user_role' onchange="getMenuItem();" >
                                    <option value=''>Choose Role</option>
                                    <?php 
                                    
                                    foreach($userRole as $row):
                                        $role   =$row->user_role;
                                        $role_id=$row->role_id;
                                    ?>
                                        <option value='<?php echo $row->role_id;?>'><?php echo $row->user_role;?></option>
                                        <?php endforeach;?>
                                    </select>
                                   
                                     <br>  
                                     <br>
                                     <div id="menu_list" style="display: none;"> 
                                   
                                        <!--<ul id="menu_list_ul" class="custom-list">-->
                                        <!--    <div id="menu_list_div">-->
                                
                                        <!--    </div>-->
                                        <!--</ul>-->
                                        <table id="menu_list_ul" border="1">
                                           <tbody id="menu_list_tbody">
                                
                                            </tbody>
                                        </table>
                                    <!-- <input type="hidden" id="hidId" name="user_id" value="<?php echo $userId ;?>"> -->
                                    	<input type="hidden" id="hidId" name="li_token" value="<?php echo $li_token ;?>"> 
                                    <button type="submit" class="registerbtn">Save</button>
                                    </div>
                                   
                                	</form>
                                	
                            </div> 
                    </div>
                </div>
          </div>
    </div>
    <?php include("footer.php"); ?> 
    <?php include "bottom-js.php"; ?>
</body>
<script>

 var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";
   $(document).ready(function() {
       
     var role_id=  "<?php echo $_SESSION['ROLE_ID'];?>";
     
     $('#user_role').val(role_id).trigger('change');
    
    
    });

    function getMenuItem()
    {
       
       var role= $('#user_role').val();
       url=BASE_URL+"hr-management/HrMaster/get_all_menu_list/"+role;
    
       $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var tableBody = $("#menu_list_tbody");

                tableBody.empty();

                console.log(data);
                
                var myDiv = document.getElementById("menu_list");
                myDiv.style.display="block";
                var mainMenu = data.mainMenu;
                mainMenu.forEach(function (item) {
    var id = item.id;
    var isMainGranted = item.is_granted;

    var mainCheckboxId = 'main_Menu_' + id;
   var table = '<tr>';
    if(item.id==previousMenuId)
      var mainMenuItem    = "";
    else
      var mainMenuItem    = item.main_menu;  
    
    if (isMainGranted == 'no')
        table += '<td><input type="checkbox" id="main_Menu_'+ id +'" name="main_Menu[]" value="' + id + '">' + mainMenuItem + '</td>';
    else
        table += '<td><input type="checkbox" id="main_Menu_' + id + '" name="main_Menu[]" value="' + id + '" checked>' + mainMenuItem + '</td>';
      var  previousMenuId =item.id;
    var subMenus = data.sub_menus[item.id];

    if (subMenus) {
        subMenus.forEach(function (subItem) {
            var sub_id=subItem.id;
            var subCheckboxId    = 'submenu_' +subItem.id;
            if (subItem.main_menu_id == item.id) {
                var isSubMenuGranted = subItem.is_granted;
                var submenuCheckboxId = 'submenu_' + subItem.id;
                
                if (isSubMenuGranted == '' || isSubMenuGranted == 'no')
                    table += '<td><input type="checkbox" id="submenu_' + id + '" name="submenu[]" value="' + subItem.id + '" disabled onchange="submenu_tab_disable('+subItem.id+' );">' + subItem.sub_menu + '</td>';
                else
                    table += '<td><input type="checkbox" id="submenu_' + id + '" name="submenu[]" value="' + subItem.id + '" checked>' + subItem.sub_menu + '</td>';
                
                var subMenusTab = data.sub_menu_tab[subItem.id];

                if (subMenusTab) {
                    subMenusTab.forEach(function (subTabItem) {
                        if (subTabItem.sub_menu_id == subItem.id) {
                            var isTabGranted = subTabItem.is_granted;
                            var submenutabCheckboxId = 'submenutab_' + subTabItem.id;
                            
                            if (isTabGranted == '' || isTabGranted == 'no')
                                table += '<td><input type="checkbox" id="submenutab_' + subItem.id + '" name="submenutab[]" value="' + subTabItem.id + '" disabled>' + subTabItem.sub_menu_tab + '<br>';
                            else
                                table += '<td><input type="checkbox" id="submenutab_' +subItem.id + '" name="submenutab[]" value="' + subTabItem.id + '" checked>' + subTabItem.sub_menu_tab + '<br><div>';
                            // table += '<td>' + subTabItem.sub_menu_tab + '</td>';
                            var isAdd = subTabItem.is_add_new;
                            if(isAdd=='yes')
                                table += '<input type="checkbox" id="submenutabadd" name="submenutabadd[]" value="' + subTabItem.id + '" checked> Add ';
                            else
                                table += '<input type="checkbox" id="submenutabadd" name="submenutabadd[]" value="' + subTabItem.id + '" > Add ';
                            var isEdit = subTabItem.is_edit;
                            if(isEdit=='yes')
                                table += '<input type="checkbox" id="submenutabedit" name="submenutabedit[]" value="' + subTabItem.id + '" checked> Edit ';
                            else
                                table += '<input type="checkbox" id="submenutabedit" name="submenutabedit[]" value="' + subTabItem.id + '" > Edit ';
                            var isView = subTabItem.is_view;
                            if(isView=='yes')
                                table += '<input type="checkbox" id="submenutabview" name="submenutabview[]" value="' + subTabItem.id + '" checked> View ';
                            else
                                table += '<input type="checkbox" id="submenutabview" name="submenutabview[]" value="' + subTabItem.id + '" > View ';
                            var isDelete = subTabItem.is_delete;
                            if(isDelete=='yes')
                                table += '<input type="checkbox" id="submenutabdelete" name="submenutabdelete[]" value="' + subTabItem.id + '" checked> Delete ';
                            else
                                table += '<input type="checkbox" id="submenutabdelete" name="submenutabdelete[]" value="' + subTabItem.id + '" > Delete ';
                                
                            table += '</div>';    

                        }
                        
                        table += '<tr><td></td><td></td>';
                    });
                    
                }
                
            }
            table += '<tr><td></td>';

            
        });
                    
         table += '<tr>';
    }
    
    table += '</tr>';
     tableBody.append(table);
     
       $('#' + mainCheckboxId).change(function() {
           
        // var isChecked = $(this).prop('checked');
        // if(isChecked)
        // $('input[name="submenu[]"]').prop('disabled', false);
         var isChecked = $(this).prop('checked');
        //  alert(submenutabCheckboxId);

        $('input[name="submenu[]"][id^="submenu_' + id + '"]').prop('disabled', !isChecked).prop('checked', false);

        // $('input[name="submenutab[]"][id^="submenutab_' + id + '"]').prop('disabled', !isChecked);
        
    });
    // $("#"+submenuCheckboxId ).change(function() {
    //           alert("subCheckboxId");
    //         var isSubChecked = $(this).prop('checked');
    //         if(isSubChecked)
    //         $('input[name="submenutab[]"]').prop('disabled', false);
    //     });
        
});
                               
      

            },
            error: function () {
                console.log('Error: Unable to make the request.');
            }
        });
    }
 function submenu_tab_disable(id)
    {
        
          var isChecked = $('#submenu_'+id).prop('checked');
         
          if(isChecked)
            $('input[name="submenutab[]"][id^="submenutab_' + id + '"]').prop('disabled',false).prop('checked', false);
        //  alert(submenutabCheckboxId);
        // $('input[name="submenutab[]"][id^="submenutab_' + id + '"]').prop('disabled', !isChecked);
    }
</script>
</html>