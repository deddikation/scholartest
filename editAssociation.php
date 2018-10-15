<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
          <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
        <title>Edit Transport Association Details</title>
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

        echo "<h3>Welcome, &nbsp;".$_SESSION['UserName']."</h3> &nbsp;"
        ?>
        <p>&nbsp; Vehicle Owner Management Console</p>
    </div></br> </br> </br>
        
                 <div class="ownerReg">
	
      <h2>Search For Association</h2>
      </br> </br></br> </br></br> </br></br> </br>
           
       <div class="ownerEdit">  
           <form method="POST">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <td >Association Name:</td>  <input type = "text" name = "searchname" maxlength="13"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="images/search.png" name="search" value="tr" alt="search"width="30" height="29">
           </form>
          <br></div>
      
    <!-- 
    
      -->
    
       
 </div>
        <?php
        include 'config.php';
        
          if ($_SERVER["REQUEST_METHOD"] == "POST") 
             {
                     if(isset($_POST['search']))
         {
             
             
             $q = "Select * FROM Association WHERE Name like '%".$_POST['searchname']."%'";
             $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
              
                      echo "<div><form method='POST'> <br><table border='1'>
<tr>
<th >Association ID</th>
<th >Name</th>


</tr>";
             
    while($row = mysqli_fetch_array($result))
{
        echo "<tr >";

echo "<td><input type='submit' name='postedid'value='" . $row['AssociationID'] ."' style='border:none;background: none;'></input></td>";

echo "<td>" . $row['Name'] . "</td>";

echo "</tr></form></div>";
}
            
              
              
              mysqli_close($conn);
         }
         
              
         
         
             
           if(isset($_POST['postedid']))
         {
            $i= $_POST['postedid'];
             $_SESSION['AssociationID'] =  $i;
             
            $q = "Select * FROM Association WHERE AssociationID = '".$i."'";
            $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
            $row = mysqli_fetch_array($result);
            
            echo '  <div class="ownerReg"> <form  method = "POST" >
       
          <table>
         
            <tr>
               <td>Association Name</td>
               <td>'. $row['Name'] .'</td>
                  
               </td>
            </tr>
            
            <tr>
               <td>Address</td>
                  <td>'. $row['Address'] .'</td>
               </td>
            </tr>
           
            
           <tr>
               <td>Contact Name</td>
               <td><input type = "text" name = "ContactName" value="'. $row['ContactName'] .'">
               </td>
            </tr>
         
                <tr>
               <td>Contact Surname</td>
                <td><input type = "text" name = "ContactSurname" value="'. $row['ContactSurname'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
      
          <tr>
               <td>Office Number</td>
               <td><input type = "phone" name = "OfficeNo" value="'. $row['OfficeNo'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
      
                <tr>
               <td>Cellphone Number</td>
                <td><input type = "phone" name = "CellNo" value="'. $row['CellNo'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
            
              <tr>
               <td>Alternative Number</td>
               <td><input type = "phone" name = "AltNo" value="'. $row['AltNo'] .'">
                  <span class = "error"><?php echo $emailErr;?></span>
               </td>
            </tr>
 
           <tr>
               <td>Email Address</td>
               <td><input type = "email" name = "Email" value="'. $row['Email'] .'">
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
                 
                  $ContactName = $_POST['ContactName'];
                  $ContactSurname = $_POST['ContactSurname'];
                  $OfficeNo = $_POST['OfficeNo'];
                  $CellNo = $_POST['CellNo'];
                  $AltNo = $_POST['AltNo'];
                  $Email = $_POST['Email'];
                  $q = "UPDATE Association SET ContactName='".$ContactName."', ContactSurname='".$ContactSurname."', OfficeNo='".$OfficeNo."' ,CellNo='".$CellNo."',AltNo='".$AltNo."',Email='".$Email."' WHERE VINNo='".$_SESSION['AssociationID']."'";
                mysqli_query($conn,$q) or die(mysqli_error($conn));
                  echo '<script language="javascript">';
echo 'alert("Association Details succesfully Updated")';
echo '</script>';
              }
              elseif ($clicked=='Cancel') 
                  {
              
                  }
          }  
              
               }
        ?>
    </body>
</html>
