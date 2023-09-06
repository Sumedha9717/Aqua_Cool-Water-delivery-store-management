<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Message</h1>
    <p>First_Name:{{ $details['f_name'] }}</p>
    <p>Last_Name:{{ $details['l_name'] }}</p>
    <p>Subject:{{ $details['subject'] }}</p>
    <p>Email:{{ $details['email'] }}</p>
    <p>City:{{ $details['city'] }}</p>
    <p>Contact Number:{{ $details['phone'] }}</p>
    <p>Message:{{ $details['msg'] }}</p>
</body>
</html>
