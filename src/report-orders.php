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
                <h2>TATA <small>Menu Sales</small></h2>
                <h5> <small>By(Mohamed.Said)</small> </h5> 
                <h6><a href="login.php?a=logout">logout</a> -  <a href="index.php">Back</a></h6>                                      
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form id="branch" action="demo" method="get">
                    <div class="form-group">
                      <label for="">Date</label>
                      <input type="text"
                        class="form-control" name="order" id="order" aria-describedby="helpId" placeholder="Order Number">
                    </div>
                    <!-- Date-->
                    <div class="form-group">
                      <label for="">Date</label>
                      <input type="date"
                        class="form-control" name="date" id="date" aria-describedby="helpId" placeholder="">
                    </div>
                    <!-- Branch -->
                    <div class="form-group" >
                        <label for="">Branch</label>                        
                        <select class="form-control" name="" id="url" >
                            <option selected>اختر الفرع</option>
                            <option value="http://197.51.9.89:82/tata/menusales.php">التجمع الخامس</option>
                            <option value="http://41.41.167.106:82/tata/menusales.php">مدينة نصر</option>
                            <option value="http://197.50.52.10/tata/menusales.php">المعادي</option>
                            <option value="http://41.41.151.66:82/tata/menusales.php">حلوان</option>
                            <option value="http://81.10.8.186:82/tata/order.php">الرحاب</option>
                            <!-- <option value="http://197.51.9.89:82/tata/menusales.php">زايد</option> -->
                        </select>
                    </div> 
                    
                    <!-- Submit -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>                    
                </form>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a name="" id="" class="btn btn-secondary export" href="#" role="button">Download Excel</a>
                <table class="table table-striped" id="DataTable"> 
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
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
                
                <a name="" id="" class="btn btn-secondary export" href="#" role="button"> Download Excel</a>

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