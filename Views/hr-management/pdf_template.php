<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- pdf_template.php -->
    <h2 style="background-color:red">hai</h2>
<?php
// Header of the PDF

$content = '<h1>Employee Skills Report</h1>';

// Table header
$content .= '<table border="1">';
$content .= '<tr><th>ID</th><th>Details</th><th>Skill Name</th><th>Employee Name</th></tr>';

// Loop through fetched data and populate the table rows
foreach ($employee_skills as $employee_skill) {
    $content .= '<tr>';
    $content .= '<td>' . $employee_skill->id . '</td>';
    $content .= '<td>' . $employee_skill->details . '</td>';
    $content .= '<td>' . $employee_skill->skill_name . '</td>';
    $content .= '<td>' . $employee_skill->employee_name . '</td>';
    $content .= '</tr>';
}

$content .= '</table>';

echo $content;
?>

</body>
</html>