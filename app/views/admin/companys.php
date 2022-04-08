<?php

include __DIR__ . '/../header.php';

echo '<h1>Company Management</h1>';

echo "<a href='/register/company' class='btn btn-primary'>Add new company</a> <hr>";

$this->sessionHelper->message();

foreach ($companys as $company) {
    echo "<div class='card' style='width: 22rem;'>";
    if (isset($company->logo) && $company->logo != '') echo "<img class='card-img-top' src='$company->logo' alt='$company->name'>";
    echo "
<div class='card-body'>
    <h5 class='card-title'>$company->name</h5>
    <p class='card-text'>$company->description</p>
    <a href='/review/create' class='btn btn-primary'>Place Review</a>
    <a href='/admin/changecompany?id=$company->id' class='btn btn-warning'>Change</a>
    <a href='/review/deletecompany?id=$company->id' class='btn btn-danger'>Delete</a>
  </div>
</div>";
}

include __DIR__ . '/../footer.php';
