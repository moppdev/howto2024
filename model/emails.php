<?php 
    // Handles the email workings from the contact form on the Contact page
    $errors = [];

    // Include path to PHPMailer
    // set_include_path('/xampp/htdocs/howtovote2024/PHPMailer');
    // require_once "PHPMailerAutoload.php";
    use PHPMailer\PHPMailer\PHPMailer;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    
    // Check inputs
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get and clean POST data
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
        
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        // Validate form fields
        if (empty($name)) {
            $errors[] = 'Name is empty';
        }
        
        if (empty($email)) {
            $errors[] = 'Email is empty or invalid';
        }
        
        if (empty($message)) {
            $errors[] = 'Message is empty';
        }        
    
        // If no errors, send email
        if (empty($errors)) {
            // Recipient email address
            $recipient = "howtovote2024@gmail.com";
    
            // Additional headers
            $headers = "From: $name <$email>";

            // Get the response and recaptcha info
            $recaptcha_response = $_POST['recaptchaResponse'];
            $recaptcha_secret = '6LfCbkIpAAAAAHG0aw1GEy2dcORM0cMqWK2SI6Fn';
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_data = [
                'secret' => $recaptcha_secret,
                'response' => $recaptcha_response
            ];
            
            // context options to make filegetcontents do a POST
            $recaptcha_options = [
                'http' => [
                    'method' => 'POST',
                    'content' => http_build_query($recaptcha_data)
                ]
            ];

            // Do the POST request and process the returned JSON from reCaptcha
            $recaptcha_context = stream_context_create($recaptcha_options);
            $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
            $recaptcha = json_decode($recaptcha_result);
            if($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == "submit"){ // If the response is valid
                // run email send routine
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPSecure = "tls";
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = 'howtovote2024@gmail.com';
                $mail->Password = '4Vr@qgEgJt';

                $mail->setFrom($email, $name);
                $mail->addAddress($recipient, "HTV24 Admin");
                $mail->Subject = 'Contact Form Submission';
                $mail->Body = $message;
                $mail->AltBody = $message;
                $mail->isHTML(false);

                if ($mail->send())
                {
                    echo 'Your message was sent successfully.'; // Success message
                    echo "<a href='../view/home.php'>Go back to Home</a>";
                }
                else
                {
                    echo 'Something went wrong. Please try again later'; // Error message
                    echo "<p>Error: " . $mail->ErrorInfo . "</p>";
                }
            }else{
                echo 'Something went wrong. Please try again later'; // Error message
            }
        } else {
            // Display errors
            echo "The form contains the following errors:<br>";
            foreach ($errors as $error) {
                echo "- $error<br>";
            }
        }
    } else {
        // Not a POST request, display a 403 forbidden error
        header("HTTP/1.1 403 Forbidden");
        echo "You are not allowed to access this page.";
    }
?>