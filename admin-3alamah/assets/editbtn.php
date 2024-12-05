<?php
    include_once("../database/db.php");
    $db = new db();

// ============================== edit categoery ==============================
if(isset($_POST['category_edit']) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $category_name =$_POST['category_name'];
    $category_id = $_POST['id'];

    $data = "name = '$category_name'";
    $condition = "id=$category_id";


    $add_category = $db->update_data("categories", $data, $condition);

    if ($add_category) {
        $_SESSION["Done"] = "<p class='Successed'>تمت تحديث التصنيف بنجاح.</p>";
    }


    header('Location: services/html/category/editCategory.php?id=' . $category_id);
    exit;
}

?>