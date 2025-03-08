<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>
    <p>Thank you for registering with us.</p>
    <p>Your account has been successfully created.</p>
    <p>We look forward to having you with us!</p>
    <br>
    <p>Regards,</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>
