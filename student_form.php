﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";  //default
$action = "student_insert.php";  //default

if (array_key_exists("student_ID", $_GET)) {
    $student_ID = $_GET["student_ID"];
    $query =  "select * from student where student_ID = $student_ID";
    $res = mysqli_query($conn, $query);
    $student = mysqli_fetch_array($res);
    if(!$student) {
        msg("학생이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "student_modify.php";
}

?>
    <div class="container">
        <form name="student_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="student_ID" value="<?=$student['student_ID']?>"/>
            <h3>학생 정보 <?=$mode?></h3>
            <p>
                <label for="student_name">학생 성명</label>
                <input type="text" placeholder="학생 성명 입력" id="student_name" name="student_name" value="<?=$student['student_name']?>"/>
            </p>
            <p>
                <label for="student_birth">학생 생년월일</label>
                <input type="number" placeholder="년월일순으로 입력" id="student_birth" name="student_birth" value="<?=$student['student_birth']?>" />
            </p>
            <p>
                <label for="student_gender">학생 성별</label>
                <input type="text" placeholder="학생 성별 입력" id="student_gender" name="student_gender" value="<?=$student['student_gender']?>"/>
            </p>
            <p>
                <label for="class_name">소속 반</label>
                <input type="text" placeholder="정수로 입력" id="class_name" name="class_name" value="<?=$student['class_name']?>" />
            </p>
            <p>
                <label for="club_name">소속 동아리</label>
                <input type="text" placeholder="소속 동아리 입력" id="club_name" name="club_name" value="<?=$student['club_name']?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("student_name").value == "") {
                        alert ("학생 성명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("student_birth").value == "") {
                        alert ("학생 생년월일을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("student_gender").value == "") {
                        alert ("학생 성별을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("class_name").value == "") {
                        alert ("소속 반을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>