@extends('layout.backend.master')

{{-- Title --}}
@section('title')
    Danh sách danh mục bài đăng
@endsection
{{-- end Title --}}

{{-- vendorCSS --}}
@section('vendorCSS')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
{{-- end vendorCSS --}}

{{-- vendorJS --}}
@section('vendorJS')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection
{{-- end vendorJS --}}

{{-- pageJS --}}
@section('pageJS')
    <script src="{{ asset('app-assets/custom.js') }}"></script>
    <script>
        var url_delete_item = "{{ route('admin.category.multiDestroy') }}";
        var click_mode = 0;
        var oTable = $('#tbList').dataTable({
            "bServerSide": true,
            "bProcessing": true,
            "sDom": ' r <"row" <"col-md-12"l> <"col-md-6 datatable-info-custom"i> <"col-md-6 text-right"p> <"col-md-12"t> <"col-md-6 datatable-info-custom"i> <"col-md-6 text-right"p> >',
            "sPaginationType": "full_numbers",
            "sAjaxSource": "{{ route('admin.category.getList') }}",
            "bDeferRender": true,
            "bLengthChange": false,
            "bFilter": false,
            "bDestroy": true,
            "iDisplayLength": 20,
            "bSort": true,
            "aaSorting": [
                [5, "desc"]
            ],
            "aoColumns": [{
                    "sClass": "center",
                    "bSortable": false
                },
                {
                    "sClass": "center",
                    "bSortable": false
                },
                {
                    "sClass": "center",
                },
                {
                    "sClass": "center",
                    "bSortable": false
                },
                {
                    "sClass": "center",
                    "bSortable": false
                },
                {
                    "sClass": "center"
                },
                {
                    "sClass": "center"
                },
                {
                    "sClass": "center",
                    "bSortable": false
                }
            ],
            "fnServerParams": function(aoData) {
                if (click_mode == 0) {
                    aoData.push({
                        "name": "search[name]",
                        "value": $('#frmSearch input[name="search[name]"]').val()
                    });
                    aoData.push({
                        "name": "search[status]",
                        "value": $('#frmSearch select[name="search[status]"]').val()
                    });
                }
            }
        });

        $(document).ready(function() {
            $('#btnFrmSearch').on('click', function() {
                click_mode = 0;
                oTable.fnDraw();
            });

            $('#btnReset').on('click', function() {
                click_mode = 1;
                oTable.fnDraw();
            });
        });

    </script>
@endsection
{{-- end pageJS --}}

{{-- content-header --}}
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0 text-capitalize">Danh sách</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a class="text-capitalize"
                            href="{{ route('admin.category.index') }}">Danh
                            mục</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize active">Danh sách
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection
{{-- end content-header --}}

{{-- content-body --}}
@section('content-body')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">

                <div class="mb-1">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary glow invoice-create"
                        role="button" aria-pressed="true">Thêm Mới</a>

                    <a href="{{ route('admin.category.recycle') }}" class="btn btn-secondary glow invoice-create"
                        role="button" aria-pressed="true">Thùng rác</a>

                    <button id="btnDeleteAll" class="btn btn-danger confirm-text" type="button">
                        Xóa Hết
                    </button>
                </div>

                <form onsubmit="return false;" method="GET" id="frmSearch">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Tiêu đề danh mục</label>
                                        <input type="text" class="form-control" name="search[name]" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select name="search[status]" class="custom-select">
                                            <option value="">Select Value</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-sm btn-primary" type="submit" id="btnFrmSearch">
                                        <i class="bx bx-search"></i>
                                        Search
                                    </button>

                                    <button class="btn btn-sm btn-warning" type="reset" id="btnReset">
                                        <i class="bx bx-reset"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <form id="frmTbList" method="post">
                                @csrf
                                <table class="table category-table dt-responsive nowrap" id="tbList" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th><input type="checkbox" id="chkAll"></th>
                                            <th>Tiêu đề danh mục</th>
                                            <th>Danh mục cha</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày sửa</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- end content-body --}}
