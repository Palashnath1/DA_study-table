<?php
include("connect.php");
require_once("auth_check.php");
protect_page();

// 1. Fetch Stats
$count_query = "SELECT COUNT(*) as total FROM `table`";
$count_result = mysqli_query($con, $count_query);
$count_data = mysqli_fetch_assoc($count_result);
$total_inquiries = $count_data['total'];

$user_count_query = "SELECT COUNT(*) as total FROM `register`";
$user_count_result = mysqli_query($con, $user_count_query);
$user_total = mysqli_fetch_assoc($user_count_result)['total'];

// 2. Fetch Data for all sections
$inquiry_result = mysqli_query($con, "SELECT * FROM `table` ORDER BY id DESC");
$user_result = mysqli_query($con, "SELECT * FROM `register` ORDER BY id DESC");
// Fetching services (Adjust table name if different)
$service_result = mysqli_query($con, "SELECT * FROM `services` ORDER BY id DESC");


if (isset($_POST['add_service'])) {
    $name = mysqli_real_escape_string($con, $_POST['service_name']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);
    $popular = isset($_POST['is_popular']) ? 1 : 0;

    $sql = "INSERT INTO `services` (service_name, description, icon_name, is_popular) 
            VALUES ('$name', '$desc', '$icon', '$popular')";

    if (mysqli_query($con, $sql)) {
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
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}

// Handle Delete Request
if (isset($_GET['delete_service'])) {
    $id = mysqli_real_escape_string($con, $_GET['delete_service']);
    $del_query = "DELETE FROM `services` WHERE id = '$id'";

    if (mysqli_query($con, $del_query)) {
        echo "<!DOCTYPE html><html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body style='background-color: #0b1120;'>";
        echo "<script>
            Swal.fire({
                title: 'Deleted!',
                text: 'The service has been removed successfully.',
                icon: 'success',
                background: '#111827',
                color: '#fff',
                confirmButtonColor: '#3b82f6'
            }).then(() => {
                window.location.href = 'deshboard.php';
            });
        </script></body></html>";
        exit;
    }
}


// Handle Update Request
if (isset($_POST['update_service'])) {
    $id = $_POST['service_id'];
    $name = mysqli_real_escape_string($con, $_POST['service_name']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);
    $icon = mysqli_real_escape_string($con, $_POST['icon_name']);
    $popular = isset($_POST['is_popular']) ? 1 : 0;

    $update_query = "UPDATE `services` SET service_name='$name', description='$desc', icon_name='$icon', is_popular='$popular' WHERE id='$id'";
    if (mysqli_query($con, $update_query)) {
        echo "<!DOCTYPE html><html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body style='background-color: #0b1120;'>";
        echo "<script>
            Swal.fire({
                title: 'Updated!',
                text: 'Service updated successfully.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'deshboard.php';
            });
        </script></body></html>";
    }
}



if (isset($_POST['submit_more_service'])) {
    $name = mysqli_real_escape_string($con, $_POST['m_name']);
    $desc = mysqli_real_escape_string($con, $_POST['m_desc']);
    $img  = mysqli_real_escape_string($con, $_POST['m_img']);
    // $icon = "color-palette-outline"; // Default icon, or add an input for it

    $sql = "INSERT INTO `moreservices` (serviceName, description, url) 
            VALUES ('$name', '$desc', '$img')";

    if (mysqli_query($con, $sql)) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            window.onload = function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'New service section generated in services.php',
                    icon: 'success',
                    background: '#111827',
                    color: '#fff'
                }).then(() => {
                    window.location.href = 'deshboard.php';
                });
            };
        </script>";
    }
}


// Fetch data for the 'More Services' sections
$more_services_query = "SELECT * FROM `moreservices` ORDER BY id DESC";
$more_services_result = mysqli_query($con, $more_services_query);

if (isset($_GET['delete_more'])) {
    $del_id = mysqli_real_escape_string($con, $_GET['delete_more']);
    $query = "DELETE FROM `moreservices` WHERE id = '$del_id'";

    if (mysqli_query($con, $query)) {
        echo "<script>window.location.href='deshboard.php';</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Mr. Palash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .hidden-section {
            display: none;
        }

        .nav-link-custom.active {
            background-color: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            border-left: 4px solid #3b82f6;
        }

        .nav-link-custom {
            color: #94a3b8;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link-custom:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .sidebar {
            width: 260px;
            position: fixed;
            height: 100vh;
            background: #0f172a;
            padding: 20px;
            color: white;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px;
            background: #f8fafc;
            min-height: 100vh;
        }

        .btn-logout {
            background-color: #ef4444;
            color: white;
            border-radius: 8px;
            padding: 10px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }

        .stat-card {
            padding: 20px;
            border-radius: 15px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .card-gradient-1 {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .card-gradient-2 {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .card-gradient-3 {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .custom-table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .custom-table th {
            background: #f1f5f9;
            padding: 15px;
        }

        .custom-table td {
            padding: 15px;
            border-top: 1px solid #f1f5f9;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="profile-section text-center">
            <img src="https://tse2.mm.bing.net/th/id/OIP.CIn8fInVEpY4ti24C9LfWgHaFJ?rs=1&pid=ImgDetMain&o=7&rm=3" class="profile-img" alt="Profile" style="width: 80px; border-radius: 50%;">
            <h5 class="mt-3">Mr. Palash</h5>
            <p class="text-muted small border-bottom border-secondary pb-3">Administrator</p>
        </div>

        <nav class="mt-4 d-flex flex-column gap-2">
            <a href="javascript:void(0)" onclick="showSection('inquirySection', this)" class="nav-link-custom active">
                <ion-icon name="grid-outline"></ion-icon><span>Dashboard</span>
            </a>

            <a href="javascript:void(0)" onclick="showSection('serviceSection', this)" class="nav-link-custom">
                <ion-icon name="construct-outline"></ion-icon><span>Management Services</span>
            </a>
            <a href="javascript:void(0)" onclick="showSection('moreServicesSection', this)" class="nav-link-custom">
                <ion-icon name="layers-outline"></ion-icon><span>Add More Services</span>
            </a>

            <a href="javascript:void(0)" onclick="showSection('userSection', this)" class="nav-link-custom">
                <ion-icon name="people-outline"></ion-icon><span>User Dashboard</span>
            </a>

            <a href="javascript:void(0)" onclick="showSection('orderSection', this)" class="nav-link-custom">
                <ion-icon name="cart-outline"></ion-icon><span>Order</span>
            </a>

            <a href="logout.php" class="btn-logout d-flex align-items-center justify-content-center gap-2">
                <span>Logout</span><ion-icon name="log-out-outline"></ion-icon>
            </a>
        </nav>
    </div>

    <div class="main-content">
        <div class="header-area mb-4">
            <h2 class="fw-bold" id="pageTitle">Dashboard</h2>
            <p class="text-muted">Welcome back, Mr. Palash</p>
        </div>

        <div class="row mb-5">
            <div class="col-md-4">
                <div class="stat-card card-gradient-1">
                    <h6>Inquiries</h6>
                    <h3><?php echo $total_inquiries; ?></h3><ion-icon name="mail-outline" style="position:absolute; right:10px; bottom:10px; font-size:40px; opacity:0.3;"></ion-icon>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card card-gradient-3">
                    <h6>Users</h6>
                    <h3><?php echo $user_total; ?></h3><ion-icon name="people-outline" style="position:absolute; right:10px; bottom:10px; font-size:40px; opacity:0.3;"></ion-icon>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card card-gradient-2">
                    <h6>Status</h6>
                    <h3>Online</h3><ion-icon name="server-outline" style="position:absolute; right:10px; bottom:10px; font-size:40px; opacity:0.3;"></ion-icon>
                </div>
            </div>
        </div>

        <div id="inquirySection" class="section-container">
            <h4 class="mb-4">Recent Project Inquiries</h4>
            <table class="custom-table w-100">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c1 = 1;
                    while ($r1 = mysqli_fetch_assoc($inquiry_result)) { ?>
                        <tr>
                            <td><?php echo $c1++; ?></td>
                            <td><?php echo htmlspecialchars($r1['name']); ?></td>
                            <td><?php echo htmlspecialchars($r1['email']); ?></td>
                            <td><?php echo htmlspecialchars($r1['subject']); ?></td>
                            <td><a class="btn btn-sm btn-outline-danger" href="javascript:void(0)" onclick="confirmDelete(<?php echo $r1['id']; ?>, 'inquiry')">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div id="serviceSection" class="section-container hidden-section">
            <div class="d-flex align-items-center gap-2 mb-4">
                <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <ion-icon name="add-circle-outline"></ion-icon> Add New Service
                </button>

                <button type="button" class="btn btn-outline-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addMoreModal">
                    <ion-icon name="copy-outline"></ion-icon> Add More Services
                </button>
            </div>
            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background-color: #111827; color: white; border: 1px solid #374151;">
                        <div class="modal-header" style="border-bottom: 1px solid #374151;">
                            <h5 class="modal-title text-primary" id="addServiceModalLabel">Add New Digital Service</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" name="service_name" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" placeholder="e.g. Cloud Computing" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" rows="3" required placeholder="Describe what this service offers..."></textarea>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="is_popular" id="pop">
                                    <label class="form-check-label" for="pop">Mark as Popular</label>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 1px solid #374151;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add_service" class="btn btn-primary">Publish to Homepage</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background-color: #111827; color: white; border: 1px solid #374151;">
                        <div class="modal-header" style="border-bottom: 1px solid #374151;">
                            <h5 class="modal-title text-primary" id="addServiceModalLabel">Add New Digital Service</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" name="service_name" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" placeholder="e.g. Cloud Computing" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Icon (Ionicons Name)</label>
                                    <input type="text" name="icon_name" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" placeholder="e.g. cloud-outline" required>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="is_popular" id="pop">
                                    <label class="form-check-label" for="pop">Mark as Popular</label>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 1px solid #374151;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add_service" class="btn btn-primary">Publish to Homepage</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <table class="custom-table w-100">
                <h4>Services Section</h4>
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Icon</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $c3 = 1;
                    while ($r3 = mysqli_fetch_assoc($service_result)) {
                        // Logic to determine the correct key names
                        $s_title = $r3['title'] ?? $r3['name'] ?? $r3['service_name'] ?? 'No Title';
                        $s_icon  = $r3['icon']  ?? $r3['service_icon'] ?? 'help-outline';
                        $s_desc  = $r3['description'] ?? $r3['detail'] ?? '';
                    ?>
                        <tr>
                            <td><?php echo $c3++; ?></td>
                            <td>
                                <div class="service-icon-box" style="width:40px; height:40px; margin-bottom:0; border-radius:8px;">
                                    <ion-icon name="<?php echo htmlspecialchars($s_icon); ?>"></ion-icon>
                                </div>
                            </td>
                            <td><strong><?php echo htmlspecialchars($s_title); ?></strong></td>
                            <td><small class="text-muted"><?php echo htmlspecialchars(substr($s_desc, 0, 50)); ?>...</small></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button type="button"
                                        class="btn btn-sm btn-outline-primary"
                                        onclick="editService(<?php echo htmlspecialchars(json_encode($r3)); ?>)">
                                        Edit
                                    </button>

                                    <a href="javascript:void(0)"
                                        onclick="confirmDelete(<?php echo $r3['id']; ?>)"
                                        class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- ////////////////////// -->
        <div class="modal fade" id="addMoreModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background-color: #111827; color: white; border: 1px solid #374151;">
                    <div class="modal-header" style="border-bottom: 1px solid #374151;">
                        <h5 class="modal-title text-primary">Add Custom Service Section</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Service Name</label>
                                <input type="text" name="m_name" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" placeholder="e.g. Brand Identity Design" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="m_desc" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" rows="3" required placeholder="Write a compelling story..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Service Image (URL)</label>
                                <input type="url" name="m_img" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" placeholder="https://example.com/image.jpg" required>
                            </div>
                        </div>
                        <div class="modal-footer" style="border-top: 1px solid #374151;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit_more_service" class="btn btn-warning">Generate Section</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /////////////////////// -->
        <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background-color: #111827; color: white; border: 1px solid #374151;">
                    <div class="modal-header" style="border-bottom: 1px solid #374151;">
                        <h5 class="modal-title text-primary">Update Service</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST">
                        <input type="hidden" name="service_id" id="edit_id">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Service Name</label>
                                <input type="text" name="service_name" id="edit_name" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" required>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" id="edit_desc" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Icon Name</label>
                                <input type="text" name="icon_name" id="edit_icon" class="form-control" style="background: #1f2937; border: 1px solid #374151; color: white;" required>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="is_popular" id="edit_pop">
                                <label class="form-check-label" for="edit_pop">Mark as Popular</label>
                            </div>
                        </div>
                        <div class="modal-footer" style="border-top: 1px solid #374151;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="update_service" class="btn btn-primary">Update Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="userSection" class="section-container hidden-section">
            <h4 class="mb-4">User Credentials</h4>
            <table class="custom-table w-100">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c2 = 1;
                    while ($r2 = mysqli_fetch_assoc($user_result)) { ?>
                        <tr>
                            <td><?php echo $c2++; ?></td>
                            <td><span class="badge bg-info text-dark"><?php echo htmlspecialchars($r2['username']); ?></span></td>
                            <td><code><?php echo htmlspecialchars($r2['password']); ?></code></td>
                            <td><span class="text-success">● Active</span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- <div id="moreServicesList" class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary">More Services (Page Sections)</h4>
            </div>

            <table class="custom-table w-100">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Preview Image</th>
                        <th>Section Title</th>
                        <th>Description Preview</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($more_services_result)) {
                        $m_id = $row['id'];
                        $m_title = $row['serviceName'];
                        $m_img = $row['url'];
                        $m_desc = $row['description'];
                    ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($m_img); ?>"
                                    style="width:60px; height:40px; object-fit:cover; border-radius:4px; border:1px solid #374151;"
                                    alt="preview">
                            </td>
                            <td><strong><?php echo htmlspecialchars($m_title); ?></strong></td>
                            <td>
                                <small class="text-muted">
                                    <?php echo htmlspecialchars(substr($m_desc, 0, 40)); ?>...
                                </small>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="javascript:void(0)"
                                        onclick="confirmDeleteMore(<?php echo $m_id; ?>)"
                                        class="btn btn-sm btn-outline-danger">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if (mysqli_num_rows($more_services_result) == 0): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No custom sections generated yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div> -->

<!-- ------------------------- -->
        <div id="moreServicesSection" class="section-container hidden-section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>More Services (Page Sections)</h4>
                <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addMoreModal">
                    <ion-icon name="add-circle-outline"></ion-icon> Create New Section
                </button>
            </div>

            <table class="custom-table w-100">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Preview Image</th>
                        <th>Section Title</th>
                        <th>Description Preview</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    // Fetching from the moreservices table
                    $more_services_query = "SELECT * FROM `moreservices` ORDER BY id DESC";
                    $more_services_result = mysqli_query($con, $more_services_query);

                    while ($row = mysqli_fetch_assoc($more_services_result)) {
                    ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($row['url']); ?>"
                                    style="width:60px; height:40px; object-fit:cover; border-radius:4px; border:1px solid #374151;">
                            </td>
                            <td><strong><?php echo htmlspecialchars($row['serviceName']); ?></strong></td>
                            <td>
                                <small class="text-muted"><?php echo htmlspecialchars(substr($row['description'], 0, 40)); ?>...</small>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="javascript:void(0)" onclick="confirmDeleteMore(<?php echo $row['id']; ?>)" class="btn btn-sm btn-outline-danger">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div id="orderSection" class="section-container hidden-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Order Management</h4>
        <button type="button" class="btn btn-outline-info btn-sm d-flex align-items-center gap-2">
            <ion-icon name="download-outline"></ion-icon> Export Orders
        </button>
    </div>

    <table class="custom-table w-100">
        <thead>
            <tr>
                <th>Sl_no</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order_count = 1;
            // Fetching from your 'order' table
            // Note: If you have separate tables for users/services, you might need a JOIN query here later.
            $order_query = "SELECT * FROM `order` ORDER BY id DESC"; 
            $order_result = mysqli_query($con, $order_query);

            if ($order_result && mysqli_num_rows($order_result) > 0) {
                while ($row = mysqli_fetch_assoc($order_result)) {
            ?>
                    <tr>
                        <td><?php echo $order_count++; ?></td>
                        <td><span class="badge bg-dark border border-secondary text-light">#<?php echo htmlspecialchars($row['user_id']); ?></span></td>
                        <td><strong><?php echo htmlspecialchars($row['user_name']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['service_id']); ?></td>
                        <td>
                            <span class="text-info"><?php echo htmlspecialchars($row['service_name']); ?></span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="view_order.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                </div>
                        </td>
                    </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='6' class='text-center py-4 text-muted'>No orders found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- ===================== -->


    </div>

    <script>
        function showSection(sectionId, element) {
            // Hide all sections
            document.querySelectorAll('.section-container').forEach(sec => sec.classList.add('hidden-section'));

            // Show selected section
            document.getElementById(sectionId).classList.remove('hidden-section');

            // Update Title
            const titles = {
                'inquirySection': 'Dashboard',
                'serviceSection': 'Management Services',
                'userSection': 'User Dashboard'
            };
            document.getElementById('pageTitle').innerText = titles[sectionId];

            // Update Nav Active State
            document.querySelectorAll('.nav-link-custom').forEach(link => link.classList.remove('active'));
            element.classList.add('active');
        }

        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = (type === 'inquiry' ? 'delete.php?deleteid=' : 'delete_service.php?id=') + id;
                }
            })
        }



        // Function for Deletion
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This service will be permanently removed from your website!",
                icon: 'warning',
                showCancelButton: true,
                background: '#111827', // Matches your dashboard dark background
                color: '#ffffff', // White text
                confirmButtonColor: '#ef4444', // Red for delete
                cancelButtonColor: '#3b82f6', // Blue for cancel
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the PHP delete trigger
                    window.location.href = "deshboard.php?delete_service=" + id;
                }
            });
        }

        // Function for Editing (fills the modal with current data)
        function editService(data) {
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_name').value = data.service_name || data.title || data.name;
            document.getElementById('edit_desc').value = data.description || data.detail;
            document.getElementById('edit_icon').value = data.icon_name || data.icon;
            document.getElementById('edit_pop').checked = data.is_popular == 1;

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('editServiceModal'));
            myModal.show();
        }



        function confirmDeleteMore(id) {
            Swal.fire({
                title: 'Delete Section?',
                text: "This will remove the section from your Services page!",
                icon: 'warning',
                showCancelButton: true,
                background: '#111827',
                color: '#fff',
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to a delete handler (you can add this logic to the top of your PHP)
                    window.location.href = "deshboard.php?delete_more=" + id;
                }
            });
        }


    </script>
</body>

</html>