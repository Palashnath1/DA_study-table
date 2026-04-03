<?php
include("connect.php");
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajax_payment'])) {
    
    // Check if session values exist to prevent empty inserts
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['selected_service'])) {
        echo "session_error";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $service_id = $_SESSION['selected_service']; 
    $pay_method = mysqli_real_escape_string($con, $_POST['pay_method']);

    $u_query = mysqli_query($con, "SELECT username FROM `register` WHERE id = '$user_id'");
    
    if ($u_query && mysqli_num_rows($u_query) > 0) {
        $u_row = mysqli_fetch_assoc($u_query);
        $user_name = mysqli_real_escape_string($con, $u_row['username']);
    } else {
        $user_name = "Unknown User";
    }

    // 2. Get Service Name
    $s_query = mysqli_query($con, "SELECT serviceName FROM `moreservices` WHERE id = '$service_id'");
    
    if ($s_query && mysqli_num_rows($s_query) > 0) {
        $s_row = mysqli_fetch_assoc($s_query);
        $service_name = mysqli_real_escape_string($con, $s_row['serviceName']);
    } else {
        $service_name = "Unknown Service";
    }

    // 3. Insert into 'order' table (Using BACKTICKS for the word order)
    $insert = "INSERT INTO `order` (user_id, user_name, service_id, service_name) 
               VALUES ('$user_id', '$user_name', '$service_id', '$service_name')";
    
    if (mysqli_query($con, $insert)) {
        echo "success";
    } else {
        // This will help you see the exact SQL error in the console
        echo "DB_Error: " . mysqli_error($con);
    }
    exit(); 
// Stop further execution for AJAX calls
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Payment Method</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background-color: #0b1120; color: white; padding-top: 50px; font-family: 'Inter', sans-serif; }
        .payment-card { background: #111827; border: 1px solid #3b82f6; border-radius: 15px; padding: 30px; }
        .method-option { border: 1px solid #1e293b; padding: 15px; margin-bottom: 10px; border-radius: 10px; cursor: pointer; transition: 0.3s; display: flex; align-items: center; }
        .method-option:hover { background: #1e293b; border-color: #3b82f6; }
        .method-option input { cursor: pointer; }
        .method-option label { cursor: pointer; margin-left: 10px; width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 payment-card">
                <h3 class="text-center mb-4">Select Payment Method</h3>
                
                <form id="paymentForm">
                    <div class="method-option">
                        <input type="radio" name="pay_method" value="upi" id="upi" required>
                        <label for="upi">UPI (Google Pay, PhonePay, BHIM)</label>
                    </div>

                    <div class="method-option">
                        <input type="radio" name="pay_method" value="netbanking" id="nb">
                        <label for="nb">Net Banking</label>
                    </div>

                    <div class="method-option">
                        <input type="radio" name="pay_method" value="card" id="card">
                        <label for="card">Credit / Debit Card</label>
                    </div>

                    <button type="button" onclick="handlePayment()" class="btn btn-primary w-100 mt-4 py-3 fw-bold">Proceed to Pay</button>
                </form>
            </div>
        </div>
    </div>

<script>
function handlePayment() {
    // 1. Check if any radio button is checked
    const selectedMethod = document.querySelector('input[name="pay_method"]:checked');
    
    // 2. Logic: If NO method is selected, show error/warning and STOP
    if (!selectedMethod) {
        Swal.fire({
            icon: 'error',
            title: 'Payment Method Required',
            text: 'Please select a payment method before proceeding.',
            background: '#111827',
            color: '#fff',
            confirmButtonColor: '#d33'
        });
        return; // Exit function
    }

    // 3. Logic: If method IS selected, proceed with the process
    Swal.fire({
        title: 'Processing Payment...',
        allowOutsideClick: false,
        didOpen: () => { Swal.showLoading(); },
        background: '#111827',
        color: '#fff'
    });

    const formData = new URLSearchParams();
    formData.append('ajax_payment', '1');
    formData.append('pay_method', selectedMethod.value);

    fetch(window.location.href, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "success") {
            // Success Logic
            Swal.fire({
                title: 'Success!',
                text: 'Your course has been successfully booked.',
                icon: 'success',
                background: '#111827',
                color: '#fff',
                confirmButtonColor: '#3b82f6',
                confirmButtonText: 'Go to Home'
            }).then((result) => {
                window.location.href = 'index.php';
            });
        } else {
            // Server Error Logic
            Swal.fire({
                icon: 'error',
                title: 'Transaction Failed',
                text: 'We could not process your order at this time.',
                background: '#111827',
                color: '#fff'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
</body>
</html>