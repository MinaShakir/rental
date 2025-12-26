<?php
// 1. Initialize the variable to false so the message is hidden by default
$message_sent = false;

// 2. Only process if the user has clicked "Submit" (POST method)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // CHANGE THIS TO YOUR ACTUAL EMAIL
    $to = "your-email@example.com"; 
    $subject = "New Inspection Quote Request";
    
    // Collect and sanitize form data
    $name    = strip_tags($_POST['name']);
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $service = strip_tags($_POST['service']);
    $address = strip_tags($_POST['address']);
    $message = strip_tags($_POST['message']);

    $body = "You have received a new quote request:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Service: $service\n" .
            "Property Address: $address\n" .
            "Details: $message";

    $headers = "From: webmaster@sitestratawa.com.au\r\n";
    $headers .= "Reply-To: $email\r\n";

    // 3. Only set variable to true if the email is successfully accepted by the server
    if (mail($to, $subject, $body, $headers)) {
        $message_sent = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Inspection Services | Site and Strata Solutions WA</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        
        /* Changed border-bottom to Red-Orange */
        .header-section { text-align: center; margin-bottom: 40px; border-bottom: 3px solid #FF4500; padding-bottom: 20px; }
        
        /* Changed Heading 1 to Red-Orange */
        h1 { color: #FF4500; margin: 0; }
        
        /* Changed border-left to Red-Orange */
        .service-card { margin-bottom: 30px; padding: 20px; border-left: 5px solid #FF4500; background: #fafafa; }
        
        h2 { color: #2c3e50; margin-top: 0; font-size: 1.5rem; }
        p { margin-bottom: 15px; }
        
        /* Changed background to a soft peach/orange tint */
        .highlight-box { background-color: #FFF5F0; padding: 15px; border-radius: 4px; font-style: italic; border: 1px solid #FF4500; }

        /* Button Styling */
        .btn-quote {
            display: inline-block;
            background-color: #FF4500;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background 0.3s ease;
            margin-top: 10px;
        }
        .btn-quote:hover { background-color: #cc3700; }

        /* Form Styling */
        .form-section { margin-top: 50px; padding-top: 30px; border-top: 2px solid #eee; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, select, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit; }
        .submit-btn { background-color: #FF4500; color: white; border: none; padding: 15px 30px; border-radius: 4px; font-weight: bold; cursor: pointer; width: 100%; font-size: 1.1rem; }
        .submit-btn:hover { background-color: #cc3700; }
        
        /* Success Message Styling (matched to your screenshot) */
        .success-msg { background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; text-align: center; font-weight: bold; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <h1>Rental Inspection Services</h1>
        <p>Professional, Independent, and Unbiased Solutions by <strong>Site and Strata Solutions WA</strong></p>
    </div>

    <?php if ($message_sent === true): ?>
        <div class="success-msg">
            Thank you! Your quote request has been sent successfully.
        </div>
    <?php endif; ?>

    <div class="service-card">
        <h2>Property Condition Reports (PCRs)</h2>
        <p>A detailed record of how your property looks at the start of each tenancy. It sets the standard for the tenancy, backs up any bond claims towards the end, and provides the most reliable evidence if there is a disagreement.</p>
        <p>In accordance with the Residential Tenancies Act, our reports are completed in the prescribed format. We go above and beyond the legislative minimum by taking detailed notes and high-quality photographs to make a clear, time-stamped record.</p>
        <div class="highlight-box">
            Available for Residential, Private Landlords, and Commercial premises within the Perth metro area.
        </div>
        <a href="#quote-form" class="btn-quote">Request Quote</a>
    </div>

    <div class="service-card">
        <h2>Routine Inspections</h2>
        <p>Regular and detailed inspections keep tiny problems from turning into big ones. We keep an eye on the status of your property, confirm tenant safety, and document how the home is being cared for so you can plan ahead.</p>
        <p>Outsource your routine inspections to Site and Strata Solutions WA and we’ll handle the scheduling, notifications, and reporting to ensure complete transparency.</p>
        <a href="#quote-form" class="btn-quote">Request Quote</a>
    </div>

    <div class="service-card">
        <h2>Final Inspection & Bond Disbursement</h2>
        <p>Once a tenant has vacated, a final inspection is conducted to compare the current condition against the original Property Condition Report. This is an important stage in deciding whether or not a bond should be released.</p>
        <p>We look for standard wear and tear, required maintenance, any damage, and cleaning requirements to ensure both the landlord and the tenant get a fair and accurate result.</p>
        <a href="#quote-form" class="btn-quote">Request Quote</a>
    </div>

    <div class="service-card">
        <h2>Tribunal Preparation & Support</h2>
        <p>If a tenancy becomes challenging and requires a case to be taken to the Tribunal, we provide the professional paperwork and evidence needed to support your case. Our detailed reporting is designed to stand up under scrutiny in legal environments.</p>
        <a href="#quote-form" class="btn-quote">Request Quote</a>
    </div>

    <div id="quote-form" class="form-section">
        <h2 style="color: #FF4500;">Get Your Quote</h2>
        <form action="index.php#quote-form" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="service">Service Required</label>
                <select id="service" name="service" required>
                    <option value="PCR">Property Condition Report (PCR)</option>
                    <option value="Routine">Routine Inspection</option>
                    <option value="Final">Final Inspection & Bond</option>
                    <option value="Tribunal">Tribunal Preparation</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Property Address</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="message">Additional Information</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">Send Quote Request</button>
        </form>
    </div>

</div>

</body>
</html>
