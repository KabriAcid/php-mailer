<?php
use App\Database\Connection;
require __DIR__ . '/../app/database/Connection.php';

$conn = new Connection();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <!-- Water.css Dark Theme CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../favicon/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h1>Send an Email</h1>
        <form id="emailForm" action="sendmail.php" method="POST">
            <div class="form-group">
                <label for="from">Your Email:</label>
                <input type="email" id="from" name="from" required>
            </div>
            <div class="form-group">
                <label for="to">Recipient Email:</label>
                <input type="email" id="to" name="to" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" style="background-color: #41adff;">Send Email</button>
        </form>
        <script>
            // Check for query parameter to display SweetAlert notification
            const urlParams = new URLSearchParams(window.location.search);
            const success = urlParams.get('success');
            const error = urlParams.get('error');

            if (success) {
                Swal.fire({
                    title: 'Success!',
                    text: success,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }

            if (error) {
                Swal.fire({
                    title: 'Error!',
                    text: error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        </script>
    </div>
</body>
</html>
