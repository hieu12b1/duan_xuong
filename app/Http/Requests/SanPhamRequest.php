<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ma_san_pham'=>'required|max:10|unique:san_pham,ma_san_pham,'.$this->route('id'),
            'ten_san_pham'=>'required|max:255',
            'hinh_anh'=>'image|mimes:jdg,png,jpeg,gif',
            'gia_san_pham'=>'required|numberic|min:0',
            'gia_khuyen_mai'=>'numberic||min:0|lt:gia_san_pham',
            'mo_ta_ngan'=>'max:255',
            'so_luong'=>'integer|min:0',
            'ngay_nhap'=>'required|date',
            'danh_muc_id'=>'required|exists:danh_muc,id',
        ];
    }
    public function messages(){
        return [
            'ma_san_pham.required'=>'Điền mã sản phẩm',
            'ma_san_pham.max'=>'Không dược quá 10 ký tự',
            'ma_san_pham.unique'=>'Dã tồn tại mã sản phẩm',

            'ten_san_pham.required'=>'Bắt buộc nhập',
            'ten_san_pham.max'=>'Không dược quá 255 ký tự',

            'hinh_anh.image'=>'không hợp lệ',
            'hinh_anh.mimes'=>'không hợp lệ',

            'gia_san_pham.required'=>'Bắt buộc nhập',
            'gia_san_pham.numberic'=>'Phải là số',
            'gia_san_pham.min'=>'Phải là số lơn hơn 0',

            'gia_khuyen_mai.numberic'=>'Phải là số ',
            'gia_khuyen_mai.min'=>'Phải là số lơn hơn hoặc bằng 0',
            'gia_khuyen_mai.lt'=>'Phải nhỏ hơn giá sảnphaamr',


            'mo_ta_ngan.max'=>'Viết quá dài',

            'so_luong.integer'=>'Phải là số ',
            'so_luong.min'=>'Phải là số lơn hơn hoặc bằng 0',

            'ngay_nhap.required'=>'Bắt buộc điền',
            'ngay_nhap.date'=>'Sai định dạng',

            'danh_muc_id.required'=>'Bắt buộc nhập',
            'danh_muc_id.exists'=>'Không hợp lệ',
        ];
    }
}
