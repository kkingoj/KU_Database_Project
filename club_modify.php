﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$club_ID = $_POST['club_ID'];
$club_name = $_POST['club_name'];
$subject_name = $_POST['subject_name'];

mysqli_query($conn, "set autocommit = 0"); // Autocommit 해제
mysqli_query($conn, "set transaction isolation level serializable"); // Isolation Level 설정
mysqli_query($conn, "begin"); // Begins a transaction

$ret = mysqli_query($conn, "update club set club_name = '$club_name', subject_name = '$subject_name' where club_ID = '$club_ID'");

if(!$ret)
{
	mysqli_query($conn, "rollback"); // 동아리 수정 query 등록 실패 및 수행 전으로 rollback
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn, "commit"); // 동아리 수정 query 수행 성공 및  수행 내역 commit
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=club_list.php'>";
}

?>

