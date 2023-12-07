<!DOCTYPE html>
<html>
<head>
    <title>Employee Team Details</title>
   
    <style>
       
        body {
            font-family: Arial, sans-serif;
        }
        .team-details {
            margin-bottom: 20px;
        }
      
        .team-details p {
            margin: 5px 0;
        }
        /* .team-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        } */
        .team-details th,
        .team-details td {
            border: 1px solid #000;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="team-details">
        <?php if (!empty($employee_team_details)): ?>
            <?php foreach ($employee_team_details as $detail): ?>
                <h3>Team Name: <?php echo $detail->team_name; ?></h3>
                <p>Team Leader: <?php echo $detail->team_leader_name; ?></p>
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                        
                            <th style="border: 1px solid #000; padding: 12px;"><b>Team Members</b></th>
                            <th style="border: 1px solid #000; padding: 12px;"><b>Branch</b></th>
                            <th style="border: 1px solid #000; padding: 12px;"><b>Department</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $detail->team_members; ?></td>
                            <td><?php echo $detail->branch_name; ?></td>
                            <td><?php echo $detail->department_name; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No employee team details found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
