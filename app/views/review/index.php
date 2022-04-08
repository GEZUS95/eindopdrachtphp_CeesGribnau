<?php

include __DIR__ . '/../header.php';

echo "<h1>Reviews!</h1>";

echo "<a href='/review/create' class='btn btn-primary'>Place a review</a>";

foreach ($model as $article) {
    $user = $this->userService->getOneById($article->userId);
    $company = $this->companyService->getOneById($article->companyId);

    echo "<div class='card'> ";
    if (isset($company->logo)) {
        echo "<img class='card-img-top' src='$company->logo'>";
    }
    echo "<div class='card-body'> ";
    echo "<h2 class='card-title'>$article->title</h2>";
    echo "<p class='card-text'><i>$article->description</i><p>";
    echo "<p>$article->rating<p>";
    echo "$user->name wrote to $company->name";
    echo "</div></div>";
}

include __DIR__ . '/../footer.php';
