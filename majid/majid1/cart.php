<?php
// قم بتحديث معلومات الاتصال بقاعدة البيانات هنا
$servername = "اسم_الخادم";
$username = "اسم_المستخدم";
$password = "كلمة_المرور";
$dbname = "اسم_قاعدة_البيانات";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من وجود طلب POST لتحديث كميات المنتجات أو حذفها
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // تحديث كمية المنتج في قاعدة البيانات
        $updateQuery = "UPDATE products SET quantity = $quantity WHERE product_id = $productId";
        $conn->query($updateQuery);
    } elseif (isset($_POST['remove'])) {
        $productId = $_POST['product_id'];

        // حذف المنتج من سلة التسوق في قاعدة البيانات
        $deleteQuery = "DELETE FROM products WHERE product_id = $productId";
        $conn->query($deleteQuery);
    }
}

// قم بتنفيذ استعلام SQL لاسترجاع المنتجات من سلة التسوق
$selectQuery = "SELECT * FROM products";
$result = $conn->query($selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... الأكواد الأخرى ... -->
</head>
<body>
    <div class="container">
        <!-- ... الهيكل الحالي لصفحة السلة ... -->

        <div class="small-container cart-page">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>

                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='cart-info'>";
                    echo "<img src='" . $row['product_image'] . "'>";
                    echo "<div>";
                    echo "<p>" . $row['product_name'] . "</p>";
                    echo "<small>Price: " . $row['price'] . " OMR</small><br>";
                    echo "<a href=''>Remove</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</td>";
                    echo "<td><input type='number' value='" . $row['quantity'] . "'></td>";
                    echo "<td>" . ($row['price'] * $row['quantity']) . " OMR</td>";
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
                    echo "<input type='hidden' name='quantity' value='" . $row['quantity'] . "
