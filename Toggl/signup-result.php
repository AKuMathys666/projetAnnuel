<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>

<?php

    $data = array("email" => $_POST['email'], "password" => $_POST['password']);                
        
    $data_string = json_encode($data);
        
    $header = array('Content-Type: application/json', 'Content-Length: '.strlen($data_string));
        
        
    $result = signUp($header, $data_string);
    
    
    $_SESSION['userList'] = getListUsers($header, $data_string);
        
        
    printAUser($result);
        
    //print(getListProjects($header, $data_string));
    
    //print_r($_SESSION);

?>
        
    </section>

<?php
    include "footer.php";
?>