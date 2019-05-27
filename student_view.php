﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("student_ID", $_GET)) {
    $student_ID = $_GET["student_ID"];
    $query = "select * from student where student_ID = $student_ID";
    $res = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($res);
    if (!$student) {
        msg("우리 학교에 없는 학생입니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>학생 정보 상세 보기</h3>

        <p>
            <label for="student_ID">학생 번호</label>
            <input readonly type="number" id="student_ID" name="student_ID" value="<?= $student['student_ID'] ?>"/>
        </p>

        <p>
            <label for="student_name">학생 성명</label>
            <input readonly type="text" id="student_name" name="student_name" value="<?= $student['student_name'] ?>"/>
        </p>

        <p>
            <label for="student_birth">학생 생년월일</label>
            <input readonly type="number" id="student_birth" name="student_birth" value="<?= $student['student_birth'] ?>"/>
        </p>

        <p>
            <label for="student_gender">학생 성별</label>
            <input readonly type="text" id="student_gender" name="student_gender" value="<?= $student['student_gender'] ?>"/>
        </p>

        <p>
            <label for="class_name">소속 반</label>
            <input readonly type="text" id="class_name" name="class_name" value="<?= $student['class_name'] ?>"/>
        </p>
        
        <p>
            <label for="club_name">소속 동아리</label>
            <input readonly type="text" id="club_name" name="club_name" value="<?= $student['club_name'] ?>"/>
        </p>
    </div>
<? include("footer.php") ?>