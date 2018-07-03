<?php
//load the database configuration file
include 'dbconfig.php';
session_start();

$username=$_SESSION['uname']; 


//Find the campus ID
$sql="SELECT campusID from campus where campusUsername=''";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$campId=$row[0];



//Find the institute ID
$sql="SELECT instituteId from institute where instituteUsername='$username'";
echo $sql;
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$instId=$row[0];
echo $instId;
//Campus Table Name
$campusTable='campus_'.$instId;

$prevQuery = "SELECT campusId FROM $campusTable WHERE campusID = '$campId'";
				echo $prevQuery;
//if(isset($_POST['importSubmit'])){
    
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
                $prevQuery = "SELECT campusId FROM $campusTable WHERE campusID = '".$campId."'";
				echo $prevQuery;
                $prevResult = $conn->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update member data
                    $conn->query("UPDATE $campusTable SET `area` = '".$line[2]."', `pincode` = '".$line[3]."', `district` = '".$line[4]."', `state` = '".$line[5]."', `country` = '".$line[6]."', `phone1` = '".$line[7]."', `phone2` = '".$line[8]."', `mobile` = '".$line[9]."', `fax` = '".$line[10]."', `emailId` = '".$line[11]."', `website` = '".$line[12]."',  `serviceinfo` = '".$line[13]."', `designation` = '".$line[14]."', `desgName` = '".$line[15]."'");
                }else{
                    //insert member data into database
                    $conn->query("INSERT INTO $campusTable (`campusId`, `instituteId`, `area`, `pincode`, `district`, `state`, `country`, `phone1`, `phone2`, `mobile`, `fax`, `emailId`, `website`, `serviceinfo`, `designation`, `desgName`) VALUES ('".$line[2]."','".$line[3]."''".$line[4]."''".$line[5]."''".$line[6]."''".$line[7]."''".$line[8]."''".$line[9]."''".$line[10]."''".$line[11]."''".$line[12]."''".$line[13]."''".$line[14]."''".$line[15]."')");
					
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
//8888}

//redirect to the listing page
//header("Location: upload_data.php".$qstring);