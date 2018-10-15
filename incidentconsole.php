
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
     <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <title>Incident Console</title>

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
         <p>&nbsp; Incident Console</p>
         </div>

<br>
     <form action="" method = "POST" style="padding-left: 350px" >
         <tr>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>Sort By:</td>
             <td> <select name ='sort' onchange='this.form.submit()'>
                     <option value='0'></option>
                     <option value='1'>Incident Type</option>
                     <option value='2'>Incident Area</option>
                     <option value='3'>Association</option>
                     <option value='4'>Not Roadworthy Vehicles </option>
                     <option value='5'>Date</option>
                 </select>
                 <noscript><input type='submit' value='Submit'></noscript>
             </td>
         </tr>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>View Type:</td><tr><input type='image' name="chart" value="bar" src='images/bar.jpg' alt='Bar' width='30' height='30'>
             <input type='image' name="chart" value="grid" src='images/grid.png' alt='Grid'width='30' height='30'> <input type='image' name="chart" value="pie" src='images/pie.png' alt='Pie'width='30' height='30'>
         </tr>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <tr>
             <td>Export To:</td><input type='image' src='images/excel.png'name="export" value="excel" alt='Grid'width='30' height='30'><input type='image' src='images/pdf.png' alt='Grid'width='30' height='30'></tr>

     </form></br></br></br>


     <?php

     include 'config.php';
     $result1 = mysqli_query($conn,"SELECT COUNT(id) as 'result' FROM incident GROUP BY status HAVING status ='Logged'");
     $result2 = mysqli_query($conn,"SELECT COUNT(id) as 'result' FROM incident GROUP BY status HAVING status ='Pending'");
     $result3 = mysqli_query($conn,"SELECT COUNT(id) as 'result' FROM incident GROUP BY status HAVING status ='Completed'");
     $result4 = mysqli_query($conn,"SELECT COUNT(id) as 'result' FROM incident GROUP BY status HAVING status ='Escalated'");
     $row1 = mysqli_fetch_assoc($result1);
     $count1 = $row1['result'];
     $row1 = mysqli_fetch_assoc($result2);
     $count2 = $row1['result'];
     $row1 = mysqli_fetch_assoc($result3);
     $count3 = $row1['result'];
     $row1 = mysqli_fetch_assoc($result4);
     $count4 = $row1['result'];

  echo '  <div id="mySidenav" class="sidenav">
         
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="home.php"><img src="images/home.png" alt="Home" width="50px" height="50px"  > </a>
         <h2 style="color: #BB5E0A; border: #ffffff"></br></br>Incidents</h2>
         <p>&nbsp;Open&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$count1.'</p>
         <p>&nbsp;Pending&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$count2.'</p>
         <p>&nbsp;Escalated&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$count4.'</p>
         <p>&nbsp;Resolved&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$count3.'</p>

     </div> ';

?>
     <?php
     include 'Vehicle.php';
     require 'config.php';
     include 'Functions.php';

     Display();



     $result;
     // $GLOBALS['storeVal'];

     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["chart"]))
     {

         $type = $_POST['chart'];

         if($type == 'pie')
         {
             echo '<div id="piechart"></div>';
             AllPie();
         }
         if($type == 'grid')
         {
             ByType();
         }
         if($type == 'bar')
         {

             echo '<div id="container"></div>';
             AllBar();
         }
     }




     if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["subDate"]))
     {




         $sort = $_POST['sort'];
         //  $GLOBALS['storeVal'] = $sort;
         $_POST['storeVal'] = $sort;

         if($sort == 1)
         {
             // echo 'Incident Type Selected ';
             // echo $_POST['sort'] ;
             ByType();


         }
         if ($sort == 2)
         {
             // echo 'Incident Type Selected ';
             // echo $_POST['sort'] ;
             ByArea();
         }
         if ($sort == 3)
         {
             // echo 'Incident Type Selected ';
             // echo $_POST['sort'] ;
             ByAssociation();
         }
         if ($sort == 4)
         {
             // echo 'Incident Type Selected ';
             // echo $_POST['sort'] ;
             ByRoadWorthy();
         }
         if ($sort == 5)
         {
             //echo 'Incident Type Selected ';
             // echo $_POST['sort'] ;
             echo '<form method = "POST">';
             echo '<br><br>Date From: <input type="date" name="dFrom" value="'.date('Y-m-d').'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
             echo 'Date To: <input type="date" name="dTo"value="'.date('Y-m-d').'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
             echo '<input type="submit" name="subDate" value="Sort" >';
             echo '</form>';



         }




         if (  isset($_POST["export"]))
         {

             // $sort = $_SESSION['sortVal'];
             //  echo "<br>".$_POST["export"]."<br>";

             //  echo $_POST['t01'] ;

             ExportAllExcel($_SESSION['res']);

             if($sort == 1 &&$_POST["export"] == "excel" )
             {
                 // echo 'Incident Type Selected ';
                 // echo $_POST['sort'] ;
                 //   ExportAllExcel();
                 echo $_POST["export"];

             }
             if ($sort == 2)
             {
                 // echo 'Incident Type Selected ';
                 // echo $_POST['sort'] ;
                 ByArea();
             }
             if ($sort == 3)
             {
                 // echo 'Incident Type Selected ';
                 // echo $_POST['sort'] ;
                 ByAssociation();
             }
             if ($sort == 4)
             {
                 // echo 'Incident Type Selected ';
                 // echo $_POST['sort'] ;
                 ByRoadWorthy();
             }
             if ($sort == 5)
             {



             }





         }




     }


     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["subDate"]))
     {


         $dTo = $_POST["dTo"];
         $dFrom =$_POST["dFrom"];

         if($dFrom > $dTo )
         {
             echo 'Invalid Date parameters! Select Correct dates';
             echo '<form method = "POST">';
             echo '<br><br>Date From: <input type="date" name="dFrom"value="'.date('Y-m-d').'"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
             echo 'Date To: <input type="date" name="dTo"value="'.date('Y-m-d').'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
             echo '<input type="submit" name="subDate" value="Sort" >';
             echo '</form>';

         }
         else
         {
             ByDate($dTo, $dFrom);
         }
     }


     ?>


    </body>
</html>


