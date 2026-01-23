<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Message</title>
</head>
<body>
    <p>You received a new contact message:</p>
    <ul>
        <li><strong>Name:</strong> {{ $data['name'] ?? '' }}</li>
        <li><strong>Email:</strong> {{ $data['email'] ?? '' }}</li>
        <li><strong>Subject:</strong> {{ $data['subject'] ?? '' }}</li>
        <li><strong>Service:</strong> {{ $data['service'] ?? 'N/A' }}</li>
    </ul>

    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($data['message'] ?? '')) !!}</p>
</body>
</html>
