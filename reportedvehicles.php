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
        <title>Received Reported Vehicles</title>
    </head>
    <body>
       

            <form method = "POST" >
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
       
           </form></br>


    </body>
</html>
