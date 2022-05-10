<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<div class="container">
    <div class="row">
        <div class="col m-4 border">
            <h1 class="m-4">Contact Us</h1>
            <?php 

             $mail->isSMTP();
             $mail->Host = 'smtp.gmail.com';
             $mail->SMTPAuth   = true; 
             $mail->Username = $dotenv->load()['EMAIL'];
             $mail->Password = $dotenv->load()['EMAIL_PASS'];
             $mail->Port = 465;
             $mail->setFrom($dotenv->load()['EMAIL']);
             $address = $dotenv->load()['EMAIL'];
             $mail->SMTPSecure = 'ssl';
            
            if(isset($_POST['submit_contact'])) {

                $mail->addAddress($address);
                $mail->addReplyTo(htmlspecialchars($_POST['email_contact']));
                $mail->Subject = htmlspecialchars($_POST['subject_contact']);
                $mail->isHTML(false);
                $mail->Body = htmlspecialchars($_POST['message_contact']);
                $mail->send();

                if (!$mail->send()) {
                    $_SESSION['msg_failed'] = 'Sorry, something went wrong. Please try again later.';
                    header('contact.php');
                    
                } else {
                    $_SESSION['msg_sent'] = 'Message sent! Thanks for contacting us.';
                    header('contact.php');
                }

                $mail->smtpClose();
                exit;
            } 
            
            ?>
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
                    <textarea name="message_contact" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group m-4 row">
                    <div class="col-sm-10">
                    <button type="submit" name="submit_contact" class="btn btn-lg text-white" style="background-color: #3F5AA0;">Submit</button>
                    </div>
                </div>
            </form>
            <?php 
                if(isset($_SESSION['msg_sent'])){
                    echo '<h4 class="p-2">'. $_SESSION['msg_sent'] . '</h4>';
                    unset($_SESSION['msg_sent']);
                }

                if(isset($_SESSION['msg_failed'])){
                    echo '<h4 class="text-danger p-2">' . $_SESSION['msg_failed'] . '</h4>';
                    unset($_SESSION['msg_failed']);
                }

            ?>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>