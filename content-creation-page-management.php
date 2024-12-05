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
    <title>صناعة المحتوى وإدارة الصفحات - تعزيز التفاعل وزيادة الوعي</title>
<meta name="description" content="تقديم محتوى متميز وإدارة صفحاتك على وسائل التواصل الاجتماعي لزيادة التفاعل وبناء علاقة قوية مع الجمهور.">
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


    <!-- section -->
    <?php 
        $get_name_servise6=$db->getData("services","*","id=6")
       ?>  
    <secttion class="story">
      <div class="section__container story__container">

        <div class="story__content">
        <h2 class="section__header1"><?php echo $get_name_servise6[0]['name']; ?></h2>
          <p>
    <?php echo $get_name_servise6[0]['article']; ?>

          </p>
          <a href="./contact.php">
                <button type="button" id="btn-service">
                 تواصل معانا
           </button>
        </a>
        </div>
        <div class="story__image">
        <img src="./images_site/services/<?php echo $get_name_servise6[0]['image']; ?>" alt="مونتاج وتعديل الفيديوهات" class="w-100 rounded-5" />
        </div>
      </div>
    </secttion>


<!--  design  -->

    <section class="design">
    <div class="main-title">
        <h6>  ما نقدمه في هذه الخدمة:-</h6>
    </div>
    <ol class="list-group">
        <li class="list-group-item"> دراسة حساباتك وتحليلها ووضع خطة محتوى مميزة حسب إحتياج مشروعك</li>
        <li class="list-group-item"> بعض أوقات قد نحتاج إلى فتح حسابات جديدة إن لم يكن لديك حسب تواجد
        جمهورك المستهدف _ تنظيم الصفحات وترتيبها بشكل احترافي حسب الحاجه</li>
        <li class="list-group-item"> إنشاء محتوى استراتيجي: نعمل على إنشاء محتوى فريد واحترافي يتناسب مع
                الهوية التجارية الخاصة بك ويستهدف جمهورك المستهدف. سواء كانت منشورات
                نصية، صور، مقاطع فيديو، أو مرئيات موشن جرافيك، نحن نضمن تقديم المحتوى
                الذي يلفت انتباه الجمهور ويساعد في تحقيق الأهداف التسويقية.</li>
        <li class="list-group-item">   إدارة الصفحات والتفاعل: بالإضافة إلى إنشاء المحتوى، نقوم أيضًا بإدارة
                صفحاتكم على منصات السوشال ميديا. سنتولى جدولة المنشورات، ومراقبة
                التعليقات والرد عليها، ومراقبة وتحليل الأداء من خلال التعرف على أسباب
                نجاح بعض المنشورات او فشلها وتطويرها للحفاظ على تفاعلية صفحاتكم وزيادة
                الانتشار.</li>
    </ol>
    <div class="main-title">
        <h6>لأننا نتميز</h6>
    </div>
    <ol class="list-group">
        <li class="list-group-item">بالخبرة التقنية: المتمثلة بفهم خوارزميات الصفحات واّلية النشر عليها</li>
        <li class="list-group-item">والخبرة الفنية: تجهيز محتوى إبداعي لنشره على مختلف صفحاتك</li>
        <li class="list-group-item">ونتائج أعمالنا السابقة تشهد بذلك</li>
        <li class="list-group-item">تفضل بالتواصل معنا لحجز استشارتك المجانية والتعرف على طلباتك ولكي نطلعك بالذي سنقوم به</li>
</ol>
</section>


<?php
// تأكد من وجود اتصال بقاعدة البيانات هنا
// $db هو كائن قاعدة البيانات الذي تستخدمه للوصول إلى البيانات
$categories_images = $db->getData("categories_images", "*", "service_id=6");

// تحقق من وجود بيانات
if (empty($categories_images)) {
    echo "لا توجد بيانات متاحة.";
}
?>

<section class="work py-5">
    <div class="container">
        <div class="main-title my-2">
            <h2>المعرض</h2>
        </div>

        <div id="categories-container" class="cards-container">
            <!-- سيتم عرض البطاقات هنا -->
        </div>

        <div id="gallery-content"></div> <!-- عنصر لعرض محتوى المعرض -->
    </div>
</section>

<script>
    // جلب البيانات من PHP
    var categoriesImages = <?php echo json_encode($categories_images); ?>;

    // إضافة بطاقات الفئات إلى الصفحة باستخدام JavaScript
    var categoriesContainer = document.getElementById('categories-container');
    categoriesImages.forEach(function(category) {
        var card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = `
            <img class="image" src="./images_site/categories_images/icons/${category.icon}" alt="${category.name}">
            <h3>${category.name}</h3>
        `;
        card.onclick = function() {
            displayImage(category.id);
        };
        categoriesContainer.appendChild(card);
    });

    // عرض الصور في قسم المعرض عند النقر على بطاقة
    function displayImage(id) {
        var category = categoriesImages.find(function(cat) {
            return cat.id === id;
        });

        if (category) {
            var galleryContent = document.getElementById('gallery-content');
            galleryContent.innerHTML = `
                <div class="gallery-content">
                    <div class="gallery-card">
                        <h3>قبل</h3>
                        <img src="./images_site/categories_images/before/${category.before_image}" alt="Before Image">
                    </div>
                    <div class="gallery-card">
                        <h3>بعد</h3>
                        <img src="./images_site/categories_images/after/${category.after_image}" alt="After Image">
                    </div>
                </div>
            `;
        } else {
            console.error('الفئة غير موجودة لهذا المعرف:', id);
        }
    }
</script>
<!-- القسم الخاص بالمعرض -->
<section class="gallery-section">
    <div class="container">
        <div id="gallery-content" class="row justify-content-center">
            <!-- سيتم عرض الصور عند النقر على البطاقة -->
        </div>
    </div>
</section>

<!-- CSS المخصص لعرض البطاقات والأزرار -->
<style>
    .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

 

    .gallery-content {
        display: flex;
        justify-content: space-between;
       
    }

 
    .card {
        padding: 15px;
        border-radius: 50px 0 50px; 
        padding: 10px 20px; 
        margin: 5px;
        text-align: center;
        cursor: pointer;
        transition: box-shadow 0.3s ease;
        background-color: var(--midnight-green);
       
     }
     .card img{
    width: 50px;
    height: 50px;
     }

    .card:hover {
        box-shadow: 0 4px 12px hsl(211, 100%, 50%);
    }


h3{
  color: var(--white);
  font-family: var(--header-font);
}


    /* المعرض */
    .gallery-section {
        padding: 20px;
    }

    .gallery-card {
        max-width: 300px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 50px;
        margin: 20px;
        text-align: center;
        box-shadow: 0 4px 12px hsl(211, 100%, 50%);
        background-color: #fff;
    }

    .gallery-card img {
        max-width: 100%;
        border-radius: 10px;
    }
    .gallery-card h3{
  border-radius: 50px 0 50px; 
  background-color: rgba(12, 14, 27, 0.7); /* اللون الأسود الداكن مع شفافية 70% */
       
    }

    .gallery-content {
        display: flex;
        justify-content: center; 
        gap: 20px; 
    }

    .gallery-card button {
        margin-top: 10px;
        padding: 10px 20px;
        border: none;
        background-color: #333;
        color: white;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .gallery-card button:hover {
        background-color: #555;
    }

    /* تحسين العرض على الهواتف المحمولة */
    @media (max-width: 768px) {
        .categories-grid {
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 300px;
        }

        .gallery-card {
            max-width: 100%;
        }

        .gallery-content {
            flex-direction: column; /* تكديس الصور عموديًا على الشاشات الصغيرة */
        }
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