<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Student Report</h2>
        <?php
        $file = 'student_info.txt';
        $report = file_get_contents($file);
        echo nl2br($report);
        ?>
    </div>
</body>
</html>
