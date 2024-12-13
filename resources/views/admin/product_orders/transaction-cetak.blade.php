<!DOCTYPE html>
<html>
<head>
    <title>Transaction Details</title>
    <style>
        body {
            font-family: 'Courier', monospace;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table, .content th, .content td {
            border: 1px solid black;
        }
        .content th, .content td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Transaction Details</h1>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Order ID</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td>{{ $order->product->name }}</td>
                </tr>
                <tr>
                    <th>Creator</th>
                    <td>{{ $order->product->creator->name }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $order->product->price }}</td>
                </tr>
                <tr>
                    <th>Buyer Name</th>
                    <td>{{ $order->buyer->name }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $order->quantity }}</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>{{ $order->total_price }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $order->is_paid ? 'Paid' : 'Pending' }}</td>
                </tr>
                <tr>
                    <th>Order Date</th>
                    <td>{{ $order->created_at }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>