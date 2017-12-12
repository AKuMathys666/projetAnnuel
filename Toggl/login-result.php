<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>

<?php

    $data = array("email" => $_POST['email'], "password" => $_POST['password']);                
        
    $data_string = json_encode($data);
        
    $header = array('Content-Type: application/json', 'Content-Length: '.strlen($data_string), 'Authorization: '.$_SESSION['userToken']);
        
    //print($data_string);

    $ch = curl_init('http://localhost:8080/auth/login');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
    );                                                                                                                   

    $result = curl_exec($ch);
        
    print($result);
        
    $_SESSION['userToken'] = $result;
    $_SESSION['projectList'] = getListProjects($header, $data_string);
    $_SESSION['taskList'] = getListTasks($header, $data_string);
    $_SESSION['userList'] = getListUsers($header, $data_string);
        
    echo "</br>";
        
    //print(getListProjects($header, $data_string));
    
    print_r($_SESSION);

?>
        
    </section>

<?php
    include "footer.php";
?>