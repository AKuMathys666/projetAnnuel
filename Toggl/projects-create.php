<?php
    include "header.php";
?>
    <section>
        
        <form action="projects-create-result.php" method="POST">
            
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" placeholder="Title">
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
            
        </form>
        
    </section>

<?php
    include "footer.php";
?>