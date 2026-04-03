<?php
include("connect.php"); // Ensure this path is correct
session_start();

// Fetch all services from the moreservices table
$query = "SELECT * FROM `moreservices` ORDER BY id ASC";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services | Accelerate Your Business</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <style>
        :root {
            --bg-dark: #0b1120;
            --card-bg: #111827;
            --accent-blue: #3b82f6;
            --text-muted: #94a3b8;
        }

        body {
            background-color: var(--bg-dark);
            color: white !important;
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        .service-header {
            padding: 100px 0 60px;
            background: linear-gradient(180deg, #1e293b 0%, var(--bg-dark) 100%);
        }

        .service-section {
            padding: 80px 0;
            border-bottom: 1px solid #1e293b;
        }

        .service-icon-box {
            width: 80px;
            height: 80px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            border: 1px solid var(--accent-blue);
        }

        .service-icon-box ion-icon {
            font-size: 40px;
            color: var(--accent-blue);
        }

        .img-placeholder img {
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            height: 348px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        @media (min-width: 992px) {
            .img-placeholder img {
                margin-left: 64px;
            }

            /* Adjust margin for reversed rows */
            .flex-lg-row-reverse .img-placeholder img {
                margin-left: 0;
                margin-right: 64px;
            }
        }

        .feature-list li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-muted);
        }

        .btn-trial {
            background-color: var(--accent-blue);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-trial:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }
        .footer_t{
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <!-- <header class="service-header text-center">
        <div class="container">
            <span class="badge bg-primary mb-3">Expert Solutions</span>
            <h1 class="display-4 fw-bold mb-3">Our Specialized Services</h1>
            <p class="lead text-secondary mx-auto" style="max-width: 700px;">
                We provide end-to-end digital solutions designed to help modern teams increase productivity
                and scale their business operations globally.
            </p>
        </div>
    </header> -->

    <div class="container">
        <?php
        $count = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Determine if the row should be reversed (every second item)
                $is_even = ($count % 2 != 0);
                $row_class = $is_even ? 'flex-lg-row-reverse' : '';
                $text_padding = $is_even ? 'ps-lg-5' : '';

                // Map database columns to variables
                $title = $row['serviceName'];
                $desc = $row['description'];
                $img = $row['url']; // Assuming column name is 'image'
                $icon = !empty($row['icon_name']) ? $row['icon_name'] : 'color-palette-outline';
        ?>
                <section class="service-section">
                    <div class="row align-items-center <?php echo $row_class; ?>">
                        <div class="col-lg-6 <?php echo $text_padding; ?>">
                            <div class="service-icon-box">
                                <ion-icon name="<?php echo $icon; ?>"></ion-icon>
                            </div>
                            <h2 class="fw-bold mb-4"><?php echo htmlspecialchars($title); ?></h2>
                            <p class="text-secondary mb-4"><?php echo htmlspecialchars($desc); ?></p>

                            <ul class="list-unstyled feature-list">
                                <li><ion-icon name="checkmark-circle" class="text-primary"></ion-icon> High-Fidelity Solutions</li>
                                <li><ion-icon name="checkmark-circle" class="text-primary"></ion-icon> Strategic Positioning</li>
                                <li><ion-icon name="checkmark-circle" class="text-primary"></ion-icon> Professional Support</li>
                            </ul>

                            <a href="checkout_process.php?service_id=<?php echo $row['id']; ?>" class="btn btn-warning"
                                style="display: flex; flex-direction: row; width: fit-content; align-items: center; gap: 5px; height: 52px;">
                                <span>Buy now</span>
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="col-lg-6 mt-5 mt-lg-0">
                            <div class="img-placeholder">
                                <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($title); ?>">
                            </div>
                        </div>
                    </div>
                </section>
        <?php
                $count++;
            }
        } else {
            echo "<div class='text-center py-5'><p class='text-muted'>No services added yet.</p></div>";
        }
        ?>
    </div>

    <section class="py-5 text-center" style="background: #111827;">
        <div class="container py-5">
            <h2 class="fw-bold mb-4">Ready to Start Your Free Trial?</h2>
            <p class="footer_t text-secondary mb-5">Experience our full suite of services and see the difference in your productivity.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="index.php#getStart" class="btn btn-primary btn-trial">Contact Us</a>
                <a href="index.php" class="btn btn-outline-light px-4 py-2">Back to Home</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>