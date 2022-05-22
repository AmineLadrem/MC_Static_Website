<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['Name']) && isset($_POST['LastName']) &&
        isset($_POST['Major']) && isset($_POST['Faculty']) && isset($_POST['Email']) &&isset($_POST['phonenumber']) &&
        isset($_POST['AcademicYear']) && isset($_POST['Matricule'])) {
        
    
        $Name = $_POST['Name'];
        $LastName = $_POST['LastName'];
        $Major = $_POST['Major'];
        $Faculty = $_POST['Faculty'];
        $Email = $_POST['Email'];
        $phonenumber=$_POST['phonenumber'];
        $AcademicYear = $_POST['AcademicYear'];
        $Matricule = $_POST['Matricule'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "register";
        global $registered;
        global $sendmail;
        global $someone;
        global $allfield;
        global $submit;
        global $emailfail;
        global $phonenumberfail;
        global $matriculefail;
        global $success;
      
        
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        $success=0;
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select1 = "SELECT Email FROM register WHERE Email = ? LIMIT 1";
            $Select2 = "SELECT phonenumber FROM register WHERE phonenumber = ? LIMIT 1";
            $Select3 = "SELECT Matricule FROM register WHERE Matricule = ? LIMIT 1";
            $Insert = "INSERT INTO register(Name, Lastname, Major,Faculty, Email,phonenumber, AcademicYear, Matricule) values(?, ?, ?, ?, ?, ?,?,?)";
            $stmt = $conn->prepare($Select1);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt = $conn->prepare($Select2);
                $stmt->bind_param("s", $phonenumber);
                $stmt->execute();
                $stmt->bind_result($resultphonenumber);
                $stmt->store_result();
                $stmt->fetch();
                $rnum = $stmt->num_rows;
                if ($rnum == 0) {
                    $stmt = $conn->prepare($Select3);
                    $stmt->bind_param("s", $Matricule);
                    $stmt->execute();
                    $stmt->bind_result($resultMatricule);
                    $stmt->store_result();
                    $stmt->fetch();
                    $rnum = $stmt->num_rows;
                    if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssssss",$Name ,$LastName ,$Major,$Faculty, $Email,$phonenumber, $AcademicYear,  $Matricule);
                if ($stmt->execute()) {
                  $registered=   "Registration done succefully \r\n";
                  $success=1;
            
                    $to =$Email;
                    $subject  = 'Registration Email';
                    $message  = 'Hi, this is an automatic email sent after your successful registration ! ';
                    $headers  = 'From: pweb.projet20@gmail.com' . "\r\n" .
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-type: text/html; charset=utf-8';
                    if(mail($to, $subject, $message, $headers))
                    
                     $sendmail= "Registration Email sent check your inbox [Spam as well]";
                    else
                        $emailfail= "Email sending failed";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                $matriculefail= "Someone already registered using that Matricule.";
            }
        }
        else {
            $phonenumberfail= "Someone already registered using this phone number.";
        }
    }
            else {
                $someone= "Someone already registered using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        $allfield= "All field are required.";
        die();
    }
}
else {
    $submit= "Submit button is not set";
}
?>

<!DOCTYPE html>
<html>
    <head>
<style>
    html {
  background: url(https://preview.redd.it/bs12ptxixas51.jpg?auto=webp&s=3a4a129267078492cbe9375d53e8d7e3bb2f2f18);
  background-size: cover;
  display: flex;
}

p{

    padding-left: 560px;
    padding-top: 290px;
    font-family: "Tapestry", cursive;
  font-size: xx-large;
  text-align: center;
  position:absolute;
  color: white;

}


.button,
.button.secondary:hover {
  background-color:#7400ff;
  color: #0a0a0a;
  font-weight: 700;
  text-transform: uppercase;
  font-family: "Tapestry", cursive;
  padding: 0.8em 1.8em;
  font-size: 1em;
  margin: auto 0;
  border: 1px solid #7400ff;
  transition: background 300ms ease-in, color 300ms ease-in;
}
.button:hover,
.button.secondary {
  background-color: transparent;
  font-family: "Tapestry", cursive;
  color: #7400ff;
}


</style>

<script>

    
</script>

    </head>

    <body>

    <button
          class="button"
          style="padding: 10px"
          onclick="location.href='https://lydiabn.github.io/MC_Static_Website2/'"
          type="button"
        >
          Home Page
        </button> 

        <?php if($success==0){
echo "<button class='button' style='padding: 10px ; margin-left:10px' onclick=location.href='http://localhost/project/form.php' type='button'>";
echo " Go Back ";
echo "</button>";
        }
?>
        

<p><?php echo $registered; ?> </p><br><br><br>

<p><?php echo $sendmail; ?> </p><br><br>

<p><?php echo $emailfail; ?> </p>

<p><?php echo $someone; ?> </p>

<p><?php echo $submit; ?> </p>

<p><?php echo $allfield; ?> </p>

<p><?php echo $allfield; ?> </p>

<p><?php echo $matriculefail; ?> </p>

<p><?php echo $phonenumberfail; ?> </p>


    </body>
</html>
