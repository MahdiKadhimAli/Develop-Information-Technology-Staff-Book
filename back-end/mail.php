<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // معلومات البريد الإلكتروني
    $to_email = "mahdi2info@gmail.com"; // بريدك الإلكتروني
    $subject = $_POST['subject']; // عنوان البريد
    $name = $_POST['name']; // اسم المرسل
    $email = $_POST['email']; // بريد المرسل
    $phone = $_POST['phone']; // رقم الهاتف
    $message = $_POST['message']; // محتوى الرسالة

    // محتوى البريد
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // إرسال البريد
    if (mail($to_email, $subject, $email_content)) {
        echo "تم إرسال البريد بنجاح!";
    } else {
        echo "حدث خطأ أثناء إرسال البريد.";
    }
}
