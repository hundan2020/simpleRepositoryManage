$(tableReload());

function tableReload() {
	$('#table').bootstrapTable({
	    url: 'goods.php',
	    search: true,
	    sortable: true,
	    checkboxHeader: false,
	    sortOrder: 'desc',
	    pagination:true,
	    showRefresh:true,
	    height: document.body.clientHeight-165,
	    cache: false,
	    toolbar: '#toolbar',
	    toolbarAlign: 'right',
	    locale:'zh-CN',
	    idField: "id",
	    columns: [{
	    	sortable: true,
	        field: 'id',
	        align: "center",
	        title: 'ID'
	    }, {
	    	sortable: true,
	        field: 'name',
	        align: "center",
	        title: '货物'
	    }, {
	    	sortable: true,
	        field: 'spec',
	        align: "center",
	        title: '规格'
	    }, {
	    	sortable: true,
	        field: 'unit',
	        align: "center",
	        title: '单位'
	    }, {
	    	sortable: true,
	        field: 'c_count',
	        align: "center",
	        title: '当前库存'
	    }, {
	    	sortable: true,
	        field: 'i_count',
	        align: "center",
	        title: '入库总数'
	    }, {
	    	sortable: true,
	        field: 'o_count',
	        align: "center",
	        title: '出库总数'
	    }, {
	        field: 'delete',
	        align: "center",
	        title: '删除'
	    }, 
	    ]
	});
	// $('#table').bootstrapTable('hideColumn', 'id');
}

(function() {

    /**
     * 测试(首次从 URL 获取数据，显示 header，不显示按钮，忽略大小写，可清除)
     */
    $("#goodsInput").bsSuggest({
        url: "apis.php?do=select_g&name=",
        effectiveFieldsAlias:{name: "货物"},
        ignorecase: true,
        showHeader: false,
        effectiveFields: ['name'],
        inputWarnColor: '#67ffa9',
		listStyle: {
	        'padding-top': 0,
	        'margin-top': '20px',
	        'max-height': '375px',
	        'max-width': '500px',
	        'overflow': 'auto',
	        'width': 'auto',
	        'transition': '0.3s',
	        '-webkit-transition': '0.3s',
	        '-moz-transition': '0.3s',
	        '-o-transition': '0.3s'
	    }, 
        getDataMethod: 'url',
        showBtn: false,     //是否显示下拉按钮
        delayUntilKeyup: false, //获取数据的方式为 firstByUrl 时，延迟到有输入/获取到焦点时才请求数据
        idField: "id",
        keyField: "name",
        clearable: true
    }).on('onDataRequestSuccess', function (e, result) {
        console.log('onDataRequestSuccess: ', result);
    }).on('onSetSelectValue', function (e, keyword, data) {
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });

    $("#specInput").bsSuggest({
        url: "apis.php?do=select_s&spec=",
        // effectiveFieldsAlias:{name: "货物"},
        ignorecase: true,
        showHeader: false,
        inputWarnColor: '#67ffa9',        
        effectiveFields: ['name'],
		listStyle: {
	        'padding-top': 0,
	        'margin-top': '20px',
	        'max-height': '375px',
	        'max-width': '500px',
	        'overflow': 'auto',
	        'width': 'auto',
	        'transition': '0.3s',
	        '-webkit-transition': '0.3s',
	        '-moz-transition': '0.3s',
	        '-o-transition': '0.3s'
	    }, 
        getDataMethod: 'url',
        showBtn: false,     //是否显示下拉按钮
        delayUntilKeyup: false, //获取数据的方式为 firstByUrl 时，延迟到有输入/获取到焦点时才请求数据
        idField: "id",
        keyField: "name",
        clearable: true
    }).on('onDataRequestSuccess', function (e, result) {
        console.log('onDataRequestSuccess: ', result);
    }).on('onSetSelectValue', function (e, keyword, data) {
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });

    $("#unitInput").bsSuggest({
        url: "apis.php?do=select_u&unit=",
        // effectiveFieldsAlias:{name: "货物"},
        ignorecase: true,
        inputWarnColor: '#67ffa9',
        showHeader: false,
        effectiveFields: ['name'],
		listStyle: {
	        'padding-top': 0,
	        'margin-top': '20px',
	        'max-height': '375px',
	        'max-width': '500px',
	        'overflow': 'auto',
	        'width': 'auto',
	        'transition': '0.3s',
	        '-webkit-transition': '0.3s',
	        '-moz-transition': '0.3s',
	        '-o-transition': '0.3s'
	    }, 
        getDataMethod: 'url',
        showBtn: false,     //是否显示下拉按钮
        delayUntilKeyup: false, //获取数据的方式为 firstByUrl 时，延迟到有输入/获取到焦点时才请求数据
        idField: "id",
        keyField: "name",
        clearable: true
    }).on('onDataRequestSuccess', function (e, result) {
        console.log('onDataRequestSuccess: ', result);
    }).on('onSetSelectValue', function (e, keyword, data) {
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });

    /**
     * 从 data参数中过滤数据
    //  */
    // var dataList = {value: []}, i = 5001;
    // while(i--) {
    //     dataList.value.push({
    //         id: i,
    //         word: Math.random() * 100000,
    //         description: 'http://lzw.me'
    //     });
    // }

    //禁用表单提交
    $("form").submit(function() {
        return false;
    });
}());

function del_id (locate) {
	var id = locate.parent().siblings().first().text();
	var x = confirm("删除该货物？");
	if (x) {
		$.get("apis.php?do=del&id="+id);
		tableReflush();
	}
}

$(setInterval(function(){
	var r = $('#goodsInput').attr('data-id') > 0;
	r =  r && ($('#specInput').attr('data-id') > 0);
	r =  r && ($('#unitInput').attr('data-id') > 0);
	if (r) {
		$.post("./apis.php", {
			do: 'check_exist',
			name: $('#goodsInput').val(),
			spec: $('#specInput').val(),
			unit: $('#unitInput').val()
		}, function(data){
			if (data['msg'] > 0) {
				$('#newGoods').hide();
				$('#inGoods').show();
				$('#outGoods').show();
			}else{
				$('#inGoods').hide();
				$('#outGoods').hide();
				$('#newGoods').show();
			}
		});
	}else{
		$('#inGoods').hide();
		$('#outGoods').hide();
		$('#newGoods').show();
	}
}, 1000));

$('#newGoods').click(function() {
	$.post('./apis.php', {
		do: 'new_add',
		name: $('#goodsInput').val(),
		spec: $('#specInput').val(),
		unit: $('#unitInput').val(),
		count: $('#numberInput').val()
	}, function(success){
		alert('新增成功！');
		tableReflush();
	});
});

$('#inGoods').click(function() {
	$.post('./apis.php', {
		do: 'in',
		name: $('#goodsInput').val(),
		spec: $('#specInput').val(),
		unit: $('#unitInput').val(),
		count: $('#numberInput').val()
	}, function(success){
		alert('入库完成！');
		tableReflush();
	});
});

$('#outGoods').click(function() {
	$.post('./apis.php', {
		do: 'out',
		// id: $('#goodsInput').attr('data-id'),
		name: $('#goodsInput').val(),
		spec: $('#specInput').val(),
		unit: $('#unitInput').val(),
		count: $('#numberInput').val()
	}, function(success){
		alert('出库完成！');
		tableReflush();
	});
});

function tableReflush() {
	$.get('./goods.php',
		function(data){
			$("#table").bootstrapTable('refresh',data);
	});
}