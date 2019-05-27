<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from teacher";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where teacher_name like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table">
        <thead>
        <tr>
            <th>No.</th>
            <th>교사 성명</th>
            <th>교사 생년월일</th>
            <th>담당 과목</th>
            <th>담당 반</th>
            <th>담당 동아리</th>
            <th>기능</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td><a href='teacher_view.php?teacher_ID={$row['teacher_ID']}'>{$row['teacher_name']}</a></td>";
            echo "<td>{$row['teacher_birth']}</td>";
            echo "<td>{$row['subject_name']}</td>";
            echo "<td>{$row['class_name']}</td>";
            echo "<td>{$row['club_name']}</td>";
            echo "<td width='17%'>
                <a href='teacher_form.php?teacher_ID={$row['teacher_ID']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['teacher_ID']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(teacher_ID) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "teacher_delete.php?teacher_ID=" + teacher_ID;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
