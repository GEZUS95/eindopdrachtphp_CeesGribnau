<?php

include __DIR__ . '/../header.php';

echo "<h1>Review Management</h1>";

foreach ($model as $article) {
    $user = $this->userService->getOneById($article->userId);
    $company = $this->companyService->getOneById($article->companyId);

    echo "<div class='card' style='width: 28rem'> ";
    if (isset($company->logo)) {
        echo "<img class='card-img-top' src='$company->logo'>";
    }
    echo "<div class='card-body'> ";
    echo "<h2 class='card-title'>$article->title</h2>";
    echo "<p class='card-text'><i>$article->description</i><p>";
    echo "<p>$article->rating Stars<p>";
    echo "<a class='btn btn-primary' href='/review/single?id=$article->id'>Read more</a>";
    echo "<a class='btn btn-danger' href='/review/delete?id=$article->id'>Delete</a>";
    echo "<p class='card-footer'><i>$user->name</i> wrote to <i>$company->name</i></p>";
    echo "</div></div>";
}

include __DIR__ . '/../footer.php';
