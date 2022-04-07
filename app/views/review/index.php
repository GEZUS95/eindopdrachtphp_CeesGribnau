<?php

include __DIR__ . '/../header.php';

echo "<h1>Reviews!</h1>";

echo "<a href='/review/create' class='btn btn-primary'>Place a review</a>";

foreach ($model as $article) {
    echo "<h2>$article->title</h2>";
    echo "<p><i>$article->posted_at</i><p>";
    echo "<p>$article->content<p>";
}

include __DIR__ . '/../footer.php';
