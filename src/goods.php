
<?php
header('Content-Type: application/json');

try{     
	$pdo = new PDO('sqlite:./data/data.db');
}catch (PDOException $e){
	response(500, '数据库连接失败');
	exit();
}

function show_goods($pdo) {
	$sth = $pdo -> prepare("
		SELECT
			`goods_id` AS id,`name`,`spec`,`unit`,`c_count`,`i_count`,`o_count`,`del`
		FROM
			`goods_list`
		WHERE
			`del` = 0
		");
	$sth -> execute();
	$result = $sth->fetchAll(PDO::FETCH_CLASS);
	foreach ($result as $key => $value) {
		// $result[$key]['delete'] = ;
		$value -> delete = "<a href=\"#\" onclick='del_id($(this))'>删除</a>";
	}
	return $result;
}

// var_dump(show_goods($pdo));
echo json_encode(show_goods($pdo));

