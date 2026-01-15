<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Summary</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #e4e8ed 100%);
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #f1f5f9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Kanit', sans-serif;
        }

        body {
            background: var(--bg-gradient);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* กล่องสรุปข้อมูลพร้อมอนิเมชั่นตอนปรากฏ */
        .summary-card {
            background-color: var(--card-bg);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 480px;
            animation: fadeInScale 0.5s ease-out;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 500;
            color: var(--text-main);
            font-size: 1.5rem;
        }

        /* การจัดรูปแบบข้อมูลแบบ Minimal List */
        .info-list {
            list-style: none;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--text-muted);
            font-weight: 300;
        }

        .info-value {
            font-weight: 500;
            color: var(--text-main);
            text-align: right;
        }

        /* จัดการหน้าจอ Error */
        .error-msg {
            text-align: center;
            color: #ef4444;
            padding: 20px;
            background: #fef2f2;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        /* ปุ่ม Back พร้อมอนิเมชั่นตอนกด */
        .btn-back {
            display: block;
            width: 100%;
            padding: 14px;
            background-color: var(--primary);
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
        }

        .btn-back:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(99, 102, 241, 0.3);
        }

        .btn-back:active {
            transform: scale(0.96); /* ยุบตัวเมื่อกดเหมือนหน้าแรก */
        }
    </style>
</head>
<body>

<div class="summary-card">
    <?php
    if(isset($_POST['save'])){
        // รับค่าและทำความสะอาดข้อมูลเบื้องต้น
        $user = htmlspecialchars($_POST['user']);
        $pwd = htmlspecialchars($_POST['Pwd']);
        $address = nl2br(htmlspecialchars($_POST['address']));
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "ไม่ได้ระบุ";
        $beverage = isset($_POST['beverage']) ? $_POST['beverage'] : "ไม่ได้เลือก";
    ?>
        <h2>ข้อมูลของคุณ</h2>
        
        <div class="info-list">
            <div class="info-item">
                <span class="info-label">ชื่อผู้ใช้งาน</span>
                <span class="info-value"><?php echo $user; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">รหัสผ่าน</span>
                <span class="info-value" style="letter-spacing: 2px;">••••••••</span>
            </div>
            <div class="info-item">
                <span class="info-label">เพศ</span>
                <span class="info-value"><?php echo ($gender == "Male" ? "ชาย" : "หญิง"); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">เครื่องดื่ม</span>
                <span class="info-value" style="color: var(--primary);"><?php echo strtoupper($beverage); ?></span>
            </div>
            <div class="info-item" style="flex-direction: column; align-items: flex-start;">
                <span class="info-label" style="margin-bottom: 8px;">ที่อยู่จัดส่ง</span>
                <span class="info-value" style="text-align: left; width: 100%; font-weight: 400;"><?php echo $address ?: "-"; ?></span>
            </div>
        </div>

    <?php
    } else {
        echo "<div class='error-msg'>คุณไม่ได้กดปุ่มบันทึก หรือเข้าถึงหน้าโดยตรง</div>";
    }
    ?>

    <button onclick="window.location.href='from1.php'" class="btn-back">
        กลับไปแก้ไขข้อมูล
    </button>
</div>

</body>
</html>