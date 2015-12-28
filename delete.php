<?php
require 'connect.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    print '<p>ไม่มีการระบุ ID ที่ต้องการลบข้อมูล</p>';
    print '<a href=index.php>กลับหน้าหลัก</a>';
} else {
    $sql = 'delete from employee where emp_id = "' . $_GET['id'] . '";';
    $res = $mysqli->query($sql);
    if ($res) {
        print '<p>การลบข้อมูลเสร็จสมบูรณ์</p>';
        print '<a href="index.php">กลับหน้าหลัก</a>';
    }
}
