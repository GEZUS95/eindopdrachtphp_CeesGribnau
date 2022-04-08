<?php
include __DIR__ . '/../header.php';
?>

    <h1>Change Info</h1>
<?php $this->sesHelp->message(); ?>
    <div class="wrapper">
    <form method="post" action="<?php if ($_SESSION['auth_user']['type'] === 'user') {
        echo '/profile/updateuser';
    } else echo '/profile/updatecompany'; ?>">
        <input type="hidden" name="id" value="<?php echo $_SESSION['auth_user']['id'] ?>">
        <div class="form-group">
            <label>Username: </label>
            <input type="text" name="name" class="form-control" required
                   value="<?php echo $_SESSION['auth_user']['name'] ?>"/>
        </div>
        <div class="form-group">
            <label>E-Mail: </label>
            <input type="email" name="email" class="form-control" required
                   value="<?php echo $_SESSION['auth_user']['email'] ?>"/>
        </div>
        <div class="form-group">
            <label>Password: </label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Password conformation: </label>
            <input type="password" name="password-conf" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Phone number: </label>
            <input type="tel" name="phone" class="form-control" value="<?php echo $_SESSION['auth_user']['phone'] ?>"/>
        </div>

        <?php
        if ($_SESSION['auth_user']['type'] === 'company') {
            echo "<div class='form - group'>
                <label>Description: </label>
                <textarea rows='10' cols='30'  name='description' class='form-control'>" . $_SESSION['auth_user']['description'] . "</textarea>
                </div>";
        }

        ?>
        <div class="form-group">
            <button type="submit" name="user-btn-submit" class="btn btn-primary btn-lg">Update Info</button>
        </div>
    </form>

<?php

include __DIR__ . '/../footer.php';
