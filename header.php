<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>K-mall</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="teacher_list.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">은행고등학교</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="은행고 교사검색">
                </li>
            </ul>
        </div>
    </div>
</form>
<div class ="container">
	<table class="table">
		<tbody>
			<tr>
				<th>
					<a href="teacher_list.php">교사 목록</a>
				</th>
				<th>
					<a href="student_list.php">학생 목록</a>
				</th>
				<th>
					<a href="club_list.php">동아리 목록</a>
				</th>
				<th>
					<a href="teacher_form.php">교사 등록</a>
				</th>
				<th>
					<a href="student_form.php">학생 등록</a>
				</th>
				<th>
					<a href="club_form.php">동아리 등록</a>
				</th>
			</tr>
		</tbody>
	</table>
</div>