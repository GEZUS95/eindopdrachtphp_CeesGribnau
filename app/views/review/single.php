<?php

include __DIR__ . '/../header.php';

echo "<h1>$review->title</h1>";


echo "<div> ";
if (isset($company->logo)) {
    echo "<img  src='$company->logo'>";
}
echo "<p><i>$review->description</i><p>";
echo "<p>$review->rating<p>";
echo "$user->name wrote to $company->name";
echo "</div> <hr>";

if (($_SESSION['auth_user']['type'] == 'company') && ($_SESSION['auth_user']['id'] == $company->id))
    echo "
<form action='/review/react?id=$review->id' method='post'>
    <textarea rows='10' cols='30'  name='reaction' class='form-control'>$review->reaction</textarea>
    <button type='submit' name='react-btn-submit' class='btn btn-primary btn-lg'>Place Reaction</button>
</form>
";

include __DIR__ . '/../footer.php';
