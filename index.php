<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>คอมพิวเตอร์</title>
</head>
<body>
<table>
    <tr>
        <td><a href="create.php">เพิ่มข้อมูลพนักงาน</a></td>
    </tr>
</table>
<hr>
<?php
$sql = 'Select * FROM `employee` WHERE 1 ORDER BY emp_id asc;';
$res = $mysqli->query($sql);
if ($res) {
    $trtd = '';
    while ($row = $res->fetch_assoc()) {
        if ($row['emp_dep'] == 1) {
            $row['emp_dep'] = 'แผนกขาย';
        } elseif ($row['emp_dep'] == 2) {
            $row['emp_dep'] = 'แผนกบัญชี';
        } else {
            $row['emp_dep'] = 'แผนกจัดซื้อ';
        }
        $trtd .= '
        <tr>
            <td>' . $row['emp_id'] . '</td>
            <td>' . $row['emp_name'] . '</td>
            <td>' . $row['emp_dep'] . '</td>
            <td>' . $row['emp_salary'] . '</td>
            <td>
                <a href="edit.php?id=' . $row['emp_id'] . '">แก้ไข</a>
            </td>
            <td>
                <a href="delete.php?id=' . $row['emp_id'] . '"
                    onclick="return confirm(\'ยืนยันการลบ ?\');">ลบ</a>
            </td>
        </tr>
        ';
    }
}
?>
<table cellpadding="5" cellspacing="1" border="1">
<theader>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>DEPARTMENT</th>
        <th>SALARY</th>
        <th colspan="2">MANAGE</th>
    </tr>
</theader>
<tbody>
    <?=$trtd;?>
</tbody>
</table>
</body>
</html>