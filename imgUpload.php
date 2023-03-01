<?php  
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    
    echo 'call the server - successful';
    $filename = 'newImage.jpeg';
    if (isset($_POST["orderId"]) && !empty($_POST["orderId"])) 
    {
        echo 'call the server - successful23';        
        $filename = $_POST["orderId"].'.jpeg';
        echo $filename;
    }
    if (isset($_POST["imageData"]) && !empty($_POST["imageData"])) 
        {
        $dataURL = $_POST["imageData"];
        $dataURL = str_replace('data:image/jpeg;base64,', '', $dataURL);
        $dataURL = str_replace(' ', '+', $dataURL);
        $image = base64_decode($dataURL);       
        $fp = fopen('../images/'.$filename, 'w');  
        fwrite($fp, $image);  
        fclose($fp);                 
        }
    else
    {
        echo 'Invalid Input -- from client.';
    }
    
?>