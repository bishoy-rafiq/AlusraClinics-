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
    <title>المقالات</title>
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



<section class="all-articles py-2">
    <div class="container">
        <div class="main-title">
            <h2 class="section__header1">أحدث المقالات</h2>
            <div class="under-title"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                <img src="./images_site/services/service5.png" class="card-img-top" alt="..." />
                
                    <div class="card-body">
                        <h5 class="card-title">صناعة المحتوى وإدارة الصفحات</h5>
                        <p class="card-text">صناعة المحتوى وإدارة الصفحات هي عملية استراتيجية تهدف إلى إنشاء وإدارة محتوى رقمي يعزز تفاعل الجمهور مع العلامة التجارية على وسائل التواصل الاجتماعي والمنصات المختلفة. يشمل ذلك كتابة وتحرير المقالات، تصميم الصور والرسومات، وإنتاج الفيديوهات الجذابة التي تناسب جمهورك المستهدف. تُركز إدارة الصفحات على الحفاظ على تفاعل المستخدمين والرد على استفساراتهم، مع التخطيط لنشر المحتوى في الوقت المناسب.
                        </p>
                        <small class="tags">
                        <span>صناعة المحتوى</span>
                         <span>إدارة الصفحات</span>
                          <span>إدارة محتوى </span>
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="card">
            
                        <img src="./images_site/services/service10.png" class="card-img-top" alt="..." />
                   
                    <div class="card-text">
                        <h5 class="card-title">تصميم بروفايل الشركه</h5>
                        <p class="card-text">
                        تصميم بروفايل الشركة هو عملية إنشاء وثيقة أو ملف رقمي يعرض هوية وأهداف الشركة بشكل احترافي وجذاب. يهدف البروفايل إلى تقديم لمحة شاملة عن الشركة، تشمل تاريخها، رؤيتها، رسالتها، وأبرز إنجازاتها. كما يسلط الضوء على الخدمات أو المنتجات التي تقدمها، بالإضافة إلى القيم التي تمثلها. يُستخدم بروفايل الشركة عادةً في الاجتماعات مع الشركاء المحتملين أو العملاء، ويُعتبر وسيلة فعالة لبناء صورة ذهنية قوية تعزز من سمعة الشركة ومصداقيتها في السوق.
                       </p>
                        <small class="tags">
                            <span>تصميم</span>
                            <span>بروفايل</span>
                            <span>الشركه </span>
                        </small>
                 
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="card">
                    
                <img src="./images_site/services/service2.png" class="card-img-top" alt="..." />

                <h5 class="card-title"> الموشن جرافيك</h5>
                <p class="card-text">

                                الموشن جرافيك هو فن تحريك الرسومات والأشكال الثابتة لإنشاء محتوى بصري جذاب وملهم. يُستخدم بشكل واسع في الإعلانات التجارية، الفيديوهات الترويجية، وعروض المنتجات، حيث يتم دمج الرسوم المتحركة مع المؤثرات الصوتية لتوضيح الأفكار أو تعزيز الرسائل الإعلانية. يتميز الموشن جرافيك بالمرونة، إذ يمكن تصميمه ليناسب مختلف الأنشطة التجارية أو الإبداعية. كما يساعد في تبسيط المعلومات المعقدة عبر تحويلها إلى محتوى مرئي يسهل فهمه. هذه التقنية أصبحت أداة قوية لجذب انتباه الجمهور وتعزيز التفاعل مع العلامات التجارية.                                </p>
                                <small class="tags">
                                    <span>تصاميم</span>
                                    <span>الموشن</span>
                                    <span>جرافيك</span>
                                </small>
                            
                           
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- articles -->
<section class="design py-5 px-3">
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div>
                    <div class="main-title py-2">
                        <h2>مقال تصاميم السوشال ميديا</h2>
                       
                    </div>
                    <div class="main-pargraph">
                        <p>السوشيال ميديا هي موضوع شائع ومثير للاهتمام للكثير من الناس، وقد كتبت عنه العديد من المقالات التي تغطي مختلف الجوانب والتأثيرات لهذه الظاهرة الحديثة. إليك بعض العناوين التي قد تثير اهتمامك:</p>
                        <ol>
                            <li>تأثير وسائل التواصل الاجتماعي على الصحة النفسية.</li>
                            <li>دور وسائل التواصل الاجتماعي في التغيير الاجتماعي والسياسي.</li>
                            <li>تأثير السوشيال ميديا على العلاقات الشخصية والتواصل الاجتماعي.</li>
                            <li>التأثير الاقتصادي للسوشيال ميديا وفرص العمل.</li>
                        </ol>
                        <div>
                            <a href="./contact.php">
                                <button type="button" class="btn border-0 btn-dark design-btn">
                                    تواصل معانا
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="main-image">
                    <img src="./images_site/services/service7.png" alt="التصميم والجرافكس" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- all-articles section -->
<section class="all-articles py-2">
    <div class="container">
        <div class="main-title">
            <h2 class="section__header1">جميع المقالات</h2>
            <div class="under-title"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <img src="./images_site/services/all-articles1.png" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">تصاميم السوشال ميديا</h5>
                        <p class="card-text">
                            السوشيال ميديا هي موضوع شائع ومثير للاهتمام للكثير من الناس، وقد كتبت عنه العديد من المقالات التي تغطي مختلف الجوانب والتأثيرات لهذه الظاهرة الحديثة.
                        </p>
                        <small class="tags">
                            <span>تصميم</span>
                            <span>نصائح</span>
                            <span>جرافيك ديزاين</span>
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <img src="./images_site/services/all-articles2.png" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">تصاميم السوشال ميديا</h5>
                        <p class="card-text">
                            السوشيال ميديا هي موضوع شائع ومثير للاهتمام للكثير من الناس، وقد كتبت عنه العديد من المقالات التي تغطي مختلف الجوانب والتأثيرات لهذه الظاهرة الحديثة.
                        </p>
                        <small class="tags">
                            <span>تصميم</span>
                            <span>نصائح</span>
                            <span>جرافيك ديزاين</span>
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <img src="./images_site/services/all-articles3.png" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">تصاميم السوشال ميديا</h5>
                        <p class="card-text">
                            السوشيال ميديا هي موضوع شائع ومثير للاهتمام للكثير من الناس، وقد كتبت عنه العديد من المقالات التي تغطي مختلف الجوانب والتأثيرات لهذه الظاهرة الحديثة.
                        </p>
                        <small class="tags">
                            <span>تصميم</span>
                            <span>نصائح</span>
                            <span>جرافيك ديزاين</span>
                        </small>
                    </div>
                </div>
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