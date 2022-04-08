<?php

include __DIR__ . '/../header.php';

echo "<h1>Reviews!</h1>";

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) echo "<a href='/review/create' class='btn btn-primary'>Place a review</a> <hr>";
?>

    <script src="/reviewsloader.js"></script>
    <div id="content"></div>


<?php

include __DIR__ . '/../footer.php';
