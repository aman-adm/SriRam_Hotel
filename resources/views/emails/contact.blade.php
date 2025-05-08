<!DOCTYPE html>
<html>

<head>
    <title>Thank You</title>
</head>

<body>
    <h2>Hello {{ $details['name'] }},</h2>
    <p>Thank you for contacting us. We have received your message:</p>

    <p><strong>Message:</strong><br>{{ $details['message'] }}</p>

    <p>We will reach out to you soon!</p>

    <br>
    <p>Regards,<br>Your Hotel Team</p>
</body>

</html>