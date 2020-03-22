<?php
function student_view()
{
	$sql = "SELECT no, studentid, name FROM student";
	return $sql;
}

function student_insert($studentid, $name, $password)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO student (studentid, name, password) VALUES (?, ?,?)");
    $stmt->bind_param("sss", $studentid, $name, $password);

    $stmt->execute();
}

?>
