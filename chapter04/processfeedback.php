<?php
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$to_address = "feedback@example.com";
$subject = "Feedback from Web Sites";
$mailcontent = "Customer Name:$name\n".
			    "Customer Email:$email\n".
			    "Customer Comments:\n$feedback\n";
$from_address = "From:webserver@example.com";
mail($to_address, $subject, $mailcontent);
?>
<html>
<head>
<title>Bob's Auto Parts--Feedback Submitted!</title>
</head>
<body>
<h1>
Feedback Submitted!
</h1>
<p>Your feedback has been sent.</p>
</body>
</html>