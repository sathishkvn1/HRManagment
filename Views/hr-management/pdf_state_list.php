<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State List/title>
</head>
<style>

</style>
<body>
<h1 style="text-align: left;">State List Report</h1> 
<?php
// Table header with CSS styles
$content = '<table style="border-collapse: collapse; width: 100%;">';
$content .= '<tr style="background-color: #f2f2f2;"><th style="border: 1px solid #000; padding: 8px;">StateId</th><th style="border: 1px solid #000; padding: 8px;">State Name</th></tr>';

// Loop through fetched data and populate the table rows with alternating row colors
$alternateColor = true;
foreach ($state_list as $state) {
    $rowColor = $alternateColor ? '#ffffff' : '#f9f9f9'; // Alternating row colors
    $content .= '<tr style="background-color: ' . $rowColor . ';">';
    $content .= '<td style="border: 1px solid #000; padding: 8px;">' . $state->state_id . '</td>';
    $content .= '<td style="border: 1px solid #000; padding: 8px;">' . $state->state_name . '</td>';
    $content .= '</tr>';
    $alternateColor = !$alternateColor; // Switch row color
}

$content .= '</table>';

echo $content;
?>


    
</body>
</html>