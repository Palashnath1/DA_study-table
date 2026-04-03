<?php
include 'connect.php';

// Recommended: Add your session protection here
// require_once("auth_check.php"); 
// protect_page(); 

if (isset($_GET['deleteid'])){
    $id = mysqli_real_escape_string($con, $_GET['deleteid']); // Security: sanitize the ID

    $sql = "DELETE FROM `table` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    echo '<!DOCTYPE html>
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
    <script>';

    if($result){
        echo "Swal.fire({
            title: 'Deleted!',
            text: 'The record has been deleted successfully.',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'deshboard.php';
            }
        });";
    } else {
        $error = mysqli_error($con);
        echo "Swal.fire({
            title: 'Error!',
            text: 'Could not delete record: $error',
            icon: 'error'
        }).then(() => {
            window.location.href = 'deshboard.php';
        });";
    }

    echo '</script>
    </body>
    </html>';
}
?>