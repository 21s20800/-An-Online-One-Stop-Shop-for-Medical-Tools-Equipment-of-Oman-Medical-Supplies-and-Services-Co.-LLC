<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "اسم_المضيف";
$username = "اسم_المستخدم";
$password = "كلمة_المرور";
$dbname = "اسم_قاعدة_البيانات";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// إنشاء جدول في قاعدة البيانات (يمكنك تعديل هذا حسب احتياجاتك)
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "تم إنشاء الجدول بنجاح";
} else {
    echo "حدث خطأ أثناء إنشاء الجدول: " . $conn->error;
}

// قم بإغلاق الاتصال بقاعدة البيانات بعد الانتهاء من العمليات
$conn->close();
?>
