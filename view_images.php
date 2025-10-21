<?php
// โฟลเดอร์ที่เก็บไฟล์
$target_dir = "uploads/";

// ดึงข้อมูลทั้งหมดจากโฟลเดอร์
$images = [];
if ($handle = opendir($target_dir)) {
    while (($file = readdir($handle)) !== false) {
        // ตรวจสอบว่าไฟล์เป็นไฟล์จริงหรือไม่
        if ($file != "." && $file != ".." && is_file($target_dir . $file)) {
            $images[] = [
                'id' => md5($file),  // สร้าง id สำหรับไฟล์ (สามารถใช้ database ถ้าต้องการเก็บ)
                'name' => $file,
                'path' => $target_dir . $file
            ];
        }
    }
    closedir($handle);
}

// ส่งผลลัพธ์เป็น JSON
echo json_encode($images);
?>
