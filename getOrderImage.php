<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Content-Type: application/json; charset=UTF-8'); 
    
    if(isset($_POST['orderId'])) {
        
        $order = $_POST['orderId'];
        //echo 'got order id'.$order ;
        /* Must be  done before headers are sent */
        header('Content-Type: image/jpeg');
        $path = '../images/'. $order .'.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';charset=utf8;base64,' . base64_encode($data);
        echo $base64;
    }
    else
    {
        echo 'Invalid Input -- from client.';
    }
?>   