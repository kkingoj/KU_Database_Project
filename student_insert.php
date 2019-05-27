﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$student_name = $_POST['student_name'];
$student_birth = $_POST['student_birth'];
$student_gender = $_POST['student_gender'];
$class_name = $_POST['class_name'];
$club_name = $_POST['club_name'];

$ret = mysqli_query($conn, "insert into student (student_name, student_birth, student_gender, class_name, club_name) values('$student_name', '$student_birth', '$student_gender', '$class_name','$club_name')");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=student_list.php'>"; //새로 고침하고 자동적으로 Student list로 이동시킨다.
}

?>

