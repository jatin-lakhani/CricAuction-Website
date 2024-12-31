<!DOCTYPE html>
<html>

<head>
    <title>New Contact Us Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
            margin: 10px 0;
        }

        .label {
            font-weight: bold;
            color: #333333;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #888888;
        }

        .footer a {
            color: #AD2112;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>New Contact Us Enquiry</h1>
        <p><span class="label">First Name:</span> {{ $data['fname'] }}</p>
        <p><span class="label">Last Name:</span> {{ $data['lname'] }}</p>
        <p><span class="label">Email:</span> {{ $data['email'] }}</p>
        <p><span class="label">Mobile:</span> {{ $data['mno'] ?? 'Not Provided' }}</p>
        <p><span class="label">Message:</span> {{ $data['message'] }}</p>
        <div class="footer">
            <p>Thank you for using our service!</p>
            <p><a href="{{ url('/') }}">Visit Our Website</a></p>
        </div>
    </div>
</body>

</html>
