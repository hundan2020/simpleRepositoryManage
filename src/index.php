<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bootstrap 4, from LayoutIt!</title>

	<meta name="description" content="Source code generated using layoutit.com">
	<meta name="author" content="LayoutIt!">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-select.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">	
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<!-- <link href="css/font-awesome.min.css" rel="stylesheet">	 -->
	<style type="text/css">
	.overflow-list {
		overflow-y: scroll !important;
		max-height: 400px !important;
	}
	.div-center {
		float: none;
		display: inline-block;
		vertical-align: middle;
	}
</style>
</head>
<body>

<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			
			<form role="form" class="form-inline mb-lg-5 justify-content-between">
				<!-- <div class="d-flex flex-row"> -->
					<div class="d-flex flex-column">
					<div class="form-group mr-sm-3">
						<label for="goodsInput" class="mr-sm-1">
							货物
						</label>
						<input type="text" class="form-control w-75" id="goodsInput" data-cip-id="goodsInput">
                        <div class="input-group-btn" >
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            </ul>
                        </div>

					</div>

					<div class="form-group my-1 mr-sm-3">
						<label for="numberInput" class="mr-sm-1">
							数量
						</label>
						<input type="text" class="form-control w-75" id="numberInput" onkeyup="value=value.replace(/[^\d]/g,'')" data-cip-id="numberInput">
						<div></div>
					</div>
					</div>
					<div class="d-flex flex-column">
					<div class="form-group my-1 mr-sm-3">
						<label for="numberInput" class="mr-sm-1">
							规格
						</label>
						<input type="text" class="form-control w-75" id="specInput" data-cip-id="specInput">
	                        <div class="input-group-btn" >
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            </ul>
                        </div>

					</div>

					<div class="form-group my-1 mr-sm-3">
						<label for="numberInput" class="mr-sm-1">
							单位
						</label>
						<input type="text" class="form-control w-75" id="unitInput" data-cip-id="unitInput">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            </ul>
                        </div>						
					</div>
					</div>

					<div class="d-flex flex-column">
					<button type="submit" class="btn btn-danger" id="newGoods" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="新增成功！" data-original-title="" title="">
						新增
					</button>

					
					<button type="submit" class="btn btn-primary" id="inGoods" data-toggle="popover" data-trigger="focus" data-placement="left" style="display: none;">
						入库
					</button>
					<button type="submit" class="btn btn-primary my-1" id="outGoods" data-toggle="popover" data-trigger="focus" data-placement="left" style="display: none;">
						出库
					</button>
					</div>
				<!-- </div> -->


			</form>
			<div id="toolbar" class="btn-group">
				<a href="./log.php" target="_blank">
				    <button type="button" class="btn btn-primary mx-2">
				        历史记录
				    </button>
				</a>
			</div>
			<table data-toggle="table" class="table" id="table">
				<thead>
				</thead>
				<tbody>
				</tbody>
			</table>

		</div>
		<div class="col-md-1">
		</div>
	</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap-suggest.js"></script>
<script src="js/bootstrap-table.js"></script>
<script src="js/bootstrap-table-zh-CN.js"></script>
<script src="js/scripts.js"></script>  
</body></html>