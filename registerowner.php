<!DOCTYPE html>


<html>
   
   <head>
    <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
   </head>
   
   <body>
   <div id="header" class="header">
       <div>
           <img src="images/logo.png" alt="Logo" >
           <button>Help</button>
           <button>Logout</button>
       </div>

       <h1>&nbsp; Scholar Transport Incident Management</h1>
       <?php
       session_start();
       echo "<h3>Welcome, &nbsp;".$_SESSION['UserName']."</h3> &nbsp;"
       ?>


   </div>


   <?php
         // define variables and set to empty values

        $typeErr= $surnameErr = $nameErr = $idErr = $emailErr= $passportErr = $genderErr = $websiteErr=$noErr =$addressErr = "";
        $type = $alt =$no= $address= $surname =  $idno= $name = $passport = $email = $gender = $class = $course = $subject = "";
        $page = 0; 
        
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
            
                 
                 
                 
             if (empty($_POST["idno"]) &&( strlen( $_POST["idno"]) != 13 )) {
               $idErr = "Incorrect Identity Number format";
            }else {
               $idno = test_input($_POST["idno"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["passport"])) {
               $passport = test_input($_POST["passport"]);
            }else {
               $passport = test_input($_POST["passport"]);
            }
            
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["surname"])) {
               $surnameErr = "Surname is required";
            }else {
               $surname = test_input($_POST["surname"]);
            }
            
             if (empty($_POST["address"])) {
               $addressErr = "Address is required";
            }else {
               $address = test_input($_POST["address"]);
            }
            
            
            if (empty($_POST["phone"])) {
               $noErr = "Cellphone number is required";
            }else {
               $no = test_input($_POST["phone"]);
            }
               if (empty($_POST["alt"])) {
               $noErr = "Cellphone number is required";
            }else {
               $alt = test_input($_POST["alt"]);
            }
            
                 if (empty($_POST["idtype"])) {
               $typeErr = "Please select an Idendification Type";
            }else {
               $type = test_input($_POST["idtype"]);
            }
            
            
   
                                $conn = mysqli_connect("localhost","root","","dbScholar") or die("Error connecting");

		   $q="INSERT INTO `owner`( `IDType`, `IDNo`, `PassportNo`, `Name`, `Surname`, `Address`, `CellNo`, `AltNo`, `Email`, `UserID`) VALUES ('".$type."','".$idno."','".$passport."','".$name."','".$surname."','".$address."','".$no."','".$alt."','".$email."',NULL)";
                       mysqli_query($conn,$q) or die(mysqli_error($conn));
                    $_SESSION['ownerID']    = mysqli_insert_id($conn); 
                       
                           echo "<script>window.open('registervehicle.php','_self');</script>";
                         mysqli_close($conn);
 
            
            
          
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
       
       

          
          
          <div class="ownerReg" style="padding-left: 15em; padding-right: 15em;width: 70%"></br></br>

              <a href="vomconsole.php"><img src="images/home.png" alt="Home" width="50px" height="50px"  > </a>      <h2>Owner Registration</h2><br><br>

      
      
      <form  method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="float: left">
          <br><br>v <h4><span class = "error">* Required Field(s).</span></h4>
          <table class = "reg">
                 <tr>
               <td>*Type of Identity:</td>
               <td>
                   <input type = "radio" name = "idtype" value = "RSA">RSA ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type = "radio" name = "idtype" value = "PASSPORT">PASSPORT
                  <span class = "error"> <?php echo $genderErr;?></span>
               </td>
            </tr><br>
            <tr>
               <td>*ID Number:</td>
               <td><input type = "text" name = "idno" maxlength="13">
                  <span class = "error"> <?php echo $idErr;?></span>
               </td>
            </tr>
            
            <tr>
                <td>Passport Number: </td>
               <td><input type = "text" name = "passport">
                  <span class = "error"><?php echo $passportErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>*Full Names:</td>
               <td> <input type = "text" name = "name">
                  <span class = "error"><?php echo $nameErr;?></span>
               </td>
            </tr>
            
           <tr>
               <td>*Surname:</td>
               <td> <input type = "text" name = "surname">
                  <span class = "error"><?php echo $surnameErr;?></span>
               </td>
            </tr>
         
                <tr>
               <td>*Residential Address:</td>
               <td> <input type = "text" name = "address">
                  <span class = "error"><?php echo $addressErr;?></span>
               </td>
            </tr>
      
          <tr>
               <td>*Cellphone Number:</td>
               <td> <input type = "text" name = "phone">
                  <span class = "error"><?php echo $noErr;?></span>
               </td>
            </tr>
      
                <tr>
               <td>*Alternative Cellphone Number:</td>
               <td> <input type = "text" name = "alt">
                  <span class = "error"><?php echo $noErr;?></span>
               </td>
            </tr>
            
              <tr>
               <td>*Email Address: </td>
               <td><input type = "text" name = "email">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
 
          
      
         </table>
       <br>
       <button  type = "submit" name = "submit" value = "Submit">Submit</button>
      </form>
      
    
       
 </div>
    


      
      
      
       
   </body>
   
   
   
   


   
</html>

