<?php   
    
    require_once('config.php');

    

    if(@!$_SESSION['login']){
        header("Location:login.php");
    }

    //----------------local
    // $server = "localhost";
    // $username="root";
    // $password="doitifyoucan";
    // $database="card_manager";
    $server = "localhost";
    $username="luckysni_cardmanager";
    $password="cardmanager";
    $database="luckysni_cardmanager";
    
    $conn = new mysqli($server, $username, $password, $database);

    mysqli_set_charset($conn,"utf8");

    $conn->query("SET time_zone = '+02:00'");

    function getCompanyReport(){
        global $conn;

        $sql = "
        SELECT
        card_group.group_id,
        card_group.group_name,
        company.comp_code,
        company.comp_name,
        card_group.val,
        card_group.expire,
        company.img,
        card_group.`end`-card_group.`start`+1 AS totalcards,
        card_group.end-card_group.start+1-Count(used_card.card_code)  as rest,
        Count(used_card.card_code) as used
        FROM
        card_group
        INNER JOIN company ON company.comp_code = card_group.comp_code
        LEFT JOIN used_card ON used_card.group_id = card_group.group_id
        WHERE
        card_group.available = 1 AND
        company.available = 1
        GROUP BY
        card_group.group_id,
        card_group.group_name,
        company.comp_code,
        company.comp_name,
        card_group.val,
        card_group.expire,
        company.img
        ORDER BY
        card_group.comp_code ASC,
        card_group.group_id ASC
        

        ";

        $result = $conn->query($sql);

        $data = array();
    
        while( $group = $result->fetch_assoc()){
    
            $data[] = $group;
    
        }
        return $data;
    }

    
    $data = getCompanyReport();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
        .group_row td{
            background-color:#eee;
            color:#000;
        }
        .money_row td{
            color:#00f;
        }

        .money_totals td{
            color:#f00;
            font-weight:bold;
        }
        table {
    display: flex;
    flex-flow: column;
    width: 100%;
}

thead {
    flex: 0 0 auto;
}

tbody {
    flex: 1 1 auto;
    display: block;
    overflow-y: auto;
    overflow-x: hidden;
}

tr {
    width: 100%;
    display: table;
    table-layout: fixed;
}
        
    </style>
  </head>
  <body >    

    <div class="container">        
        <div class="row">
            <div class="col-sm-12">
                <h2>TATA <small>Card Report</small></h2>
                <h5> <small>By(Mohamed.Said)</small> </h5> 
                <h6><a href="login.php?a=logout">logout</a> -  <a href="index.php">Back</a></h6>                                      
            </div>            
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <a name="" id="" class="btn btn-secondary export" href="#" role="button">Download  Excel</a>
                <div id="content">
                    <table class="table" id="DataTable"> 
                        <thead>
                            <tr>
                                <th>price</th>
                                <th>Total</th>
                                <th>Used</th>
                                <th>Rest</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $comp_code = 0;

                                $total_total = 0;
                                $total_used  = 0;
                                $total_rest  = 0;

                                foreach($data as $group){
                            ?>
                                <?php
                                if($comp_code != $group['comp_code']) {
                                    $comp_code = $group['comp_code'];
                                ?>
                                    <tr class="cat_row">
                                        <td colspan=4 ><?php echo $group['comp_name'] ?></td>                            
                                    </tr>
                                <?php } ?>
                                <tr class="group_row">
                                    <td colspan=3 ><?php echo $group['group_name'] ?></td> 
                                    <td><small><?php echo $group['expire'] ?><small></td>                            
                                </tr>
                                <tr>
                                    <td><?php echo $group['val'] ?></td>
                                    <td><?php echo $group['totalcards'] ?></td>
                                    <td><?php echo $group['used'] ?></td>
                                    <td><?php echo $group['rest'] ?></td>
                                </tr>
                                <tr class='money_row'>
                                    <td></td>
                                    <td><?php //echo $group['totalcards']*$group['val'] ?></td>
                                    <td><?php echo $group['used']*$group['val'] ?></td>
                                    <td><?php echo $group['rest']*$group['val'] ?></td>
                                </tr>
                            <?php
                                $total_total += $group['totalcards']*$group['val'];
                                $total_used  += $group['used']*$group['val'];
                                $total_rest  += $group['rest']*$group['val'];
                            }
                            ?>
                            <tr class='money_totals'>
                                <td></td>
                                <td></td>
                                <td><?php echo $total_used  ?></td>
                                <td><?php echo $total_rest  ?></td>
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
                <div id="editor"></div>
                <a name="" id="" class="btn btn-secondary export" href="#" role="button"> Download  Excel</a>
            </div>
        </div>
        


    </div>
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/jquery.form.min.js" ></script>

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="js/jquery.table2excel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512-vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" crossorigin="anonymous"></script>    
    <script src="js/jquery.submit.min.js"></script>
    </body>
</html>