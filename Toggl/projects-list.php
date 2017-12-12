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
        
    $result = getListProjects($header, $data_string);
    $_SESSION['projectList'] = $result;
        
    //print_r($result);
    /*    
    Array ( [_id] => 595f6feb46dbc60c80ddfbe5 [equipe] => 595f6feb46dbc60c80ddfbe6 [creator] => 595f6f9546dbc60c80ddfbe2 [title] => Projet 1 [__v] => 0 [tasks] => Array ( ) )*/
        echo "<table class=".'"table-bordered table-responsive table-hover table-striped"'.">";
        echo "<tr>
        <th>Id</th>
        <th>Title</th>
        <th>Creator</th>
        <th>Equipe</th>
        <th>__v</th>
        <th>tasks</th>
        </tr>";
        
        displayProjects($_SESSION['projectList']);


?>
        
    </section>

<?php
    include "footer.php";
?>