@extends('layouts.admin')
@section('content')

@section('title')
{{$title}}
@endsection

@section('css')
<link href="{{asset('assets/admin/libs/quill/quill.core.js')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
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
                            <form action="{{ route('admins.sanphams.update',$sanPham->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="ma_san_pham" class="form-label">Mã sản phẩm </label>
                                            <input type="text" id="ma_san_pham" name="ma_san_pham"
                                                class="form-control @error('ma_san_pham') is-invalid @enderror"
                                                value="{{ $sanPham->ma_san_pham }}" placeholder="ma_san_pham">
                                            @error('ma_san_pham')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="ten_san_pham" class="form-label">Tên sản phẩm </label>
                                            <input type="text" id="ten_san_pham" name="ten_san_pham"
                                                class="form-control @error('ten_san_pham') is-invalid @enderror"
                                                value="{{$sanPham->ten_san_pham}}" placeholder="ten_san_pham">
                                            @error('ten_san_pham')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gia_san_pham" class="form-label">Giá sản phẩm </label>
                                            <input type="number" id="gia_san_pham" name="gia_san_pham"
                                                class="form-control @error('gia_san_pham') is-invalid @enderror"
                                                value="{{$sanPham->gia_san_pham}}" placeholder="gia_san_pham">
                                            @error('gia_san_pham')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gia_khuyen_mai" class="form-label">Giá khuyến mãi </label>
                                            <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai"
                                                class="form-control @error('gia_khuyen_mai') is-invalid @enderror"
                                                value="{{$sanPham->gia_khuyen_mai}}" placeholder="gia_khuyen_mai">
                                            @error('gia_khuyen_mai')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="danh_muc_id" class="form-label">Danh mục </label>
                                            <select name="danh_muc_id"
                                                class="form-select @error('danh_muc_id') is-invalid @enderror">
                                                <option selected> Chọn danh mục</option>
                                                @foreach ($listDanhMuc as $item)
                                                <option value="{{$item->id}}"
                                                    {{$sanPham->danh_muc_id ==$item->id ?'selected' : '' }}>
                                                    {{$item->ten_danh_muc}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('danh_muc_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="so_luong" class="form-label">Số Lượng</label>
                                            <input type="number" id="so_luong" name="so_luong"
                                                class="form-control @error('so_luong') is-invalid @enderror"
                                                value="{{$sanPham->so_luong}}" placeholder="so_luong">
                                            @error('so_luong')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                            <input type="date" id="ngay_nhap" name="ngay_nhap"
                                                class="form-control @error('ngay_nhap') is-invalid @enderror"
                                                value="{{$sanPham->ngay_nhap}}" placeholder="ngay_nhap">
                                            @error('ngay_nhap')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="mo_ta_ngan" class="form-label">Mô tả ngắn </label>
                                            <textarea type="text" id="mo_ta_ngan" name="mo_ta_ngan"
                                                class="form-control @error('mo_ta_ngan') is-invalid @enderror"
                                                value="{{$sanPham->mo_ta_ngan}}" placeholder="mo_ta_ngan">
                                               </textarea>
                                            @error('mo_ta_ngan')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                            @enderror
                                        </div>



                                        <label for="is_type" class="form-label">Trạng thái</label>
                                        <div class="mb-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="radio" value="1"
                                                    {{$sanPham->is_type == 1  ? 'checked' : '' }}
                                                        id="firstCheckbox" name="is_type" checked>
                                                    <label class="form-check-label" for="firstCheckbox">hiển thị
                                                    </label>
                                                </li>
                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="radio" value="0"
                                                        id="secondCheckbox" name="is_type"
                                                        {{$sanPham->is_type == 0  ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="secondCheckbox">
                                                        ẩn</label>
                                                </li>
                                            </ul>
                                        </div>

                                        <label for="is_type" class="form-label">Điều chỉnh khác</label>
                                        <div class=" form-switch mb-2 ps-3 ">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_new"
                                                    name="is_new"  {{$sanPham->is_new == 1  ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_new">new</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_hot"
                                                    name="is_hot" {{$sanPham->is_hot == 1  ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_hot"> hot</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_hot_deal"
                                                    name="is_hot_deal" {{$sanPham->is_hot_deal == 1  ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_hot_deal">hot_deal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_show_home"
                                                    name="is_show_home" {{$sanPham->is_show_home == 1  ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_show_home">show_home</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <label for="example-select" class="form-label">Mô tả chi tiết ảnh</label>
                                        <div class="mb-3">
                                            <div id="quill-editor" style="height: 100px;">
                                                <h1>Nhập mô tả chi tiết</h1>
                                            </div>
                                            <textarea name="noi_dung" id="noi_dung_content" class="d-none" cols="30"
                                                rows="10"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Hình ảnh</label>
                                            <input type="file" id="hinh_anh" name="hinh_anh" class="form-control"
                                                onchange="showImage(event)">
                                            <img src="{{Storage::url($sanPham->hinh_anh)}}" id="img_danh_muc" alt="ảnh sản phẩm"
                                                style="with:150px">
                                        </div>
                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">album ảnh</label>
                                            <i class="mdi mdi-plus text-muted fs-18 rounded-2 border p-1"
                                                style="cursor:pointer">
                                            </i>
                                            <table class="table align-middle table-nowrap mb-0">
                                                <tbody id="image-table-body">
                                                    <tr>
                                                        <td class="d-flex align-items-center">
                                                            <img src="" id="preview_0" alt="ảnh sản phẩm"
                                                                style="with:50px">
                                                            <input type="file" id="hinh_anh" name="hinh_anh"
                                                                class="form-control" onchange="previewImage(this,0)">
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"
                                                                style="cursor:pointer" onclick="removeRow(this)">
                                                            </i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary">submit</button>
                                        </div>
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
<script src="{{asset('assets/admin/libs/quill/quill.core.js')}}"></script>
<script src="{{asset('assets/admin/libs/quill/quill.min.js')}} "></script>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var quill = new Quill("#quill-editor", {
             theme: "snow",
})
var old_content = `(!! $sanPham->noi_dung!!)`
quill.root.innerHTML = old_content

quill.on('text-change', function(){
    var html = quill.root.innerHTML;
    document.getElementById('noi_dung_content').value = html;
})
})

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var rowCount = 1 ;
         var newRow = document.createdElement("tr");
         newRow.innerHTML = `<td class="d-flex align-items-center">
            <img src=""id="preview_$(rowCount)" alt="ảnh sản phẩm" style="with:50px">
            <input type="file" id="hinh_anh" name="hinh_anh"
            class="form-control" onchange="previewImage(this,0)">
            </td>
            <td>
            <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor:pointer" onclick="removeRow(this)"></i>
            </td>`;

            tableBody.appendChild(newRow);
            rowCount++;

     });
//      function previewImage(input , rowCount){
//         if(input.files $$ input.files[0]){
//             const reader = new FileReader();
//         reader.onload = function () {
//           document.getElementById(`preview_$(rowIndex)`).setAttribute('src',e.target.result);
//         }

//             reader.readAsDataURL(input.files[0]);

//         }
//      }
// </script>

@endsection
