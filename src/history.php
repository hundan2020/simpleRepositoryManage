
<?php
header('Content-Type: application/json');

// extract($_POST);

function response($code, $msg) {
	$f = [];
	$f['code'] = $code;
	$f['msg'] = $msg;
	print(json_encode($f));
}

try{     
	$pdo = new PDO('sqlite:./data/data.db');
}catch (PDOException $e){
	response(500, '数据库连接失败');
	exit();
}

function show_history($pdo) {
	extract($_REQUEST);
	!isset($sort) AND $sort = 'time';
	$sth = $pdo -> prepare("
		SELECT
			`id`,`name`,`spec`,`unit`,datetime(`time`, 'unixepoch', 'localtime') AS `time`,`do`,`count`,`dc_count`,`di_count`,`do_count`
		FROM
			`history`
		WHERE
			`name`
		LIKE 
			('%$search%') 
		ORDER BY 
			`$sort` 
		$order
		LIMIT 
			$offset, $limit 
		");
	$sth -> execute();
	$result = $sth->fetchAll(PDO::FETCH_CLASS);
	return $result;
}

function show_row($pdo) {
	extract($_REQUEST);
	$sth = $pdo -> prepare("
		SELECT
			COUNT(*) AS `total`
		FROM
			`history`
		WHERE
			`name`
		LIKE 
			('%$search%') 
		");
	$sth -> execute();
	$result = $sth->fetchAll(PDO::FETCH_CLASS);
	return $result;
}

// var_dump(show_row($pdo)[0]->total);
// var_dump(show_history($pdo));

function show_reponse($pdo){
	$r['total'] = show_row($pdo)[0]->total;
	$r['rows'] = show_history($pdo);
	// var_dump($r);
	$er = json_encode($r);
	return $er;
}

echo show_reponse($pdo);