-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 28 نوفمبر 2024 الساعة 22:11
-- إصدار الخادم: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3alamah_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `banner`
--

INSERT INTO `banner` (`id`, `image`, `alt_text`) VALUES
(1, 'image1.png', 'Banner Image 1');

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'مونتاج وتعديل الفيديوهات'),
(2, 'التصميم والجرافكس'),
(3, 'التعليق الصوتي والدوبلاج'),
(5, 'السوشال ميديا'),
(11, 'الشيلات والزفات ');

-- --------------------------------------------------------

--
-- بنية الجدول `categories_images`
--

CREATE TABLE `categories_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `before_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `after_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories_images`
--

INSERT INTO `categories_images` (`id`, `name`, `service_id`, `icon`, `before_image`, `after_image`) VALUES
(1, ' حسابات فيس بوك', 6, 'icon1.png', 'before1.jpg', 'after1.jpg'),
(2, ' حسابات سناب شات', 6, 'icon2.png', 'before2.jpg', 'after2.jpg'),
(3, ' حسابات انستقرام', 6, 'icon3.png', 'before3.jpg', 'after3.jpg'),
(4, ' حسابات يوتيوب', 6, 'icon4.png', 'before4.jpg', 'after4.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `article` text COLLATE utf8mb4_general_ci,
  `page_link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`, `category_id`, `article`, `page_link`) VALUES
(1, 'مونتاج وتعديل الفيديوهات', 'service1.png', ' خدمة المونتاج وتعديل الفيديوهات هي الخيار الافضل لك لتحويل اللقطات العادية إلى أعمال فنية مبهرة، أو لإنشاء محتواك الخاص. مع التطور التكنولوجي وانتشار وسائل التواصل الاجتماعي ومنصات الفيديو عبر الإنترنت، أصبحت القدرة على إنتاج فيديوهات ذات جودة عالية أمرًا ضروريًا. بحيث يوجد الكثير من المحتوى المرئي المتاح، ولذلك يجب على الشركات والأفراد التميز للوصول إلى الجمهور المستهدف والاسبقية بالمنافسة. لذا، نحن بخدمتك لإضافة القيمة والإبداع لمحتواك', 1, '  خدمة المونتاج وتعديل الفيديوهات هي الخيار الافضل لك لتحويل اللقطات العادية إلى أعمال فنية مبهرة، أو لإنشاء محتواك الخاص. مع التطور التكنولوجي وانتشار وسائل التواصل الاجتماعي ومنصات الفيديو عبر الإنترنت، أصبحت القدرة على إنتاج فيديوهات ذات جودة عالية أمرًا ضروريًا. بحيث يوجد الكثير من المحتوى المرئي المتاح، ولذلك يجب على الشركات والأفراد التميز للوصول إلى الجمهور المستهدف والاسبقية بالمنافسة. لذا، نحن بخدمتك لإضافة القيمة والإبداع لمحتواك', 'montage-video-editing.php'),
(2, 'الموشن جرافيك ', 'service2.png', '   نجسد أفكارك بأسلوب مبتكر وحركي، مما يضيف جاذبية لمشاريعك، سواء كانت فيديوهات ترويجية أو رسوم متحركة.', 1, ' خدمة الموشن جرافيك الاحترافية يمكنك من خلالها الحصول على تصميم وإنشاء مقاطع فيديو متحركة تجمع بين الرسوم المتحركة والرسوم المرئية والنصوص والمؤثرات الصوتية لإيصال رسالتك بطريقة بسيطة وجذابة. تستخدم هذه الخدمة التأثيرات البصرية المتنوعة والتقنيات المتقدمة لعرض المعلومات وأفكار العلامة التجارية بشكل مبتكر ومشوق. باستخدام خدمة الموشن جرافيك، يمكن للعلامات التجارية والأفراد توجيه الانتباه نحو منتجاتهم وخدماتهم وإبراز الجوانب المميزة فيها بشكل احترافي وسهل الفهم  بالتواصل معنا للمزيد من التفاصيل.', 'motion-graphic-design.php'),
(3, 'التعليق الصوتي', 'service3.png', '  نوفر أصواتًا تناسب احتياجاتك، سواء لتعليقات تجارية أو إضافات صوتية للفيديو، مما يجعل مشروعك الصوتي أكثر حيوية.', 3, ' عندما يمتلئ الإنترنت بالكثير من المحتوى المرئي، يصبح هناك حاجة متزايدة لتمييز المحتوى الخاص بك وجذب الجمهور. يعتبر التعليق الصوتي الاحترافي أداة مهمة للتمييز وتعزيز جودة المحتوى المرئي. بدلاً من الاعتماد فقط على الصور والنصوص، لإيصال رسالتك بشكل فعال. تعتبر خدمة التعليق الصوتي أداة أساسية لإضفاء الحيوية والاحترافية على محتواك المرئي. بفضل هذه الخدمة، يمكنك إضافة صوتًا جذابًا وواضحًا للفيديوهات. رغم أن التعليق الصوتي قد يبدو ثانويًا في بعض الأحيان، إلا أنه يلعب دورًا هامًا في توصيل الرسالة واستمتاع المشاهدين بالمحتوى وبالتالي التفاعل معاه تفضل بالتواصل معنا للمزيد من التفاصيل.', 'voice-commentary.php'),
(4, 'الدوبلاج والتمثيل الصوتي', 'service4.png', '     نقدم لك أصواتًا احترافية لتعزيز محتواك المرئي، سواء في فيديوهات، إعلانات أو ألعاب فيديو، بأسلوب مميز.', 3, 'هل ترغب في إضفاء الحيوية إلى مشروعك الصوتي وجعل رسائلك تتجاوز الحدود؟\r\nنحن نقدم لك خدمات الدوبلاج والتمثيل الصوتي عالية الاحترافية التي ستنقل جمهورك إلى عالم مليء بالتعبير والإبداع. سواء كنت تبحث عن ترجمة دقيقة لمحتوى فيديو بلغة أخرى، أو بحاجة إلى أصوات مميزة تحاكي شخصيات خيالية في الرسوم المتحركة أو ألعاب الفيديو، فإننا هنا لتحقيق ذلك!\r\n\r\nما الذي يجعلنا الخيار الأمثل لك؟\r\nأداء صوتي احترافي: لدينا فريق من ممثلي الصوت المحترفين الذين يتقنون تحويل النصوص إلى أصوات حية تجذب الانتباه وتبث روح الشخصية.\r\nدوبلاج متقن: نوفر لك خدمة دوبلاج احترافية، مع مراعاة الدقة في مطابقة حركة الشفاه والحفاظ على الجوهر الأصلي للمحتوى.\r\nتعدد اللغات: نضمن لك تقديم محتوى بجودة عالية بلغات متعددة، ما يساعدك على توسيع قاعدة جمهورك إلى أسواق جديدة.\r\nإيصال الرسالة بدقة: سواء كان مشروعك إعلان تجاري، فيلم قصير، أو سلسلة تعليمية، فنحن قادرون على إيصال رسالتك بقوة واحترافية، مع الحفاظ على روح النص وأصالته.\r\nأسعار تنافسية: خدماتنا تتميز بالمرونة في الأسعار لتناسب جميع الميزانيات، مع الحفاظ على أعلى مستويات الجودة.\r\n\r\n\r\n', 'dubbing-voice-acting.php'),
(5, 'كتابة المحتوى الاعلاني', 'service5.png', '     نكتب لك محتوى إبداعي وجذاب يبرز علامتك التجارية ويجذب الانتباه، مما يعزز تواصل الجمهور مع رسالتك بشكل فعال ومؤثر.', 5, ' تعد فيديوهات الموشن جرافيك أداة تسويقية قوية تستخدم على نطاق واسع في عالم الأعمال الحديث. حيث أن قدرتها على إيصال الرسالة بطريقة بصرية جذابة وسريعة وهذا ما يجعلها خيارًا مثاليًا للشركات التي تسعى للترويج لمنتجاتها أو خدماتها بشكل فعال. لكن لا يمكن لفيديو الموشن جرافيك أن يكون قوياً دون نص إعلاني متقن وفعال. حيث أن كتابة النص الإعلاني الصحيح لهذه الفيديوهات تلعب دورًا حاسمًا في جذب انتباه الجمهور المستهدف وإقناعهم بالتفاعل أو الشراء. ثق عزيزي العميل بأنك ستحصل على نص اعلاني احترافي يميزك عن المنافسين ويجذب الانتباه ويثير الرغبة والفضول لدى العميل وإيصال رسالتك بطريقة فعالة تستطيع التواصل معنا من خلال الضغط على أيقونة الواتس الموجودة بالاسفل على يسار الشاشة.', 'advertising-content-writing.php'),
(6, 'إدارة صفحات السوشال ميديا', 'service6.png', '      نقدم خدمات متكاملة لصناعة محتوى جذاب وإدارة الصفحات الرقمية. نضمن تحسين تواجدك الرقمي من خلال استراتيجيات مخصصة وتفاعل مع الجمهور لتحقيق نتائج ملموسة.', 5, ' نحن فريق متخصص في صناعة المحتوى وإدارة صفحات السوشال ميديا. نهدف إلى مساعدة العلامات التجارية والشركات على بناء حضور قوي عبر منصات السوشال ميديا وتحقيق نجاح تسويقي قوي. بحيث يتكون هذا الفريق من متخصصين تقنيين يهتمون بإدارة الصفحة ومراقبة الأداء والاهتمام بجميع الخوارزميات وسياسات الصفحة لسرعة انتشارها بالطريقة الصحيحة، بالإضافة الى مصممين جرافيكس والفيديو ومعلقين صوتيين وكتاب مبدعين لتزويد الصفحة بالمحتوى الإبداعي والمناسب.', 'content-creation-page-management.php'),
(7, 'تصاميم السوشال ميديا', 'service7.png', '   نقدم خدمات تصميم مخصصة للسوشال ميديا تساهم في تعزيز وجودك الرقمي. نصمم محتوى جذاب يلفت الانتباه ويعكس هوية علامتك التجارية، مما يزيد من تفاعل الجمهور ويعزز من فعالية حملاتك الإعلانية.', 5, ' في خدمة تصاميم السوشيال ميديا، نساعدك على إبراز علامتك التجارية من خلال تصاميم مبتكرة وجذابة تتماشى مع هوية شركتك وأهدافها التسويقية. نحرص على تصميم محتوى بصري ملهم ومخصص لكل منصة من منصات التواصل الاجتماعي، مما يساهم في زيادة التفاعل وجذب الانتباه. سواء كنت بحاجة إلى تصميم منشورات يومية، قصص، أو إعلانات مدفوعة، سنعمل على تقديم أفكار إبداعية تسهم في تعزيز حضورك الرقمي وجذب جمهورك المستهدف.', 'social-media-design.php'),
(8, 'تصميم الشعارات', 'service8.jpg', ' نقدم خدمات تصميم الشعارات التي تعبر عن هوية علامتك التجارية. نخلق شعارات فريدة وجذابة تساعدك في التميز وتعكس قيمك بشكل احترافي، مما يسهل على العملاء التعرف على علامتك.', 2, ' تصميم الشعارات هو خدمة تركز على إنشاء رمز مرئي فريد يمثل هوية شركتك أو منتجك. الشعار الجيد يجب أن يكون بسيطًا، مميزًا، وسهل التذكر. من خلال دمج عناصر بصرية جذابة وألوان متناسقة، يتم تصميم شعار يلفت انتباه العملاء ويعكس رسالة العلامة التجارية بشكل فعال. الشعار الاحترافي يعزز الوعي بالعلامة التجارية ويترك انطباعًا قويًا ومستدامًا لدى الجمهور، مما يساعد على بناء هوية قوية وجذب العملاء المحتملين.', 'logo-design.php'),
(9, 'تصميم سيرة ذاتية', 'service9.png', '  نقدم خدمات تصميم السيرة الذاتية التي تساعدك في إبراز مهاراتك وخبراتك بشكل احترافي. نعمل على إنشاء سيرة ذاتية مميزة تبرز مؤهلاتك وتجذب انتباه أصحاب العمل، مما يزيد من فرصك في الحصول على الوظيفة المناسبة.', 2, ' نحرص على تقديم تصميم مبتكر واحترافي يعكس شخصيتك بشكل مميز ويجعل سيرتك الذاتية تبرز من بين المنافسين. من خلال تنسيقات جذابة وعصرية، نضمن لك أن تكون سيرتك الذاتية ملفتة وجذابة أمام أصحاب العمل، مما يزيد فرصك في الحصول على مقابلات عمل وفرص مهنية مميزة.', 'cv-design.php'),
(10, 'تصميم بروفايل الشركات', 'service10.png', '  نقدم خدمات تصميم بروفايل الشركة بشكل احترافي يبرز رؤيتك وقيمك. نحن نساعدك على إنشاء محتوى بصري يجسد هوية علامتك التجارية ويعكس إنجازاتك وخدماتك، مما يعزز من مصداقيتك ويساهم في جذب العملاء الجدد.', 2, 'في خدمة تصميم بروفايل الشركة، نقدم لك بروفايل احترافي يعكس هوية شركتك وقيمها بطريقة واضحة وجذابة. نركز على تصميم محتوى بصري مميز يعزز من مصداقيتك ويمكّنك من التواصل بفعالية مع عملائك المحتملين. سواء كنت تبحث عن تقديم خدماتك أو منتجاتك بشكل مميز أو إنشاء هوية مؤسسية قوية، سنعمل على إبراز نقاط القوة والتميز في شركتك من خلال تصميم بروفايل متكامل ومؤثر.', 'company-profile-design.php'),
(11, 'تصميم الهوية البصرية', 'service11.png', ' نقدم خدمات تصميم الهوية البصرية لتعكس قيم علامتك التجارية بوضوح. نساعدك في خلق انطباع مميز من خلال شعارات جذابة وألوان متناسقة، مما يعزز من تميزك في السوق.', 2, 'تصميم الهوية البصرية هو العامل الأساسي لجذب انتباه العميل وبناء انطباع قوي عن علامتك التجارية. من خلال الشعار المميز والألوان الجذابة، نضمن لك تميّزاً بصرياً يجعل علامتك لا تُنسى. هذه الخدمة تُساعدك في خلق هوية متسقة واحترافية، تعكس قيمك وتجذب عملاءك المستهدفين بكل قوة ووضوح.', 'visual-identity-design.php'),
(12, 'تنفيذ شيلات النجاح والتخرج ', 'service12.png', 'نقدم في هذه الخدمة إنشاء وتسجيل شيلات مميزة وجميلة بالاسم وحسب الطلب لتُعبّر عن فرحة النجاح والتخرج، لتهديها لمن تحب وتهنئة بالنجاح او التخرج\r\n هذه الشيلات هدية مميزة ومؤثرة لأي شخص يود مشاركة فرحة التخرج مع احبابه او عائلته بطريقة فنية ومبتكرة.', 11, 'نقدم في هذه الخدمة إنشاء وتسجيل شيلات مميزة وجميلة بالاسم وحسب الطلب لتُعبّر عن فرحة النجاح والتخرج، لتهديها لمن تحب وتهنئة بالنجاح او التخرج\r\n هذه الشيلات هدية مميزة ومؤثرة لأي شخص يود مشاركة فرحة التخرج مع احبابه او عائلته بطريقة فنية ومبتكرة.', 'success.php'),
(13, 'تنفيذ شيلات الزفاف والأعراس ', 'service13.png', 'نقدم لك تجربة فريدة ومميزة لإحياء يومك الخاص. يتم إعداد شيلة خاصة تحمل اسم العروسين مع كلمات تهنئة ومباركات تعبر عن الفرح والحب في هذا اليوم المميز. يمكنك تخصيص الشيلة لتناسب ذوقك الخاص، سواء كانت رومانسية أو حماسية، مما يضيف لمسة من الفخامة والتميز لاحتفالك. ستكون الشيلة صوتًا مميزًا يخلّد لحظات الزفاف ويجعلها أكثر سحراً وجمالاً.', 11, 'نقدم لك تجربة فريدة ومميزة لإحياء يومك الخاص. يتم إعداد شيلة خاصة تحمل اسم العروسين مع كلمات تهنئة ومباركات تعبر عن الفرح والحب في هذا اليوم المميز. يمكنك تخصيص الشيلة لتناسب ذوقك الخاص، سواء كانت رومانسية أو حماسية، مما يضيف لمسة من الفخامة والتميز لاحتفالك. ستكون الشيلة صوتًا مميزًا يخلّد لحظات الزفاف ويجعلها أكثر سحراً وجمالاً.', 'success1.php'),
(14, 'تنفيذ شيلات اعياد الميلاد والمولود الجديد ', 'service14.png', ' لنضيف تجربة موسيقية مميزة ومخصصة، حيث يتم تجهيز شيلة فيها اسم صاحب المناسبة مع كلمات تهنئة وتبريكات خاصة. يمكن تخصيص الشيلة بما يتناسب مع ذوقك وتفضيلاتك، لتكون الهدية المثالية التي تخلّد اللحظات السعيدة وتضيف لمسة من الفرح والبهجة لهذه المناسبات الخاصة.', 11, ' لنضيف تجربة موسيقية مميزة ومخصصة، حيث يتم تجهيز شيلة فيها اسم صاحب المناسبة مع كلمات تهنئة وتبريكات خاصة. يمكن تخصيص الشيلة بما يتناسب مع ذوقك وتفضيلاتك، لتكون الهدية المثالية التي تخلّد اللحظات السعيدة وتضيف لمسة من الفرح والبهجة لهذه المناسبات الخاصة.', 'success2.php');

-- --------------------------------------------------------

--
-- بنية الجدول `services_images`
--

CREATE TABLE `services_images` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `images` text COLLATE utf8mb4_general_ci NOT NULL,
  `new_column_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services_images`
--

INSERT INTO `services_images` (`id`, `service_id`, `images`, `new_column_name`) VALUES
(1, 5, '[\"image1.png\", \"image2.png\"] ', NULL),
(4, 10, '[\"188872576167477083e26ae3.52700517.jpg\"]', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `services_videos`
--

CREATE TABLE `services_videos` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `urls_videos` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services_videos`
--

INSERT INTO `services_videos` (`id`, `service_id`, `urls_videos`) VALUES
(1, 1, '[\"MFb5U0Yuz5w\", \"zT4Xq1dxWsY\", \"4uc2-a6t15Q\",\"WIJ8hU5yt-g\",\"U-8hdBIN5go\",\"mp7XG70WF3w\",\"xD5c5HRz46Y\",\"leYMIF3I8Go\",\"B3GbknCuzBI\",\"st5iOFHJ9IU\",\"rPscFQbnZIk\",\"kAjMuFl0elc\",\"9XBMc9ReaZE\",\"85ko3jiU41s\",\"348MSc25Drs\",\"KqGh-MVFHGg\",\"B09d9_n-vLA\",\"7tC7Iv03C1Y\",\"m-3a2b12l_o\",\"K0795XXvtco\",\"feLIt25uHrg\"]\r\n'),
(2, 2, '[\"4chNcKANPMk\", \"-INTF59tim8\", \"Tm8V56m6uXo\",\"58eW48Ehf8M\",\"B2VGGs7rx-U\",\"206kU7BHRa4\",\"lwiGRwFFer8\",\"T-82-TJBFhs\",\"VJqrTjF5pxE\"]'),
(3, 3, '[\"zT4Xq1dxWsY\",\"eaQ8KyvJJUA\",\"SFYbPnzbsgg\",\"vSA-vOLQSuc\",\"gPmMhA44uWw\",\"34URrwRWMT8\",\"6L_qkqFABKk\",\"d0YEWszjIPI\",\"6IyHBnR-deI\"]'),
(4, 4, '[\"N7D3BP9wkZs\",\"VWLILnBacBQ\"]'),
(12, 12, '[\"N7D3BP9wkZs\",\"VWLILnBacBQ\"]'),
(13, 13, '[\"N7D3BP9wkZs\",\"VWLILnBacBQ\"]'),
(14, 14, '[\"N7D3BP9wkZs\",\"VWLILnBacBQ\"]');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hash_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('admin','user') COLLATE utf8mb4_general_ci DEFAULT 'user',
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hash_password`, `type`, `token`) VALUES
(1, 'bishoy', 'beshorafek0@gmail.com', '$2y$10$SKvxnkzPB70Qz8UUvG3Aj.G/qwCuqehDWB5G.g34t2RAB.N/cRSAa', 'admin', ''),
(2, 'Nasr', 'Nasr2017nnss@gmail.com', '$2y$10$SKvxnkzPB70Qz8UUvG3Aj.G/qwCuqehDWB5G.g34t2RAB.N/cRSAa', 'admin', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- إرجاع أو استيراد بيانات الجدول `works`
--

INSERT INTO `works` (`id`, `service_id`, `name`, `images`) VALUES
(1, 11, 'الهوية البصرية', '[\"image1.jpg\", \"image2.jpg\", \"image3.jpg\", \"image4.jpg\", \"image5.jpg\", \"image6.jpg\"]'),
(2, 8, ' تصميم الشعارات', '[\"image7.jpg\",\"image8.jpg\",\"image10.jpg\",\"image11.jpg\",\"abff0c880cf2a32fc253.jpg\",\"2790fec6af3a87e76397.jpg\",\"9c431d17d6d7122dc6ee.jpg\"]'),
(3, 9, ' تصميم السيرةالذاتية ', '[\"image13.jpg\", \"image14.jpg\", \"image15.jpg\"]'),
(4, 10, ' تصميم بروفايل الشركه ', '[\"image20.jpg\"]'),
(7, 10, ' تصميم بروفايل الشركه ٢', '[\"image1.jpg\",\"image2.jpg\",\"image3.jpg\",\"image4.jpg\",\"image5.jpg\",\"image6.jpg\",\"image7.jpg\",\"image8.jpg\"]'),
(8, 12, 'تصمبم السوشيال ميديا', '[\"image24.jpg\", \"image25.jpg\", \"image26.jpg\", \"image27.jpg\", \"image28.jpg\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_images`
--
ALTER TABLE `categories_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `services_images`
--
ALTER TABLE `services_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_videos`
--
ALTER TABLE `services_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories_images`
--
ALTER TABLE `categories_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `services_images`
--
ALTER TABLE `services_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services_videos`
--
ALTER TABLE `services_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
