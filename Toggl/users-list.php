<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>

<?php
        
    //print($_SESSION['userToken']);
    
    //echo '</br>';

    $data = array();                                                                    
    $data_string = json_encode($data);
        
    $header = array('Content-Type: application/json', 'Content-Length: '.strlen($data_string), 'Authorization: '.$_SESSION['userToken']);
        
    $result = getListUsers($header, $data_string);
    $_SESSION['userList'] = getListUsers($header, $data_string);
    
    //print_r($result);
    echo "<table class=".'"table-bordered table-responsive table-hover table-striped"'.">";
    echo "<tr>
    <th>Id</th>
    <th>Email</th>
    <th>Role</th>
    <th>Tasks</th>
    <th>Last name</th>
    <th>First name</th>
    <th>__v</th>
    </tr>";
        
    displayUsers($_SESSION['userList']);
        

?>
        
    </section>

<?php
    include "footer.php";
?>