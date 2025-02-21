<!DOCTYPE html>
<html>

<head>
    <title>Urgent Blood Donation Request</title>
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
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header {
            background: #d9534f;
            color: #ffffff;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
            font-size: 16px;
            color: #333;
        }

        .content p {
            margin: 10px 0;
        }

        .highlight {
            color: #d9534f;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: #d9534f;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            font-weight: bold;
        }

        .btn:hover {
            background: #c9302c;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="header">Urgent Blood Donation Needed!</div>

        <div class="content">
            <p>Hello,</p>
            <p>Someone in urgent need of blood has the same blood group as you (<span class="highlight">{{ $bloodGroup }}</span>). Your help can save a life!</p>

            <p><strong>Recipient Name:</strong> <span class="highlight">{{ $receiverName }}</span></p>
            <p><strong>Recipient Email:</strong> <span class="highlight">{{ $receiverEmail }}</span></p>
            <p><strong>Recipient Mobile:</strong> <span class="highlight">{{ $receiverMobile }}</span></p>

            <p>Please contact the recipient as soon as possible and help if you can.</p>

            <a href="{{ url('/') }}" class="btn">Visit Our Website</a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Blood Donation Network. All Rights Reserved.
        </div>
    </div>

</body>

</html>