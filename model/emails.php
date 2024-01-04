<?php 
    // Handles the email workings from the contact form on the Contact page
    $errors = [];
    
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
            // Recipient email address (replace with your own)
            $recipient = "howtovote2024@gmail.com";
    
            // Additional headers
            $headers = "From: $name <$email>";

            $recaptcha_response = $_POST['recaptchaResponse'];
            $recaptcha_secret = '6LfCbkIpAAAAAHG0aw1GEy2dcORM0cMqWK2SI6Fn';
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_data = [
                'secret' => $recaptcha_secret,
                'response' => $recaptcha_response
            ];
            
            $recaptcha_options = [
                'http' => [
                    'method' => 'POST',
                    'content' => http_build_query($recaptcha_data)
                ]
            ];
            $recaptcha_context = stream_context_create($recaptcha_options);
            $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
            $recaptcha = json_decode($recaptcha_result);
            var_dump($recaptcha);
            if($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == "submit"){ // If the response is valid
                // run email send routine
                mail($recipient, 'Contact Form Submission', $message, $headers);
                echo 'Your message was sent successfully.'; // Success message
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