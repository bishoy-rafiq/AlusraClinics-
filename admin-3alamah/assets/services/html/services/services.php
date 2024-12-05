<?php
   include_once("../../../../../database/db.php");


   if ($_SESSION['user_role'] !== 'admin') {
        header("Location: ../../../../login.php");
    exit();
    }
   $db = new db();


$totalServicesCount = $db->get_data("services", "COUNT(*) as total")[0]['total'];

$servicesPerPage = 5;
$totalPages = ceil($totalServicesCount / $servicesPerPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $servicesPerPage;
$services = $db->get_data("services", "*", null, $currentPage);

?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الخدمات</title>
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

    <!-- =================== Styles =================== -->
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: var(--primary);
            color: white;
        }
    </style>

</head>

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
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-cogs me-2"></i>الخدمات</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../services/addService.php" class="dropdown-item"> اضافة خدمة</a>
                            <a href="../services/services.php" class="dropdown-item">قائمة الخدمات</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-image me-2"></i>الصور</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../images_services/add_image.php" class="dropdown-item"> اضافة الصور</a>
                            <a href="../images_services/images.php" class="dropdown-item">قائمة الصور</a>
                        </div>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-briefcase me-2"></i>تصنيف المعرض</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../category_images/add_category_images.php" class="dropdown-item"> اضافة تصنيف</a>
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
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../../../../logout.php" class="dropdown-item">تسجيل الخروج</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- form Start -->
            <?php
                
                if (isset($_SESSION["error_deleted_service"])) {
                    echo $_SESSION["error_deleted_service"];
                    unset($_SESSION["error_deleted_service"]); 
                }
                if (isset($_SESSION["deleted_service"])) {
                    echo $_SESSION["deleted_service"];
                    unset($_SESSION["deleted_service"]); 
                }

            ?>
            <div class="container-fluid pt-4 px-4 w-100">
                <div class="row g-4" dir="rtl">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-center mb-1">
                                <a href="addService.php" class="btn btn-success">اضافة خدمة</a>
                            </div>
                        </div>
                    </div>
                </div>
                            

                <div class="row g-4" dir="rtl">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                            <table border="3" style="border-color: black;">
                                <tr style="background-color: var(--primary);">
                                    <th>الاسم</th>
                                    <th>التصنيف</th>
                                    <th>الصورة</th>
                                    <th>الإجراء</th>
                                </tr>
                                <?php
                                foreach ($services as $service) {
                                    echo "<tr>";
                                    echo "<td>" . $service['name'] . "</td>";

                                    $category_id = $service['category_id'];
                                    $categoryQuery = $db->get_data("categories", "name", "id=" . $category_id);
                                    if ($categoryQuery) {
                                        $categoryResult = $categoryQuery[0]; 
                                        $name_category = $categoryResult['name'];
                                        echo "<td>" . $name_category . "</td>";
                                    } else {
                                        echo "<td>غير موجود التنصيف</td>"; 
                                    }
                                    echo "<td><img src='../../../../../images_site/services/" . $service['image'] . "' width='80'></td>";
                                    echo "<td>
                                        <a href='view_service.php?id=" . $service['id'] . "'>عرض التفاصيل</a>
                                        <a href='editService.php?service_id=" . $service['id'] . "'>تعديل</a>
                                        <a href='../../../delete.php' class='delete' onclick='return confirmDelete(\"{$service['name']}\")'>حذف</a>
                                        </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
 
                <div class="row g-4" dir="rtl">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-center mb-1">
                            <?php
                                echo "<div class='pagination'>";
                                if ($currentPage > 1) {
                                    $prevStyle = "background-color: var(--primary); color: #fff; border: 1px solid var(--primary); margin: 5px; padding: 5px;";
                                    echo "<a href='?page=" . ($currentPage - 1) . "' class='pagination-link' style='$prevStyle'>السابق</a>";
                                }

                                for ($i = 1; $i <= $totalPages; $i++) {
                                    $activeClass = ($i == $currentPage) ? 'active' : '';
                                    $numStyle = ($i == $currentPage) ? "background-color: var(--primary); color: #fff; border: 1px solid var(--primary); margin: 5px; padding: 5px;" : "background-color: #fff; color: var(--primary); border: 1px solid var(--primary); margin: 5px; padding: 5px;";
                                    echo "<a href='?page=$i' class='pagination-link $activeClass' style='$numStyle'>$i</a>";
                                }

                                if ($currentPage < $totalPages) {
                                    $nextStyle = "background-color: var(--primary); color: #fff; border: 1px solid var(--primary); margin: 5px; padding: 5px;";
                                    echo "<a href='?page=" . ($currentPage + 1) . "' class='pagination-link' style='$nextStyle'>التالي</a>";
                                }
                                echo "</div>";
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
    <script src="../../../../LinkNavbar/LinkNavbar/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- =================== Scripts =================== -->
    <script src="../../../javascript/main.js"></script>
    <script src="../js/view_image_upload.js"></script>

    <!-- Template Javascript -->
    <script src="../../../../LinkNavbar/js/main.js"></script>
    <script>
    function confirmDelete(serviceName) {
        if (confirm('هل أنت متأكد أنك تريد حذف الخدمة "' + serviceName + '"?')) {
            window.location.href = '../../../delete.php?page=service&serviceName=' + encodeURIComponent(serviceName);
        }
        return false; 
    }
    </script>


</body>

</html>


              


