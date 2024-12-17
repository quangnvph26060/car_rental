<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::query()->latest()->get();
        return view('admin.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate(
            [
                'title' => 'required|min:3|unique:albums',
                'images' => 'nullable|array',
                'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            __('request.messages'),
            [
                'title' => 'Tiêu đề',
                'images' => 'Ảnh'
            ]
        );

        if ($request->hasFile('images')) {
            $credentials['album'] = saveImagesWithoutResize($request, 'images', 'albums', true);
        }

        Album::create($credentials);

        toastr()->success('Thêm mới thành công.');

        return redirect()->route('admin.album.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $albums  = collect($album->album)->map(function ($item, $key) {
            return [
                'id' => $key + 1,
                'src' => showImage($item)
            ];
        });


        return view('admin.album.edit', compact('album', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $credentials = $request->validate(
            [
                'title' => 'required|min:3|unique:albums,title,' . $album->id,
                'images' => 'nullable|array',
                'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            __('request.messages'),
            [
                'title' => 'Tiêu đề',
                'images' => 'Ảnh',
            ]
        );

        if ($request->old) {
            foreach ($album->album as $key => $item) {
                if (isset($request->old[$key])) {
                    $credentials['album'][] = $item;
                } else {
                    deleteImage($item);
                }
            }
        }

        if ($request->hasFile('images')) {
            $newImages = saveImagesWithoutResize($request, 'images', 'albums', true);
            $credentials['album'] = array_merge($credentials['album'] ?? [], $newImages);
        }

        $album->update($credentials);

        toastr()->success('Cập nhật thành công.');

        return redirect()->route('admin.album.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if ($album->delete()) {
            foreach ($album->album as $item) {
                deleteImage($item);
            }
        }

        toastr()->success('Xóa thành công.');

        return redirect()->route('admin.album.index');
    }
}
