<?php
include __DIR__ . '/../header.php';
?>

<h1>Registerpage!</h1>
<?php $this->sesHelp->message(); ?>
    <div class="wrapper">
        <form method="post" action="">
            <div class="form-group">
                <label>Username: </label>
                <input type="text" name="name" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>E-Mail: </label>
                <input type="email" name="email" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>E-Mail conformation: </label>
                <input type="email" name="email-conf" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Password: </label>
                <input type="password" name="password" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Password conformation: </label>
                <input type="password" name="password-conf" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Phone number: </label>
                <input type="tel" name="phone" class="form-control"/>
            </div>
            <?php if ($_SESSION['auth_user']['type'] == 'admin') echo "
            <div class='form-group'>
                <label>Role: </label>
                <select name='role' class='form-control'>
                    <option value='user'>user</option>
                    <option value='admin'>admin</option>
                </select>
            </div> " ?>
            <div class="form-group">
                <button type="submit" name="user-btn-submit" class="btn btn-primary btn-lg">Register</button>
            </div>
            <p>Are you a company? <a href="/register/company">Register Here!</a></p>
        </form>

<?php

include __DIR__ . '/../footer.php';
