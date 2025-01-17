<?php

use Illuminate\Support\Facades\Route;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Filesystem\FilesystemAdapter;

/**
 * Lưu hình ảnh và trả về đường dẫn.
 *
 * @param string $inputName
 * @param string $directory
 * @return string|null
 */
function saveImages($request, string $inputName, string $directory = 'images', $width = 150, $height = 150, $isArray = false)
{
    $paths = [];

    // Kiểm tra xem có file không
    if ($request->hasFile($inputName)) {
        // Lấy tất cả các file hình ảnh
        $images = $request->file($inputName);

        if (!is_array($images)) {
            $images = [$images]; // Đưa vào mảng nếu chỉ có 1 ảnh
        }

        // Tạo instance của ImageManager
        $manager = new ImageManager(new Driver());

        foreach ($images as $key => $image) {
            // Đọc hình ảnh từ đường dẫn thực
            $img = $manager->read($image->getPathName());

            // Thay đổi kích thước
            $img->resize($width, $height);

            // Tạo tên file duy nhất
            $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();

            // Lưu hình ảnh đã được thay đổi kích thước vào storage
            Storage::disk('public')->put($directory . '/' . $filename, $img->encode());

            // Lưu đường dẫn vào mảng
            $paths[$key] = $directory . '/' . $filename;
        }

        // Trả về danh sách các đường dẫn
        return $isArray ? $paths : $paths[0];
    }

    return null;
}

function saveImage($request, string $inputName, string $directory = 'images')
{
    if ($request->hasFile($inputName)) {
        $image = $request->file($inputName);
        $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($directory . '/' . $filename, file_get_contents($image->getPathName()));
        return $directory . '/' . $filename;
    }
}

function showImage($path)
{
    /** @var FilesystemAdapter $storage */
    $storage = Storage::disk('public');

    if ($path && Storage::exists($path)) {
        return $storage->url($path);
    }

    return asset('frontend/assets/images/no-image.jpg');
}

function deleteImage($path)
{
    if ($path && Storage::disk('public')->exists($path)) {
        Storage::disk('public')->delete($path);
    }
}

function isActiveRoute(array $routes, $output = "active")
{
    if (in_array(Route::currentRouteName(), $routes)) {
        return $output;
    }
}
function isActiveRouteWithParams(array $routes, $output)
{
    $currentRouteName = Route::currentRouteName();
    $currentRouteParams = request()->route()->parameters();

    foreach ($routes as $route) {
        if (is_array($route)) {
            $routeName = $route['name'] ?? null;
            $routeParams = $route['params'] ?? [];

            if ($routeName === $currentRouteName && $routeParams == $currentRouteParams) {
                return $output;
            }
        } else if ($route === $currentRouteName) {
            return $output;
        }
    }

    return '';
}

function saveImagesWithoutResize($request, string $inputName, string $directory = 'images', $isArray = false)
{
    $paths = [];

    // Kiểm tra xem có file không
    if ($request->hasFile($inputName)) {
        // Lấy tất cả các file hình ảnh
        $images = $request->file($inputName);

        if (!is_array($images)) {
            $images = [$images]; // Đưa vào mảng nếu chỉ có 1 ảnh
        }

        foreach ($images as $key => $image) {
            // Tạo tên file duy nhất
            $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();

            // Lưu ảnh vào storage
            Storage::disk('public')->putFileAs($directory, $image, $filename);

            // Lưu đường dẫn vào mảng
            $paths[$key] = $directory . '/' . $filename;
        }

        // Trả về danh sách các đường dẫn
        return $isArray ? $paths : $paths[0];
    }

    return null;
}
