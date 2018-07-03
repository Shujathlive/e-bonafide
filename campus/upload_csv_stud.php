<?php
//load the database configuration file
include 'dbconfig.php';
session_start();

$username=$_SESSION['uname']; 

//Find the campus ID
$sql="SELECT campusID from campus where campusUsername='$username'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$campId=$row[0];


//Find the institute ID
$sql="SELECT instituteId from campus where campusId='$campId'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$instId=$row[0];


//Campus Table Name
$studTable='student_'.$instId.$campId;


if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same register Number
                $prevQuery = "SELECT StudentId FROM $studTable WHERE RegNo = '".$line[1]."'";
                $prevResult = $conn->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update member data
                    $conn->query("UPDATE $studTable SET StudentId = '".$line[0]."', StudentName = '".$line[2]."', RegNo = '".$line[1]."', DOB = '".$line[3]."'");
                }else{
                    //insert member data into database
                    $conn->query("INSERT INTO $studTable (campusId,instituteId,StudentId, RegNo, StudentName,DOB) VALUES ('$campId','$instId','".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."')");
					
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: create_student.php".$qstring);