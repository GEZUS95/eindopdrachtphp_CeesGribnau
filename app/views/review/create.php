<?php
include __DIR__ . '/../header.php';
?>

    <h1>Place a review!</h1>
    <div class="wrapper">
    <form method="post" action="/review/place">
        <input type="hidden" name="userid" value="<?php echo $_SESSION['auth_user']['id']; ?>">
        <div class="form-group">
            <label for="companys">Company: </label>
            <select id="companys" name="company">
                <?php
                foreach ($companies as $comp) {
                    echo "<option value='$comp->id'>".$comp->name."</option>";
                }
                ?>
            </select>

        </div>
        <div class="form-group">
            <label>Title: </label>
            <input type="text" name="title" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Description: </label>
            <textarea name="description" class="form-control" rows="10" cols="30" required></textarea>
        </div>
        <div class="form-group">
            <label>Rating: </label>
<br>
            <label for="1">1</label>
            <label for="2">2</label>
            <label for="3">3</label>
            <label for="4">4</label>
            <label for="5">5</label>
            <br>
            <input type="radio" id="1" name="rating" value="1">
            <input type="radio" id="2" name="rating" value="2">
            <input type="radio" id="3" name="rating" value="3">
            <input type="radio" id="4" name="rating" value="4">
            <input type="radio" id="5" name="rating" value="5">


        </div>
        <div class="form-group">
            <button type="submit" name="review-btn-submit" class="btn btn-primary btn-lg">Place Review</button>
            <input type="reset" class="btn btn-secondary">
        </div>
    </form>

<?php

include __DIR__ . '/../footer.php';
