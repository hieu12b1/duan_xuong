@extends('layouts.admin')
@section('content')

@section('title')
{{$title}}
@endsection

@section('css')

@endsection


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục sản phẩm</h4>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-content-center mb-0">{{$title}}</h5>
                            <a href="{{ route('admins.sanphams.create') }}" class="btn btn-success"> Thêm sản phẩm</a>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Danh mục sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Giá khuyến mãi</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    @foreach ($listSanPham as $index =>$item)
                                    <tr>
                                        <th scope="row">{{ $item->ma_san_pham}}</th>
                                        <td>
                                            <img src="{{Storage::url($item->hinh_anh)}}" alt="" width="150px">
                                        </td>
                                        <td>{{ $item->ten_san_pham}}</td>
                                        <td>{{ $item->danhMuc->ten_danh_muc}}</td>
                                        <td>{{ number_format($item->gia_san_pham) }}</td>
                                        <td>{{ empty($item->gia_khuyen_mai) ? 0 :$item->gia_khuyen_mai }}</td>
                                        <td>{{ $item->so_luong}}</td>
                                        <td class="{{ $item->is_type == true ? 'text-success' : 'text-primary'}}">
                                            {{ $item->trang_thai == true ? 'Hiển thi' : 'Ẩn'}}
                                        </td>

                                        <td>
                                            <a href="{{ route('admins.sanphams.edit',$item->id) }}">
                                                <i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1">
                                                </i>
                                            </a>

                                            <form action="{{ route('admins.sanphams.destroy',$item->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('bạn muốn xóa không')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-white">
                                                    <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1">
                                                    </i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tbody>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div> <!-- container-fluid -->
    </div> <!-- content -->

</div>
@endsection
@section('js')

@endsection
