﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";  //default
$action = "teacher_insert.php";  //default

if (array_key_exists("teacher_ID", $_GET)) {
    $teacher_ID = $_GET["teacher_ID"];
    $query =  "select * from teacher where teacher_ID = $teacher_ID";
    $res = mysqli_query($conn, $query);
    $teacher = mysqli_fetch_array($res);
    if(!$teacher) {
        msg("교사가 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "teacher_modify.php";
}

?>
    <div class="container">
        <form name="teacher_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="teacher_ID" value="<?=$teacher['teacher_ID']?>"/>
            <h3>교사 정보 <?=$mode?></h3>
            <p>
                <label for="teacher_name">교사 성명</label>
                <input type="text" placeholder="교사 성명 입력" id="teacher_name" name="teacher_name" value="<?=$teacher['teacher_name']?>"/>
            </p>
            <p>
                <label for="teacher_birth">교사 생년월일</label>
                <input type="number" placeholder="년월일순으로 입력" id="teacher_birth" name="teacher_birth" value="<?=$teacher['teacher_birth']?>" />
            </p>
            <p>
                <label for="teacher_gender">교사 성별</label>
                <input type="text" placeholder="교사 성별 입력" id="teacher_gender" name="teacher_gender" value="<?=$teacher['teacher_gender']?>"/>
            </p>
            <p>
                <label for="subject_name">담당 과목</label>
                <input type="text" placeholder="담당 과목 입력" id="subject_name" name="subject_name" value="<?=$teacher['subject_name']?>"/>
            </p>
            <p>
                <label for="class_name">담당 반</label>
                <input type="text" placeholder="정수로 입력" id="class_name" name="class_name" value="<?=$teacher['class_name']?>" />
            </p>
            <p>
                <label for="club_name">담당 동아리</label>
                <input type="text" placeholder="담당 동아리 입력" id="club_name" name="club_name" value="<?=$teacher['club_name']?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("teacher_name").value == "") {
                        alert ("교사 성명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("teacher_birth").value == "") {
                        alert ("교사 생년월일을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("teacher_gender").value == "") {
                        alert ("교사 성별을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("subject_name").value == "") {
                        alert ("담당 과목을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>