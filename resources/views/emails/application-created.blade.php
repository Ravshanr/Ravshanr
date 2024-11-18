{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        .email-header {
            text-align: center;
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333;
        }
        .email-body p {
            line-height: 1.6;
        }
        .application-details {
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .application-details strong {
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        .button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #2980b9;
        }
        .email-footer {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 12px;
        }
        .email-footer a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Application Created</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Salom {{ $user->name }},</p>
            <p>Sizning sorovingizni ko`rrib chiqdim</p>

            <div class="application-details">
                <strong>Subject:</strong> {{ $application->subject }}
                <strong>Message:</strong> {{ $application->message }}
            </div>

            <a href="{{ asset('storage/' . $application->file_url) }}" class="button">View Attachment</a>

            <p>If you have any questions, feel free to reply to this email.</p>
            <p>Thank you,</p>
            <p>The Admin Panel Team</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; 2024 Admin Panel. All rights reserved.</p>
            <p><a href="#">Unsubscribe</a> | <a href="#">Privacy Policy</a></p>
        </div>
    </div>
</body>
</html> --}}
