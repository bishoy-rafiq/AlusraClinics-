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
    <title>من نحن</title>
<meta name="description" content="اكتشف كيف يمكن لعلامتك التجارية أن تبرز في السوق من خلال تصميمات فريدة وهوية بصرية مميزة تزيد من الوعي وتجذب الجمهور.">

    <!-- icon-logo -->
    <link rel="icon" href="./images/logo.png" />



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
      <li><a href="./index.php">الرئيسية</a></li>
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
    <secttion class="story ">
      <div class="section__container">
<h2 class="section__header1">من نحن</h2>
      <div class=" story__container">

        <div class="story__content">
          
          <h3> <i class="ri-team-fill"></i>علامة ميديا للإنتاج الفني والمرئي نحن شركة افتراضية على الانترنت مكونة من مجموعة من الأفراد المتخصصين والمبدعين بمجالات مختلفة وبخبرة ممتازة كل فرد بمجاله.</h3>
          <h3><i class="ri-signal-tower-line"></i>نقدم لك جميع خدمات السوشال ميديا بأفضل الأسعار وأقوى العروض من علامة ميديا.</h3>
          <h3><i class="ri-alarm-warning-line"></i>
          وللثقة بعلامة ميديا عرضنا لك العديد من اعمالنا السابقة التي قمنا بها مع مختلف الشركات وصفحات السوشال ميديا معروضة بكل خدمة على حدة.</h3>
        </div>
        <div class="story__image">
          <img src="./images/banner.png" alt="story" />
        </div>
      </div>
      </div>
    </secttion>


    
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
    <script src="./javascript/about.js"></script>
</body>

</html>