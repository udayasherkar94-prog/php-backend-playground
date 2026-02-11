<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result of Student</title>
</head>
<body>

<fieldset>
    <legend><h3>Enter Student Details:</h3></legend>

    <form method="POST">
        <h3>Student Roll No:
            <input type="number" name="sno" required>
        </h3>

        <h3>Student Name:
            <input type="text" name="sname" required>
        </h3>

        <h3>Student Marks [5 subjects]:
            <input type="text" name="smarks" 
                   placeholder="e.g. 50,70,88,65,90" required>
        </h3>

        <input type="submit" name="submit" value="Submit">
    </form>
</fieldset>

<?php
if(isset($_POST['submit'])){

    $sno = $_POST['sno'];
    $sname = $_POST['sname'];

    // Split marks
    $marks = explode(",", $_POST['smarks']);

    // Trim spaces and convert to numbers
    $marks = array_map('trim', $marks);
    $marks = array_map('floatval', $marks);

    // Validate exactly 5 subjects
    if(count($marks) != 5){
        echo "<h3 style='color:red;'>Please enter exactly 5 subject marks.</h3>";
        exit();
    }

    // Validate marks range
    foreach($marks as $m){
        if($m < 0 || $m > 100){
            echo "<h3 style='color:red;'>Marks must be between 0 and 100.</h3>";
            exit();
        }
    }

    // Calculate total and percentage
    $total = array_sum($marks);
    $per = $total / 5;  // since each subject is out of 100

    // Grade calculation
    if($per >= 80){
        $grade = 'A';
    }
    elseif($per >= 60){
        $grade = 'B';
    }
    elseif($per >= 40){
        $grade = 'C';
    }
    else{
        $grade = 'Fail';
    }

    // Display Result
    echo "<table align='center' border='1' cellspacing='0' cellpadding='5' width='100%'>
        <thead>
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Sub1</th>
                <th>Sub2</th>
                <th>Sub3</th>
                <th>Sub4</th>
                <th>Sub5</th>
                <th>Total</th>
                <th>Percentage</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>$sno</td>
                <td>$sname</td>
                <td>{$marks[0]}</td>
                <td>{$marks[1]}</td>
                <td>{$marks[2]}</td>
                <td>{$marks[3]}</td>
                <td>{$marks[4]}</td>
                <td>$total</td>
                <td>".round($per,2)."%</td>
                <td>$grade</td>
            </tr>
        </tbody>
    </table>";
}
?>