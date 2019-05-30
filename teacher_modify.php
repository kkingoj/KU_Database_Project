﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$teacher_ID = $_POST['teacher_ID'];
$teacher_name = $_POST['teacher_name'];
$teacher_birth = $_POST['teacher_birth'];
$teacher_gender = $_POST['teacher_gender'];
$subject_name = $_POST['subject_name'];
$class_name = $_POST['class_name'];
$club_name = $_POST['club_name'];

mysqli_query($conn, "set autocommit = 0"); // Autocommit 해제
mysqli_query($conn, "set transaction isolation level serializable"); // Isolation Level 설정
mysqli_query($conn, "begin"); // Begins a transaction

$ret = mysqli_query($conn, "update teacher set teacher_name = '$teacher_name', teacher_birth = '$teacher_birth', teacher_gender = '$teacher_gender', subject_name = '$subject_name', class_name = '$class_name', club_name = '$club_name' where teacher_ID = '$teacher_ID'");

if(!$ret)
{
	mysqli_query($conn, "rollback"); // 교사 정보 수정 query 수행 실패 및 수행 전으로 rollback
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn, "commit"); // 교사 정보 수정 query 수행 성공 및  수행 내역 commit
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=teacher_list.php'>";
}

?>

