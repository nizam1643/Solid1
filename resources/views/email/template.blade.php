<!DOCTYPE html>
<html>
<head>
    <title>Test for {{ $details['sender_name'] }}</title>
</head>
<body>
    <ul>
        <li>
            <strong>Sender Name:</strong> {{ $details['sender_name'] }}
        </li>
        <li>
            <strong>Sender Email:</strong> {{ $details['sender_email'] }}
        </li>
        <li>
            <strong>Email HOB:</strong> {{ $details['email_hob'] }}
        </li>
        <li>
            <strong>Link:</strong> <a target="_blank" href="http://solidli1.test/email/{{ $details['id'] }}/approved">Click For Action</a>
        </li>
    </ul>

    <p>Thank you</p>
</body>
</html>
