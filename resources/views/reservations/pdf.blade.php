<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Luxe Nail - Reservation Details</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #fff8fb;
            color: #333;
            font-size: 12pt;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header img {
            width: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .header h1 {
            color: #d46fa4; /* pink elegant */
            margin: 0;
            font-size: 26px;
            letter-spacing: 1px;
        }

        .header p {
            margin: 0;
            color: #777;
            font-size: 13px;
        }

        .divider {
            height: 2px;
            background: linear-gradient(to right, #f7b6d2, #ffffff, #f7b6d2);
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        th {
            background-color: #fbe2ec;
            color: #4b304a;
            text-align: left;
            padding: 10px;
            font-size: 13pt;
        }

        td {
            border: 1px solid #f2bfd1;
            padding: 10px;
            font-size: 12pt;
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #fff7fa;
        }

        .queue-number {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            color: #d46fa4;
            margin-bottom: 15px;
        }

        .footer {
            text-align: center;
            font-size: 10pt;
            color: #999;
            border-top: 1px solid #f2bfd1;
            padding-top: 10px;
        }

        .footer strong {
            color: #d46fa4;
        }
    </style>
</head>
<body>

    <div class="header">
        {{-- Ganti path ini sesuai nama file logomu --}}
        <img src="{{ public_path('img/luxe-nail-1.png') }}" alt="Luxe Nail Logo">
        <h1>Luxe Nail Studio</h1> 
        <p>Reservation Confirmation</p>
    </div>

    <div class="divider"></div>

    <div class="queue-number">
        Queue Number: {{ $reservation->queue_number }}
    </div>

    <table>
        <tr>
            <th>Field</th>
            <th>Details</th>
        </tr>
        <tr>
            <td><strong>Name</strong></td>
            <td>{{ $reservation->name }}</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td>{{ $reservation->address }}</td>
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td>{{ $reservation->phone }}</td>
        </tr>
        <tr>
            <td><strong>Treatment Type</strong></td>
            <td>{{ $reservation->treatment_type == 'nail_extension' ? 'Nail Extension' : 'Nail Art' }}</td>
        </tr>
        <tr>
            <td><strong>Reservation Date</strong></td>
            <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('F j, Y') }}</td>
        </tr>
        <tr>
            <td><strong>Reservation Time</strong></td>
            <td>{{ $reservation->reservation_time }}</td>
        </tr>
    </table>

    <div class="footer">
        Thank you for choosing <strong>Luxe Nail</strong>
    </div>

</body>
</html>
