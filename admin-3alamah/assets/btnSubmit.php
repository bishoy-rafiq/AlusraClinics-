<?php
    include_once("../../database/db.php");
    $db = new db();

// ============================== add categoery ==============================
if(isset($_POST['category_add']) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $category_name =$_POST['category_name'];

    $errors=[];

   if(!isset($_POST['category_name'])) {
        $errors['name_error'] = "<p class='error'>يجب تحديد اسم التصنيف <p><br/>";
    }

    
  
    $_SESSION["error"]=$errors;

    if(!empty($errors)){
        header('Location: services/html/category/addCategory.php');
        exit;
    }

    $cols="name";
    $values = "'$category_name'";

    $add_category = $db->insertData("categories", $cols, $values);
    if ($add_category) {
        $_SESSION["Done_category"] = "<p class='Successed'>تمت إضافة التصنيف بنجاح.</p>";
    }
    else{
        $_SESSION["Error_category"] = "<p class='error'> فشل إضافة التصنيف .</p>";

    }


    header('Location: services/html/category/addCategory.php');
    exit;
}
// ============================== add service ==============================
if(isset($_POST['service_add']) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $service_image = $_FILES['service_image'];
    $service_name =$_POST['service_name'];
    $service_description = $_POST['service_description'];
    $category_id = $_POST['category_id'];
    $service_pag = $_POST['service_pag'];

    $errors=[];

    $newFileName="";

    if(isset($_FILES['service_image']) && $_FILES['service_image']['error'] === UPLOAD_ERR_OK) {

        $fileExtension = strtolower(pathinfo($_FILES['service_image']['name'], PATHINFO_EXTENSION));

        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if(!in_array($fileExtension, $allowedExtensions)) {
            $errors['image_error'] = "<p class='error'> يسمح فقط بملفات JPG، JPEG، PNG، و GIF<p><br/>";
        }

        $randomName = bin2hex(random_bytes(10));
        $fileExtension = strtolower(pathinfo($_FILES['service_image']['name'], PATHINFO_EXTENSION));
        $newFileName = $randomName . '.' . $fileExtension;
        move_uploaded_file($_FILES['service_image']['tmp_name'], '../../images_site/services/' . $newFileName);
    } elseif(!isset($_FILES['image'])){
        $errors['image_error'] = "<p class='error'>يجب تحميل صورة الخدمة <br>  يسمح فقط بملفات JPG، JPEG، PNG، و GIF <p><br/> ";
    }

   if(!isset($_POST['service_name'])) {
        $errors['name_error'] = "<p class='error'>يجب تحديد اسم الخدمة<p><br/>";
    }
    if(!isset($_POST['service_pag'])) {
        $errors['pag_error'] = "<p class='error'>يجب تحديد اسم المقال<p><br/>";
    }


   if(!isset($_POST['service_description'])) {
        $errors['description_error'] = "<p class='error'>يجب تحديد وصف الخدمة<p><br/>";
    }

    if(isset($_POST['category_id'])) {

        $get_categories = $db->get_data("categories","*","id =".$category_id);

        if (empty($get_categories)) {
            $errors['categories_error'] = "<p class='error'>التصنيف غير موجود أو غير صالح.<p><br/>";  
        }
    }elseif(!isset($_POST['category_id'])) {
        $errors['categories_error'] = "<p class='error'>يجب تحديد التصنيف<p><br/>";
    }

    $_SESSION["error"]=$errors;

    if(!empty($errors)){
        header('Location: services/html/services/addService.php');
        exit;
    }

    $cols="name,description,category_id,image,article";
    $values = "'$service_name', '$service_description', '$category_id', '$newFileName','$service_pag'";

    $add_service = $db->insertData("services", $cols, $values);
    if ($add_service) {
        $_SESSION["Done_add_service"] = "<p class='Successed'>تمت إضافة الخدمة بنجاح.</p>";
    }

    header('Location: services/html/services/addService.php');
    exit;
}

// ============================== add work ==============================
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_work'])) {
    $work_name = $_POST['work_name'];
    $service_id = $_POST['service_id'];
    $work_images = $_FILES['work_image'];

    if (isset($work_images['name']) && !empty($work_images['name'][0])) {
        $fileExtensions = array('jpg', 'jpeg', 'png', 'gif');
        $uploadedImages = $work_images;

        $fileNames = array();
        $errors = array();

        // Check if the work already exists
        $existing_work = $db->getData("works", "*", "name = '$work_name' AND service_id = $service_id");

        if (!empty($existing_work)) {
            $existing_images = json_decode($existing_work[0]['images'], true);
        } else {
            $existing_images = array();
        }

        foreach ($uploadedImages['tmp_name'] as $key => $tmp_name) {
            $fileExtension = strtolower(pathinfo($uploadedImages['name'][$key], PATHINFO_EXTENSION));

            if (!in_array($fileExtension, $fileExtensions)) {
                $errors["image"] = "نوع ملف غير صالح للصورة " . ($key + 1);
                continue;
            }

            $randomName = bin2hex(random_bytes(10));
            $newFileName = $randomName . '.' . $fileExtension;
            $uploadPath = '../../images_site/works/' . $newFileName;
            if (move_uploaded_file($tmp_name, $uploadPath)) {
                $existing_images[] = $newFileName;
            } else {
                $errors['image'] = "خطأ في رفع الصورة " . ($key + 1);
            }
        }

        if (!empty($existing_work)) {
            // Update the existing work's images in the database
            $new_json_images = json_encode($existing_images);
            $db->update_data("works", "images = '$new_json_images'", "name = '$work_name' AND service_id = $service_id");

            $_SESSION["Done"] = "<p class='Successed'>تم تحديث الصور بنجاح.</p>";
        } else {
            // Insert a new work entry
            $jsonFileNames = json_encode($existing_images);
            
            $cols = "name, service_id, images";
            $values = "'$work_name', '$service_id', '$jsonFileNames'";
            $add_work = $db->insertData("works", $cols, $values);
            $_SESSION["Done"] = "<p class='Successed'>تمت إضافة الصور بنجاح.</p>";
        }

        header('Location: services/html/works/add_work.php');
        exit;
    } else {
        echo "<p>لم يتم رفع أي ملفات.</p>";
    }
}

// ============================== add images service ==============================
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_images_service'])) {
    $service_id = $_POST['service_id'];
    $service_images = $_FILES['service_image']; 

    $errors = array();
    $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png', 'tiff');

    // Validate the service ID
    if (!isset($service_id)) {
        $errors['service_error'] = "<p class='error'>يجب تحديد الخدمة</p><br/>";
    } else {
        // Check if the service exists in the database
        $existing_service = $db->getData("services", "*", "id = '$service_id'");
        if (!$existing_service) {
            $errors['service_error'] = "<p class='error'>الخدمة غير موجودة أو غير صالحة.</p><br/>";
        } else {
            // Process the uploaded images
            $uploaded_image_paths = array();
            $upload_directory = '../../images_site/images_services/';
            
            foreach ($service_images['tmp_name'] as $key => $tmp_name) {
                // Get file extension and validate it
                $file_extension = strtolower(pathinfo($service_images['name'][$key], PATHINFO_EXTENSION));
                if (!in_array($file_extension, $allowed_extensions)) {
                    $errors['file_type_error'] = "<p class='error'>فقط ملفات JPEG، GIF، PNG، و TIFF مسموح بها: " . basename($service_images['name'][$key]) . "</p><br/>";
                    continue;
                }

                // Generate a random filename using uniqid and the original file extension
                $new_filename = uniqid(rand(), true) . '.' . $file_extension;

                // Ensure the new filename does not already exist in the upload directory
                while (file_exists($upload_directory . $new_filename)) {
                    $new_filename = uniqid(rand(), true) . '.' . $file_extension;
                }
        
                $destination = $upload_directory . $new_filename;
        
                // Move the uploaded file to the specified destination
                if (move_uploaded_file($tmp_name, $destination)) {
                    $uploaded_image_paths[] = $new_filename;
                } else {
                    $errors['upload_error'] = "<p class='error'>حدث خطأ أثناء تحميل الصورة: " . basename($service_images['name'][$key]) . "</p><br/>";
                }
            }

            if (empty($errors)) {
                // Check if the service already has images
                $existing_images = $db->getData("services_images", "images", "service_id = $service_id");

                if (!empty($existing_images)) {
                    // Merge new image paths with existing ones
                    $existing_images_array = json_decode($existing_images[0]['images'], true);
                    $updated_images_array = array_merge($existing_images_array, $uploaded_image_paths);
                    $updated_images_json = json_encode($updated_images_array);

                    // Update the images in the database
                    $db->update_data("services_images", "images = '$updated_images_json'", "service_id = $service_id");
                    $_SESSION["Done_add_service_image"] = "<p class='Successed'>تمت إضافة الصور بنجاح.</p>";

                } else {
                    // Insert new images into the database
                    $image_paths_json = json_encode($uploaded_image_paths);
                    $cols = "service_id, images";
                    $values = "'$service_id', '$image_paths_json'";
                    $db->insertData("services_images", $cols, $values);
                    $_SESSION["Done_add_service_image"] = "<p class='Successed'>تمت إضافة الصور بنجاح.</p>";

                }
            }
        }
    }

    if (!empty($errors)) {
        $_SESSION['error'] = $errors;
    }

    header('Location: services/html/images_services/add_image.php');
    exit;
}

// ============================== add sub work (add categories images) ==============================

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_sub_work'])) {
    $work_name = $_POST['work_name'];
    $service_id = $_POST['service_id'];
    $image_icon = $_FILES['work_icon'];
    $before_image = $_FILES['before_image'];
    $after_image = $_FILES['after_image'];

    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    $errors = array();
    $newFileNameIcon = '';
    $newFileNameBefore = '';
    $newFileNameAfter = '';

    function uploadImage($file, $uploadDir, &$errors, $imageKey) {
        global $allowedExtensions;
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[$imageKey] = "<p class='error'>يسمح فقط بملفات JPG، JPEG، PNG، و GIF<p><br/>";
            return '';
        }

        $randomName = bin2hex(random_bytes(10));
        $newFileName = $randomName . '.' . $fileExtension;
        $uploadPath = $uploadDir . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return $newFileName;
        } else {
            $errors[$imageKey] = "Error uploading " . $imageKey;
            return '';
        }
    }

    // Upload icon image
    if (isset($image_icon) && $image_icon['error'] === UPLOAD_ERR_OK) {
        $newFileNameIcon = uploadImage($image_icon, '../../images_site/categories_images/icons/', $errors, 'icon');
    }

    // Upload before image
    if (isset($before_image) && $before_image['error'] === UPLOAD_ERR_OK) {
        $newFileNameBefore = uploadImage($before_image, '../../images_site/categories_images/before/', $errors, 'before_image');
    }

    // Upload after image
    if (isset($after_image) && $after_image['error'] === UPLOAD_ERR_OK) {
        $newFileNameAfter = uploadImage($after_image, '../../images_site/categories_images/after/', $errors, 'after_image');
    }

    if (empty($errors)) {
        $existingSubWork = $db->getData("categories_images", "*", "name='$work_name' AND service_id='$service_id'");

        if (!empty($existingSubWork)) {
            // Update existing work
            if (!empty($newFileNameIcon)) {
                $updateIcon = $db->update_data("categories_images", "icon='$newFileNameIcon'", "name='$work_name' AND service_id='$service_id'");
            }

            // Update other images (before and after)
            if (!empty($newFileNameBefore) || !empty($newFileNameAfter)) {
                $updateImages = array();
                if (!empty($newFileNameBefore)) {
                    $updateImages[] = "before_image='$newFileNameBefore'";
                }
                if (!empty($newFileNameAfter)) {
                    $updateImages[] = "after_image='$newFileNameAfter'";
                }
                $updateImagesSQL = implode(', ', $updateImages);
                $db->update_data("categories_images", $updateImagesSQL, "name='$work_name' AND service_id='$service_id'");
            }

            $_SESSION["Done"] = "<p class='Successed'>تمت إضافة التصنيف بنجاح. </p>";
            header('Location: services/html/category_images/add_category_images.php');
            exit;

        } else {
            // Insert new work
            $newIconName = isset($newFileNameIcon) ? $newFileNameIcon : '';

            $cols = "name, icon, service_id, before_image, after_image";
            $values = "'$work_name', '$newIconName', '$service_id', '$newFileNameBefore', '$newFileNameAfter'";
            $add_work = $db->insertData("categories_images", $cols, $values);

            if ($add_work) {
                $_SESSION["Done"] = "<p class='Successed'>تمت إضافة التصنيف بنجاح. </p>";
                header('Location: services/html/category_images/add_category_images.php');
                exit;
            } else {
                $_SESSION["Error"] = "<p class='error'>حدث خطأ أثناء إضافة التصنيف.</p>";
                header('Location: services/html/category_images/add_category_images.php');
                exit;
            }
        }
    } else {
        $_SESSION['error'] = $errors;
        header('Location: services/html/category_images/add_category_images.php');
        exit;
    }
}


// ============================== add video ==============================
function getYouTubeVideoId($url) {
    $videoId = '';

    if (preg_match('/[?&]v=([^&]+)/', $url, $match)) {
        $videoId = $match[1];
    } else {
        if (preg_match('/youtu\.be\/([^&?]+)/', $url, $match)) {
            $videoId = $match[1];
        } else {
            if (preg_match('/\/(?:embed|v|watch)\??(?:[^&]+&)*v?=?([^&]+)$/', $url, $match)) {
                $videoId = $match[1];
            } else {
                if (preg_match('/(?:\/|%3D|v=|vi=)([0-9A-z_-]{11})(?:[^&\n%\?#]{0,}|\s|$)/', $url, $match)) {
                    $videoId = $match[1];
                }
            }
        }
    }

    return $videoId;
}

if(isset($_POST['add_video']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $service_id = $_POST['service_id'];
    $youtube_link = $_POST['youtube_link'];

    $errors = [];

    
    if(isset($_POST['service_id'])) {
        $get_services = $db->get_data("services", "*", "id =" . $service_id);

        if (empty($get_services)) {
            $errors['service_error'] = "<p class='error'>الخدمة غير موجود أو غير صالح.<p><br/>";
        }
    } elseif (!isset($_POST['service_id'])) {
        $errors['service_error'] = "<p class='error'>يجب تحديد الخدمة<p><br/>";
    }

    if (empty($youtube_link)) {
        $errors['youtube_link_error'] = "<p class='error'>يجب ادخال رابط الفيديو<p><br/>";
    }

    $_SESSION['error'] = $errors;

    if (!empty($errors)) {
        header('Location: services/html/videos/add_video.php');
        exit;
    }

    $videoId = getYouTubeVideoId($youtube_link); 
    
    $existingRecord = $db->getData("services_videos", "*", "service_id = '$service_id'");
    
    if ($existingRecord && count($existingRecord) > 0) {
        $existingUrls = json_decode($existingRecord[0]['urls_videos'], true);
        $existingUrls[] = $videoId; 
    
        $updatedUrls = json_encode($existingUrls);
    
        $updateResult = $db->updateData(
            "services_videos",
            ["urls_videos" => $updatedUrls],
            "service_id = '$service_id'"
        );
    
        if ($updateResult) {
            $_SESSION["Done"] = "<p class='Successed'>تمت إضافة الفيديو بنجاح.</p>";
        } else {
            $_SESSION["Error"] = "<p class='error'>حدث خطأ أثناء تحديث الفيديو.</p>";
        }
    } else {
        $urlsArray = [$videoId]; 
        $urlsJson = json_encode($urlsArray); 

        $cols = "service_id, urls_videos";
        $values = "'$service_id', '$urlsJson'";
        $addvideo = $db->insertData("services_videos", $cols, $values);
    
        if ($addvideo) {
            $_SESSION["Done"] = "<p class='Successed'>تمت إضافة الفيديو بنجاح.</p>";
        } else {
            $_SESSION["Error"] = "<p class='error'>حدث خطأ أثناء إضافة الفيديو.</p>";
        }
    }
    header('Location: services/html/videos/add_video.php');

}
// ============================== add image ==============================
if(isset($_POST['add_image']) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $article_image = $_FILES['service_image'];
    $service_id = $_POST['service_id'];
    $work_id = $_POST['work_id'];

    $errors = [];

    $newFileName="";

    if(isset($_FILES['service_image']) && $_FILES['service_image']['error'] === UPLOAD_ERR_OK) {

        $fileExtension = strtolower(pathinfo($_FILES['service_image']['name'], PATHINFO_EXTENSION));

        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if(!in_array($fileExtension, $allowedExtensions)) {
            $errors['image_error'] = "<p class='error'> يسمح فقط بملفات JPG، JPEG، PNG، و GIF<p><br/>";
        }

        $randomName = bin2hex(random_bytes(10));
        $fileExtension = strtolower(pathinfo($_FILES['service_image']['name'], PATHINFO_EXTENSION));
        $newFileName = $randomName . '.' . $fileExtension;
    }elseif(!isset($_FILES['service_image'])){
        $errors['image_error'] = "<p class='error'>يجب تحميل صورة  <br>  يسمح فقط بملفات JPG، JPEG، PNG، و GIF <p><br/> ";
    }


    if(isset($_POST['service_id'])) {

        $get_services = $db->get_data("services","*","id =".$service_id);

        if (empty($get_services)) {
            $errors['service_error'] = "<p class='error'>الخدمة غير موجود أو غير صالح.</p><br/>";  

        }

        $get_activities_id = $db->get_data("activities", "*", "service_id = " . $service_id);
        if (!empty($get_activities_id) && !isset($_POST['work_id'])) {
            $errors['service_error'] = "<p class='error'> يجب اختيار العمل الذي ينتمي الى الصورة</p><br/>";  

        }

    }elseif(!isset($_POST['service_id'])) {
        $errors['service_error'] = "<p class='error'>يجب تحديد الخدمة<p><br/>";
    }

    if(isset($_POST['work_id'])) {

        $get_services = $db->get_data("activities","*","id =".$work_id);

        if (empty($get_services)) {
            $errors['work_error'] = "<p class='error'>العمل غير موجود أو غير صالح.<p><br/>";  
        }
    }

    if(isset($_POST['work_id']) && isset($_POST['service_id'])) {
        $get_work_id = $db->get_data("activities", "service_id", "id = " . $work_id);
        
        if ($get_work_id[0]['service_id'] != $service_id ) {
            $errors['work_service_error'] = "<p class='error'> " . " هذا العمل غير موجود بالخدمة .</p><br/>";  
        }
    }
    
    

    $_SESSION['error'] = $errors;

    if(!empty($errors))
    {
        header('Location: services/html/add_image.php');
        exit;
    }


    if(isset($_POST['work_id'])) {
        $cols = "work_id, service_id,name_image";
        $values = "'$work_id','$service_id', '$newFileName'";
    }else{
        $cols = "service_id,name_image";
        $values = "'$service_id', '$newFileName'";
    }


    $add_feedback = $db->insertData("services_images", $cols, $values);
    if ($add_feedback) {
        $_SESSION["Done"] = "<p class='Successed'>تمت إضافة الصورة بنجاح.</p>";
        move_uploaded_file($_FILES['service_image']['tmp_name'], '../../images_site/services' . $newFileName);

    }

    header('Location: services/html/add_image.php');
    exit;
}


?>
