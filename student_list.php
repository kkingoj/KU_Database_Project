<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from student";
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
    
    <table class="table">
        <thead>
        <tr>
            <th>No.</th>
            <th>학생 성명</th>
            <th>학생 생년월일</th>
            <th>소속 반</th>
            <th>소속 동아리</th>
            <th>기능</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td><a href='student_view.php?student_ID={$row['student_ID']}'>{$row['student_name']}</a></td>";
            echo "<td>{$row['student_birth']}</td>";
            echo "<td>{$row['class_name']}</td>";
            echo "<td>{$row['club_name']}</td>";
            echo "<td width='17%'>
                <a href='student_form.php?student_ID={$row['student_ID']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['student_ID']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(student_ID) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "student_delete.php?student_ID=" + student_ID;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
