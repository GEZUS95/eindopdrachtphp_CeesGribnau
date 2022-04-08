<?php

include __DIR__ . '/../header.php';

echo "<h1>Profilepage!</h1>";

$this->sesHelp->message();
?>

<p>username: <?php echo $_SESSION['auth_user']['name'] ?></p>
<p>email: <?php echo $_SESSION['auth_user']['email'] ?></p>
<p>phone: <?php echo $_SESSION['auth_user']['phone'] ?></p>
<p>role: <?php echo $_SESSION['auth_user']['type'] ?></p>

<?php if ($_SESSION['auth_user']['type'] == 'company') {
   echo "<p>description: ". $_SESSION['auth_user']['description'] . "</p>";
   echo "<p>logo: ". $_SESSION['auth_user']['logo'] . "</p>";
} ?>
    <a href="/profile/change" class="btn btn-primary">Change your data</a>

<?php

include __DIR__ . '/../footer.php';
