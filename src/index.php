<?php   
    
    require_once('config.php');

    

    if(@!$_SESSION['login']){
        header("Location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UCS-2">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    
   
    <style>
        .form-inline .form-group {
            margin-right:4px;
        }
        .cat_row td{
            background-color:#000;
            color:#fff;
        }
        
    </style>
  </head>
  <body >    

    <div class="container">
        
        <div class="row">
            <div class="col-sm-12">
                <h2>TATA <small>Reports</small></h2>
                <h5> <small>By(Mohamed.Said)</small> </h5> 
                <h6><a href="login.php?a=logout">logout</a></h6>                                      
            </div>            
        </div>
       
        <div class="row">
            <div class="col-sm-12">
                <table class="table" id="DataTable"> 
                    <thead>
                        <tr>
                            <th>تقارير طأطأ</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <ion-icon name="document"></ion-icon>
                                <a href="report-msales.php" >تقرير المبيعات اليومية</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ion-icon name="document"></ion-icon>
                                <a href="report-orders.php" >الأوردرات اليومية</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ion-icon name="document"></ion-icon>
                                <a href="report-cards.php" >تقرير كروت الشركات</a>
                               
                            </td>
                        </tr>
                        <!-- <tr>
                            <td scope="row" colspan="2">
                                <h2></span>أسماك</h2>
                            </td>
                            
                        </tr>
                        <tr>
                            <td scope="row">جمبري مشوي</td>
                            <td>5</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">جمبري طازة</td>
                            <td>4.30</td>
                            <td></td>
                        </tr> -->
                    </tbody>
                </table>
                

            </div>
        </div>
        


    </div>
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/jquery.form.min.js" ></script>
    <script src="./js/jquery.submit.min.js"></script>

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="js/jquery.table2excel.js"></script>


    </body>
</html>