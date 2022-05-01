<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<div class="container">
    <div class="row">
        <h1>Contact Us</h1>
        <div class="col m-4 border">
            <form>
            <div class="form-group m-4 row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group m-4 row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Fullname</label>
                <div class="col-sm-10">
                <input type="fullname" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group m-4 row">
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group m-4 row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>