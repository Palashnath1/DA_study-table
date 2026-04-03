<?php
// 1. Session and Connection Setup
require_once("auth_check.php");
protect_page(); // Ensure user is authenticated
include("connect.php");

// 2. Identify the record to update
// We check for 'updateid' in the URL (GET) or a hidden input (POST)
$id = isset($_GET['updateid']) ? mysqli_real_escape_string($con, $_GET['updateid']) : (isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : null);

if (!$id) {
    header("Location: deshboard.php");
    exit();
}

// 3. Handle the Database Update (Server-Side)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_hidden'])) {
    $name    = mysqli_real_escape_string($con, $_POST['name']);
    $email   = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $sql = "UPDATE `table` SET name='$name', email='$email', subject='$subject', message='$message' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // SUCCESS: Output the Success Alert then redirect
        echo "<!DOCTYPE html><html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body style='background-color: #0b1120;'>";
        echo "<script>
            Swal.fire({
                title: 'Updated!',
                text: 'The record has been updated successfully.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'deshboard.php';
            });
        </script></body></html>";
        exit(); 
    } else {
        die(mysqli_error($con));
    }
}

// 4. Fetch existing data for the form
$sql = "SELECT * FROM `table` WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: deshboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Inquiry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0b1120; color: white; padding: 50px; }
        .update-container { max-width: 600px; margin: auto; background: #111827; padding: 30px; border-radius: 10px; }
        .form-control { background: #1f2937; border: 1px solid #374151; color: white; }
        .form-control:focus { background: #1f2937; color: white; border-color: #3b82f6; box-shadow: none; }
    </style>
</head>
<body>

    <div class="update-container">
        <h2 class="mb-4">Update Project Inquiry</h2>
        <form method="POST" id="updateForm" action="update.php?updateid=<?php echo $id; ?>">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" value="<?php echo htmlspecialchars($row['subject']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="4" required><?php echo htmlspecialchars($row['message']); ?></textarea>
            </div>
            
            <div class="d-flex gap-2">
                <button type="button" onclick="confirmUpdate()" class="btn btn-primary w-100">Update Data</button>
                
                <input type="hidden" name="submit_hidden" value="1">
                
                <a href="deshboard.php" class="btn btn-secondary w-100">Cancel</a>
            </div>
        </form>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmUpdate() {
            Swal.fire({
                title: 'Save changes?',
                text: "Are you sure you want to update this inquiry?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3b82f6',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, keep editing'
            }).then((result) => {
                if (result.isConfirmed) {
                    // This sends the form to the PHP block at the top
                    document.getElementById('updateForm').submit();
                }
            });
        }
    </script>
</body>
</html>