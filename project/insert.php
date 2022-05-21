<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['Name']) && isset($_POST['LastName']) &&
        isset($_POST['Major']) && isset($_POST['Email']) &&
        isset($_POST['AcademicYear']) && isset($_POST['Matricule'])) {
        
            //get form data 
        $Name = $_POST['Name'];
        $LastName = $_POST['LastName'];
        $Major = $_POST['Major'];
        $Email = $_POST['Email'];
        $AcademicYear = $_POST['AcademicYear'];
        $Matricule = $_POST['Matricule'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "register";
        //connect to database 
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT Email FROM register WHERE Email = ? LIMIT 1";
            $Insert = "INSERT INTO register(Name, Lastname, Major, Email, AcademicYear, Matricule) values(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssss",$Name ,$LastName ,$Major, $Email, $AcademicYear,  $Matricule);
                if ($stmt->execute()) {
                    echo "Registration done succefully \r\n";
                    //sending the email 
                    $to =$Email;
                    $subject  = 'Registration Email';
                    $message  = 'Hi, this is an automatic email sent after your successful registration ! ';
                    $headers  = 'From: pweb.projet20@gmail.com' . "\r\n" .
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-type: text/html; charset=utf-8';
                    if(mail($to, $subject, $message, $headers))
                    
                        echo "___Registration Email sent check your inbox [Spam as well]___";
                    else
                        echo "Email sending failed";

                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registered using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
