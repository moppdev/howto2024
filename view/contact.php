<?php include "head.php" ?>
    <title>How to Vote 2024 | Contact </title>
</head>

<?php include "header.php"?>
<main>
    <div class="container">
        <h1>Contact</h1>

        <p>
            If you want to bring a bug to my attention or perhaps you're a party rep that wants to add information to your party's page or even recommend a party to be added or
            maybe just give a compliment. Please contact me using the form below.
        </p>

        <form action="emails.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Your Email Address:</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="youremailhere@example.com"/>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Your Name:</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="John Matthews"/>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Your Message:</label>
                <textarea id="message" name="message" class="form-control" placeholder="your message here..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>

</main>

<?php include "footer.php" ?>