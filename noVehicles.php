<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS/style.css" rel="stylesheet" type="text/css"  media="all" />
     
        <title>Vehicle Registration</title>
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

            include 'Vehicle.php';
            require 'config.php';
         $typeErr= $vinErr = $regNoErr = $lrwtErr = $nrwtErr= $assErr = $toErr = $websiteErr=$fromErr =$nameErr =  $pdpErr="";
        $type = $vin= $regNo= $lrwt= $nrwt= $ass= $to= $from= $name= $pdp="" ;
        $noV = $_SESSION['v']; 
        $ListOfObjects = array();
        $ownerID = $_SESSION["ownerID"];
        $count = 0;
                          
                          
                        
                           
                             for ($x = 1; $x <= $noV; $x++) 
                    {
                        echo "
        
               <div id='Paris' class='tabcontent'>
    <h2>Vehicle ".$x." Details</h2>
      
      <p><span class = 'error'>* required field.</span></p>
      
      <form method = 'POST' >
         <table>
                 <tr>
               <td>*Type of Vehicle:</td>
               <td>
                  <input type = 'text' name = 'vType".$x."'>
               <span class = 'error'> <?php echo $typeErr;?></span>
                 
               </td>
            </tr>
            <tr>
               <td>*VIN Number:</td>
               <td><input type = 'text' name = 'vin".$x."' maxlength='17'>
                  <span class = 'error'> <?php echo $vinErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>*Vehicle Registration Number: </td>
               <td><input type = 'text' name = 'regNo".$x."'>
                     <span class = 'error'> <?php echo $regNoErr;?></span>
                  
               </td>
            </tr>
            
            <tr>
               <td>*Last Road Worthy Test Date:</td>
               <td> <input type = 'date' name = 'lrwt".$x."'>
                 <span class = 'error'> <?php echo $lrwtErr;?></span>
               </td>
            </tr>
            
           <tr>
               <td>*Next Road Worthy Test Date:</td>
               <td> <input type = 'date' name = 'nrwt".$x."'>
                <span class = 'error'> <?php echo $nrwtErr;?></span> 
               </td>
            </tr>
         
                <tr>
               <td>*Registered Transport Association:</td>
               <td> <select name ='ass".$x."'>" ;
                
  $query = "SELECT * FROM association";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  while($row=mysqli_fetch_assoc($result))
                {
                  echo "<option value='".$row["AssociationID"]."'>".$row["Name"]."</option>";
                  }

            echo   "'</select>
                 <span class = 'error'> <?php echo $assErr;?></span>
               </td>
            </tr>
      
            
                <tr>
               <td>*Transport To:</td>
               <td> <input type = 'text' name = 'tt".$x."' max = '50'>
                <span class = 'error'> <?php echo $toErr;?></span>
               </td>
            </tr>
            
            
                <tr>
               <td>*Transport From:</td>
               <td> <input type = 'text' name = 'from".$x."' max='50'>
                  <span class = 'error'> <?php echo $fromErr;?></span>
               </td>
            </tr>
            
              <tr>
               <td>*Driver Name: </td>
               <td><input type = 'text' name = 'dName".$x."' max='50'>
               <span class = 'error'> <?php echo $nameErr;?></span>  
               </td>
            </tr>
            
         <tr>
               <td>*Driver PDP Number: </td>
               <td><input type = 'text' name = 'pdp".$x."' max='50'>
               <span class = 'error'> <?php echo $pdpErr;?></span>  
               </td>
            </tr></table>";
            
         
            
            

                    }
                    
                              echo "   <tr>
               <td>
                  <input type = 'submit'   value = 'Submit'> 
               </td>
            </tr>";  
                              
                              echo       "      
         
      </form>
      
                    </div>"; 
             
           
         
         
    
        
           if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
          
              for ($x = 1; $x <= $noV; $x++) 
                  {
                    
                   /* echo intval($_POST['ass'.$x]);
                    echo $_POST['vType'.$x]."</br>";
                    echo $_POST['vin'.$x]."</br>";
                    echo $_POST['regNo'.$x]."</br>";
                    echo $_POST['lrwt'.$x]."</br>";
                    echo $_POST['nrwt'.$x]."</br>";
                    echo $_POST['ass'.$x]."</br>";
                    echo $_POST['tt'.$x]."</br>";
                    echo $_POST['from'.$x]."</br>";
                    echo $_POST['dName'.$x]."</br>";
                    echo $_POST['pdp'.$x]."</br>"; */
                    
                      
                        if(empty($_POST['vType'.$x]) && strlen($_POST['vType'.$x])< 50)
                              {
                                    $typeErr = "Please capture a correct Vehicle Type"; 
                                    $count -=1;
                                    
                              }
                        else 
                              {
                                    $type =$_POST['vType'.$x] ;
                                    $count += 1;
                                     echo $count;
                              }
                              
                              if(empty($_POST['vin'.$x]) && strlen($_POST['vin'.$x]) !=17)
                                    {
                                        $vinErr = "Please Enter a coorect VIN Number";  
                                         $count -=1;
                                    }
                              else 
                                    {
                                          $vin = $_POST['vin'.$x];
                                          $count += 1; echo $count;
                                          
                                    }
                                    
                               if(empty($_POST['regNo'.$x]) && strlen($_POST['regNo'.$x])< 20)
                                     {
                                          $regNoErr = "Please Enter a correct Vehicle Registration Number";
                                           $count -=1;
                                     }
                              else
                                    {
                                          $regNo = $_POST['regNo'.$x];
                                          $count += 1;
                                           echo $count;
                                    }
                                    
                                    if(empty($_POST['lrwt'.$x]))
                                          {
                                                $lrwtErr = "Please select a date";
                                                 $count -=1;
                                          }
                                          else
                                                {
                                                      $lrwt = $_POST['lrwt'.$x];
                                                      $count +=1;
                                                       echo $count;
                                                }
                                                
                                                
                                    if(empty($_POST['nrwt'.$x]))
                                          {
                                                $nrwtErr = "Please select a date";
                                                 $count -=1;
                                          }
                                    else {
                                                           $nrwt = $_POST['nrwt'.$x];
                                                      $count +=1;
                                                 //      echo $count;
                                          }
                                          
                                      if(empty($_POST['ass'.$x]))
                                            {
                                                $assErr = "Please Select an Association";
                                                 $count -=1;
                                            }
                                      else {
                                                $ass = intval($_POST['ass'.$x]);
                                                $count +=1;
                                               //  echo $count;
                                               //  echo $ass;
                                            }
                                            
                                       if(empty($_POST['tt'.$x]) && strlen($_POST['tt'.$x])<50)
                                             {
                                                $toErr = "Please enter a route";
                                                 $count -=1;
                                             }
                                       else
                                             {
                                                $to = $_POST['tt'.$x] ;
                                                $count+=1;
                                               //  echo $count;
                                             }
                                             
                                       if(empty($_POST['from'.$x]) && strlen($_POST['from'.$x])<50)    
                                             {
                                                $fromErr= "Please enter a route";
                                                 $count -=1;
                                             }
                                             else
                                                   {
                                                      $from = $_POST['from'.$x] ;
                                                      $count+=1;
                                                   //    echo $count;
                                                   }
                                       if(empty($_POST['dName'.$x]) && strlen($_POST['dName'.$x])<50)  
                                             {
                                                $nameErr = "Please enter the Driver Name";
                                                 $count -=1;
                                             }
                                       else {
                                                $name = $_POST['dName'.$x];
                                                $count +=1;
                                               //  echo $count;
                                             }
                                             
                                       if(empty($_POST['pdp'.$x]) && strlen($_POST['pdp'.$x])<50) 
                                             {
                                                $pdpErr = "Please Enter the driver's PDP Number";
                                                 $count -=1;
                                             }
                                       else {
                                                $pdp = $_POST['pdp'.$x];
                                                $count +=1;
                                               //  echo $count;
                                             }
                                             
                       if($count == 10)
                        {
                           $ListOfObjects[] = new Vehicle($type, $vin, $regNo, $lrwt, $nrwt, $ass, $to, $from, $name, $pdp) ;
                           
                        }
                  else {
 echo $count;
 
                        $count =0;
                        }
                                             
                  }  
                  
                      foreach ($ListOfObjects as $page)
                        {
                        
                       // $page->getType();                    
                                                               $q=" INSERT INTO `vehicle`(`Type`, `VINNo`, `RegNo`, `LRWTestDate`, `NRWTestDate`, `AssociationID`, `ToRoute`, `FromRoute`, `DriverName`, `DriverPDPNo`, `OwnerID`) VALUES('".$page->getType()."','".$page->getVIN()."','".$page->getRegNo()."','".$page->getLRWT()."','".$page->getNRWT()."',".$page->getAssociation().",'".$page->getTo()."','".$page->getFrom()."','".$page->getName()."','".$page->getPDP()."',".$ownerID.")";
                                                                  $count = 0;
                                           mysqli_query($conn,$q) or die(mysqli_error($conn));

                                           mysqli_close($conn);
                                           $_SESSION['vehicles'] = serialize($ListOfObjects);
                                            echo "<script>window.open('qr.php','_self');</script>";
                        }
                        
                    
      }
      
        ?>
    </body>
</html>
