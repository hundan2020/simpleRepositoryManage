$(tableReload());

function tableReload() {
	$('#table').bootstrapTable({
	    url: 'history.php',
	    sortOrder: 'desc',
	    search: true,
	    silentSort: true,
	    pagination:true,
	    // dataField: "res",
	    pageNumber: 1,
	    pageSize:10,
	    sidePagination:'server',
	    pageList:[5,10,20,30],
	    showRefresh:true,
	    locale:'zh-CN',

	    checkboxHeader: false,
	    height: document.body.clientHeight-165,
	    cache: false,
	    idField: "id",
	    columns: [{
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
	        field: 'do',
	        align: "center",
	        title: '操作'
	    }, {
	    	sortable: true,
	        field: 'count',
	        align: "center",
	        title: '数量'
	    }, {
	    	sortable: true,
	        field: 'dc_count',
	        align: "center",
	        title: '当时库存'
	    }, {
	    	sortable: true,
	        field: 'di_count',
	        align: "center",
	        title: '总计入库'
	    }, {
	    	sortable: true,
	        field: 'do_count',
	        align: "center",
	        title: '总计出库'
	    }, {
	    	sortable: true,
	        field: 'time',
	        align: "center",
	        title: '操作时间'
	    },
	    ]
	});
	$('#table').bootstrapTable('hideColumn', 'id');
}