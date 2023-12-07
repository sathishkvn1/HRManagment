<!DOCTYPE html>
<html>
<head>
    <title>Employee Team Details</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        /* .team-details {
         
            margin-top: 50px;
        } */
        .team-details p {
            margin: 5px 0;
        }
        .team-details table {
            width: 100%;
            border: 1px solid #000;
            /* border-collapse: collapse; */
         
            /* margin-top: 10px; */
        }
        .team-details th,
        .team-details td, table {
            border: 1px solid #000;
            padding: 5px;  
        }
    </style>
</head>
<body>
   
     <!-- <p>
     <h2>TEAM DETAILS</h2>
        Team: <?php echo $employee_team_details[0]->team_name; ?><br>
        Team Leader: <?php echo $employee_team_details[0]->team_leader_name; ?><br>
        Branch: <?php echo $employee_team_details[0]->branch_name; ?><br>
        Department: <?php echo $employee_team_details[0]->department_name; ?><br>
    </p> -->
    <h2 class="mt-3">TEAM DETAILS</h2>
        <p>
            <b>Team:</b> <?php echo $employee_team_details[0]->team_name; ?><br>
            <b>Team Leader:</b> <?php echo $employee_team_details[0]->team_leader_name; ?><br>
            <b>Branch:</b> <?php echo $employee_team_details[0]->branch_name; ?><br>
            <b>Department:</b> <?php echo $employee_team_details[0]->department_name; ?><br>
        </p>

    <div class="team-details">
        <?php if (!empty($employee_team_details)): ?>
            <h3>TEAM MEMBERS</h3>
            <table>
                <thead>
                    <tr>
                        <th><b>Team Member Name</b></th>
                        <th><b>Address</b></th>
                        <th><b>Mobile Phone</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employee_team_details as $detail): ?>
                        <?php
                            $teamMembers = explode(', ', $detail->team_member_name);
                            foreach ($teamMembers as $member): 
                        ?>
                            <tr>
                                <td><?php echo $member; ?></td>
                                <td>
                                    <?php 
                                        // Assuming $detail contains address fields for each member
                                        // Replace this logic with the actual fields from your data
                                    ?>
                                    
                                        <?php echo $detail->team_member_address_1; ?>
                                        <?php echo $detail->team_member_address_2; ?>
                                        <?php echo $detail->team_member_address_3; ?>
                                        <?php echo $detail->team_member_address_4; ?>
                                   
                                </td>
                                <td>
                                    <?php 
                                        // Assuming $detail contains phone number field for each member
                                        // Replace this logic with the actual field from your data
                                        echo $detail->team_member_phone;
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No employee team details found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
