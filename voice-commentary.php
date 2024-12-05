<!---
 /**
 *** copyright 2024 Bishoy Rafiq
 **/
-->
<?php
include_once("database/db.php");
$db = new db();

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>خدمات التعليق الصوتي - صوت يروي قصتك</title>
<meta name="description" content="احصل على خدمات التعليق الصوتي الاحترافي لإضفاء طابع فريد على مشروعك وزيادة تأثير الرسالة.">

    <!-- icon-logo -->
    <link rel="icon" href="./images/logo.png" />
    <!-- Fontawesom -->

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

<!-- main-css -->
<link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>"/>
    

       

</head>

<body class="abuot">
    <!-- Navbar Start -->
    <header class="header" id="home">
  <nav data-header>
    <div class="nav__header" >
      <div class="nav__menu__btn" id="menu-btn">
        <i class="ri-menu-line"></i>
      </div>
      <div class="nav__logo">
        <a href="./index.php">
          <img src="./images/الشعار.png" alt="logo" />
        </a>
      </div>
    </div>

    <ul class="nav__links1" id="nav-links" >
      <li class="nav__logo">
        <a href="./index.php">
          <img src="./images/الشعار.png" alt="logo" />
        </a>
      </li>
      <li><a href="index.php">الرئيسية</a></li>
      <li>
        <div class="dropdown">
          <a href="#" role="button" class="dropbtn">خدماتنا <i class="ri-arrow-down-line"></i></a>
          <ul class="dropdown-content">
    <?php
        $services = $db->getData("services", "*"); // جلب جميع الخدمات من قاعدة البيانات
        foreach ($services as $service) {
            echo '<li><a href="' . htmlspecialchars($service['page_link']) . '">';
            echo htmlspecialchars($service['name']);
            echo '</a></li>';
        }
    ?>
</ul>
        </div>
      </li>
      <li><a href="./about.php">من نحن</a></li>
      <li><a href="./articles-social.php">مقالات</a></li>
      <li><a href="./contact.php">تواصل معنا</a></li>
    </ul>
  </nav>
</header>
    <!-- Navbar End -->
    <?php 
        $get_name_servise3=$db->getData("services","*","id=3")
       ?>  
    <!-- section comment -->
    <secttion class="story">
      <div class="section__container story__container">


    <div class="story__content">
    <h2 class="section__header1"><?php echo $get_name_servise3[0]['name']; ?></h2>
    <p>
    <?php echo $get_name_servise3[0]['article']; ?>
</p>
          <a href="./contact.php">
            <button type="button" id="btn-service">
             تواصل معانا
       </button>
    </a>
    </div>
    <div class="story__image">
    <img src="./images_site/services/<?php echo $get_name_servise3[0]['image']; ?>" alt="مونتاج وتعديل الفيديوهات" class="w-100 rounded-5" />
    </div>
  </div>
</secttion>
  
    <!-- video -->
      <!-- الموشن الفيديو -->
      <section id="video-gallery-section">
    <div id="video-container">
        <div id="video-title">
            <h2>المعرض</h2>
        </div>
        <div id="video-list">
        <?php
                $videosData = $db->getData("services_videos", "urls_videos", "service_id=3");
                if (!empty($videosData)) {
                    $videos = json_decode($videosData[0]['urls_videos'], true);
                    foreach ($videos as $videoId) {
                        ?>
        
            <div class="video-item">
                <div class="video-frame">
                <iframe src="https://www.youtube.com/embed/<?php echo $videoId; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <?php

                    }
                } 
              ?>
    
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">

    <div class="footer-container">
        <div class="footer-row">
            <!-- الروابط -->
            <div class="footer-col">
                <ul class="footer-list">
                    <li class="footer-title">الروابط</li>
                    <li>
                        <a href="./about.php" class="footer-link">من نحن</a>
                    </li>
                    <li>
                        <a href="./contact.php" class="footer-link">تواصل معانا</a>
                    </li>
                    <li>
                        <a href="./index.php#services" class="footer-link">خدماتنا</a>
                    </li>
                </ul>
            </div>

            <!-- تصنيفات الموقع -->
            <div class="footer-col">
                <ul class="footer-list">
                    <li class="footer-title">تصنيفات الموقع</li>
                    <li><a href="./motion-graphic-design.php" class="footer-link">مونتاج وتعديل الفيديوهات</a></li>
              <li><a href="./voice-commentary.php" class="footer-link">التعليق الصوتي والدوبلاج</a></li>
              <li> <a href="./visual-identity-design.php" class="footer-link">تصميم الهوية البصرية</a></li>
                <li><a href="./content-creation-page-management.php" class="footer-link">السوشال ميديا</a></li>
                </ul>
            </div>


            <!-- معلومات التواصل والشعار -->
            <div class="footer-col footer-logo-col">
                <div class="footer-logo">
                    <img src="./images/الشعار.png" alt="الشعار" />
                </div>
                <ul class="footer-contact">
                    <li>
                        <i class="ri-phone-line"></i>
                        <a href="https://wa.me/967773791686" target="_blank" class="footer-link">967773791686</a>
                    </li>
                    <li>
                        <i class="ri-time-line"></i>
                        <span>الاستجابة على الرسائل خلال 24 ساعة</span>
                    </li>
                    <li>
                        <i class="ri-mail-line"></i>
                        <a href="mailto:Nasr2017nnss@gmail.com" class="footer-link">Nasr2017nnss@gmail.com</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="footer__bar"><a href="https://3alamah.com/" class="footer-link">
        Copyright © 2024 3alamah.com. All rights reserved.</a>
      </div>
</footer>
<!-- زر WhatsApp -->
<a href="https://wa.me/967773791686" class="whatsapp-button" target="_blank">
  <i class="ri-whatsapp-line"></i>   
  <span>راسلنا على الواتساب</span>
</a>

<script src="https://unpkg.com/scrollreveal"></script>

    <script src="./javascript/main.js"></script>
</body>

</html>