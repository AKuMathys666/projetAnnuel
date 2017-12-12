<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>
        
        <form action="tasks-delete-result.php" method="POST">
            
            <div class="form-group">
                <label for="task">Task</label>
                <select class="form-control" name="task">
                    <?php
                        for($i=0; $i<count($_SESSION['taskList']); $i++){
                            echo "<option value=".$_SESSION['taskList'][$i]['_id'].">";
                            echo $_SESSION['taskList'][$i]['title'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-default">Delete</button>
            
        </form>
        
    </section>

<?php
    include "footer.php";
?>