﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$club_ID = $_POST['club_ID'];
$club_name = $_POST['club_name'];
$subject_name = $_POST['subject_name'];

$ret = mysqli_query($conn, "update club set club_name = '$club_name', subject_name = '$subject_name' where club_ID = '$club_ID'");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=club_list.php'>";
}

?>

