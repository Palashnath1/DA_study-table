<!-- <?php
include("connect.php");
require_once("auth_check.php");
protect_page(); 

if(isset($_POST['add_service'])) {
    $name = mysqli_real_escape_string($con, $_POST['service_name']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);
    $icon = mysqli_real_escape_string($con, $_POST['icon_name']);
    $popular = isset($_POST['is_popular']) ? 1 : 0;

    $sql = "INSERT INTO `services` (service_name, description, icon_name, is_popular) VALUES ('$name', '$desc', '$icon', '$popular')";
    
    if(mysqli_query($con, $sql)) {
        echo "<script>alert('Service Added Successfully!'); window.location.href='deshboard.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0b1120; color: white; padding: 50px; }
        .form-container { max-width: 600px; margin: auto; background: #111827; padding: 30px; border-radius: 12px; }
        input, textarea, select { background: #1f2937 !important; border: 1px solid #374151 !important; color: white !important; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="mb-4 text-primary">Add New Digital Service</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Service Name</label>
                <input type="text" name="service_name" class="form-control" placeholder="e.g. Cloud Computing" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label>Icon (Ionicons Name)</label>
                <input type="text" name="icon_name" class="form-control" placeholder="e.g. cloud-outline" required>
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="is_popular" id="pop">
                <label class="form-check-label" for="pop">Mark as Popular</label>
            </div>
            <button type="submit" name="add_service" class="btn btn-primary w-100">Publish to Homepage</button>
            <a href="deshboard.php" class="btn btn-link w-100 text-secondary mt-2">Back to Dashboard</a>
        </form>
    </div>
</body>
</html> -->
