

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
    <title>اضافة خدمة</title>
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
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-cogs me-2"></i>الخدمات</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="#" class="dropdown-item"> اضافة خدمة</a>
                            <a href="services.php" class="dropdown-item">قائمة الخدمات</a>
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
                        <a  class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
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
                if(isset($_SESSION['Error'])){
                    echo $_SESSION['Error'];
                    unset($_SESSION['Error']);

                }
                if(isset($_SESSION['Done_add_service'])){
                    echo $_SESSION['Done_add_service'];
                    unset($_SESSION['Done_add_service']);

                }
            ?>
            <div class="container-fluid pt-4 px-4 w-100">
                <div class="row g-4" dir="rtl">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-center mb-1">
                                <form action="../../../btnSubmit.php" method="post" enctype="multipart/form-data">
                                    <label for="image" class="file-input-label">اختر صورة</label>
                                    <input type="file" id="image" name="service_image" class="file-input" accept="image/*" required>
                                    <?php
                                    if(isset($_SESSION['error']['image_error'])) {
                                        echo $_SESSION['error']['image_error'];
                                        unset($_SESSION['error']['image_error']);
                                    }

                                    ?>
                                        <div class="row g-4" dir="rtl">
                                            <div class="col-sm-12 col-xl-12">
                                                <div class="bg-light rounded p-4">
                                                    <div class="d-flex justify-content-center mb-1">
                                                        <div id="image-preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4" dir="rtl">
                                            <div class="col-sm-12 col-xl-12">
                                                <div class="bg-light rounded p-4">
                                                    <div class="d-flex justify-content-center mb-1">
                                                        <label for="service_name">الاسم</label>
                                                        <input type="text" id="service_name" name="service_name" required/>
                                                        <?php
                                                            if(isset($_SESSION['error']['name_error'])) {
                                                                echo $_SESSION['error']['name_error'];
                                                                unset($_SESSION['error']['name_error']);
                                                            }
                                                        ?>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4" dir="rtl">
                                            <div class="col-sm-12 col-xl-12">
                                                <div class="bg-light rounded p-4">
                                                    <div class="d-flex justify-content-center mb-1">
                                                        <label for="description">الوصف</label>
                                                        <textarea id="description" name="service_description" cols="50" rows="5" required></textarea>
                                                        <?php

                                                            if(isset($_SESSION['error']['description_error'])) {
                                                                echo $_SESSION['error']['description_error'];
                                                                unset($_SESSION['error']['description_error']);
                                                            }

                                                        ?>                                                  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4" dir="rtl">
                                            <div class="col-sm-12 col-xl-12">
                                                <div class="bg-light rounded p-4">
                                                    <div class="d-flex justify-content-center mb-1">
                                                        <label for="description">المقال</label>
                                                        <textarea id="description" name="service_pag" cols="50" rows="5" required></textarea>
                                                        <?php

                                                            if(isset($_SESSION['error']['pag_error'])) {
                                                                echo $_SESSION['error']['pag_error'];
                                                                unset($_SESSION['error']['pag_error']);
                                                            }

                                                        ?>                                                  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4" dir="rtl">
                                            <div class="col-sm-12 col-xl-12">
                                                <div class="bg-light rounded p-4">
                                                    <div class="d-flex justify-content-center mb-1">
                                                        <?php
                                                            $get_categories = $db->getData("categories");
                                                            $categories = '';
                                                            foreach ($get_categories as $category) {
                                                                $categories .= "<option value=\"{$category['id']}\">{$category['name']}</option>";
                                                            }

                                                            ?>
                                                            <label for="category_name">اسم التصنيف</label>
                                                            <select id="category_name" name="category_id" required>
                                                                <option selected disabled>اختر التصنيف</option>
                                                                <?php
                                                                    echo $categories;
                                                                ?>
                                                            </select>
                                                            <?php
                                                            if(isset($_SESSION['error']['categories_error'])) {
                                                                echo $_SESSION['error']['categories_error'];
                                                                unset($_SESSION['error']['categories_error']);
                                                            }
                                                        ?>                                                  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <button type="reset" class="btn btn-warning m-1">إعادة تعيين</button>
                                    <button type="submit" name="service_add" class="btn btn-success m-1"> اضافة التصنيف</button>
                                </form>
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

    <!-- Template Javascript -->
    <script src="../../../../LinkNavbar/js/main.js"></script>

    <script>
        document.addEventListener('change', function () {
            const fileInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');

            fileInput.addEventListener('change', function () {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        imagePreview.innerHTML = `<img src="${e.target.result}" alt="Image Preview" style="max-width: 100px; max-height: 100px;">`;
                    }

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>




</body>

</html>


