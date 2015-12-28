<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Employee</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    $id = $_POST['emp_id'];
    $name = $_POST['emp_name'];
    $dep = $_POST['emp_dep'];
    $salary = $_POST['emp_salary'];
    $sql = 'insert INTO `employee`(`emp_id`, `emp_name`, `emp_dep`, `emp_salary`)
        VALUES ("' . $id . '","' . $name . '","' . $dep . '","' . $salary . '")';
    if ($mysqli->query($sql)) {
        echo '<p>เพิ่มข้อมูลเสร็จสมบูรณ์</p>';
        echo '<p><a href="index.php">กลับหน้าหลัก</a></p>';
        // echo '<meta http-equiv="refresh" content="5;url=index.php">';
    } else {
        echo $mysqli->error;
    }
    exit;
}
?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
    <table cellpadding="5" cellspacing="1" border="1">
        <tr>
            <td><label for="emp_id">รหัสพนักงาน</label></td>
            <td>
                <input type="text" name="emp_id" id="emp_id"
                    pattern="[a-zA-Z0-9]+" required>
            </td>
        </tr>
        <tr>
            <td><label for="emp_name">ชื่อ - นามสกุลพนักงาน</label></td>
            <td><input type="text" name="emp_name" id="emp_name"></td>
        </tr>
        <tr>
            <td><label for="emp_dep">แผนกงาน</label></td>
            <td><select name="emp_dep" id="emp_dep">
                <option value="1">แผนกขาย</option>
                <option value="2">แผนกบัญชี</option>
                <option value="3">แผนกจัดซื้อ</option>
            </select></td>
        </tr>
        <tr>
            <td><label for="emp_salary">เงินเดือน</label></td>
            <td><input type="number" name="emp_salary" id="emp_salary"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" id="submit" value="บันทึก">
                <input type="reset" name="reset" id="reset" value="ยกเลิก">
            </td>
        </tr>
    </table>
</form>
</body>
</html>