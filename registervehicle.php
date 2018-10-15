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
    <a href="vomconsole.php"><img src="images/home.png" alt="Home" width="50px" height="50px"  > </a>
        <div id='Paris' class='tabcontent'>
              <br><br><br><br><br>
            <form method="POST" >
      <tr> 
          <td>*Select Number of Vehicles to register:</td>
               <td>
                   <input type = "number" name = "numV" min="1" max="20">  <input type = "submit"  value = "Next"  > 
               </td>
            </tr>
        </form>
        </div>
        
        <?php
        require 'config.php';
        // put your code here
        
        if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
              $numV = $_POST['numV'];
              $_SESSION['v'] = $numV;
                 if($numV >=1)
                   {
                               echo "<script>window.open('noVehicles.php','_self');</script>";

                  }
                   else {
                               echo "   <span class = 'error'> Please Select a number of vehicles to continue</span> ";
                    }

      
            }
        ?>
        
    </body>
</html>
