<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปโหลดและดูข้อมูลรูปภาพ</title>
    <script>
        // ฟังก์ชันอัปโหลดไฟล์
        function uploadFile() {
            const inputFile = document.getElementById("fileInput");
            const formData = new FormData();

            if (inputFile.files.length === 0) {
                alert("กรุณาเลือกไฟล์");
                return;
            }

            formData.append("fileToUpload", inputFile.files[0]);

            // ใช้ AJAX (Fetch API) ส่งไฟล์ไปยัง PHP
            fetch("upload.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                loadImages();  // รีเฟรชหน้าเมื่ออัปโหลดเสร็จ
            })
            .catch(error => {
                console.error("เกิดข้อผิดพลาด:", error);
                alert("เกิดข้อผิดพลาดในการอัปโหลดไฟล์");
            });
        }

        // ฟังก์ชันโหลดข้อมูลรูปภาพ
        function loadImages() {
            fetch("view_images.php")
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById("imageContainer");
                    container.innerHTML = "";  // เคลียร์ข้อมูลเก่า

                    if (data.length === 0) {
                        container.innerHTML = "ไม่มีรูปภาพในระบบ";
                        return;
                    }

                    // แสดงรูปภาพที่อัปโหลดไปแล้ว
                    data.forEach(image => {
                        const imgElement = document.createElement("img");
                        imgElement.src = image.path;
                        imgElement.alt = image.name;
                        imgElement.style.width = "150px";
                        imgElement.style.height = "150px";
                        imgElement.style.margin = "5px";
                        
                        const deleteButton = document.createElement("button");
                        deleteButton.textContent = "ลบ";
                        deleteButton.onclick = function () {
                            deleteImage(image.id);
                        };

                        const div = document.createElement("div");
                        div.appendChild(imgElement);
                        div.appendChild(deleteButton);
                        container.appendChild(div);
                    });
                });
        }

        // ฟังก์ชันลบรูปภาพ
        function deleteImage(imageId) {
            if (confirm("คุณต้องการลบรูปภาพนี้หรือไม่?")) {
                fetch(`delete.php?id=${imageId}`, {
                    method: "GET"
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    loadImages();  // รีเฟรชหน้าเมื่อลบเสร็จ
                })
                .catch(error => {
                    console.error("เกิดข้อผิดพลาด:", error);
                    alert("เกิดข้อผิดพลาดในการลบรูปภาพ");
                });
            }
        }

        // เรียกใช้เมื่อหน้าโหลด
        window.onload = loadImages;
    </script>
</head>
<body>
    <h1>การจัดการรูปภาพ</h1>

    <h2>อัปโหลดรูปภาพ</h2>
    <input type="file" id="fileInput" accept="image/*">
    <button onclick="uploadFile()">อัปโหลด</button>

    <h2>รูปภาพที่อัปโหลด</h2>
    <div id="imageContainer"></div>

</body>
</html>
