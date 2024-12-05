<?php
include_once("../database/db.php");
$db = new db();


// ============================== add user ==============================
if(isset($_POST["signup"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // $verify_token=md5(rand());
    
    $errors = [];

    // Validate name
    if(empty($name)){
        $errors['name'] = "الاسم مطلوب.";
    } elseif(strlen($name) < 2){
        $errors['name'] = "الاسم يجب أن يحتوي على أكثر من حرفين.";
    } elseif(preg_match("/^\s|\s$/", $name)){
        $errors['name'] = "الاسم لا يجب أن يحتوي على مسافات في بداية أو نهاية النص.";
    }


    // Validate email
    if(empty($email)){
        $errors['email'] = "<p class='error'>البريد الإلكتروني مطلوب.</p>";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "<p class='error'>صيغة البريد الإلكتروني غير صحيحة.</p>";
    }else {
        $existing_email = $db->getData("users", "email", "email='$email'");
        if($existing_email){
            $errors['email'] = "<p class='error'>البريد الإلكتروني مسجل بالفعل.</p>";
        }
    }

    // Validate password
    if(strlen($password) < 8){
        $errors['password'] = "<p class='error'>يجب أن تكون كلمة المرور أطول من 8 أحرف.</p>";
    } elseif(!preg_match("/[0-9]/", $password) || !preg_match("/[A-Za-z]/", $password) || !preg_match("/[!@#$%^&*()\-_=+{};:,.<>?]/", $password)){
        $errors['password'] = "<p class='error'>يجب أن تحتوي كلمة المرور على حرف واحد على الأقل، رقم واحد على الأقل، ورمز ترقيمي.</p>";
    }

    // Check if password matches confirm password
    if($password !== $confirm_password){
        $errors['confirm_password'] = "<p class='error'>كلمة المرور غير متطابقة مع تأكيد كلمة المرور.</p>";
    }

    // Display errors or proceed with registration
    $_SESSION['signup_errors'] = $errors;
    if(!empty($errors)){
        header("Location: signup.php");
        exit();
    } 


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $col="name, email, hash_password";
    $values="'$name', '$email', '$hashed_password'";
    $result = $db->insertData("users", $col, $values);

    if($result){
        $_SESSION["signup_success"] = "<p class='Successed'>تم تسجيل المستخدم بنجاح.</p>";
        header("Location: signup.php");
        exit();
    } else {
        $_SESSION["signup_error"] = "<p class='error'>حدث خطأ أثناء تسجيل المستخدم.</p>";
        header("Location: signup.php");
        exit();
    }
    
}

// ============================== login user ==============================

// Function to check login and redirect based on role
function loginCheck($email, $password)
{
    global $db;

    // Fetch user data based on the provided email
    $userData = $db->getData("users", "*", "email = '$email'");

    if (!$userData) {
        $_SESSION['login_error'] = "<p class='error'>خطأ في البريد الإلكتروني أو كلمة المرور.</p>";
        header("Location: login.php");
        exit();
    }

    // Assuming the password is hashed in the database
    $hashed_password = $userData[0]['hash_password'];

    // Validate password
    if (!password_verify($password, $hashed_password)) {
        $_SESSION['login_error'] = "<p class='error'>خطأ في البريد الإلكتروني أو كلمة المرور.</p>";
        header("Location: login.php");
        exit();
    }

    $role = $userData[0]['type'];
    $_SESSION['user_id'] = $userData[0]['id'];
    $_SESSION['user_name'] = $userData[0]['name'];
    $_SESSION['user_role'] = $userData[0]['type'];

    // Redirect based on user role
    if ($_SESSION['user_role'] === 'admin') {
        header("Location: index.php");
    } else {
        $_SESSION['login_error'] = "<p class='error'>غير مسموح لك بالتسجيل</p>";
        header("Location: login.php");    }
    exit();

    if ($role === 'admin') {
        $userData = $db->getData("users", "*", "email = '$email'");
    
        if (!$userData) {
            $_SESSION['login_error'] = "<p class='error'>User not found.</p>";
            header("Location: login.php");
            exit();
        }
    
        $token = uniqid();
    
        $user_id = $userData[0]['id']; 
        $db->update_data("users", "token = '$token'", "id = $user_id");
    
        header("Location: dashboard.php");
    }
    
    else {

        $_SESSION['login_error'] = "<p class='error'> غير مسموح لك بالتسجيل.</p>";
        header("Location: login.php");
        exit();
    }
}

// Check if login form is submitted
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Call loginCheck function
    loginCheck($email, $password);
}

// ============================== Add Image to Banner ==============================
if (isset($_POST['addImageBanner']) && isset($_FILES['image_banner'])) {
    $image_banner = $_FILES['image_banner'];

    // Ensure only image files are accepted
    $fileExtension = strtolower(pathinfo($image_banner['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
        $_SESSION['img_error_banner'] = "<p class='error'>تنسيق الصورة غير مدعوم. يرجى تحميل صورة بتنسيق JPG، JPEG، PNG، أو GIF فقط.</p>";
        header("Location: index.php");
        exit();
    }

    if ($image_banner['error'] === UPLOAD_ERR_OK) {
        $uploadDirectory = '../images_site/banner/';

        $randomName = bin2hex(random_bytes(10));
        $newFileName = $randomName . '.' . $fileExtension;
        $uploadPath = $uploadDirectory . $newFileName;

        if (move_uploaded_file($image_banner['tmp_name'], $uploadPath)) {
            $col = "image";
            $value = "'$newFileName'";
            $add_image_banner = $db->insertData("banner", $col, $value);

            if ($add_image_banner) {
                $_SESSION['img_add_banner'] = "<p class='Successed'>تمت إضافة الصورة بنجاح.</p>";
            } else {
                $_SESSION['img_error_banner'] = "<p class='error'>حدث خطأ أثناء إضافة الصورة.</p>";
            }
        } else {
            $_SESSION['img_error_banner'] = "<p class='error'>حدث خطأ أثناء رفع الصورة.</p>";
        }
    } else {
        $_SESSION['img_error_banner'] = "<p class='error'>حدث خطأ أثناء رفع الصورة.</p>";
    }
    header("Location: index.php");
    exit();
}
  
// ============================== deleted Image to Banner ==============================
if (isset($_GET['id_image'])) {
    $id_image = intval($_GET['id_image']); // Sanitize input

    $imageData = $db->getData("banner", "*", "id = $id_image");

    if ($imageData) {
        $imageName = $imageData[0]['image'];
        $imagePath = "../images_site/banner/$imageName";

        $delete = $db->delete_data("banner", "id = $id_image");
        if ($delete) {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $_SESSION['img_add_banner'] = "<p class='Successed'>تم حذف الصورة بنجاح.</p>";
        } else {
            $_SESSION['img_add_banner'] = "<p class='error'>حدث خطأ أثناء حذف الصورة.</p>";
        }
    } else {
        $_SESSION['img_add_banner'] = "<p class='error'>الصورة غير موجودة.</p>";
    }
    header("Location: index.php");
    exit();
}


?>






