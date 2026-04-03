<?php
include("connect.php");
$count_query = "SELECT COUNT(*) as total FROM `register`";
$count_result = mysqli_query($con, $count_query);
$count_data = mysqli_fetch_assoc($count_result);
$total_inquiries = $count_data['total'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <!-- ion_icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



    <link rel="stylesheet" href="style.css">
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <style>
        header {
            background: #0d1827 !important;
            z-index: 1000;
            padding: 8px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
        }

        .main_ul li a {
            text-decoration: none;
            color: #ffff !important;
        }

        body {
            background: #020c19;
            padding-top: 70px;
            /* Prevents content from hiding under the fixed header */
        }

        .custom-modal-bg {
            background-color: #030d16 !important;
            /* Dark navy from image */
            border-radius: 15px;
            overflow: hidden;
        }

        .text-info {
            color: #00a8e8 !important;
        }

        .profile_btn {
            background-color: orange !important;
            color: #ffff !important;
            font-weight: 600;
            border: none;

        }

        .profile_btn:hover {
            background-color: #b1870a !important;
        }

        .btn-outline-info-custom {
            border: 2px solid #00a8e8;
            color: #00a8e8;
            background: transparent;
        }

        .profile-glow-container {
            background: radial-gradient(circle, rgba(0, 168, 232, 0.2) 0%, rgba(3, 13, 22, 1) 80%);
            display: flex;
            align-items: flex-end;
            height: 100%;
        }

        .profile-fit {
            width: 100%;
            height: 100%;
            object-fit: cover;
            mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border: 1px solid #00a8e8;
            color: #00a8e8;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-links a:hover {
            background: #00a8e8;
            color: #000;
        }


        /* Add the rest of your CSS here */
    </style>
    <?php include("header.php"); ?>

    <!-- <header>
        <div class="container">
            <nav class="row">
                <div class="col-md-2 headLeft">
                    <h1>Forma.</h1>
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-center headCenter" id="mobileMenu">
                    <span onclick="closeMenu()" class="closeMenu"><ion-icon name="close-outline"></ion-icon></span>

                    <ul class="main_ul d-flex list-unstyled align-items-center justify-content-center m-0">
                        </li>
                        <li class="">
                            <a class="" href="#">Home</a>
                        </li>
                        </li>
                        <li class="">
                            <a class="" href="#about">About</a>
                        </li>
                        <li class="">
                            <a class="" href="#services">Services</a>
                        </li>
                        <li class="">
                            <a class="" href="#portfolio">Portfolio</a>
                        </li>
                        <li class="">
                            <a class="" href="#team">Team</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 d-flex justify-content-end align-item-center headRight">
                    <button type="button" class="btn btn-primary align-self-center"><a href="#getStart" class="text-light text-decoration-none">Get Started</a></button>
                    <div class="three_line ">
                        <span onclick="openMenu()" class="menuBtn">
                            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                        </span>
                    </div>
                </div>

            </nav>
        </div>
    </header> -->
    <section class="first1 ">
        <div class="container text-center">
            <div class="row">
                <div class="col md-6 d-flex flex-column justify-content-center gap-4">
                    <span class="badge float-start">✨ New Feature Launch</span>
                    <h1 class="main_h1">Accelerate Your Business Growth</h1>
                    <p>Our powerful SaaS platform helps modern teams increase productivity by 40% and reduce operational
                        costs. Join over 10,000+ companies already transforming their workflow.</p>
                    <div class="hero-buttons d-flex flex-row gap-2">
                        <a href="services.php" class="btn btn-primary"
                            style="display: flex;flex-direction: row;width: fit-content;align-items: center;gap: 5px;height: 52px;">
                            <span>Start Free Trial</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>

                        <a href="javascript:void(0)" id="watchDemoBtn" class="btn btn-dark"
                            style="display: flex;flex-direction: row;width: fit-content;align-items: center;gap: 5px;height: 52px;">
                            <ion-icon name="play-circle-outline"></ion-icon>
                            <span>Watch Demo</span>
                        </a>
                    </div>
                </div>
                <div class="col md-6 my-5">
                    <img src="DA.webp" class="img-fluid ">
                </div>
            </div>
        </div>
    </section>
    <section class="first2 " id="about">
        <div class="container text-center">
            <div class="row">
                <div class="first2_left col md-6 d-flex flex-column justify-content-center gap-4">
                    <span class="badge float-start">About Us</span>
                    <h1 class="main_h1">We Build Digital Products That Drive Growth</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo.</p>
                    <div class="container text-center">
                        <div class="client_list row row-cols-2 py-4">
                            <div class="col">
                                <h1>150</h1>
                                <p>Projects Delivered</p>
                            </div>
                            <div class="col">
                                <h1>85</h1>
                                <p>Happy Clients</p>
                            </div>
                            <div class="col">
                                <h1>12</h1>
                                <p>Years Experience</p>
                            </div>
                            <div class="col">
                                <h1><?php echo $total_inquiries; ?></h1>
                                <p>Client Retention</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 bg-transparent">
                        <div class="row">
                            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center fs-2 mt-4"
                                style="background-color: #192f4e; color:blue; width:50px;height:50px; border-radius:8px;">
                                <ion-icon name="flash-outline"></ion-icon>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h4 class="card-title">Fast Delivery</h4>
                                    <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                                        odit aut fugit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 bg-transparent">
                        <div class="row">
                            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center fs-2 mt-4"
                                style="background-color: #192f4e; color:blue; width:50px;height:50px; border-radius:8px;">
                                <ion-icon name="shield-checkmark-outline"></ion-icon>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h4 class="card-title">Quality Assured</h4>
                                    <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                                        odit aut fugit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-buttons d-flex flex-row gap-2">
                        <a href="register.php" class="btn btn-primary"
                            style="display: flex;flex-direction: row;width: fit-content;align-items: center;gap: 5px;height: 52px;">
                            <span>Start Your Project</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>

                        <a href="#" class="btn btn-dark  mb-5"
                            style="display: flex;flex-direction: row;width: fit-content;align-items: center;gap: 5px;height: 52px;">
                            <span>View Portfolio</span>
                        </a>
                    </div>
                </div>
                <div class="first2_right col md-6 my-5">
                    <img src="DA2.webp" class="img-fluid ">
                </div>
            </div>
        </div>
    </section>
    <section class="first3 mt-4" id="services">
        <div class="container text-center">
            <div class="first3_title d-grid grid-col justify-content-center">
                <span class="badge2 float-start">Services</span>
                <h1>Check Ours <span class="text-primary fw-bold">Services</span></h1>
            </div>
        </div>
        <div class="container head-container mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1>Comprehensive Digital Solutions</h1>
                    <p>We deliver end-to-end digital services that drive growth, enhance user experience, and transform
                        your
                        business vision into reality.</p>
                </div>
                <div class=" col-lg-5 text-lg-end">
                    <a href="#"
                        class="view_services d-flex justify-content-end align-items-center gap-1 text-decoration-none fs-6">View
                        All
                        Services
                        <ion-icon name="arrow-forward-outline" style="color: #0856e1; font-size:18px;"></ion-icon>

                    </a>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <div class="box row g-2">

                <!-- ---------------- -->
                <?php
                include("connect.php");
                $get_services = mysqli_query($con, "SELECT * FROM `services` ORDER BY id DESC");
                while ($service = mysqli_fetch_assoc($get_services)) {
                    $encryptID = hash(algo: 'sha256', data: $service['id']);
                ?>
                    <div class="container container1  col-4">
                        <div class=" col_header container">
                            <div class="icon_wrapper">
                                <ion-icon name="color-palette-outline" style="color: #208bf4; font-size:35px"></ion-icon>
                            </div>
                            <?php if ($service['is_popular']) { ?>
                                <span class="badge_populer text-white">Popular</span>
                            <?php } ?>
                        </div>
                        <div class="col_buttom p-3">
                            <h1><?php echo htmlspecialchars($service['service_name']); ?></h1>
                            <p><?php echo htmlspecialchars($service['description']); ?></p>
                            <ul class="p-0">
                                <li>
                                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    Logo & Visual Identity
                                </li>
                                <li>
                                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    Brand Guidelines
                                </li>
                                <li>
                                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    Marketing Materials
                                </li>
                            </ul>
                            <a href="services.php?id=<?php echo $encryptID; ?>">
                                <span>Explore Services</span>
                                <ion-icon name="arrow-forward-outline" style="color: #0856e1; font-size:18px;"></ion-icon>
                            </a>
                        </div>

                    </div>
                <?php } ?>



            </div>
            <div class="banner1 container text-center">
                <div class="row align-items-center bg-primary m-2 p-3 rounded-4">
                    <div class="col-lg-8">
                        <div class="cat-content">
                            <div class="cat-badge">Ready to Start?</div>
                            <h3>Transform Your Digital Presence Today</h3>
                            <p>Partner with us to create innovative solutions that drive real business results. Let's build
                                something extraordinary together.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end d-flex align-items-center justify-content-center">
                        <div class="hero-buttons d-flex flex-row gap-2">
                            <a href="register.php" class="btn btn-primary"
                                style="display: flex;flex-direction: row;width: fit-content;align-items: center;gap: 5px;height: 52px; background:white;">
                                <span style="color:#3383f4; font-weight:500; font-size:15px;">Get Started</span>
                                <ion-icon name="arrow-forward-outline" style="color:#3383f4"></ion-icon>
                            </a>

                            <a href="#" class="btn btn-dark  mb-5 bg-primary"
                                style="display: flex;flex-direction: row;width: fit-content;align-items: center;gap: 5px;height: 52px; border: 1px solid white;">
                                <span style="font-weight:500; font-size:15px;">Schedule Consultation</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


    </section>
    <section class="first4" id="portfolio">
        <div class="container text-center">
            <div class="first3_title d-grid grid-col justify-content-center m-5">
                <span class="badge2 float-start">Portfolio</span>
                <h1>Check Ours <span class="text-primary fw-bold">Portfolio</span></h1>
            </div>
        </div>
        <div class="container nav_container">

            <ul class="tab nav justify-content-center">
                <li class="tablinks nav-item" onclick="openCity(event, 'all')" id="defaultOpen">All</li>
                <li class="tablinks nav-item" onclick="openCity(event, 'web')">Web Development</li>
                <li class="tablinks nav-item" onclick="openCity(event, 'mobile')">Mobile App</li>
                <li class="tablinks nav-item" onclick="openCity(event, 'Branding')">Branding</li>
                <li class="tablinks nav-item" onclick="openCity(event, 'UI/UX')">UI/UX Design</li>

            </ul>

            <div id="all" class="tabcontent">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-1.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Web Development</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Enterprise Analytics Dashboard</h5>
                                <p class="card-text">Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget
                                    felis
                                    porttitor volutpat.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-3.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Mobile App</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Fitness Tracking Application</h5>
                                <p class="card-text">Praesent sapien massa, convallis a pellentesque nec, egestas non
                                    nisi..
                                </p>
                                <div class="tech_stack">
                                    <span>Vue.js</span>
                                    <span>Shopify</span>
                                    <span>GraphQL</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-5.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Branding</span>
                                    <span class="year">2023</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Tech Startup Brand Identity</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to
                                    additional content. This content is a little bit longer..</p>
                                <div class="tech_stack">
                                    <span>React Native</span>
                                    <span>Biometrics</span>
                                    <span>Secure API</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-7.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">UI/UX Design</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Cloud-Based SaaS Platform</h5>
                                <p class="card-text">Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
                                </p>
                                <div class="tech_stack">
                                    <span>Figma</span>
                                    <span>Prototyping</span>
                                    <span>Design System</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-2.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Branding</span>
                                    <span class="year">2023</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Restaurant Chain Rebrand</h5>
                                <p class="card-text">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus
                                    nibh.
                                </p>
                                <div class="tech_stack">
                                    <span>Brand Strategy</span>
                                    <span>Print Design</span>
                                    <span>Packaging</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-4.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Mobile Apps</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Digital Banking Solution</h5>
                                <p class="card-text">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                <div class="tech_stack">
                                    <span>React Native</span>
                                    <span>Biometrics</span>
                                    <span>Secure API</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-6.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Web Development</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Property Listing Platform</h5>
                                <p class="card-text">Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut
                                    libero malesuada.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-9.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Web Development</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Multi-Vendor E-commerce</h5>
                                <p class="card-text">Donec sollicitudin molestie malesuada. Curabitur arcu erat,
                                    accumsan id
                                    imperdiet et.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-8.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">UI/UX Design</span>
                                    <span class="year">2023</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Digital Banking Solution</h5>
                                <p class="card-text">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="web" class="tabcontent">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-1.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Web Development</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Enterprise Analytics Dashboard</h5>
                                <p class="card-text">Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget
                                    felis
                                    porttitor volutpat.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-6.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Web Development</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Property Listing Platform</h5>
                                <p class="card-text">Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut
                                    libero malesuada.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-9.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Web Development</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Multi-Vendor E-commerce</h5>
                                <p class="card-text">Donec sollicitudin molestie malesuada. Curabitur arcu erat,
                                    accumsan id
                                    imperdiet et.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="mobile" class="tabcontent">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-3.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Mobile App</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Fitness Tracking Application</h5>
                                <p class="card-text">Praesent sapien massa, convallis a pellentesque nec, egestas non
                                    nisi..
                                </p>
                                <div class="tech_stack">
                                    <span>Vue.js</span>
                                    <span>Shopify</span>
                                    <span>GraphQL</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-4.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Mobile Apps</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Digital Banking Solution</h5>
                                <p class="card-text">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                <div class="tech_stack">
                                    <span>React Native</span>
                                    <span>Biometrics</span>
                                    <span>Secure API</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Branding" class="tabcontent">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-5.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Branding</span>
                                    <span class="year">2023</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Tech Startup Brand Identity</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to
                                    additional content. This content is a little bit longer..</p>
                                <div class="tech_stack">
                                    <span>React Native</span>
                                    <span>Biometrics</span>
                                    <span>Secure API</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-2.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">Branding</span>
                                    <span class="year">2023</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Restaurant Chain Rebrand</h5>
                                <p class="card-text">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus
                                    nibh.
                                </p>
                                <div class="tech_stack">
                                    <span>Brand Strategy</span>
                                    <span>Print Design</span>
                                    <span>Packaging</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="UI/UX" class="tabcontent">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-7.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">UI/UX Design</span>
                                    <span class="year">2024</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Cloud-Based SaaS Platform</h5>
                                <p class="card-text">Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
                                </p>
                                <div class="tech_stack">
                                    <span>Figma</span>
                                    <span>Prototyping</span>
                                    <span>Design System</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100" style="background-color: #1f2935; border:1px solid #5b626b;">
                            <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/portfolio/portfolio-8.webp"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="meta d-flex justify-content-between">
                                    <span class="category">UI/UX Design</span>
                                    <span class="year">2023</span>
                                </div>
                                <h5 class="card-title text-light fw-bold mt-3 mb-3">Digital Banking Solution</h5>
                                <p class="card-text">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                <div class="tech_stack">
                                    <span>React</span>
                                    <span>TypeScript</span>
                                    <span>Node.js</span>
                                </div>
                                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none mt-4 mb-2">
                                    <span style="font-weight: 500;">View case Study</span>
                                    <ion-icon name="arrow-forward-outline" style=" font-size:18px;"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="banner1 container text-center mt-5">
            <div class="row align-items-center bg-primary m-2 p-3 rounded-4">
                <div class="col-lg-8 px-0">
                    <div class="cat-content">
                        <h3>Have a project in mind?</h3>
                        <p>Let's collaborate to create something exceptional. Our team is ready to bring your digital
                            vision to life.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end d-flex align-items-center justify-content-end">
                    <div class="hero-buttons d-flex flex-row gap-2">
                        <a href="#" class="btn"
                            style="display: flex;flex-direction: row;width: fit-content;align-items: center;height: 52px;background: #020c19;">
                            <span style="font-weight:500; font-size:15px;color: #208bf4; ">Schedule Consultation</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="first5 ">
        <div class="container text-center">
            <div class="first3_title d-grid grid-col justify-content-center m-5">
                <span class="badge2 float-start">why us</span>
                <h1>Why <span class="text-primary fw-bold">Choose Us</span></h1>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col md-6 d-flex flex-column justify-content-center gap-4">
                    <span class="badge float-start">Why Choose Us</span>
                    <h1 class="main_h1">Partner with a Team That Delivers Real Results</h1>
                    <p>
                        We don't just create digital experiences—we build solutions that drive measurable growth. Our
                        data-driven approach combines creativity with performance to help your business thrive in the
                        digital landscape.
                    </p>
                    <div class="container text-center">
                        <div class="row row-cols-3 py-4">
                            <div class="col">
                                <h1>150</h1>
                                <p>Projects Delivered</p>
                            </div>
                            <div class="col">
                                <h1>98</h1>
                                <p>% Client Retention</p>
                            </div>
                            <div class="col">
                                <h1>250</h1>
                                <p>% Avg ROI Increase</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col md-6 my-5">
                    <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/illustration/illustration-18.webp"
                        class="img-fluid ">
                </div>
            </div>
        </div>
        <!-- finish -->

        <div class="container text-center mt-5">
            <div class="box2 row g-2">
                <div class="container container1  col-4">
                    <div class=" col_header container">
                        <div class="icon_wrapper2">
                            <ion-icon name="flash-outline" style=" font-size:35px"></ion-icon>
                        </div>

                    </div>
                    <div class="col_buttom p-3">
                        <h1>Fast Turnaround</h1>
                        <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute
                            irure dolor.</p>

                        <a href="#">
                            <span>Learn more</span>
                            <ion-icon name="arrow-forward-outline" style="color: #0856e1; font-size:18px;"></ion-icon>
                        </a>
                    </div>
                </div>

                <div class="container container1  col-4 border border-primary">
                    <div class=" col_header container">
                        <div class="icon_wrapper2">
                            <ion-icon name="trending-up-outline" style=" font-size:35px"></ion-icon>
                        </div>
                        <span class="badge_most_populer text-white">Most Populer</span>
                    </div>
                    <div class="col_buttom p-3">
                        <h1>Data-Driven Strategy</h1>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium totam.</p>
                        <a href="#">
                            <span>Learn more</span>
                            <ion-icon name="arrow-forward-outline" style="color: #0856e1; font-size:18px;"></ion-icon>
                        </a>
                    </div>
                </div>

                <div class="container container1  col-4">
                    <div class=" col_header container">
                        <div class="icon_wrapper2">
                            <ion-icon name="shield-checkmark-outline" style=" font-size:35px"></ion-icon>
                        </div>

                    </div>
                    <div class="col_buttom p-3">
                        <h1>Proven Expertise</h1>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia
                            consequuntur magni.</p>
                        <a href="#">
                            <span>Learn more</span>
                            <ion-icon name="arrow-forward-outline" style="color: #0856e1; font-size:18px;"></ion-icon>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <section class="first6 mt-5">
        <div class="container text-center">
            <div class="first3_title d-grid grid-col justify-content-center m-4">
                <span class="badge2 float-start">Testimonials</span>
                <h1>Check Our <span class="text-primary fw-bold">Testimonials</span></h1>
            </div>
        </div>
        <div class="container">
            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class=" row " style="padding: 60px;">
                            <div class="col-8">
                                <h3>We Build Digital Products That Drive Growth</h3>
                                <p class="mt-5">
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                </p>
                                <p class="mt-5">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias perspiciatis
                                    dolores incidunt deleniti aperiam delectus ad, eum laborum fugit ipsam.
                                </p>

                                <div class="profile d-flex align-items-center">
                                    <div class="p_image">
                                        <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-10.webp"
                                            class="img-fluid" alt="...">
                                    </div>
                                    <div class="p_name p-4">
                                        <h6 class="m-0">Jane Karlis</h6>
                                        <p class="m-0">Store Owner</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-5">
                                <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-10.webp"
                                    class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class=" row " style="padding: 60px;">
                            <div class="col-8">
                                <h3>Nemo enim ipsam voluptatem</h3>
                                <p class="mt-5">
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                </p>
                                <p class="mt-5">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias perspiciatis
                                    dolores incidunt deleniti aperiam delectus ad, eum laborum fugit ipsam.
                                </p>

                                <div class="profile d-flex align-items-center">
                                    <div class="p_image">
                                        <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-8.webp"
                                            class="img-fluid" alt="...">
                                    </div>
                                    <div class="p_name p-4">
                                        <h6 class="m-0">Jane Karlis</h6>
                                        <p class="m-0">Store Owner</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-5">
                                <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-8.webp"
                                    class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class=" row " style="padding: 60px;">
                            <div class="col-8">
                                <h3>Labore nostrum eos impedit</h3>
                                <p class="mt-5">
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                </p>
                                <p class="mt-5">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias perspiciatis
                                    dolores incidunt deleniti aperiam delectus ad, eum laborum fugit ipsam.
                                </p>

                                <div class="profile d-flex align-items-center">
                                    <div class="p_image">
                                        <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-m-7.webp"
                                            class="img-fluid" alt="...">
                                    </div>
                                    <div class="p_name p-4">
                                        <h6 class="m-0">Jane Karlis</h6>
                                        <p class="m-0">Store Owner</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-5">
                                <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-m-7.webp"
                                    class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev d-flex align-items-end offset-3" type="button"
                    data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-flex align-items-end" style="right: 30%;" type="button"
                    data-bs-target="#carouselExampleRide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="first7" id="team">
        <div class="container text-center">
            <div class="first3_title d-grid grid-col justify-content-center m-4">
                <span class="badge2 float-start">Team</span>
                <h1>Check Our <span class="text-primary fw-bold">Team</span></h1>
            </div>
        </div>


        <div class="banner1 container text-center mt-4">
            <div class="row align-items-center m-2 p-3 rounded-4">
                <div class="col-lg-8 px-0">
                    <div class="cat-content">
                        <h1><span style="border-bottom:4px solid #208bf4;">Our</span> Professional Team</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus nec
                            ullamcorper mattis pulvinar dapibus leo.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end d-flex align-items-center justify-content-center position-relative">
                    <button class="carousel-control-prev" style="right: 71px;" type="button"
                        data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card w-100">
                                    <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-5.webp"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Sophia Reynolds</h5>
                                        <p class="card-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                        <!-- <a href="#" class="btn btn-primary">View details</a> -->
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal">View details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card w-100">
                                    <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-9.webp"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Olivia Thompson</h5>
                                        <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal1">View details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card w-100">
                                    <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-m-8.webp"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Daniel Chen</h5>
                                        <p class="card-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal2">View details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card w-100">
                                    <img src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-m-12.webp"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Jason Parker</h5>
                                        <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal3">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ---------------- -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 custom-modal-bg">
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close btn-close-black position-absolute end-0 top-0 m-3 z-3" data-bs-dismiss="modal"></button>

                    <div class="row g-0 align-items-center">
                        <div class="col-lg-7 p-5 text-white">
                            <h1 class="display-4 fw-bold">Hi, I'm <span id="modalName" class="text-white">Name</span></h1>
                            <h3 id="modalRole" class="text-info mb-4">Role</h3>
                            <p class="lead opacity-75">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tempora ex nisi dolore sequi voluptatibus! Ducimus aliquam inventore alias iusto harum, officia quibusdam.
                            </p>

                            <div class="mt-4 d-flex gap-3">
                                <button class="profile_btn btn btn-info-custom px-4">Hire Me</button>
                                <button class="profile_btn btn btn-outline-info-custom px-4">Let's Talk</button>
                            </div>

                            <div class="mt-5 d-flex gap-3 social-links">
                                <a href="#" class="btn"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-instagram"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-linkedin"></ion-icon></a>
                            </div>
                        </div>

                        <div class="col-lg-5 profile-glow-container d-none d-lg-block">
                            <img id="modalImg" src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-5.webp" alt="Profile" class="img-fluid profile-fit">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="profileModal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 custom-modal-bg">
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close btn-close-black position-absolute end-0 top-0 m-3 z-3" data-bs-dismiss="modal"></button>

                    <div class="row g-0 align-items-center">
                        <div class="col-lg-7 p-5 text-white">
                            <h1 class="display-4 fw-bold">Hi, I'm <span id="modalName" class="text-white">Name</span></h1>
                            <h3 id="modalRole" class="text-info mb-4">Role</h3>
                            <p class="lead opacity-75">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tempora ex nisi dolore sequi voluptatibus! Ducimus aliquam inventore alias iusto harum, officia quibusdam.
                            </p>

                            <div class="mt-4 d-flex gap-3">
                                <button class="profile_btn btn btn-info-custom px-4">Hire Me</button>
                                <button class="profile_btn btn btn-outline-info-custom px-4">Let's Talk</button>
                            </div>

                            <div class="mt-5 d-flex gap-3 social-links">
                                <a href="#" class="btn"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-instagram"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-linkedin"></ion-icon></a>
                            </div>
                        </div>

                        <div class="col-lg-5 profile-glow-container d-none d-lg-block">
                            <img id="modalImg" src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-f-9.webp" alt="Profile" class="img-fluid profile-fit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="profileModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 custom-modal-bg">
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close btn-close-black position-absolute end-0 top-0 m-3 z-3" data-bs-dismiss="modal"></button>

                    <div class="row g-0 align-items-center">
                        <div class="col-lg-7 p-5 text-white">
                            <h1 class="display-4 fw-bold">Hi, I'm <span id="modalName" class="text-white">Name</span></h1>
                            <h3 id="modalRole" class="text-info mb-4">Role</h3>
                            <p class="lead opacity-75">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tempora ex nisi dolore sequi voluptatibus! Ducimus aliquam inventore alias iusto harum, officia quibusdam.
                            </p>

                            <div class="mt-4 d-flex gap-3">
                                <button class="profile_btn btn btn-info-custom px-4">Hire Me</button>
                                <button class="profile_btn btn btn-outline-info-custom px-4">Let's Talk</button>
                            </div>

                            <div class="mt-5 d-flex gap-3 social-links">
                                <a href="#" class="btn"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-instagram"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-linkedin"></ion-icon></a>
                            </div>
                        </div>

                        <div class="col-lg-5 profile-glow-container d-none d-lg-block">
                            <img id="modalImg" src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-m-8.webp" alt="Profile" class="img-fluid profile-fit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="profileModal3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 custom-modal-bg">
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close btn-close-black position-absolute end-0 top-0 m-3 z-3" data-bs-dismiss="modal"></button>

                    <div class="row g-0 align-items-center">
                        <div class="col-lg-7 p-5 text-white">
                            <h1 class="display-4 fw-bold">Hi, I'm <span id="modalName" class="text-white">Name</span></h1>
                            <h3 id="modalRole" class="text-info mb-4">Role</h3>
                            <p class="lead opacity-75">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque tempora ex nisi dolore sequi voluptatibus! Ducimus aliquam inventore alias iusto harum, officia quibusdam.
                            </p>

                            <div class="mt-4 d-flex gap-3">
                                <button class="profile_btn btn btn-info-custom px-4">Hire Me</button>
                                <button class="profile_btn btn btn-outline-info-custom px-4">Let's Talk</button>
                            </div>

                            <div class="mt-5 d-flex gap-3 social-links">
                                <a href="#" class="btn"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-instagram"></ion-icon></a>
                                <a href="#" class="btn"><ion-icon name="logo-linkedin"></ion-icon></a>
                            </div>
                        </div>

                        <div class="col-lg-5 profile-glow-container d-none d-lg-block">
                            <img id="modalImg" src="https://bootstrapmade.com/content/demo/Forma/assets/img/person/person-m-12.webp" alt="Profile" class="img-fluid profile-fit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------- -->
    <section class="first8" id="contact">
        <div class="container text-center">
            <div class="row">
                <div class="col md-6 d-flex flex-column justify-content-center gap-4">
                    <span class="badge float-start">🚀 Let's Build Something Amazing</span>
                    <h1 class="main_h1">Ready to Transform Your Digital Presence?</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo.</p>

                    <div class="card " style="background-color: #0e1e32; border-radius: 11px;">
                        <div class="row g-0 d-flex align-items-center justify-content-center">
                            <div class="col-md-2 small_card_icon">
                                <ion-icon name="mail-outline"></ion-icon>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h6 class="card-title">Email</h6>
                                    <h6 class="card-title">hello@example.com</h6>
                                    <p class="card-text">We reply within 4 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="background-color: #0e1e32; border-radius: 11px;">
                        <div class="row g-0 d-flex align-items-center justify-content-center">
                            <div class="col-md-2 small_card_icon">
                                <ion-icon name="call-outline"></ion-icon>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h6 class="card-title">Phone</h6>
                                    <h6 class="card-title">+1 (555) 234-5678</h6>
                                    <p class="card-text">We reply within 4 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="background-color: #0e1e32; border-radius: 11px;">
                        <div class="row g-0 d-flex align-items-center justify-content-center">
                            <div class="col-md-2 small_card_icon">
                                <ion-icon name="location-outline"></ion-icon>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h6 class="card-title">Office</h6>
                                    <h6 class="card-title">5632 Market Street, San Francisco, CA 94102</h6>
                                    <p class="card-text">Visit us anytime</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card" style="background-color: #0e1e32; border-radius: 11px;">
                        <div class="row  d-flex align-items-center justify-content-center p-4">
                            <div class="col-md-4 rating_card" style="border-right: 1px solid #4f4b4b;">
                                <h4 class="m-0 text-primary fw-bold">2.5k+</h4>
                                <p class="m-0">Happy Clients</p>
                            </div>
                            <div class="col-md-4 rating_card" style="border-right: 1px solid #4f4b4b;">
                                <h4 class="m-0 text-primary fw-bold">4.9/5</h4>
                                <p class="m-0">Client Rating</p>
                            </div>
                            <div class="col-md-4 rating_card">
                                <h4 class="m-0 text-primary fw-bold">15min</h4>
                                <p class="m-0">Avg Response</p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col md-6 my-5" style="text-align: left;">
                    <form id="getStart" method="POST">
                        <h1>Start Your Project</h1>
                        <p>Tell us about your project and we'll get back to you with a tailored solution.</p>

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name='name' class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" class="form-control" style="height: 101px;" required></textarea>
                        </div>

                        <div class="hero-buttons d-flex flex-row gap-2">
                            <button type="submit" name='sendmsg' class="btn btn-primary"
                                style="display: flex; flex-direction: row; align-items: center; justify-content:center; gap: 5px; height: 45px; width:100%; border: none;">
                                <span>Send Message</span>
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("connect.php");

    if (isset($_POST['sendmsg'])) {

        $name    = mysqli_real_escape_string($con, $_POST['name']);
        $email   = mysqli_real_escape_string($con, $_POST['email']);
        $subject = mysqli_real_escape_string($con, $_POST['subject']);
        $message = mysqli_real_escape_string($con, $_POST['message']);

        $sql = "INSERT INTO `table` (name, email , subject , message) 
            VALUES ('$name', '$email', '$subject', '$message')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<!DOCTYPE html><html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body style='background-color: #0b1120;'>";
            echo "<script>
            Swal.fire({
                title: 'Updated!',
                text: 'The record has been submitted successfully.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href='index.php';
            });
        </script></body></html>";
        } else {
            die("Query Failed: " . mysqli_error($con));
        }
    }
    ?>

    <section class="first9 mt-5 ">
        <footer class=" text-white py-5">
            <div class="container">
                <div class="row gy-4">

                    <div class="first_footer col-lg-4 col-md-6">
                        <h2 class="fw-bold mb-3">Forma</h2>
                        <p class="small opacity-75">Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada
                            terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.
                        </p>
                        <div class="d-flex gap-2 mt-4">
                            <a href="#" class="btn btn-outline-light rounded-circle "><ion-icon
                                    name="logo-twitter"></ion-icon></a>
                            <a href="#" class="btn btn-outline-light rounded-circle "><ion-icon
                                    name="logo-facebook"></ion-icon></a>
                            <a href="#" class="btn btn-outline-light rounded-circle "><ion-icon
                                    name="logo-instagram"></ion-icon></a>
                            <a href="#" class="btn btn-outline-light rounded-circle "><ion-icon
                                    name="logo-linkedin"></ion-icon></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <h5 class="fw-bold mb-3">Useful Links</h5>
                        <ul class="list-unstyled small opacity-75">
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Home</a></li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">About us</a></li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Services</a></li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Terms of service</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <h5 class="fw-bold mb-3">Our Services</h5>
                        <ul class="list-unstyled small opacity-75">
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Web Design</a></li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Web Development</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Product Management</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Marketing</a></li>
                            <li class="mb-2"><a href="login.php" class="text-white text-decoration-none">Admin Login</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <h5 class="fw-bold mb-3">Contact Us</h5>
                        <div class="small opacity-75">
                            <p class="mb-1">A108 Adam Street</p>
                            <p class="mb-1">New York, NY 535022</p>
                            <p class="mb-3">United States</p>
                            <p class="mb-1"><strong>Phone:</strong> +1 5589 55488 55</p>
                            <p class="mb-0"><strong>Email:</strong> info@example.com</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container  mt-5 p-4 text-center small" style="background-color: #101c2d;border-radius:15px">
                <p class="mb-1 text-center border-0">© Copyright <strong>Forma</strong> All Rights Reserved</p>
                <p class="mb-0 text-white-50 text-center border-0">Designed by <a href="#"
                        class="text-primary text-decoration-none">BootstrapMade</a></p>
            </div>
        </footer>
    </section>
    <div id="videoModal" class="video-overlay">
        <div class="video-content">
            <h2 class="mb-4">This is Demo video</h2>
            <span class="close-video">&times;</span>
            <div class="video-wrapper">
                <video id="demoVideo" controls width="100%">
                    <source src="video/video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>




    <script>
        const modal = document.getElementById("videoModal");
        const btn = document.getElementById("watchDemoBtn");
        const closeBtn = document.querySelector(".close-video");
        const videoPlayer = document.getElementById("demoVideo");

        // Open modal and start video automatically
        btn.onclick = (event) => {
            event.preventDefault(); // Prevents '#' from appearing in URL
            modal.style.display = "block";
            videoPlayer.play(); // Starts the local video
        };

        // Close modal on 'X' click
        closeBtn.onclick = function() {
            modal.style.display = "none";
            videoPlayer.pause(); // Stops the video
            videoPlayer.currentTime = 0; // Resets video to the beginning
        }

        // Close modal if user clicks outside the video box
        window.onclick = function(event) {
            if (event.target == modal) {
                closeBtn.onclick();
            }
        }
    </script>


    <script src="script.js"></script>

</body>

</html>