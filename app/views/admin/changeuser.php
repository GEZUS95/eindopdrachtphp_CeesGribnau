<?php
include __DIR__ . '/../header.php';
?>

    <h1>Change <?php echo $user->name; ?>'s Info</h1>
<?php $this->sessionHelper->message(); ?>
    <div class="wrapper">
    <form method="post" action="/profile/updateuser">
        <input type="hidden" name="id" value="<?php echo $user->id ?>">
        <div class="form-group">
            <label>Username: </label>
            <input type="text" name="name" class="form-control" required
                   value="<?php echo $user->name ?>"/>
        </div>
        <div class="form-group">
            <label>E-Mail: </label>
            <input type="email" name="email" class="form-control" required
                   value="<?php echo $user->email ?>"/>
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
            <input type="tel" name="phone" class="form-control" value="<?php echo $user->phone ?>"/>
        </div>
        <div class="form-group">
            <button type="submit" name="user-btn-submit" class="btn btn-primary btn-lg">Update Info</button>
        </div>
    </form>

<?php

include __DIR__ . '/../footer.php';
