﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("club_ID", $_GET)) {
    $club_ID = $_GET["club_ID"];
    $query = "select * from club where club_ID = $club_ID";
    $res = mysqli_query($conn, $query);
    $club = mysqli_fetch_assoc($res);
    if (!$club) {
        msg("우리 학교에 없는 동아리입니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>동아리 정보 상세 보기</h3>

        <p>
            <label for="club_ID">동아리 번호</label>
            <input readonly type="number" id="club_ID" name="club_ID" value="<?= $club['club_ID'] ?>"/>
        </p>

        <p>
            <label for="club_name">동아리명</label>
            <input readonly type="text" id="club_name" name="club_name" value="<?= $club['club_name'] ?>"/>
        </p>

        <p>
            <label for="subject_name">관련 교과 과목</label>
            <input readonly type="text" id="subject_name" name="subject_name" value="<?= $club['subject_name'] ?>"/>
        </p>

    </div>
<? include("footer.php") ?>