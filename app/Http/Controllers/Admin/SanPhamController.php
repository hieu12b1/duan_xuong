<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = " sản phẩm";
        $listSanPham = SanPham::orderByDesc('is_type')->get();
        return view('admins.sanphams.index', compact('title', 'listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = " thêm sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();
        return view('admins.sanphams.create', compact('title', 'listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');

            // dd($params);
            $params['is_new'] = $request->has('is_new') ? 1 : 0;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $params['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
            $params['is_show_home'] = $request->has('is_show_home') ? 1 : 0;

            if ($request->hasFile('hinh_anh')) {
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            } else {
                $params['hinh_anh'] = null;
            }

            $sanPham = SanPham::query()->create($params);
            return redirect()->route('admins.sanphams.index')->with('success', 'thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Cập nhật sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();

        $sanPham = SanPham::findOrFail($id);

        return view('admins.sanphams.edit', compact('title', 'listDanhMuc', 'sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token','_method');

            // dd($params);
            $params['is_new'] = $request->has('is_new') ? 1 : 0;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $params['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
            $params['is_show_home'] = $request->has('is_show_home') ? 1 : 0;

            $sanPham = SanPham::query()->findOrFail($id);

            if ($request->hasFile('hinh_anh')) {
                if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            } else {
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }

            $sanPham = SanPham::query()->create($params);
            return redirect()->route('admins.sanphams.index')->with('success', 'thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::findOrFail($id);

        if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }
        
        $sanPham->hinhAnhSanPham->delete();
        $sanPham->delete();
        return redirect()->route('admins.sanphams.index')->with('success', 'thành công');
    }
}
