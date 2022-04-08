<?php

include __DIR__ . '/../header.php';

echo '<h1>User Management</h1>';

echo "<a href='/register' class='btn btn-primary'>Add new user</a> <hr>";

$this->sessionHelper->message();

foreach ($users as $user) {
    echo "<div class='card' style='width: 22rem;'>";
    if (isset($user->logo) && $user->logo != '') echo "<img class='card-img-top' src='$user->logo' alt='$user->name'>";
    echo "
<div class='card-body'>
    <h5 class='card-title'>$user->name</h5>
    <p class='card-text'>$user->role</p>
    <p class='card-text'>$user->email</p>
    <p class='card-text'>$user->phone</p>
    <a href='/admin/changeuser?id=$user->id' class='btn btn-warning'>Change</a>
    <a href='/review/delete?id=$user->id' class='btn btn-danger'>Delete</a>
  </div>
</div>";
}

include __DIR__ . '/../footer.php';
