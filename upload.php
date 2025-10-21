<?php
// โฟลเดอร์ที่เก็บไฟล์ที่อัปโหลด
$target_dir = "uploads/";

// ตรวจสอบว่าโฟลเดอร์ uploads มีอยู่หรือไม่ ถ้าไม่มีก็สร้างขึ้นมา
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// ตรวจสอบว่าไฟล์ถูกอัปโหลดมาหรือไม่
if (isset($_FILES["fileToUpload"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ตรวจสอบว่าไฟล์เป็นรูปภาพจริงหรือไม่
    if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) !== false) {
        echo "ไฟล์นี้เป็นรูปภาพ.\n";
        $uploadOk = 1;
    } else {
        echo "ไม่ใช่ไฟล์รูปภาพ.\n";
        $uploadOk = 0;
    }

    // ตรวจสอบขนาดไฟล์ (เช่น ไม่เกิน 5MB)
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "ขนาดไฟล์ใหญ่เกินไป.\n";
        $uploadOk = 0;
    }

    // ตรวจสอบประเภทของไฟล์ (เช่น .jpg, .png, .jpeg)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "ขออภัย เรารับไฟล์ .jpg, .jpeg, .png เท่านั้น.\n";
        $uploadOk = 0;
    }

    // หาก $uploadOk เป็น 0 แสดงว่าไฟล์ไม่สามารถอัปโหลดได้
    if ($uploadOk == 0) {
        echo "ไฟล์ไม่สามารถอัปโหลดได้.\n";
    } else {
        // ถ้าผ่านการตรวจสอบทั้งหมด, อัปโหลดไฟล์
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "ไฟล์ ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ได้ถูกอัปโหลดเรียบร้อยแล้ว.";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.\n";
        }
    }
}
?>
