@extends('layout.backend.master')

{{-- Title --}}
@section('title')
    Thêm mới danh mục bài đăng
@endsection
{{-- end Title --}}

{{-- vendorCSS --}}
@section('vendorCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection
{{-- end vendorCSS --}}

{{-- pageCSS --}}
@section('pageCSS')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endsection
{{-- end pageCSS --}}

{{-- vendorJS --}}
@section('vendorJS')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@endsection
{{-- end vendorJS --}}

{{-- pageJS --}}
@section('pageJS')
    @include('backend.category.customJS')
@endsection
{{-- end pageJS --}}

{{-- content-header --}}
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0 text-capitalize">Thêm mới</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a class="text-capitalize" href="{{ route('admin.category.index') }}">Danh
                            mục</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize active">Thêm mới
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection
{{-- end content-header --}}

{{-- content-body --}}
@section('content-body')
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm mới danh mục</h4>
                    </div>
                    <div class="card-body">
                        <form id="category-form" method="post" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Tiêu đề danh mục</label>
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">Mô tả danh mục</label>
                                <input type="text" class="form-control" id="description" name="description" />
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Danh mục cha</label>
                                <select class="form-control select2" id="parent_id" name="parent_id">
                                    <option value="">Select Value</option>
                                    <option value="0">Là danh mục cha</option>
                                    @foreach ($parentCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                        @if (count($category->subcategory))
                                            @include('backend.category.subCategoryCreate', ['subcategories' =>
                                            $category->subcategory, 'newDashes' => '|--- '])
                                        @endif
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="d-block" for="meta_keyword">Meta Keyword (SEO)</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="d-block" for="meta_description">Meta Description (SEO)</label>
                                <textarea class="form-control" id="meta_description" name="meta_description"
                                    rows="3"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="submit" value="Submit">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- end content-body --}}
