<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coming Soon</title>

    <!-- Add some basic styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        h1 {
            font-size: 50px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            color: #777;
            margin-bottom: 40px;
        }

        .coming-soon {
            font-size: 40px;
            font-weight: bold;
            color: #007bff;
        }

        .subscribe {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 30px;
        }

        .subscribe:hover {
            background-color: #0056b3;
        }

        .footer {
            margin-top: 50px;
            font-size: 14px;
            color: #aaa;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Our Website is Coming Soon</h1>
        <p class="coming-soon">We are working hard to bring you something amazing!</p>

        <p>Stay tuned and be the first to know when we launch!</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{config('app.name')}}. All Rights Reserved.
        </div>
    </div>

</body>

</html>