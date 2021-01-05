<?php

    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json;');

    $server =  ".";
    $database = "cocinero";
    $user       = "sa1";
    $password   = "sa1";
    $con = odbc_connect("Driver={SQL Server};Server=$server;Database=$database;", $user, $password);


    $date = "$_GET[date] 00:00:00";
    $order = $_GET['order'];


    # Normal Menu Sales
    $sql ="
        SELECT     *
        FROM       hist_ord
        WHERE      (hist_ord.order_date = '$_GET[date] 00:00:00') AND (hist_ord.order_number=$_GET[order])
    ";
    $query = odbc_exec($con ,$sql);
    $data = array();
    
    while(@odbc_fetch_row($query)){

        $row = array();
        $row['order_number']  =   round(odbc_result($query,"order_number"),0);       
        $row['total']   =   round(odbc_result($query,"total"),2);
        $row['sub_total']   =   round(odbc_result($query,"sub_total"),2);
        $row['tax_value']   =   round(odbc_result($query,"tax_value"),2);
        //$row['discount']   =   round(odbc_result($query,"total"),2);
        $row['order_time']   =   odbc_result($query,"order_time");
        $row['delivery_fees']   =   odbc_result($query,"delivery_fees");
        $row['service_fees']   =   odbc_result($query,"service_fees");

        // $row['desc'] = iconv('UCS-2LE','UTF-8',$row['desc']);
        // $row['cat_desc'] = iconv('UCS-2LE','UTF-8',odbc_result($query,"cat_desc"));
        // $row['cat_code'] = odbc_result($query,"cat_code");
        // $row['menu_item_id'] = odbc_result($query,"menu_item_id");
        
        $data[] = $row;
    }

    echo json_encode($data);