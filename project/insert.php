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
                    $message  = '<!DOCTYPE html>
                    <html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
                    
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                        <!--[if !mso]><!-->
                        <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
                        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
                        <!--<![endif]-->
                        <style>
                            * {
                                box-sizing: border-box;
                            }
                    
                            body {
                                margin: 0;
                                padding: 0;
                            }
                    
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: inherit !important;
                            }
                    
                            #MessageViewBody a {
                                color: inherit;
                                text-decoration: none;
                            }
                    
                            p {
                                line-height: inherit
                            }
                    
                            .desktop_hide,
                            .desktop_hide table {
                                mso-hide: all;
                                display: none;
                                max-height: 0px;
                                overflow: hidden;
                            }
                    
                            @media (max-width:520px) {
                                .row-content {
                                    width: 100% !important;
                                }
                    
                                .column .border,
                                .mobile_hide {
                                    display: none;
                                }
                    
                                table {
                                    table-layout: fixed !important;
                                }
                    
                                .stack .column {
                                    width: 100%;
                                    display: block;
                                }
                    
                                .mobile_hide {
                                    min-height: 0;
                                    max-height: 0;
                                    max-width: 0;
                                    overflow: hidden;
                                    font-size: 0px;
                                }
                    
                                .desktop_hide,
                                .desktop_hide table {
                                    display: table !important;
                                    max-height: none !important;
                                }
                            }
                        </style>
                    </head>
                    
                    <body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                        <table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f5f5f5;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                                                        <table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                            <tr>
                                                                                <td style="text-align:center;width:100%;">
                                                                                    <h1 style="margin: 0; color: #393d47; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 23px; font-weight: 400; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong><span class="tinyMce-placeholder"><span style="color: #5500ff;">Micro</span><br><span style="color: #575558;">Club</span></span></strong></h1>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f5f5f5;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; background-color: #f5f5f5; width: 500px;" width="500">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 15px; padding-bottom: 20px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                                                        <table class="addon_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                            <tr>
                                                                                <td style="width:100%;padding-right:0px;padding-left:0px;">
                                                                                    <div align="center" style="line-height:10px"><img src="https://media4.giphy.com/media/D1gkyTke4KNsDd8soO/giphy.gif?cid=20eb4e9dphjoyignabqelqvv4es2wrb55qay2topc9ae8kj9&rid=giphy.gif&ct=g" style="display: block; height: auto; width: 375px; max-width: 100%;" width="375" alt="Image" title="Image"></div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                            <tr>
                                                                                <td style="text-align:center;width:100%;">
                                                                                    <h1 style="margin: 0; color: #393d47; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 25px; font-weight: 400; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Welcome among us !</strong></h1>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="font-family: Tahoma, Verdana, sans-serif">
                                                                                        <div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
                                                                                            <p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 22.5px;"><span style="color:#000000;background-color:#ffffff;font-size:15px;white-space:pre;"> Hi ,this is an automatic email sent<br>after your successful registration !</span></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                            <tr>
                                                                                <td style="padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                                    <div style="font-family: Tahoma, Verdana, sans-serif">
                                                                                        <div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5; font-family: Tahoma, Verdana, Segoe, sans-serif;">
                                                                                            <p style="margin: 0; font-size: 12px; mso-line-height-alt: 18px;">&nbsp;</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f5f5f5;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                                                        <table class="text_block" width="100%" border="0" cellpadding="15" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="font-family: sans-serif">
                                                                                        <div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2;">
                                                                                            <p style="margin: 0; font-size: 15px; text-align: center;"><br><span style="font-size:15px;"><strong><span style>please feel free to contact us at <a href="mailto:contact@microclub.net" target="_blank" title="support@youremail.com" rel="noopener" style="text-decoration: underline; color: #393d47;">contact@microclub.net</a></span></strong></span></p>
                                                                                            <p style="margin: 0; font-size: 15px; text-align: center;"><span style="font-size:15px;"><a href="https://www.facebook.com/Micro.Club.USTHB/" target="_blank" style="text-decoration: underline; color: #393d47;" rel="noopener"><strong><span style>Facebook</span></strong></a></span></p>
                                                                                            <p style="margin: 0; font-size: 15px; text-align: center;"><span style="font-size:15px;"><a href="https://www.instagram.com/microclub_usthb/" target="_blank" style="text-decoration: underline; color: #393d47;" rel="noopener"><strong><span style>Instagram</span></strong></a></span></p>
                                                                                            <p style="margin: 0; font-size: 15px; text-align: center;"><span style="font-size:15px;"><a href="https://www.linkedin.com/company/micro-club/" target="_blank" style="text-decoration: underline; color: #393d47;" rel="noopener"><strong><span style>LinkedIn</span></strong></a></span></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                                                        <table class="html_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word; word-wrap: break-word;">
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;" align="center"><div style="height:30px;">&nbsp;</div></div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table class="html_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word; word-wrap: break-word;">
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;" align="center"><div style="margin-top: 25px;border-top:1px dashed #D6D6D6;margin-bottom: 20px;"></div></div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="font-family: Tahoma, Verdana, sans-serif">
                                                                                        <div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #C0C0C0; line-height: 1.2;">
                                                                                            <p style="margin: 0; text-align: center;"><span style="font-size:13px;">Room 148 , Faculty of computer science USTHB&nbsp; /&nbsp;microclub.contact@gmail.com /&nbsp;0558 52 11 45</span><a href="http://www.example.com" style></a></p>
                                                                                            <p style="margin: 0; font-size: 12px; text-align: center;"><span style="color:#c0c0c0;">&nbsp;</span></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table class="html_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word; word-wrap: break-word;">
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;" align="center"><div style="height-top: 20px;">&nbsp;</div></div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;" width="500">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
                                                                        <table class="empty_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                                                            <tr>
                                                                                <td>
                                                                                    <div></div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table><!-- End -->
                    </body>
                    
                    </html> ';
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

