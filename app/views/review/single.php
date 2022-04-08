<?php

include __DIR__ . '/../header.php';

echo "<div class='card'> ";
echo "<h1 class='card-header'>$review->title</h1>";


echo "<div class='card-body'> ";
if (isset($company->logo)) {
    echo "<img  src='$company->logo'>";
}
echo "<p>$review->description<p>";
echo "<p>$review->rating Stars<p>";
echo "<i>$user->name</i> reviewed <i>$company->name</i>";
echo "</div> <hr>";

if (($_SESSION['auth_user']['type'] == 'company') && ($_SESSION['auth_user']['id'] == $company->id))
    echo "
<form action='/review/react?id=$review->id' method='post'>
    <textarea rows='10' cols='30'  name='reaction' class='form-control'>$review->reaction</textarea>
    <button type='submit' name='react-btn-submit' class='btn btn-primary btn-lg'>Place Reaction</button>
</form>
";

include __DIR__ . '/../footer.php';
