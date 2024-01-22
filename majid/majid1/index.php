<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "اسم_الخادم";
$username = "اسم_المستخدم";
$password = "كلمة_المرور";
$dbname = "OnlineShopping";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعراض بعض المنتجات كمثال
$sql = "SELECT ProductID, ProductName, Description, Price, StockQuantity FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات
    while($row = $result->fetch_assoc()) {
        echo "رقم المنتج: " . $row["ProductID"]. " - اسم المنتج: " . $row["ProductName"]. " - الوصف: " . $row["Description"]. " - السعر: " . $row["Price"]. " - الكمية المتوفرة: " . $row["StockQuantity"]. "<br>";
    }
} else {
    echo "لا توجد بيانات";
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>
