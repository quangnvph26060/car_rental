<!-- resources/views/emails/booking_notification.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Yêu cầu đặt xe mới</title>
    <style>
        /* Reset cơ bản */
        body,
        table,
        td,
        a {
            text-decoration: none;
            color: inherit;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f4f4f7;
        }

        .email-wrapper {
            width: 100%;
            background-color: #f4f4f7;
            padding: 20px;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .email-header {
            background-color: #4a90e2;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .email-body {
            padding: 30px;
        }

        .email-body h2 {
            font-size: 20px;
            color: #333333;
        }

        .email-body p {
            font-size: 16px;
            color: #555555;
            line-height: 1.5;
        }

        .highlight {
            color: #4a90e2;
            font-weight: bold;
        }

        .email-footer {
            background-color: #f4f4f7;
            color: #888888;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }

        .email-footer a {
            color: #4a90e2;
            text-decoration: none;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #4a90e2;
            color: white;
        }
    </style>
</head>

<body>

    <div class="email-wrapper">
        <div class="email-content">
            <!-- Header -->
            <div class="email-header">
                <h1>Yêu cầu đặt xe mới 🚗</h1>
            </div>

            <!-- Body -->
            <div class="email-body">
                <h2>Xin chào Quản trị viên,</h2>
                <p>Chúng tôi vừa nhận được một yêu cầu đặt xe mới với thông tin chi tiết như sau:</p>

                <!-- Booking Details Table -->
                <table class="table">
                    <tr>
                        <th>Xe</th>
                        <td>{{ $carName }}</td>
                    </tr>
                    <tr>
                        <th>Loại xe</th>
                        <td>{{ $typeName }}</td>
                    </tr>
                    <tr>
                        <th>Ngày bắt đầu</th>
                        <td>{{ $start_date }}</td>
                    </tr>
                    <tr>
                        <th>Số ngày thuê</th>
                        <td>{{ $rental_days }}</td>
                    </tr>
                    <tr>
                        <th>Họ và tên</th>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{ $phone }}</td>
                    </tr>
                    <tr>
                        <th>Ghi chú</th>
                        <td>{{ $note }}</td>
                    </tr>
                </table>

                <p>Vui lòng xử lý yêu cầu này sớm nhất có thể.</p>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Công ty của bạn. Mọi quyền được bảo lưu.</p>
                <p>Liên hệ hỗ trợ qua email: <a href="mailto:support@yourcompany.com">support@yourcompany.com</a>.</p>
            </div>
        </div>
    </div>

</body>

</html>
