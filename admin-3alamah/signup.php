<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
     <!-- Favicon -->
    <link href="LinkNavbar/img/login/logo.png" rel="icon">

    <title>تسجيل حساب</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="LinkNavbar/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="LinkNavbar/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="LinkNavbar/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="LinkNavbar/css/style.css" rel="stylesheet">
    <link href="assets/services/css/msg.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">جارٍ التحميل...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- تسجيل الدخول -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i> DASHAdMIN</h3>
                            </a>
                            <h3>تسجيل حساب</h3>
                        </div>
                        <?php
                            include_once("../database/db.php");
                            
                            if(isset($_SESSION["signup_success"])){
                                echo $_SESSION["signup_success"];
                                unset($_SESSION["signup_success"]);
                            }
                            
                            if(isset($_SESSION["signup_error"]))
                            {
                                echo $_SESSION["signup_error"];
                                unset($_SESSION["signup_error"]);
                            }
                        ?>
                        <form action="submit.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="name">
                            <label for="floatingText">اسم المستخدم</label>
                        </div>
                        <?php
                            if(isset($_SESSION['signup_errors']['name']))
                            {
                                echo $_SESSION['signup_errors']['name'];
                                unset($_SESSION['signup_errors']['name']);
                            }
                        ?>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email">
                            <label for="floatingInput">عنوان البريد الإلكتروني</label>
                        </div>
                        <?php
                            if(isset($_SESSION['signup_errors']['email']))
                            {
                                echo $_SESSION['signup_errors']['email'];
                                unset($_SESSION['signup_errors']['email']);
                            }
                        ?>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="password">
                            <label for="floatingPassword">كلمة المرور</label>
                        </div>
                        <?php
                            if(isset($_SESSION['signup_errors']['password']))
                            {
                                echo $_SESSION['signup_errors']['password'];
                                unset($_SESSION['signup_errors']['password']);
                            }
                        ?>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="confirm_password">
                            <label for="floatingPassword">تأكيد كلمة المرور</label>
                        </div>
                        <?php
                            if(isset($_SESSION['signup_errors']['confirm_password']))
                            {
                                echo $_SESSION['signup_errors']['confirm_password'];
                                unset($_SESSION['signup_errors']['confirm_password']);
                            }
                        ?>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="signup">تسجيل</button>
                        <p class="text-center mb-0">هل لديك حساب؟ <a href="login.php">تسجيل الدخول</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- تسجيل الدخول -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="LinkNavbar/lib/chart/chart.min.js"></script>
    <script src="LinkNavbar/lib/easing/easing.min.js"></script>
    <script src="LinkNavbar/lib/waypoints/waypoints.min.js"></script>
    <script src="LinkNavbar/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="LinkNavbar/lib/tempusdominus/js/moment.min.js"></script>
    <script src="LinkNavbar/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="LinkNavbar/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="LinkNavbar/js/main.js"></script>
</body>

</html>
