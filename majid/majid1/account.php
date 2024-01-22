<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "اسم_الخادم";
$username = "اسم_المستخدم";
$password = "كلمة_المرور";
$dbname = "اسم_قاعدة_البيانات";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من إرسال النموذج وتنفيذ عمليات تسجيل الدخول أو التسجيل
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // استعلام SQL للتحقق من تطابق اسم المستخدم وكلمة المرور
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // تسجيل الدخول ناجح
            echo "تم تسجيل الدخول بنجاح!";
        } else {
            // فشل تسجيل الدخول
            echo "فشل تسجيل الدخول. يرجى التحقق من اسم المستخدم وكلمة المرور.";
        }
    } elseif (isset($_POST['register'])) {
        // تنفيذ عمليات التسجيل هنا
        // ...
    }
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>

<!-- يمكنك إضافة الكود الخاص بالنموذج في هذا المكان -->
