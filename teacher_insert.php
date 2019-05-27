﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$teacher_name = $_POST['teacher_name'];
$teacher_birth = $_POST['teacher_birth'];
$teacher_gender = $_POST['teacher_gender'];
$subject_name = $_POST['subject_name'];
$class_name = $_POST['class_name'];
$club_name = $_POST['club_name'];

$ret = mysqli_query($conn, "insert into teacher (teacher_name, teacher_birth, teacher_gender, subject_name, class_name, club_name) values('$teacher_name', '$teacher_birth', '$teacher_gender', '$subject_name', '$class_name','$club_name')");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=teacher_list.php'>"; //새로 고침하고 자동적으로 teacher list로 이동시킨다.
}

?>

