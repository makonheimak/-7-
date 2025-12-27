<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файлов</title>
    <style>
        .upload-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>Загрузка файлов на сервер</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="uploadedFile" required>
            <button type="submit" name="submit">Загрузить файл</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = basename($_FILES['uploadedFile']['name']);
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $targetPath)) {
                    echo "<p class='success'>Файл успешно загружен!</p>";
                    echo "<p>Имя загруженного файла: <strong>" . htmlspecialchars($fileName) . "</strong></p>";
                } else {
                    echo "<p class='error'>Ошибка при загрузке файла.</p>";
                }
            } else {
                echo "<p class='error'>Файл не был загружен или произошла ошибка.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
