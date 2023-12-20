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

</style>
     <?php include("top-css.php"); ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed brq-payroll">
<div class="wrapper"
<!--<?php //include("top-nav.php"); ?> -->

  <!-- Main Sidebar Container -->
  <!--<?php //include("left-sidebar.php"); ?> -->
<div id="container" style="background-color: #cff4fc;">
	<h1>User Rights</h1>
	
	<div id="body">

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
   
        <ul id="menu_list_ul" class="custom-list">
            <div id="menu_list_div">

            </div>
        </ul>
    <!-- <input type="hidden" id="hidId" name="user_id" value="<?php echo $userId ;?>"> -->
    	<input type="hidden" id="hidId" name="li_token" value="<?php echo $li_token ;?>"> 
    <button type="submit" class="registerbtn">Save</button>
    </div>
   
	</form>
	
</div> 
   
</div> 
 
    <?php include "bottom-js.php"; ?>
</body>
<script>

 var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    function getMenuItem()
    {
       
       var role= $('#user_role').val();
       url=BASE_URL+"hr-management/HrMaster/get_all_menu_list/"+role;
    
       $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var $list = $("#menu_list_ul ");
                $list.empty();
               
                // Handle the response from the server
                console.log(data);
                
                var myDiv = document.getElementById("menu_list");
                myDiv.style.display="block";
                var mainMenu = data.mainMenu;
               
                
        // Iterate through the mainMenu array
        mainMenu.forEach(function(item) {
            var id = item.id;
            
            var isGranted = item.is_granted;
            if(isGranted=='no')
            
                var list=  '<li><input type="checkbox" id= "main_Menu" name="main_Menu[]" value="'+id+'">';
            else
                var list=  '<li><input type="checkbox" id= "main_Menu_'+id+'" name="main_Menu[]" value="'+id+'" checked>';
            list +=   '<label for="'+item.id+'">'+ item.main_menu +'</label>';
            list+=  ' </li><ul class="custom-list"> ';
            // $filteredMainMenuId=item.id;
            // alert(data.sub_menus[item.id]);
            var subMenus = data.sub_menus[item.id]; // Assuming id corresponds to the index
            // $filteredSubMenus = array_filter($subMenus, function ($subMenu) use ($filteredMainMenuId){
            //     return in_array($filteredMainMenuId, array_column($subMenu, 'main_menu_id'));
            // });
            if (subMenus) {
                subMenus.forEach(function(subItem) {
                    if(subItem.main_menu_id==item.id){
                    // Access sub-menu data
                    var isGranted = subItem.is_granted;
                   if(isGranted==''||isGranted=='no')
                    list +='<li ><input type="checkbox" id="submenu" name ="submenu[]" value="'+subItem.id +'">';
                   else
                    list +='<li ><input type="checkbox" id="submenu" name ="submenu[]" value="'+subItem.id +'" checked>';
                    list   +=  '<label>'+ subItem.sub_menu +'</label></li> ';
                    } 
                });
                list +='</ul><ul>';
            }

            $list.append(list);
        });

            },
            error: function () {
                console.log('Error: Unable to make the request.');
            }
        });
    }
</script>
</html>