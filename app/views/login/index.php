<?php
include __DIR__ . '/../header.php';


echo '<h1>Loginpage</h1>';
 $this->sesHelp->message(); ?>
    <div class="wrapper">
        <form method="post" action="">
        <div class="form-group">
            <label>E-Mail: </label>
            <input type="email" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Password: </label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
        </div>
    </form>
    <p>No account? <a href="/register">Register Here!</a></p>
    </div>

<?php
include __DIR__ . '/../footer.php';
