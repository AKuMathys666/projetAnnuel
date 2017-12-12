<?php
    include "header.php";
    require_once "functions.php";
?>
    <section>
        
        <form action="users-delete-result.php" method="POST">
            
            <div class="form-group">
                <label for="task">User</label>
                <select class="form-control" name="user">
                    <?php
                        for($i=0; $i<count($_SESSION['userList']); $i++){
                            echo "<option value=".$_SESSION['userList'][$i]['_id'].">";
                            echo $_SESSION['userList'][$i]['email'];
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