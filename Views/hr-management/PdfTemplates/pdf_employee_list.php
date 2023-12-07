<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List/title>

    <style>
    /* body {
        margin-top: 150px !important;  
        margin-bottom:100px;
        background-color:pink;
      
    } */
</style>
</head>

<body>
<!-- <h4 style="text-align: left; margin-top:10px">Department Wise Employee List</h4>  -->
<h4 style="text-align: left; margin-top: 50px; font-size: 13px; font-weight: bold;">Department Wise Employee List</h4>
<?php
// Table header with CSS styles
$content = '<table style="border-collapse: collapse; width: 100%;">';
$content .= '<tr style="background-color: #f2f2f2;">

<th style="border: 1px solid #000; padding: 8px; width: 40px;"><b>No:</b></th> 
<th style="border: 1px solid #000; padding: 8px;"><b>Name</b></th>
<th style="border: 1px solid #000; padding: 8px;"><b>Branch Name</b></th>
<th style="border: 1px solid #000; padding: 8px;"><b>Department Name</b></th>
<th style="border: 1px solid #000; padding: 8px;"><b>Contact Number</b></th>
</tr>';

$counter = 1;

// Loop through fetched data and populate the table rows with alternating row colors
$alternateColor = true;
foreach ($employee_list as $employee) {
    $rowColor = $alternateColor ? '#ffffff' : '#f9f9f9'; // Alternating row colors
    $content .= '<tr style="background-color: ' . $rowColor . ';">';

    $content .= '<td style="border: 1px solid #000; padding: 8px;">' . $counter . '</td>';

    $content .= '<td style="border: 1px solid #000; padding: 8px;">' . $employee->full_name . '</td>';
    $content .= '<td style="border: 1px solid #000; padding: 8px;">' . $employee->branch_name . '</td>';
    $content .= '<td style="border: 1px solid #000; padding: 8px;">' . $employee->department_name . '</td>';
    $content .= '<td style="border: 1px solid #000; padding: 8px;">' . $employee->mobile_phone . '</td>';
    $content .= '</tr>';
    $counter++;
    $alternateColor = !$alternateColor; // Switch row color
}

$content .= '</table>';

echo $content;
?>


</body>
</html>