<?php
 include_once("../../database/db.php");
 $db = new db();

// ============================== delete category ==============================
if(isset($_GET['page']) && $_GET['page'] === 'category')
{
    $name = $_GET['categoryName'];

    $get_category = $db->get_data("categories", "name","name='" . $name . "'");

    if($get_category !== false && $get_category > 0) 
    {
        $get_category = $db->delete_data("categories","name='" . $name . "'");

        $_SESSION["deleted_category"] = "<p class='Successed'>تم الحذف بنجاح </p><br>";
    } else{
        $_SESSION["error_deleted_category"] = "<p class='error'>فشل الحذف </p><br>";
    }
    
    header("Location: services/html/category/categories.php");
    exit;
}
// ============================== delete service ==============================
if(isset($_GET['page']) && $_GET['page'] === 'service')
{
    $name = $_GET['serviceName'];

    $get_service = $db->get_data("services", "*","name='" . $name . "'");

    if($get_service !== false && $get_service > 0) 
    {
        $delete_service = $db->delete_data("services","name='" . $name . "'");

        $_SESSION["deleted_service"] = "<p class='Successed'>تم الحذف بنجاح </p><br>";
    } else{
        $_SESSION["error_deleted_service"] = "<p class='error'>فشل حذف الخدمة</p><br>";
    }

    header("Location: services/html/services/services.php");
    exit;
}

// ============================== delete work ==============================
if(isset($_GET['page']) && $_GET['page'] === 'works_delete_work' && isset($_GET['work_name']) && isset($_GET['service_id']))
{

    $work_name =$_GET['work_name'];
    $service_id =$_GET['service_id'];

    $get_work = $db->getData("works", "*", "name='" . $work_name . "' AND service_id=" . $service_id);
    if($get_work !== false && $get_work > 0) 
    {
        $delete_work = $db->delete_data("works","name='" . $work_name . "' AND service_id=" . $service_id);

        $_SESSION["deleted_work"] = "<p class='Successed'>تم الحذف بنجاح </p><br>";
    } else{
        $_SESSION["error_deleted_work"] = "<p class='error'>فشل حذف العمل</p><br>";
    }

    header("Location: services/html/works/works.php?service_id=" . $service_id);
    exit;
}

// ============================== delete videos ==============================
if (isset($_GET['page']) && $_GET['page'] === 'video' && isset($_GET['service_id']) && isset($_GET['video_id'])) {
    $video_id = $_GET['video_id'];
    $service_id = $_GET['service_id'];

    $get_videos = $db->getData("services_videos", "urls_videos", "service_id='" . $service_id . "'");

    if ($get_videos !== false && count($get_videos) > 0) {
        $urls_videos = json_decode($get_videos[0]['urls_videos'], true);

        $key = array_search($video_id, $urls_videos);
        if ($key !== false) {
            unset($urls_videos[$key]);

            $updated_urls_videos = json_encode(array_values($urls_videos));

            $update_result = $db->updateData("services_videos", ["urls_videos" => $updated_urls_videos], "service_id=" . $service_id);

            if ($update_result) {
                $_SESSION["deleted_video"] = "<p class='Successed'>تم الحذف بنجاح </p><br>";

                if (empty($urls_videos)) {
                    $delete_row_result = $db->delete_data("services_videos", "service_id=" .$service_id);

                    if ($delete_row_result) {
                        header("Location: services/html/videos/videos.php?service_id=" . $service_id);
                        exit;
                    } else {
                        $_SESSION["error_deleted_video"] = "<p class='error'>فشل حذف الفيديو والصف</p><br>";
                    }
                } else {
                    header("Location: services/html/videos/videos.php?service_id=" . $service_id);
                    exit;
                }
            } else {
                $_SESSION["error_deleted_video"] = "<p class='error'>فشل حذف الفيديو</p><br>";
            }
        } else {
            $_SESSION["error_deleted_video"] = "<p class='error'>الفيديو غير موجود</p><br>";
        }
    } else {
        $_SESSION["error_deleted_video"] = "<p class='error'>فشل حذف الفيديو - لم يتم العثور على بيانات الفيديو</p><br>";
    }

    header("Location: services/html/videos/videos.php?service_id=" . $service_id);
    exit;
}


// ============================== delete image ==============================
if (isset($_GET['page']) && $_GET['page'] === 'image') {
    $image_id = $_GET['image_id'];
    $serviceId = $_GET['serviceId'];
    $imageName = $_GET['imageName'];

    $get_data = $db->getData("services_images", "*", "service_id='" . $serviceId . "'");

    if ($get_data !== false && count($get_data) > 0) {
        $imagesArray = json_decode($get_data[0]['images'], true);

        $updatedImagesArray = array_filter($imagesArray, function ($img) use ($imageName) {
            return $img !== $imageName;
        });

        $updatedImagesJSON = json_encode($updatedImagesArray);

        if (empty($updatedImagesArray)) {
            $delete_row = $db->delete_data("services_images", "service_id='" . $serviceId . "'");
        } else {
            $update_images = $db->update_data("services_images", "images='" . $updatedImagesJSON . "'", "service_id='" . $serviceId . "'");
        }

        $_SESSION["deleted_image"] = "<p class='Successed'>تم الحذف بنجاح</p><br>";
        
    } else {
        $_SESSION["error_deleted_image"] = "<p class='error'>فشل حذف الصورة - الصورة غير موجودة</p><br>";
    }

    header("Location: services/html/images_services/images.php?service_id=" . $serviceId);
    exit;
}


// ============================== delete image work ==============================
if(isset($_GET['page']) && $_GET['page'] === 'works_delete_images' && isset($_GET['work_name']) )
{
    $image_name = $_GET['image_name'];
    $work_name = $_GET['work_name'];
    $service_id = $_GET['service_id'];

    $get_work = $db->getData("works", "*", "name='" . $work_name . "' AND service_id='" . $service_id . "'");

    if (!empty($get_work)) {
        $images = json_decode($get_work[0]['images'], true);

        $key = array_search($image_name, $images);

        if ($key !== false) {
            unset($images[$key]);
            if (empty($images)) {
                $delete_result = $db->delete_data("works", "name='" . $work_name . "' AND service_id='" . $service_id . "'");
                if ($delete_result) {
                    $_SESSION["deleted_work_image"] = "<p class='Successed'>تم حذف الصورة والعمل بنجاح</p><br>";
                    header("Location: services/html/works/works.php?service_id=" . $service_id);
                    exit;
                } else {
                    $_SESSION["error_deleted_work_image"] = "<p class='error'>فشل حذف الصورة والعمل</p><br>";
                    header("Location: services/html/works/works.php?service_id=" . $service_id);
                    exit;
                }
            }
            // Re-encode the array back to JSON
            $updated_images_json = json_encode(array_values($images));

            $update_result = $db->updateData(
                "works",
                ["images" => $updated_images_json],
                "name='" . $work_name . "' AND service_id='" . $service_id . "'"
            );

            if ($update_result) {
                $_SESSION["deleted_work_image"] = "<p class='Successed'>تم حذف الصورة بنجاح</p><br>";
            } else {
                $_SESSION["error_deleted_work_image"] = "<p class='error'>فشل حذف الصورة</p><br>";
            }
        } else {
            $_SESSION["error_deleted_work_image"] = "<p class='error'>فشل حذف الصورة: الصورة غير موجودة</p><br>";
        }
    } else {
        $_SESSION["error_deleted_work_image"] = "<p class='error'>فشل حذف الصورة: العمل غير موجود</p><br>";
    }

    header("Location: services/html/works/works.php?service_id=" . $service_id);
    exit;
}


// ============================== delete sub work ==============================

if(isset($_GET['page']) && $_GET['page'] === 'categories_images' && isset($_GET['name']) && isset($_GET['service_id']))
{
  
    $work_name =$_GET['name'];
    $service_id = $_GET['service_id'];

    echo "testt";

    $get_work = $db->getData("categories_images", "*", "name='" . $work_name . "' AND service_id=" . $service_id);
    
    $service_id = $get_work[0]['service_id'];
    if($get_work !== false && $get_work > 0) 
    {
        $delete_work = $db->delete_data("categories_images","name='" . $work_name . "' AND service_id=" . $service_id);

        $_SESSION["deleted_sub_work"] = "<p class='Successed'>تم الحذف بنجاح </p><br>";
    } else{
        $_SESSION["error_deleted_sub_work"] = "<p class='error'>فشل حذف العمل</p><br>";
    }

    header("Location: services/html/category_images/categories_images.php?service_id=" . $service_id);
    exit;
}

// ============================== delete image category_images ==============================
if (isset($_GET['page']) && $_GET['page'] === 'sub_work_delete_image' && isset($_GET['work_name']) && isset($_GET['image_name'])) 
{
    
    $work_name = $_GET['work_name'];
    $service_id = $_GET['service_id'];
    $image_name = $_GET['image_name'];

    $get_sub_work = $db->getData("categories_images", "*", "name='" . $work_name . "' AND service_id='" . $service_id . "'");

    if (!empty($get_sub_work)) {
        $images = json_decode($get_sub_work[0]['images'], true);

        $key = array_search($image_name, $images);

        if ($key !== false) {
            unset($images[$key]);
            $updated_images_json = json_encode($images);

            $update_result = $db->updateData(
                "categories_images",
                ["images" => $updated_images_json],
                "name='" . $work_name . "' AND service_id='" . $service_id . "'"
            );

            if ($update_result) {
                $_SESSION["deleted_sub_work_image"] = "<p class='Successed'>تم حذف الصورة بنجاح</p><br>";
            } else {
                $_SESSION["error_deleted_sub_work_image"] = "<p class='error'>فشل حذف الصورة</p><br>";
            }
        } else {
            $_SESSION["error_deleted_sub_work_image"] = "<p class='error'>فشل حذف الصورة: الصورة غير موجودة</p><br>";
        }
    } else {
        $_SESSION["error_deleted_sub_work_image"] = "<p class='error'>فشل حذف الصورة: العمل غير موجود</p><br>";
    }

    header("Location: services/html/category_images/categories_images.php?service_id=" . $service_id);
    exit;
}



?>
