<?php

include __DIR__ . '/../header.php';

echo '<h1>Adminpage!</h1>';

$this->sessionHelper->message();

echo "<a href='/admin/users' class='btn btn-primary'>UserManagement</a>       ";
echo "<a href='/admin/companys' class='btn btn-primary'>CompanyManagement</a>       ";
echo "<a href='/admin/reviews' class='btn btn-primary'>ReviewManagement</a>       ";

echo "<div id='content'></div>";

include __DIR__ . '/../footer.php';
