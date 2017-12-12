<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>

<?php

    $data = array();                                                                    
    $data_string = json_encode($data);
        
    //print($_SESSION['userToken']);
        
    $header = array('Content-Type: application/json', 'Content-Length: '.strlen($data_string), 'Authorization: '.$_SESSION['userToken']);
    
    //print(json_encode($header));
    //print($data_string);
    
    $url = 'http://localhost:8080/tasks/' . $_POST['task'];
        
    //print(findProjectByTitle($_SESSION['projectList'], $_POST['title']));
        
    //print($url);

    $ch = curl_init($url);                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                                                                                   
    $result = curl_exec($ch);
        
    //print($result);
        
    //$_SESSION['userToken'] = $result;
        
    echo "</br>";
    
    //print($_SESSION['userToken']);

?>
        
    </section>

<?php
    include "footer.php";
?>