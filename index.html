<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจัดการรูปภาพ</title>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .image-container img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
        .image-container button {
            margin-top: 5px;
            cursor: pointer;
            background-color: red;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>จัดการรูปภาพ</h1>

    <h2>อัปโหลดรูปภาพ</h2>
    <input type="file" id="imageInput" accept="image/*" multiple>
    <button onclick="uploadImages()">อัปโหลด</button>

    <h2>รูปภาพที่อัปโหลด</h2>
    <div id="imageContainer" class="image-container"></div>

    <script>
        // อาร์เรย์เก็บข้อมูลไฟล์ที่เลือก
        let images = [];

        // ฟังก์ชันอัปโหลดรูปภาพ
        function uploadImages() {
            const input = document.getElementById("imageInput");
            const container = document.getElementById("imageContainer");

            // เพิ่มรูปภาพที่เลือกเข้าไปในอาร์เรย์ images
            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];
                images.push(file);

                // สร้าง element แสดงรูปภาพในหน้าจอ
                const imgElement = document.createElement("img");
                imgElement.src = URL.createObjectURL(file); // สร้าง URL สำหรับแสดงภาพ
                imgElement.alt = file.name;

                // สร้างปุ่มสำหรับลบรูปภาพ
                const deleteButton = document.createElement("button");
                deleteButton.textContent = "ลบ";
                deleteButton.onclick = function () {
                    deleteImage(file.name);
                };

                // สร้าง div สำหรับรวมรูปภาพและปุ่มลบ
                const imageWrapper = document.createElement("div");
                imageWrapper.appendChild(imgElement);
                imageWrapper.appendChild(deleteButton);
                container.appendChild(imageWrapper);
            }

            // เคลียร์ไฟล์ที่เลือกใน input
            input.value = "";
        }

        // ฟังก์ชันลบรูปภาพ
        function deleteImage(imageName) {
            // ลบไฟล์จากอาร์เรย์
            images = images.filter(image => image.name !== imageName);

            // ลบรูปภาพจากหน้าจอ
            const container = document.getElementById("imageContainer");
            const allImages = container.getElementsByTagName("div");
            for (let i = 0; i < allImages.length; i++) {
                const imgElement = allImages[i].getElementsByTagName("img")[0];
                if (imgElement.alt === imageName) {
                    container.removeChild(allImages[i]);
                    break;
                }
            }
        }
    </script>
</body>
</html>
