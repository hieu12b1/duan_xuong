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

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">{{$title}}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form action="{{ route('admins.danhmucs.update',$danhMuc->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Tên danh mục</label>
                                            <input type="text" id="ten_danh_muc" name="ten_danh_muc"
                                                class="form-control @error('ten_danh_muc') is-invalid @enderror"
                                                value="{{$danhMuc->ten_danh_muc}}" placeholder="ten_danh_muc">
                                            @error('ten_danh_muc')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror

                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Hình ảnh</label>
                                                <input type="file" id="hinh_anh" name="hinh_anh"
                                                    class="form-control" onchange="showImage(event)">
                                        <img src="{{Storage::url($danhMuc->hinh_anh)}}" id="img_danh_muc" alt="ảnh sản phẩm" style="with:1500px">

                                            </div>
                                            <label for="trang_thai" class="form-label">Trạng thái</label>
                                            <div class="mb-3">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="radio" value="1" {{$danhMuc->trang_thai == 1 ? 'checked' : ''}}
                                                            id="firstCheckbox" name="trang_thai" checked>
                                                        <label class="form-check-label" for="firstCheckbox">hiển thị
                                                        </label>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <input class="form-check-input me-1" type="radio" value="0" {{$danhMuc->trang_thai == false ? 'checked' : ''}}
                                                            id="secondCheckbox" name="trang_thai">
                                                        <label class="form-check-label" for="secondCheckbox">
                                                            ẩn</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary">submit</button>
                                        </div>
                            </form>
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
<script>
    function showImage(event){
        const image_san_pham = document.getElementById('img_danh_muc');
        const file = event.target.files[0]

        const reader = new FileReader();
        reader.onload = function () {
            image_san_pham.src = reader.result;
            image_san_pham.style.display = 'block';
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
