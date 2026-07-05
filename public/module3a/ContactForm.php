<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Me</title>
</head>
<body>


<?php


function validateInput ($data, $fieldName) {
    //initialize global var to keep track of erroneous inputs
    global $errorCount;
    //check for empty input, increment errorcount
    if (empty($data)) {
        echo "The field \"$fieldName\" is required.<br>\n";
        ++$errorCount;
        $retval = "";
    //if theres an input, clean up the input and return it
    } else {
        $retval = trim($data);
        $retval = stripslashes($retval);
    }
    return $retval;
}

function validateEmail ($data, $fieldName) {
    global $errorCount;
//again check for empty input, increment errorcount and return empty
    if (empty($data)) {
        echo "The field \"$fieldName\" is required.<br>\n";
        ++$errorCount; $retval = "";
    }
    //if theres an input, clean up and check if valid email address
    else {
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL);

        if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
            echo "\"$fieldName\" is not a valid email address.<br>\n";
        }
    }
    return $retval;
}

function displayForm ($Sender, $Email, $Subject, $Message) {
    //function closes php code and just outputs html stuff, reopens at the end
    ?> <h2 style = "text-align: center;">Contact Me</h2>
    <form <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        name="contact" action="/module3a/contact_form" method="post">
        <p>Your Name: 
                                          //inside each field go back to php and print value of field
            <input type="text" name="Sender" value="<?php echo $Sender; ?>"></p>
        <p>Your Email: 
            <input type="text" name="Email" value="<?php echo $Email; ?>"></p>
        <p>Subject: 
            <input type="text" name="Subject" value="<?php echo $Subject; ?>"></p>
        <p>Message: 
            <textarea name="Message"><?php echo $Message; ?></textarea></p>
        <p><input type="reset" name="Clear Form" />&nbsp;&nbsp;&nbsp;
            <input type="submit" name="Submit" value ="Send Form"/></p>
    </form>
<?php
}

//Initialize all our variables as empty/ defaults
$ShowForm = TRUE;
$errorCount = 0;
$Sender = "";
$Email = "";
$Subject = "";
$Message = "";


//if 
if (isset ($_POST['Submit'])) {
    
    //validate each input and store in variable
    $Sender = validateInput($_POST['Sender'], "Your Name");
    $Email = validateEmail($_POST['Email'], "Your Email");
    $Subject = validateInput($_POST['Subject'], "Subject");
    $Message = validateInput($_POST['Message'], "Message");

    //if there are no errors, hide the form
    if ($errorCount == 0) {
        $ShowForm = FALSE;
    }
    else {
        //if there are errors, show the form again
        $ShowForm = TRUE;
    }
}

//if form is shown and there are errors, prompt the user to fix
if ($ShowForm == TRUE) {
    if ($errorCount > 0) {
        echo "<p>Please re-enter the form information below.</p>\n";
        displayForm($Sender, $Email, $Subject, $Message);
    }
    else {

    //if no errors build the email and send it
        $SenderAddress = "$Sender <$Email>";
        $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

        $result = mail("recipient@example.com", $Subject, $Message, $Headers);


        //verify if the mailing worked
        if ($result) {
            echo "<p>Thank you for your message, $Sender. It has been sent.</p>\n";
        }
        else {
            echo "<p>We encountered an error sending your message, $Sender. Please try again later.</p>\n";
        }
    }
}
/*

The first function validateInput takes data, and a field name, it checks if data is empty and if 
not, it cleans it up and returns it.

The second function validateEmail takes data and a field name, 
it checks if data is empty and if not, it cleans it up and checks if its a valid email address and 
returns it.

The third function displayForm exits php briefly to set up html for a form, and then reenters
php to print the values of the fields so data isnt lost if the user has to reenter the form.

The rest of the code initializes variables, checks if the form has been submitted, validates the
inputs, and either shows the form again with errors or sends the email and shows a success message
*/

?>



</body>
</html>