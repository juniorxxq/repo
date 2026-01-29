<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jirapat Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1; /* สีม่วง Indigo ทันสมัย */
            --primary-dark: #4f46e5;
            --bg-soft: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-label: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Kanit', sans-serif;
        }

        body {
            background: var(--bg-soft);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* กล่องฟอร์ม */
        .form-card {
            background-color: var(--card-bg);
            padding: 30px ;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            width: 100%;
            max-width: 480px;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 500;
            font-size: 1.6rem;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            color: var(--text-label);
        }

        /* ปรับ Input ให้คลีน */
        input[type="text"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            font-size: 15px;
            background-color: #fcfcfd;
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus, textarea:focus, select:focus {
            border-color: var(--primary);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        /* กลุ่มตัวเลือก Radio & Checkbox */
        .options-group {
            display: flex;
            gap: 15px;
            padding: 5px 0;
            flex-wrap: wrap;
        }

        .option-item {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 0.95rem;
        }

        input[type="radio"], input[type="checkbox"] {
            accent-color: var(--primary);
            margin-right: 6px;
            width: 18px;
            height: 18px;
        }

        /* ปุ่มกดและอนิเมชั่น */
        .button-wrapper {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-save {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }

        .btn-save:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* อนิเมชั่นเวลากดปุ่ม */
        .btn-save:active {
            transform: scale(0.95);
        }

        .btn-cancel {
            background-color: #f1f5f9;
            color: #64748b;
        }

        .btn-cancel:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        .btn-cancel:active {
            transform: scale(0.95);
        }

        textarea { resize: none; }
    </style>
</head>
<body>

    <div class="form-card">
        <h2>ลงทะเบียนสมาชิก</h2>
        <form name="frmRegis" method="post" action="from2.php">
            
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="user" maxlength="25" placeholder="ระบุชื่อผู้ใช้" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Pwd" maxlength="8" placeholder="รหัสผ่าน 8 ตัว" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" rows="3" placeholder="ระบุที่อยู่ของคุณ"></textarea>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="options-group">
                    <label class="option-item"><input type="radio" name="gender" value="Male" checked> ชาย</label>
                    <label class="option-item"><input type="radio" name="gender" value="Female"> หญิง</label>
                </div>
            </div>

            <div class="form-group">
                <label>Hobbies</label>
                <div class="options-group">
                    <label class="option-item"><input type="checkbox" name="Hobby[]" value="อ่านหนังสือ"> อ่านหนังสือ</label>
                    <label class="option-item"><input type="checkbox" name="Hobby[]" value="ดูทีวี"> ดูทีวี</label>
                </div>
            </div>

            <div class="form-group">
                <label>Favorite Beverage</label>
                <select name="beverage">
                    <option value="IcedTea">ICED TEA</option>
                    <option value="LemonTea">LEMON TEA</option>
                    <option value="COFF">COFFEE</option>
                </select>
            </div>

            <div class="button-wrapper">
                <input type="submit" name="save" value="Save" class="btn btn-save">
                <input type="reset" value="Cancel" class="btn btn-cancel">
            </div>
        </form>
    </div>

</body>
</html>