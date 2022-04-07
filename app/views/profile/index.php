<?php

include __DIR__ . '/../header.php';

echo "<h1>Profilepage!</h1>";

$this->sesHelp->message();
?>

<p>username: <?php echo $_SESSION['auth_user']['name'] ?></p>
<p>email: <?php echo $_SESSION['auth_user']['email'] ?></p>
<p>phone: <?php echo $_SESSION['auth_user']['phone'] ?></p>
<p>role: <?php echo $_SESSION['auth_user']['type'] ?></p>

<a href="/profile/change" class="btn btn-primary">Change your data</a>

<?php

include __DIR__ . '/../footer.php';
