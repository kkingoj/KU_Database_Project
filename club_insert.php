﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$club_name = $_POST['club_name'];
$subject_name = $_POST['subject_name'];

$ret = mysqli_query($conn, "insert into club (club_name, subject_name) values('$club_name', '$subject_name')");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=club_list.php'>"; //새로 고침하고 자동적으로 Student list로 이동시킨다.
}

?>

