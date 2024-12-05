 /**
 *** copyright 2024 Bishoy Rafiq
 **/






const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});


const header = document.querySelector("[data-header]");


const activeElementOnScroll = function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
}

window.addEventListener("scroll", activeElementOnScroll);



document.addEventListener("DOMContentLoaded", function () {
  const text = "نصنع التميز والنجاح لعلامتك التجارية"; // النص الذي سيتم كتابته
  const typingElement = document.getElementById("typing");
  let index = 0;

  function type() {
    if (index < text.length) {
      typingElement.textContent += text.charAt(index);
      index++;
      setTimeout(type, 40); // تغيير الوقت لسرعة الكتابة
    }
  }

  type(); // بدء التأثير عند تحميل الصفحة
});



// services



document.addEventListener("DOMContentLoaded", function() {
  // عرض جميع الخدمات عند الضغط على الزر "جميع الخدمات"
  document.getElementById("all_btn").addEventListener("click", function() {
      document.querySelectorAll(".service-item").forEach(function(item) {
          item.style.display = "block"; // عرض كل الخدمات
      });
  });

  // عرض الخدمات حسب الفئة عند الضغط على الأزرار
  document.querySelectorAll(".group_btn").forEach(function(button) {
      button.addEventListener("click", function() {
          var groupId = this.getAttribute("data-group");

          // إخفاء كل العناصر
          document.querySelectorAll(".service-item").forEach(function(item) {
              item.style.display = "none"; // إخفاء كل الخدمات
          });

          // عرض فقط الخدمات التي تنتمي للفئة المحددة
          document.querySelectorAll(".service-item[data-group='" + groupId + "']").forEach(function(item) {
              item.style.display = "block"; // عرض الخدمات المناسبة للفئة
          });
      });
  });
});



//industry







const scrollRevealOption = {
  origin: "bottom",
  distance: "50px",
  duration: 1000,
};


ScrollReveal().reveal(".hero-content h1", {
  ...scrollRevealOption,
  origin: "done",
});




ScrollReveal().reveal(".story__image img", {
  ...scrollRevealOption,
  origin: "done",
});
ScrollReveal().reveal(".story__content .section__header", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".story__content h4", {
  ...scrollRevealOption,
  delay: 400,
});
ScrollReveal().reveal(".story__content p", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".story__content h3", {
  ...scrollRevealOption,
  delay: 1000,
});

const swiper = new Swiper(".swiper", {
  slidesPerView: 1,
  loop: true, 
  navigation: {
      nextEl: '.swiper-button-next', 
      prevEl: '.swiper-button-prev', 
  },
  pagination: {
      el: '.swiper-pagination', 
      clickable: true, 
  },
  breakpoints: {
    
    640: {
      slidesPerView: 2, 
     
    },
    1024: {
      slidesPerView: 3, 
  
    },
  },
});




let currentAudio = null; // متغير لتخزين الصوت الحالي

function playAudio(audioId) {
  const audio = document.getElementById(audioId);

  // إذا كان هناك صوت مشغل بالفعل، قم بإيقافه
  if (currentAudio && currentAudio !== audio) {
    currentAudio.pause();
    currentAudio.currentTime = 0; // إعادة الصوت للبداية
  }

  // تشغيل أو إيقاف الصوت المحدد
  if (audio.paused) {
    audio.play();
    currentAudio = audio; // تحديث الصوت الحالي
  } else {
    audio.pause();
    currentAudio = null; // إعادة تعيين الصوت الحالي
  }
}




