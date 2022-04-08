<?php

include __DIR__ . '/../header.php';

echo '<h1>Homepage!</h1>';

$this->sesHelp->message();

foreach ($companys as $company) {
    echo "<div class='card' style='width: 22rem;'>";
    if (isset($company->logo) && $company->logo != '') echo "<img class='card-img-top' src='$company->logo' alt='$company->name'>";
    echo "
<div class='card-body'>
    <h5 class='card-title'>$company->name</h5>
    <p class='card-text'>$company->description</p>
    <a href='/review/create' class='btn btn-primary'>Place Review</a>
  </div>
</div>";
}

include __DIR__ . '/../footer.php';
