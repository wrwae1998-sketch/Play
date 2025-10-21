<?php
// ตรวจสอบว่า id ถูกส่งมา
if (isset($_GET['id'])) {
    $image_id = $_GET['id'];
    $target_dir = "uploads/";

    // ค้นหาไฟล์จากชื่อ id (สามารถปรับให้ตรงกับฐานข้อมูลหรือวิธีอื่นที่ใช้)
    $file_path = $target_dir . basename($image_id);

    // ตรวจสอบว่ามีไฟล์หรือไม่
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo "ลบไฟล์ $file_path สำเร็จ!";
        } else {
            echo "เกิดข้อผิดพลาดในการลบไฟล์!";
        }
    } else {
        echo "ไม่พบไฟล์ที่จะลบ!";
    }
} else {
    echo "ไม่มี id ให้ลบ!";
}
?>
