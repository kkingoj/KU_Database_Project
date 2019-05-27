﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("teacher_ID", $_GET)) {
    $teacher_ID = $_GET["teacher_ID"];
    $query = "select * from teacher where teacher_ID = $teacher_ID";
    $res = mysqli_query($conn, $query);
    $teacher = mysqli_fetch_assoc($res);
    if (!$teacher) {
        msg("우리 학교에 없는 교사입니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>교사 정보 상세 보기</h3>

        <p>
            <label for="teacher_ID">교사 번호</label>
            <input readonly type="number" id="teacher_ID" name="teacher_ID" value="<?= $teacher['teacher_ID'] ?>"/>
        </p>

        <p>
            <label for="teacher_name">교사 성명</label>
            <input readonly type="text" id="teacher_name" name="teacher_name" value="<?= $teacher['teacher_name'] ?>"/>
        </p>

        <p>
            <label for="teacher_birth">교사 생년월일</label>
            <input readonly type="number" id="teacher_birth" name="teacher_birth" value="<?= $teacher['teacher_birth'] ?>"/>
        </p>

        <p>
            <label for="teacher_gender">교사 성별</label>
            <input readonly type="text" id="teacher_gender" name="teacher_gender" value="<?= $teacher['teacher_gender'] ?>"/>
        </p>

        <p>
            <label for="subject_name">담당 과목</label>
            <input readonly type="text" id="subject_name" name="subject_name" value="<?= $teacher['subject_name'] ?>"/>
        </p>

        <p>
            <label for="class_name">담당 반</label>
            <input readonly type="text" id="class_name" name="class_name" value="<?= $teacher['class_name'] ?>"/>
        </p>
        
        <p>
            <label for="club_name">담당 동아리</label>
            <input readonly type="text" id="club_name" name="club_name" value="<?= $teacher['club_name'] ?>"/>
        </p>
    </div>
<? include("footer.php") ?>