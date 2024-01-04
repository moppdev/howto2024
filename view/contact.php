<?php include "head.php" ?>
    <title>How to Vote 2024 | Contact </title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("recaptchaResponse").value = token;
            document.getElementById("form").submit();
        }
    </script>

</head>

<?php include "header.php"?>
<main>
    <div class="container">
        <h1>Contact</h1>

        <p>
            If you want to bring a bug to my attention or perhaps you're a party rep that wants to add information to your party's page or even recommend a party to be added or
            maybe just give a compliment. Please contact me using the form below.
        </p>

        <form id="form" action="../model/emails.php" method="post">
            <input type="hidden" name="recaptchaResponse" id="recaptchaResponse">
            <div class="mb-3">
                <label for="email" class="form-label">Your Email Address:</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="youremailhere@example.com" maxlength="25"/>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Your Name:</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="John Matthews" maxlength="25"/>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Your Message:</label>
                <textarea id="message" name="message" class="form-control" placeholder="your message here..." maxlength="255"></textarea>
            </div>

            <input type="hidden" name="action" value="validate_captcha">

            <button type="submit"
                data-sitekey="6LfCbkIpAAAAAFSukO30lsowZp4tp9L-9ZNuFrUA" 
                data-callback='onSubmit' 
                data-action='submit' class="btn btn-primary g-recaptcha">Send Message</button>
                <p class="text-center">
                    <small>This form is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</small>
            </p>
        </form>
    </div>

</main>

<?php include "footer.php" ?>