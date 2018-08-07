<?php

// 货物搜索建议 !
// 规格搜索建议 ！
// 单位搜索建议 ！
// 入库/新增判别 !
// 入库
// 出库
// 库存列表 !
// 历史记录事件
// 历史记录列表 !
// 历史记录货物搜索结果+分页 !
// 货物删除功能 !

?>

<?php
header('Content-Type: application/json');

extract($_REQUEST);

function response($code, $msg) {
	$f = [];
	$f['code'] = $code;
	$f['msg'] = $msg;
	print(json_encode($f));
}

if (!isset($do)) {
	response(404, 'No idea what you want!');
	exit($response);
}else{
	try{     
	    $pdo = new PDO('sqlite:./data/data.db');
	}catch (PDOException $e){
	    response(500, '数据库连接失败');
	    exit();
	}
}

switch ($do) {
	// case 'new':
	// 	$sth = $pdo -> prepare("
	// 		INSERT INTO
	// 			`goods_list`(`name`, `under`, `quantity_now`, `quantity_in`)
	// 		VALUES
	// 			('$name', '$under', '$quantity', '$quantity')
	// 		");
	// 	try {
	// 		$sth -> execute();
	// 		response(200, '货物增加成功');
	// 	} catch (Exception $e) {
	// 		response(500, '添加失败，请检查数据');
	// 	}
	// 	break;
	// case 'new_fir_cate':
	// 	$sth = $pdo -> prepare("
	// 		INSERT INTO
	// 			`fir_list`(`name`)
	// 		VALUES
	// 			('$name')
	// 		");
	// 	try {
	// 		$sth -> execute();
	// 		response(200, '栏目增加成功');
	// 	} catch (Exception $e) {
	// 		response(500, '添加失败，请检查数据');
	// 	}
	// 	break;
	// case 'new_sec_cate':
	// 	$sth = $pdo -> prepare("
	// 		INSERT INTO
	// 			`sec_list`(`name`, `under`)
	// 		VALUES
	// 			('$name', '$under')
	// 		");
	// 	try {
	// 		$sth -> execute();
	// 		response(200, '栏目增加成功');
	// 	} catch (Exception $e) {
	// 		response(500, '添加失败，请检查数据');
	// 	}
	// 	break;
	// case 'new_thi_cate':
	// 	$sth = $pdo -> prepare("
	// 		INSERT INTO
	// 			`thi_list`(`name`, `under`)
	// 		VALUES
	// 			('$name', '$under')
	// 		");
	// 	try {
	// 		$sth -> execute();
	// 		response(200, '栏目增加成功');
	// 	} catch (Exception $e) {
	// 		response(500, '添加失败，请检查数据');
	// 	}
	// 	break;
	// case 'in_depot':
	// 	$sth = $pdo -> prepare("
	// 		UPDATE
	// 			`goods_list`
	// 		SET
	// 			`quantity_now` = `quantity_now` + '$quantity',
	// 			`quantity_in` = `quantity_in` + '$quantity'
	// 		WHERE 
	// 			`goods_id` = '$goods_id'
	// 		");
	// 	try {
	// 		$sth -> execute();
	// 		response(200, '入库成功');
	// 	} catch (Exception $e) {
	// 		response(500, '添加失败，请检查数据');
	// 	}
	// 	break;
	// case 'out_depot':
	// 	$sth = $pdo -> prepare("
	// 		UPDATE
	// 			`goods_list`
	// 		SET
	// 			`quantity_now` = `quantity_now` - '$quantity',
	// 			`quantity_out` = `quantity_out` + '$quantity'
	// 		WHERE 
	// 			`goods_id` = '$goods_id'
	// 		");
	// 	try {
	// 		$sth -> execute();
	// 		response(200, '出库成功');
	// 	} catch (Exception $e) {
	// 		response(500, '添加失败，请检查数据');
	// 	}
	// 	break;
	// case 'select_next_cate':
	// 	$sth = $pdo -> prepare("
	// 		SELECT
	// 			*
	// 		FROM
	// 			`$in_table`
	// 		WHERE
	// 			`under` = '$in_under'
	// 		");
	// 	try {
	// 		$sth -> execute();
	// 		$result = $sth->fetchAll(PDO::FETCH_CLASS);
	// 		// var_dump($result);
	// 		// json_encode($result)
	// 		response(200, $result);
	// 	} catch (Exception $e) {
	// 		response(500, '添加失败，请检查数据');
	// 	}
	// 	break;
	case 'del':
		$sth = $pdo -> prepare("
			DELETE FROM
				`goods_list`
			WHERE
				`goods_id` = '$id'
			");
		// try {
		$sth -> execute();
		// $result = $sth->fetchAll(PDO::FETCH_CLASS);
			// var_dump($result);
			// json_encode($result)
		// 	response(200, $result);
		// } catch (Exception $e) {
		// 	response(500, '添加失败，请检查数据');
		// }
		break;
	case 'select_g':
		$sth = $pdo -> prepare("
			SELECT
				`goods_id` AS `id`, `name`
			FROM
				`goods_list`
			WHERE
				`name` LIKE '%$name%'
			AND
				`del` = 0
			GROUP BY 
				`name`
			");
		$sth -> execute();
		$result = $sth->fetchAll(PDO::FETCH_CLASS);
		$r['message'] = '';
		$r['value'] = $result;
		$r['code'] = 200;
		$r['redirect'] = '';
		echo json_encode($r);
		break;
	case 'select_s':
		$sth = $pdo -> prepare("
			SELECT
				`goods_id` AS `id`, `spec` AS `name`
			FROM
				`goods_list`
			WHERE
				`name` LIKE '%$spec%'
			AND
				`del` = 0
			GROUP BY 
				`spec`
			");
		$sth -> execute();
		$result = $sth->fetchAll(PDO::FETCH_CLASS);
		$r['message'] = '';
		$r['value'] = $result;
		$r['code'] = 200;
		$r['redirect'] = '';
		echo json_encode($r);
		break;
	case 'select_u':
		$sth = $pdo -> prepare("
			SELECT
				`goods_id` AS `id`, `unit` AS `name`
			FROM
				`goods_list`
			WHERE
				`name` LIKE '%$unit%'
			AND
				`del` = 0
			GROUP BY
				`unit`
			");
		$sth -> execute();
		$result = $sth->fetchAll(PDO::FETCH_CLASS);
		$r['message'] = '';
		$r['value'] = $result;
		$r['code'] = 200;
		$r['redirect'] = '';
		echo json_encode($r);
		break;
	case 'new_add':
		$sth = $pdo -> prepare("
			INSERT INTO
				`goods_list`(`name`, `spec`,  `unit`, `c_count`, `i_count`)
			VALUES
				('$name', '$spec', '$unit', '$count', '$count')
			");
		$his = $pdo -> prepare("
			INSERT INTO
				`history`(`name`, `spec`,  `unit`, `time`, `do`, `count`, `dc_count`, `di_count`)
			VALUES
				('$name', '$spec', '$unit', '".time()."', '新增', '$count', '$count', '$count')
			");
		$sth -> execute();
		$his -> execute();
		response(200, '完成');
		break;
	case 'in':
		$pre = $pdo -> prepare("
			SELECT
				`goods_id` AS `id`
			FROM
				`goods_list`
			WHERE
				`name` = '$name'
			AND `spec` = '$spec'
			AND `unit` = '$unit'
		");
		$pre -> execute();
		$result = $pre->fetchAll(PDO::FETCH_CLASS);
		$id = $result[0]->id;

		$sth = $pdo -> prepare("
			UPDATE
				`goods_list`
			SET
				`c_count` = `c_count` + '$count',
				`i_count` = `i_count` + '$count'
			WHERE
				`goods_id` = '$id'
			");
		$his = $pdo -> prepare("
			INSERT INTO
				`history`(`name`, `spec`,  `unit`, `time`, `do`, `count`, `dc_count`, `di_count`)
			VALUES
				('$name', '$spec', '$unit', '".time()."', '入库', '$count', (SELECT `c_count` FROM `goods_list` WHERE `goods_id` = '$id'), (SELECT `i_count` FROM `goods_list` WHERE `goods_id` = '$id'))
			");
		$sth -> execute();
		$his -> execute();
		response(200, '完成');
		break;
	case 'out':
		$pre = $pdo -> prepare("
			SELECT
				`goods_id` AS `id`
			FROM
				`goods_list`
			WHERE
				`name` = '$name'
			AND `spec` = '$spec'
			AND `unit` = '$unit'
		");
		$pre -> execute();
		$result = $pre->fetchAll(PDO::FETCH_CLASS);
		$id = $result[0]->id;
		

		$sth = $pdo -> prepare("
			UPDATE
				`goods_list`
			SET
				`c_count` = `c_count` - '$count',
				`o_count` = `o_count` + '$count'
			WHERE
				`goods_id` = '$id'
			");
		$his = $pdo -> prepare("
			INSERT INTO
				`history`(`name`, `spec`,  `unit`, `time`, `do`, `count`, `dc_count`, `do_count`)
			VALUES
				('$name', '$spec', '$unit', '".time()."', '出库', '$count', (SELECT `c_count` FROM `goods_list` WHERE `goods_id` = '$id'), (SELECT `o_count` FROM `goods_list` WHERE `goods_id` = '$id'))
			");
		$sth -> execute();
		$his -> execute();
		response(200, '完成');
		break;
	case 'check_exist':
		$sth = $pdo -> prepare("
			SELECT
				COUNT(*) AS `c`
			FROM
				`goods_list`
			WHERE
				`name` = '$name'
			AND `spec` = '$spec'
			AND `unit` = '$unit'
			");
		$sth -> execute();
		$result = $sth -> fetchAll(PDO::FETCH_CLASS);
		// echo $result[0] -> c;
		// var_dump($result);
		response(200, $result[0] -> c);
		break;

	default:
		# code...
		break;
}