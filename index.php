<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มลงทะเบียน</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        input { width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

    <form action="save_data.php" method="POST">
        <h2>ลงทะเบียนผู้ใช้งาน</h2>
        
        <label for="firstname">ชื่อจริง:</label>
        <input type="text" id="firstname" name="firstname" required>
        
        <label for="lastname">นามสกุล:</label>
        <input type="text" id="lastname" name="lastname" required>
        
        <label for="email">อีเมล:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit">บันทึกข้อมูล</button>
    </form>

</body>
</html>