<!DOCTYPE html>
<?php
session_start(); ?>

<html>
   
   <head>
    <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
    <title>Edit Owner Details</title>
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


          <div class="ownerReg">
	
      <h2>Edit Owner Details</h2>
      
           <br><br><br><br><br>
       <div class="ownerEdit">  
           <form method="POST">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <td >Owner Name:</td>  <input type = "text" name = "searchname" maxlength="13"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="images/search.png" name="search" value="tr" alt="search"width="30" height="29">
           </form>
          <br></div>
      
    <!-- 
    
      -->
    
       
 </div>
       
         <?php
         // define variables and set to empty values
         include 'config.php';
       
        $typeErr= $surnameErr = $nameErr = $idErr = $emailErr= $passportErr = $genderErr = $websiteErr=$noErr =$addressErr = "";
        $type = $alt =$no= $address= $surname =  $idno= $name = $passport = $email = $gender = $class = $course = $subject = "";
        $page = 0; 
        
         if ($_SERVER["REQUEST_METHOD"] == "POST") 
             {
          
            
         if(isset($_POST['search']))
         {
             
             
             $q = "Select * FROM OWNER WHERE name like '%".$_POST['searchname']."%'";
             $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
              
                      echo "<div><form method='POST'> <br><table border='1'>
<tr>
<th >Owner ID</th>
<th >IDNo</th>
<th>Name</th>
<th>Surname</th>

</tr>";
                              while($row = mysqli_fetch_array($result))
{
        echo "<tr >";

echo "<td><input type='submit' name='postedid'value='" . $row['OwnerID'] ."' style='border:none;background: none;'></input></td>";
echo "<td>" . $row['IDNo'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Surname'] . "</td>";

echo "</tr></form></div>";
}
            
              
              
              mysqli_close($conn);
         }
   
                         

          
         
         
         if(isset($_POST['postedid']))
         {
            $i= $_POST['postedid'];
             $_SESSION['oID'] =  $i;
            $q = "Select * FROM OWNER WHERE OwnerID = ".$i;
            $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
            $row = mysqli_fetch_array($result);
            
            echo '  <div class="ownerReg"> <form  method = "POST" >
       
          <table>
         
            <tr>
               <td>ID Number</td>
               <td>'. $row['IDNo'] .'</td>
                  
               </td>
            </tr>
            
            <tr>
               <td>Passport Number </td>
                  <td>'. $row['PassportNo'] .'</td>
               </td>
            </tr>
            
            <tr>
               <td>Full Names</td>
                  <td>'. $row['Name'] .'</td>
               </td>
            </tr>
            
           <tr>
               <td>Surname</td>
               <td>'. $row['Surname'] .'</td>
               </td>
            </tr>
         
                <tr>
               <td>Residential Address</td>
                <td><input type = "text" name = "address" value="'. $row['Address'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
      
          <tr>
               <td>Cellphone Number</td>
               <td><input type = "text" name = "CellNo" value="'. $row['CellNo'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
      
                <tr>
               <td>Alternative Cellphone Number</td>
                <td><input type = "text" name = "AltNo" value="'. $row['AltNo'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
            
              <tr>
               <td>Email Address </td>
               <td><input type = "text" name = "email" value="'. $row['Email'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
 
        
         </table>
         <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <button  type = "submit" name = "submitChange" value = "Submitted">Submit</button>
         <button  type = "cancel" name = "submitChange" value = "Cancel">Cancel</button>
      </form></div>';
            
            
            
         }  
         
         
          if(isset($_POST['submitChange'])) 
          {
              $clicked = $_POST['submitChange'];
           
              
              if($clicked=='Submitted')
              {
                  $address = $_POST['address'];
                  $cell = $_POST['CellNo'];
                  $alt = $_POST['AltNo'];
                  $email = $_POST['email'];
                  $q = "UPDATE owner SET Address='".$address."', CellNo='".$cell."', AltNo='".$alt."' ,Email='".$email."' WHERE OwnerID=".$_SESSION['oID']."";
                mysqli_query($conn,$q) or die(mysqli_error($conn));
                  echo '<script language="javascript">';
echo 'alert("Details succesfully Updated")';
echo '</script>';
              }
              elseif ($clicked=='Cancel') 
                  {
              
                  }
          }
            
         }
         
         
         
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
       
       
   
    


      
          <script>
   document.body.innerHTML = document.body.innerHTML.replace("&amp;tab;", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;").replace("&amp;tabf;", "&nbsp;&nbsp;&nbsp;&nbsp;");   
       </script>
   </body>
   
   
   
   


   
</html>

