<?php

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$marks = $_POST['marks'];

// Write form data to a file
$file = 'student_info.txt';
$data = "Name: $name\nAge: $age\nMarks: $marks\n\n";

file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

// Append JComponent writeup
$jcomponent_writeup = "JComponent Writeup:\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod odio vel justo convallis, sit amet commodo odio faucibus.";

file_put_contents($file, $jcomponent_writeup, FILE_APPEND | LOCK_EX);

echo "Data saved successfully!";
?>
