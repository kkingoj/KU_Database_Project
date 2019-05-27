﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";  //default
$action = "club_insert.php";  //default

if (array_key_exists("club_ID", $_GET)) {
    $club_ID = $_GET["club_ID"];
    $query =  "select * from club where club_ID = $club_ID";
    $res = mysqli_query($conn, $query);
    $club = mysqli_fetch_array($res);
    if(!$club) {
        msg("해당 동아리가 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "club_modify.php";
}

?>
    <div class="container">
        <form name="club_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="club_ID" value="<?=$club['club_ID']?>"/>
            <h3>동아리 정보 <?=$mode?></h3>
            <p>
                <label for="club_name">동아리명</label>
                <input type="text" placeholder="동아리명 입력" id="club_name" name="club_name" value="<?=$club['club_name']?>"/>
            </p>
            <p>
                <label for="subject_name">관련 교과 과목</label>
                <input type="text" placeholder="관련 교과 과목 입력" id="subject_name" name="subject_name" value="<?=$club['subject_name']?>"/>
            </p>
            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("club_name").value == "") {
                        alert ("동아리명을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>