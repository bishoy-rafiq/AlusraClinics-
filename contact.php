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
<html lang="en" dir="rtl">

<head>
     

    <meta charset="UTF-8" /> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title>تواصل معنا</title>
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



<!-- كود HTML مع PHP لعرض النموذج -->
<section class="contact-section">
    <div class="container">
        <div class="main-title">
            <h2>تواصل معنا</h2>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info">
                <h3>معلومات التواصل</h3>
                <p>
                    اضغط على الأيقونة ليتم تحويلك إلى فريق الدعم الفني الخاص بنا أو قم بتعبئة نموذج التواصل وسيتم الرد عليك خلال 24 ساعة عبر رقم الهاتف المضاف.
                </p>
                <ul class="contact-details">
                    <li>
                    <i class="ri-phone-fill" style="font-size: 24px;"></i>
                    <a href="https://wa.me/967773791686">967773791686</a>
                    </li>
                    <li>
                    <i class="ri-mail-fill" style="font-size: 24px;"></i>
                    <a href="mailto:Nasr2017nnss@gmail.com">Nasr2017nnss@gmail.com</a>
                    </li>
                </ul>

                <div class="social-icons">
                    <a href="#"><i class="ri-facebook-fill" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-instagram-line" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-snapchat-fill" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-tiktok-line" style="font-size: 24px;"></i></a>
                    <a href="#"><i class="ri-youtube-fill" style="font-size: 24px;"></i></a>
                </div>
                <img src="./images/banner.png" alt="">
            </div>

            <div class="contact-form">
                <?php if (isset($_SESSION['success'])): ?>
                    <p class="success-message"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
                <?php endif; ?>

                <form action="send.php" method="post">
                    <label for="name">الاسم كاملا</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required placeholder="اسم المستخدم">
                    <?php if (isset($_SESSION['error']['name'])): ?>
                        <p class="error-message"><?php echo $_SESSION['error']['name']; ?></p>
                    <?php endif; ?>

                    <label for="phone">رقم الجوال (واتس اب)</label>
                    <input type="text" id="phone" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" placeholder="رقم الجوال">
                    <?php if (isset($_SESSION['error']['phone'])): ?>
                        <p class="error-message"><?php echo $_SESSION['error']['phone']; ?></p>
                    <?php endif; ?>
 <h2>الخدمة المراد الاستفسار عنها</h2>
                          <ul class="service-list">
                           
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="المونتاج وتعديل الفيديوهات">
                        المونتاج وتعديل الفيديوهات
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="الموشن جرافيك">
                        الموشن جرافيك
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="كتابة المحتوى الإعلاني">
                        كتابة المحتوى الإعلاني
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="التصميم والجرافكس">
                        تصميم الشعارات
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="التعليق الصوتي">
                        التعليق الصوتي
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="الدوبلاج والتمثيل الصوتي">
                        الدوبلاج والتمثيل الصوتي
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="شيلات وزفات حسب الطلب">
                        تصميم السيرة الذاتية
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="شيلات النجاح والتخرج">
                    تصميم بروفايل الشركه
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="شيلات أعياد الميلاد والمولود الجديد">
                        تصاميم السوشال ميديا
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="services[]" value="صناعة المحتوى وإدارة الصفحات">
                        صناعة المحتوى وإدارة الصفحات
                    </label>
                </li>
            </ul>

                    <label for="email">البريد الالكتروني</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required placeholder="البريد الالكتروني">
                    <?php if (isset($_SESSION['error']['email'])): ?>
                        <p class="error-message"><?php echo $_SESSION['error']['email']; ?></p>
                    <?php endif; ?>

                    <label for="msg">الرسالة</label>
                    <textarea id="msg" name="msg" rows="5" placeholder="اترك رسالتك هنا"><?php echo isset($_POST['msg']) ? htmlspecialchars($_POST['msg']) : ''; ?></textarea>
                    <?php if (isset($_SESSION['error']['msg'])): ?>
                        <p class="error-message"><?php echo $_SESSION['error']['msg']; ?></p>
                    <?php endif; ?>

                    <button type="submit" name="sendEmail">ارسال الرسالة</button>
                </form>
            </div>
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
 

<script src="./javascript/articles-social.js"></script>
</body>
</html>