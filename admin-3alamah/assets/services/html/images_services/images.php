
<?php

include_once("../../../../../database/db.php");

   if ($_SESSION['user_role'] !== 'admin') {
        header("Location: ../../../../login.php");
    exit();
    }
   $db = new db();

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <title>عرض الصور</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../../../../LinkNavbar/img/login/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../../LinkNavbar/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../../LinkNavbar/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../../LinkNavbar/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../../../LinkNavbar/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/msg.css" />

    <style>
        .image-container {
            position: relative;
        }

        .delete-btn {
            position: absolute;
            top: 0;
            right: 0;
            margin: 5px;
            z-index: 1;
        }
    </style>

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div class="navbar-brand mx-4 mb-3">
                    <img src="../../../../LinkNavbar/img/login/logo2.png"  height="90px">
                </div>
                
                <div class="navbar-nav w-100">
                    <a href="../../../../index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>لوحة التحكم</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>التصنيفات</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../category/addCategory.php" class="dropdown-item"> اضافة تصنيف</a>
                            <a href="../category/categories.php" class="dropdown-item">قائمة التصنيفات</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-cogs me-2"></i>الخدمات</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../services/addService.php" class="dropdown-item"> اضافة خدمة</a>
                            <a href="../services/services.php" class="dropdown-item">قائمة الخدمات</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-image me-2"></i>الصور</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../images_services/add_image.php" class="dropdown-item"> اضافة الصور</a>
                            <a href="../images_services/images.php" class="dropdown-item">قائمة الصور</a>
                        </div>
                    </div>

                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-briefcase me-2"></i>تصنيف المعرض</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../category_images/add_category_images.php" class="dropdown-item"> اضافة التصنيف</a>
                            <a href="../category_images/categories_images.php" class="dropdown-item">قائمة التصنيفات</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-video me-2"></i>فيديوهات</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../videos/add_video.php" class="dropdown-item"> اضافة فيديو</a>
                            <a href="../videos/videos.php" class="dropdown-item">قائمة الفيديوهات</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-building me-2"></i>تصميم الجرافكس</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../works/add_work.php" class="dropdown-item"> اضافة تصنيف</a>
                            <a href="../works/works.php" class="dropdown-item">قائمة التصنيفات</a>
                        </div>
                    </div>


                    <a href="../../../../logout.php"  class="nav-item nav-link"><i class="fa fa-sign-out-alt me-2"></i>الخروج</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" dir="ltr">
                <a href="../../../../index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                       
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../../../../../images_site/user/user.png" alt="" style="width: 40px; height: 40px;">
                            <?php
                                $name='';
                                if(isset($_SESSION['user_id']))
                                {
                                    $get_data = $db->getData("users", "*", "id = {$_SESSION['user_id']}");
                                    if($get_data){
                                        $name = $get_data[0]['name'];
                                    }
                                }
                            ?>
                            <span class="d-none d-lg-inline-flex"><?php echo $name;?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" dir="ltr">
                            <a href="../../../../logout.php" class="dropdown-item">تسجيل الخروج</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- form Start -->
            <?php
               // Display any session messages for deleted services
               if (isset($_SESSION["error_deleted_image"])) {
                   echo $_SESSION["error_deleted_image"];
                   unset($_SESSION["error_deleted_image"]); 
               }
               if (isset($_SESSION["deleted_image"])) {
                   echo $_SESSION["deleted_image"];
                   unset($_SESSION["deleted_image"]); 
               }
            ?>
            <div class="container-fluid pt-4 px-4 w-100">
                <div class="row g-4" dir="rtl">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-center mb-1">
                                <a href="add_image.php" class="btn btn-success">اضافة صورة</a>
                            </div>  
                        </div>
                    </div>
                </div>                      
            </div>

            <div class="container-fluid pt-4 px-4 w-100">
                <div class="row g-4" dir="rtl">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-center mb-1">
                            <?php
                                $get_services = $db->getData("services");
                                $services = '';
                                foreach ($get_services as $service) {
                                    $services .= "<option value=\"{$service['id']}\"";

                                    if (isset($_GET['service_id']) && $_GET['service_id'] == $service['id']) {
                                        $services .= " selected";
                                    }

                                    $services .= ">{$service['name']}</option>";
                                }
                                ?>

                                <form action='images.php' class="centered-container">
                                    <h4>اختار الخدمة</h4>
                                    <select id="service_name" name="service_id" required>
                                        <option selected disabled>اختر الخدمة</option>
                                        <?php echo $services; ?>
                                    </select>
                                    <button type='submit' class="btn btn-success">عرض الصور</button>
                                </form>
                            </div>  
                        </div>
                    </div>
                </div>  

                <div class="container-fluid pt-4 px-4 w-100">
                <div class="row g-4" dir="rtl">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-center mb-1">
                            <?php
                                if (isset($_GET['service_id']) && is_numeric($_GET['service_id'])) {
                                    $service_id = $_GET['service_id'];
                                    $imagesData = $db->getData("services_images", "images", "service_id=" . $service_id);

                                    if (!empty($imagesData)) {
                                        $imagesArray = json_decode($imagesData[0]['images'], true);

                                        if (!empty($imagesArray)) {
                                            echo '<div class="row">';
                                            foreach ($imagesArray as $image) {
                                                echo '<div class="col-md-6">'; 
                                                echo '<div class="image-container m-2">';
                                                echo '<img class="img-fluid" src="../../../../../images_site/images_services/' . $image . '">';
                                                echo '<a href="#" onclick="return confirmDelete(\'' . $image . '\', ' . $service_id . ')" class="btn btn-danger delete-btn">حذف</a>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            echo '</div>'; 
                                        } else {
                                            echo '<div class="card" style="width: 18rem;"><p class="error">لا يوجد صور</p></div>';
                                        }
                                    } else {
                                        echo '<div class="card" style="width: 18rem;"><p class="error">لا يوجد صور</p></div>';
                                    }
                                }else {
                                    echo '<div class="card" style="width: 18rem;"><p class="error">لا يوجد صور</p></div>';
                                }  
                            ?>

                        </div>
                    </div>
                </div>                      
            </div>

            </div>

            <!-- Form End -->     


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row" dir="ltr">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="../../../../../index.php">3alamah</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../LinkNavbar/lib/chart/chart.min.js"></script>
    <script src="../../../../LinkNavbar/lib/easing/easing.min.js"></script>
    <script src="../../../../LinkNavbar/lib/waypoints/waypoints.min.js"></script>
    <script src="../../../../LinkNavbar/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../../../LinkNavbar/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../../../LinkNavbar/lib/tempusdominus/js/moment-timezone.min.js"></script>


    <!-- Template Javascript -->
    <script src="../../../../LinkNavbar/js/main.js"></script>
    
    <script>
        function confirmDelete(imageName, serviceId) {
            if (confirm('هل أنت متأكد أنك تريد حذف الصورة')) {
                var url = '../../../delete.php?page=image&serviceId=' + encodeURIComponent(serviceId) + '&imageName=' + encodeURIComponent(imageName);
                window.location.href = url;
            }
            return false;
        }
    </script>






</body>

</html>







