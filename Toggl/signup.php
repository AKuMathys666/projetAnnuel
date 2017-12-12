<?php
    include "header.php";
?>
    <section>
        
        <form action="signup-result.php" method="POST">
            
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" placeholder="Email">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
            
        </form>
        
    </section>

<?php
    include "footer.php";
?>