<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>
    <?php
        //print_r($_SESSION['projectList']);
        //print_r($_SESSION['projectList'][3]['_id']);
        //print_r($_SESSION['projectList'][2]);
        print($_SESSION['userToken']);
        echo "</br></br>";
        //print(date(DATE_ISO8601, time()));
        $date1 = strtotime(date(DATE_ISO8601, time()));
        $date2 = strtotime("2017-12-16T10:09:30+0100");
        //print($date1);
        //print($date2);
        $rest = abs($date1 - $date2);
        //print(ceil(abs($date1 - $date2)/86400)."d");
        $days = ceil($rest/86400);
        $rest = $rest%86400;
        $hours = ceil($rest/3600);
        $rest = $rest%3600;
        $minutes = ceil($rest/60);
        $rest = $rest%60;
        $secondes = $rest;
        echo $days."days ".$hours."hours ".$minutes."minutes ".$secondes."secondes";
        /*print(ceil(abs($date1 - $date2)/3600)."h");
        print(ceil(abs($date1 - $date2)/60)."m");
        print(ceil(abs($date1 - $date2))."s");*/
    ?>
        
        
        
    </section>

<?php
    include "footer.php";
?>