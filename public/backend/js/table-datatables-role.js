var TableDatatablesButtons = function () {

    var initTable1 = function () {
        var table = $('#sample_1');

        var fixedHeaderOffset = 0;
        if (App.getViewPort().width < App.getResponsiveBreakpoint('md')) {
            if ($('.page-header').hasClass('page-header-fixed-mobile')) {
                fixedHeaderOffset = $('.page-header').outerHeight(true);
            }
        } else if ($('.page-header').hasClass('navbar-fixed-top')) {
            fixedHeaderOffset = $('.page-header').outerHeight(true);
        }

        var oTable = table.DataTable({
            "language": {
                "processing": "加载中...",
                "lengthMenu": "显示 _MENU_ 项结果",
                "zeroRecords": "没有匹配结果",
                "info": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "infoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "infoFiltered": "(由 _MAX_ 项结果过滤)",
                "infoPostFix": "",
                "search": "搜索: _INPUT_",
                "searchPlaceholder": "搜索...",
                "url": "",
                "emptyTable": "<span style='color: red'>暂时没有数据!</span>",
                "loadingRecords": "载入中...",
                "infoThousands": ",",
                "paginate": {
                    "first": "首页",
                    "previous": "上一页",
                    "next": "下一页",
                    "last": "末页"
                },
                "aria": {
                    "sortAscending": ": 以升序排列此列",
                    "sortDescending": ": 以降序排列此列"
                },
            },
            buttons: [
                { extend: 'print', className: 'btn dark btn-outline',text: '打印' },
                // { extend: 'copy', className: 'btn red btn-outline',text: '复制'  },
                { extend: 'pdf', className: 'btn red btn-outline',text: '导出PDF'  },
                { extend: 'excel', className: 'btn yellow btn-outline ',text: '导出EXCEL'  },
                { extend: 'csv', className: 'btn purple btn-outline ' ,text: '导出CSV' },
                { extend: 'colvis', className: 'btn dark btn-outline', text: '选择栏目'}
            ],
            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            //"ordering": false, disable column ordering
            //"paging": false, disable pagination
            fixedHeader: {
                header: true,
                headerOffset: fixedHeaderOffset
            },
            "columnDefs": [
                {
                    orderable: false,
                    targets: 5
                },
                // {
                //     orderable: false,
                //     targets: 6
                // },
            ],
            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'><'col-md-6 col-sm-12'>r><'table-scrollable't><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12'l>r><'row'<'col-md-12 col-sm-12'p>>", // horizobtal scrollable datatable
            // "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            "pagingType":   "full_numbers",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"/admin/role/show",
            },
            "columns":[
                { "data": "id" },
                { "data": "name" },
                { "data": "display_name" },
                { "data": "description" },
                { "data": "created_at" },
                {
                    "data": "id",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).html("<a href='javascript:;' class='btn btn-outline btn-circle btn-sm blue'><i class='fa fa-edit'></i> 编辑 </a>");
                            $(nTd).append("<a href='javascript:;' class='btn btn-outline btn-circle dark btn-sm dark'><i class='fa fa-trash-o'></i> 删除 </a>");
                            $(nTd).append("<a href='javascript:;' class='btn btn-outline btn-circle red btn-sm blue'><i class='fa fa-share'></i> 分享 </a>");
                            $(nTd).append("<a href='javascript:;' class='btn green btn-sm btn-outline btn-circle uppercase'><i class='fa fa-share'></i> 查看 </a>");
                    }
                },
            ],



        });
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            initTable1();
        }

    };

}();

jQuery(document).ready(function() {
    TableDatatablesButtons.init();
});