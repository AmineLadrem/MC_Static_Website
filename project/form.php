<!DOCTYPE html>
<html>
  <head>
    <title>Register Form</title>
    <style>

#box1 {
  float: right;
  width: 70%;
}
#box2 {
  float: left;
  width: 30%;
}


#tablefaculty,#tableyear,#tablefaculty th , #tableyear th {
    font-family: "Tapestry", cursive;
  font-size: larger;
  text-align: center;
    color: white;
  border: 1px solid #c61aff;
}
#tablefaculty{

  margin-top: 200px;
    margin-bottom: 50px;
    height: 100px;
    width: 100px;
    padding: 0;
}

#tableyear{

margin-top: 200px;
  margin-bottom: 50px;
  height: 100px;
  width: 100px;
  padding: 0;
}


#tablefaculty td , #tableyear td {
  font-family: "Tapestry", cursive;
  font-size: larger;
  text-align: center;
  color: white;
  border: 1px solid #c61aff;
}


input[type="text"]:focus {
  background-color: #37345e;
}
input[type="radio"]:focus {
  background-color: #37345e;
}
input[type="email"]:focus {
  background-color: #37345e;
}
input[type="phone"]:focus {
  background-color: #37345e;
}
input[type="text"] {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding-left: 40px;
}
input {
  background-color: #282464;
}
.input2 {
  width: 400px;
  height: 40px;
}
select {
  background-color: #282464;
  font-family: "Tapestry", cursive;
  color: white;
}
input[type="button"],
input[type="submit"],
input[type="reset"] {
  background-color: #282464;
  border: none;
  color: white;
  font-family: "Tapestry", cursive;
  font-size: large;
  width: 150px;
  height: 60px;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
table td {
  font-family: "Tapestry", cursive;
  font-size: larger;
  text-align: center;
  color: white;
}
table {
  padding-left: 2rem;
    padding-right: -9rem;
    height: 959px;
    width: 990px;
}
html {
  background: url(https://preview.redd.it/bs12ptxixas51.jpg?auto=webp&s=3a4a129267078492cbe9375d53e8d7e3bb2f2f18);
  background-size: cover;
  display: flex;
}

form{

  margin-left: 50px;
}




</style>
  </head>
  <body>
  <div id="box1";>
    <form action="./insert.php" method="POST">
      <table>
        <tr>
          <td>Name :</td>
          <td><input type="text" name="Name" required class="input2" /></td>
        </tr>
        <tr>
          <td>LastName :</td>
          <td><input type="text" name="LastName" required class="input2" /></td>
        </tr>
        <tr>
          <td>Major :</td>
          <td>
            <input type="radio" name="Major" value="mi" required />mi
            <input type="radio" name="Major" value="sm" required />sm
            <input type="radio" name="Major" value="snv" required />snv
            <input type="radio" name="Major" value="st" required />st
            <input type="radio" name="Major" value="stu" required />stu
          </td>
        </tr>
        <tr>
        <td>Faculty :</td>
          <td>
            <input type="radio" name="Faculty" value="Math" required />Math
            <input type="radio" name="Faculty" value="CS" required />CS  
            <input type="radio" name="Faculty" value="Elec" required />Elec
            <input type="radio" name="Faculty" value="CE" required />CE
            <input type="radio" name="Faculty" value="Chemistry" required />Chemistry    
            <input type="radio" name="Faculty" value="Phy" required />Phy
            <input type="radio" name="Faculty" value="GAT/GEO" required />GAT/GEO
            <input type="radio" name="Faculty" value="Bio" required />Bio
</td>
        </tr>
        <tr>
          <td>Email :</td>
          <td><input type="Email" name="Email" required class="input2" /></td>
        </tr>
        <tr>
          <td>Phone Number :</td>
          <td><input type="phone" name="phonenumber" required class="input2" /></td>
        </tr>
        <tr>
          <td>AcademicYear:</td>
          <td>
            <select name="AcademicYear" required class="input2">
              <option selected hidden value="">Select Code</option>
              <option value="L1">L1</option>
              <option value="L2">L2</option>
              <option value="L3">L3</option>
              <option value="M1">M1</option>
              <option value="M2">M2</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Matricule :</td>
          <td>
            <input type="phone" name="Matricule" required class="input2" />
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="Submit" name="submit" class="input2" />
          </td>
          <td>
            <input
              type="button"
              onclick="location.href='https://lydiabn.github.io/MC_Static_Website2/';"
              value="Go back"
              class="input2"
            />
          </td>
        </tr>
      </table>
    </form>
</div>

<div id="box2";>
    <?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "", "register");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT  Faculty ,count(*)  FROM register group by Faculty order by count(*) DESC";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table id='tablefaculty'>";
            echo "<tr>";
                echo "<th>Faculty</th>";
                echo "<th>Joined</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Faculty'] . "</td>";
                echo "<td>" . $row['count(*)'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
        
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "SELECT  Academicyear ,count(*)  FROM register group by Academicyear order by count(*) DESC";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table id='tableyear'>";
            echo "<tr>";
                echo "<th>Academic Year</th>";
                echo "<th>Joined</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Academicyear'] . "</td>";
                echo "<td>" . $row['count(*)'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
        
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

?>
</div>



  </body>
</html>
