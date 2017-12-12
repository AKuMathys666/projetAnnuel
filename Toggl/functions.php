<?php

function getListProjects($header, $data_string)
{
    $ch = curl_init('http://localhost:8080/projects');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                

    $response = curl_exec($ch);
    
    $result = json_decode($response, true);
    
    return $result;
}

function getListTasks($header, $data_string)
{
    $ch = curl_init('http://localhost:8080/tasks');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                

    $response = curl_exec($ch);
    
    $result = json_decode($response, true);
    
    return $result;
}

function getListUsers($header, $data_string)
{
    $ch = curl_init('http://localhost:8080/users');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                

    $response = curl_exec($ch);
    
    $result = json_decode($response, true);
    
    return $result;
}

function createProject($header, $data_string)
{
    $ch = curl_init('http://localhost:8080/projects');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    
    $response = curl_exec($ch);
    
    $result = json_decode($response, true);
    
    return $result;
}

function displayProjects($listProjects){
	$nb=count($listProjects);
	for($i=0;$i<$nb;$i++)
	{
		echo "<tr>";
        echo "<td>".$listProjects[$i]['_id']."</td>";    
        echo "<td>".$listProjects[$i]['title']."</td>";
        echo "<td>".$listProjects[$i]['creator']."</td>";
        echo "<td>".$listProjects[$i]['equipe']."</td>";
        echo "<td>".$listProjects[$i]['__v']."</td>";
        //echo "<td>".$listProjects[$i]['tasks']."</td>";
        echo "<td>";
        for($j=0; $j<count($listProjects[$i]['tasks']); $j++){
            print($listProjects[$i]['tasks'][$j]);
            echo "</br>";
        }
        //print_r($listProjects[$i]['tasks']);
        echo "</td>";
		echo "</tr>";
	}
}

function displayTasks($listTasks){
	$nb=count($listTasks);
	for($i=0;$i<$nb;$i++)
	{
		echo "<tr>";
        echo "<td>".$listTasks[$i]['_id']."</td>";    
        echo "<td>".$listTasks[$i]['title']."</td>";
        echo "<td>".$listTasks[$i]['startDate']."</td>";
        if(count($listTasks[$i])>6){
            echo "<td>".$listTasks[$i]['endDate']."</td>";
        }else{
            echo "<td> NULL </td>";
        }
        echo "<td>".$listTasks[$i]['owner']."</td>";
        echo "<td>".$listTasks[$i]['project']."</td>";
        echo "<td>".$listTasks[$i]['__v']."</td>";
        //echo "<td>".$listTasks[$i]['tasks']."</td>";
		echo "</tr>";
	}
}

function displayUsers($listUsers){
	$nb=count($listUsers);
	for($i=0;$i<$nb;$i++)
	{
		echo "<tr>";
        echo "<td>".$listUsers[$i]['_id']."</td>";    
        echo "<td>".$listUsers[$i]['email']."</td>";
        echo "<td>".$listUsers[$i]['role']."</td>";
        if(count($listUsers[$i])>6){
            echo "<td>";
            for($j=0; $j<count($listUsers[$i]['tasks']); $j++){
                print($listUsers[$i]['tasks'][$j]);
                echo "</br>";
            }
            echo "</td>";
        }else{
            echo "<td> NULL </td>";
        }
        echo "<td>".$listUsers[$i]['last_name']."</td>";
        echo "<td>".$listUsers[$i]['first_name']."</td>";
        echo "<td>".$listUsers[$i]['__v']."</td>";
        //echo "<td>".$listUsers[$i]['tasks']."</td>";
		echo "</tr>";
	}
}

function signUp($header, $data_string){
        
    $ch = curl_init('http://localhost:8080/users');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
    );                                                                                                                   

    $response = curl_exec($ch);
    
    $result = json_decode($response, true);
    
    return $result;
}

function printAUser($user){
    
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
    
    echo "<tr>";
    echo "<td>".$user['_id']."</td>";    
    echo "<td>".$user['email']."</td>";
    echo "<td>";
        echo "ID: ".$user['role']['_id']."</br>";
        echo "Title: ".$user['role']['title']."</br>";
        echo "Level: ".$user['role']['level']."</br>";
        echo "__v: ".$user['role']['__v']."</br>";
    echo "</td>";
    if(count($user)>6){
        echo "<td>";
        for($j=0; $j<count($user['tasks']); $j++){
            print($user['tasks'][$j]);
            echo "</br>";
        }
        echo "</td>";
    }else{
        echo "<td> NULL </td>";
    }
    echo "<td>".$user['last_name']."</td>";
    echo "<td>".$user['first_name']."</td>";
    echo "<td>".$user['__v']."</td>";
    //echo "<td>".$user['tasks']."</td>";
    echo "</tr>";
    
}

function findProjectByTitle($projectList, $title){
    print(count($projectList));
    print($title);
    for($i=0; $i<count($projectList); $i++){
        print($projectList[$i]['_id']);
        if($projectList[$i]['title'] == $title){
            print(count($projectList));
            print($projectList[$i]['_id']);
            return $projectList[$i]['_id'];
        }
    }
    return null;
}

?>