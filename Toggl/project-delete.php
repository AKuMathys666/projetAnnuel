<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>
        
        <form action="projects-delete-result.php" method="POST">
            
            <div class="form-group">
                <label for="project">Project</label>
                <select class="form-control" name="project">
                    <?php
                        for($i=0; $i<count($_SESSION['projectList']); $i++){
                            echo "<option value=".$_SESSION['projectList'][$i]['_id'].">";
                            echo $_SESSION['projectList'][$i]['title'];
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