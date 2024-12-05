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
   
    <title>علامة - تعزيز الهوية التجارية</title>
<meta name="description" content="اكتشف كيف يمكن لعلامتك التجارية أن تبرز في السوق من خلال تصميمات فريدة وهوية بصرية مميزة تزيد من الوعي وتجذب الجمهور.">
        <!-- icon-logo -->
        <link rel="icon" href="./images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

 
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

<!-- main-css -->
<link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>"/>


</head>

<body>
<section class="header1" > 
  <div class="banaar">
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
            echo '<li><a href="./' . htmlspecialchars($service['page_link']) . '">';
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

  <?php
        $images_banner = $db->getData("banner");
    ?>

  <div class="hero-section">
        <div class="hero-content">
            <h1><span> علامة</span></h1>
            <div class="typing-effect" id="typing"></div>
            <!--<div class="social-icons">
                    <a href="#"><i class="ri-facebook-fill" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-instagram-line" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-snapchat-fill" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-tiktok-line" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-youtube-fill" style="font-size: 24px;"></i></a>
                </div>-->
        </div>
        <?php 
        
                foreach ($images_banner as $image) {
                    echo '<div class="hero-image">';
                    echo '<img  src="./images_site/banner/' . $image['image'] . '" alt="image banner">';
                    echo '</div>';
                    
                }
                ?>
        
        
    </div>
    
</header>
</div>
</section>

<section class="section__container destination__container" id="services">
      <h2 class="section__header"> خدماتنا</h2>
      <div class="main-btn text-center py-5">
    <button type="button" class="custom-button" id="all_btn">
        جميع الخدمات
    </button>

    <?php 
    // جلب جميع الفئات من قاعدة البيانات
    $categories = $db->getData("categories", "*", "1");

    // التأكد من وجود فئات
    if ($categories) {
        foreach ($categories as $category) {
            // عرض زر لكل فئة
            echo '<button type="button" class="custom-button group_btn" data-group="' . htmlspecialchars($category['id']) . '" id="group' . htmlspecialchars($category['id']) . '_btn">';
            echo htmlspecialchars($category['name']);
            echo '</button>';
        }
    }
    ?>
</div>


             <div class="destination__grid">
        <?php 
        // جلب الخدمات من قاعدة البيانات
        $services = $db->getData("services", "*", "1");
        
        // عرض الخدمات
        if ($services) {
            foreach ($services as $service) {
                
              echo '<div class="service-item destination__card" data-group="' . htmlspecialchars($service['category_id']) . '">';               
               echo '<a href="./' . htmlspecialchars($service['page_link']) . '"><img src="./images_site/services/' . htmlspecialchars($service['image']) . '" alt="' . htmlspecialchars($service['name']) . '" class="service-image"></a>';
                echo '<div class="destination__card__details">';
                echo '<div>';

                echo '<a href="./' . htmlspecialchars($service['page_link']) . '"><h4>' . htmlspecialchars($service['name']) . '</h4></a>';

                
                
              echo  '</div>';
              echo '</div>';
                echo '</div>';
               
            }
        } else {
            echo '<p>لا توجد خدمات لعرضها.</p>';
        }

      
        ?>
</div>
</div>

</section>

  

    <secttion class="story">
      <div class=" section__container">
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

    <section class="section__container client__container" id="client">
      <h2 class="section__header1">آراء عملائنا</h2>
      <p class="section__description1">بالصوت استمع لاراء عملائنا الذين وضعوا ثقتهم بعلامة لخدمات السوشال ميديا</p>
      <!-- Slider main container -->
     <!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slide 1 -->
    <div class="swiper-slide">
      <div class="client__card">
        <img src="images/flag.png" alt="client" />
        <audio id="audio1">
          <source src="audio/1.ogg" type="audio/mpeg">
        </audio>
        <h4>ام مروان</h4>
        <h5>المغرب</h5>
        <button class="audio" onclick="playAudio('audio1')">استمع</button>
      </div>
    </div>

    <!-- Slide 2 -->

    <div class="swiper-slide">
      <div class="client__card">
        <img src="images/flag3.png" alt="client" />
        <audio id="audio3">
          <source src="audio/3.ogg" type="audio/mpeg">
        </audio>
        <h4>احمد محسن</h4>
        <h5>السعودية</h5>
        <button class="audio" onclick="playAudio('audio3')">استمع</button>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="swiper-slide">
      <div class="client__card">
        <img src="images/flag2.png" alt="client" />
        <audio id="audio2">
          <source src="audio/2.ogg" type="audio/mpeg">
        </audio>
        <h4>احمد حسن</h4>
        <h5>كندا</h5>
        <button class="audio" onclick="playAudio('audio2')">استمع</button>
      </div>
    </div>

 
    <!-- Slide 4 -->
    <div class="swiper-slide">
      <div class="client__card">
        <img src="images/flag4.png" alt="client" />
        <audio id="audio4">
          <source src="audio/4.ogg" type="audio/mpeg">
        </audio>
        <h4>مهند</h4>
        <h5>الامارات</h5>
        <button class="audio" onclick="playAudio('audio4')">استمع</button>
      </div>
    </div>

    <!-- Slide 5 -->
    <div class="swiper-slide">
      <div class="client__card">
        <img src="images/flag5.png" alt="client" />
        <audio id="audio5">
          <source src="audio/5.ogg" type="audio/mpeg">
        </audio>
        <h4>رفا</h4>
        <h5>سوريا</h5>
        <button class="audio" onclick="playAudio('audio5')">استمع</button>
      </div>
    </div>
  </div>
  <div class="swiper-pagination"></div>
</div>
      </div>
    </section>
<style>
  .swiper {
  width: 100%;
  padding-block: 4rem;
}

.swiper-slide {
  max-width: calc((var(--max-width) / 3) - 1.5rem);
}
.swiper-pagination {
  display: flex;

}
</style>
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
                        <a href="#services" class="footer-link">خدماتنا</a>
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


    
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>





    <script src="https://unpkg.com/scrollreveal"></script>
    <script  src="./javascript/index.js"></script>    



</body>

</html>