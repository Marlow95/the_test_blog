<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<div class="container">
    <div class="row">
        <div class="col m-4 border">
            <h1 class="m-4">Contact Us</h1>
            <form method="post">
                <div class="form-group m-4 row">
                    <label for="email_contact" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_contact" name="email_contact" placeholder="Email">
                    </div>
                </div>
                <div class="form-group m-4 row">
                    <label for="fullname_contact" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                    <input type="fullname" class="form-control" id="fullname_contact" name="fullname_contact" placeholder="Fullname">
                    </div>
                </div>
                <div class="form-group m-4 row">
                    <label for="subject_contact" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                    <input type="fullname" class="form-control" id="subject_contact" name="subject_contact" placeholder="Subject">
                    </div>
                </div>
                <div class="form-group m-4 row">
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group m-4 row">
                    <div class="col-sm-10">
                    <button type="submit" name="submit_contact" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>