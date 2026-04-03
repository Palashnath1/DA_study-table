
<!-- <?php include 'session.php' ?> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<link rel="stylesheet" href="style.css">

<style>
    .main_ul li a {
        text-decoration: none;
        color: #ffff !important;
    }

    body {
        background: #020c19;
        padding-top: 70px;
        /* Prevents content from hiding under the fixed header */
    }

    /* Add the rest of your CSS here */
    body {
        background: #020c19;
    }

    nav ul {
        list-style: none;

    }

    nav ul li {
        margin: 0 10px;
        font-weight: bold;
        font-size: 17px;
    }

    nav ul li a {
        text-decoration: none;
        color: #ffff;
    }

    nav ul li a:hover {
        text-decoration: underline;
    }

    header {
        background: #0d1827 !important;
        z-index: 5;
        padding: 16px;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
    }
</style>

<header>
    <div class="container">
        <nav class="row align-items-center">
            <div class="col-md-2 headLeft">
                <h1 class="m-0 text-white">Forma.</h1>
            </div>
            <div class="col-md-8 d-flex align-items-center justify-content-center headCenter" id="mobileMenu">
                <span onclick="closeMenu()" class="closeMenu"><ion-icon name="close-outline"></ion-icon></span>
                <ul class="main_ul d-flex list-unstyled align-items-center justify-content-center m-0">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php #services">Services</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                    <li><a href="index.php#portfolio">Portfolio</a></li>
                    <li><a href="index.php#team">Team</a></li>
                </ul>
            </div>
            <div class="col-md-2 d-flex justify-content-end align-item-center headRight">
                <!-- ----user logo -->
                <div class="col-md-3 d-flex justify-content-end align-items-center headRight gap-4">
                    <div class="position-relative d-flex align-items-center me-2">
                        <ion-icon name="notifications-outline" style="font-size: 22px; color: #fff; cursor: pointer; transition: 0.3s;" onmouseover="this.style.color='#877373'" onmouseout="this.style.color='#fff'"></ion-icon>                            0
                        </span>
                    </div>

                    <div class="d-flex align-items-center gap-2" style="cursor: pointer;">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; overflow: hidden;">
                            <a href="userlogin.php">
                                <ion-icon name="person-outline" style="font-size: 20px; color: #0d1827; transition: 0.3s;" onmouseover="this.style.color='#ee0000'" onmouseout="this.style.color='#0d1827'"></ion-icon>
                            </a>
                        </div>
                        <span class="text-white fw-bold d-none d-lg-block" style="font-size: 14px;"><?php 
                // Check if the user is logged in via session
                echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "Guest"; 
            ?> </span>
                    </div>

                    <div class="ms-2 gap-2" style="cursor: pointer;margin-right: 15px;">
                        <a href="javascript:void(0);" onclick="confirmLogout()">
                        <ion-icon name="log-out-outline" style="font-size: 24px; color: #f90404; transition: 0.3s;" onmouseover="this.style.color='#9e1d1d'" onmouseout="this.style.color='#ff0000'"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- --- -->
                <button type="button" class="btn btn-primary align-self-center"><a href="#contact" class="text-light text-decoration-none">Get Started</a></button>
                <div class="three_line ">
                    <span onclick="openMenu()" class="menuBtn">
                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                    </span>
                </div>
            </div>
        </nav>
    </div>
</header>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmLogout() {
    Swal.fire({
        title: "Are you sure?",
        text: "You will be logged out of your session!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#f90404", // Matching your logout icon color
        cancelButtonColor: "#0d1827",  // Matching your header color
        confirmButtonText: "Yes, logout!",
        background: "#0e1e32",         // Matching your site background
        color: "#ffffff"               // White text
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to your logout PHP file
            window.location.href = "userlogout.php";
        }
    });
}
</script>