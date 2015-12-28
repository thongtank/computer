<?php
require_once 'connect.php';
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo '<p>ไม่มีการกำหนด ID สำหรับการแก้ไขข้อมูล</p>';
    echo '<a href="index.php">กลับหน้าหลัก</a>';
    exit;
}
$sql = 'select * from employee where emp_id = "' . $_GET['id'] . '" LIMIT 1;';
$res = $mysqli->query($sql);
if ($res) {
    $data = $res->fetch_assoc();
} else {
    print $mysqli->error;
    exit;
}

if (isset($_POST['submit'])) {
    $sql = 'update `employee` SET `emp_name`="' . $_POST['emp_name'] . '",`emp_dep`="' . $_POST['emp_dep'] . '",`emp_salary`="' . $_POST['emp_salary'] . '" ';
    $sql .= 'WHERE emp_id = "' . $_POST['hidden_id'] . '";';
    // echo $sql;
    $res = $mysqli->query($sql);
    if ($res) {
        print '<p>การแก้ไขข้อมูลเสร็จสมบูรณ์</p>';
        echo '<a href="index.php">กลับหน้าหลัก</a>';
    } else {
        print $mysqli->error;
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF'] . '?id=' . $_GET['id'];?>" method="POST">
    <table cellpadding="5" cellspacing="1" border="1">
        <tr>
            <td><label for="emp_id">รหัสพนักงาน</label></td>
            <td>
                <input type="text" name="emp_id" id="emp_id" value="<?=$data['emp_id'];?>" disabled="disabled">
                <input type="hidden" name="hidden_id" id="hidden_id" value="<?=$data['emp_id'];?>">
                    <!-- oninvalid="setCustomValidity('ควย');" -->
            </td>
        </tr>
        <tr>
            <td><label for="emp_name">ชื่อ - นามสกุลพนักงาน</label></td>
            <td><input type="text" name="emp_name" id="emp_name" value="<?=$data['emp_name'];?>"></td>
        </tr>
        <tr>
            <td><label for="emp_dep">แผนกงาน</label></td>
            <td><select name="emp_dep" id="emp_dep">
                <option value="1" <?=($data['emp_dep'] == 1) ? 'selected' : '';?>>แผนกขาย</option>
                <option value="2" <?=($data['emp_dep'] == 2) ? 'selected' : '';?>>แผนกบัญชี</option>
                <option value="3" <?=($data['emp_dep'] == 3) ? 'selected' : '';?>>แผนกจัดซื้อ</option>
            </select></td>
        </tr>
        <tr>
            <td><label for="emp_salary">เงินเดือน</label></td>
            <td><input type="number" name="emp_salary" id="emp_salary" value="<?=$data['emp_salary'];?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" id="submit" value="แก้ไขข้อมูล">
                <input type="reset" name="reset" id="reset" value="ยกเลิก">
            </td>
        </tr>
    </table>
</form>
</body>
</html>