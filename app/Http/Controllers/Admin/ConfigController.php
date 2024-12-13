<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isNull;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::first();
        return view('admin.config.index', compact('config'));
    }
    public function update(ConfigRequest $request)
    {
        $data = $request->validated();
        $logo = saveImage($request, 'logo', 'config');
        $favicon = saveImage($request, 'favicon', 'config');
        $banner = saveImage($request, 'banner', 'config');
        $about_us_image = saveImage($request, 'about_us_image', 'config');
        try {
            $config = Config::first();
            if (!is_null($logo)) {
                deleteImage($config->logo);
                $data['logo'] = $logo;
            }
            if (!is_null($favicon)) {
                deleteImage($config->favicon);
                $data['favicon'] = $favicon;
            }
            if (!is_null($banner)) {
                deleteImage($config->banner);
                $data['banner'] = $banner;
            }
            if (!is_null($about_us_image)) {
                deleteImage($config->about_us_image);
                $data['about_us_image'] = $about_us_image;
            }

            // dd($data);
            $config->update($data);
            return redirect()->back()->with('success', 'Cập nhật cấu hình thành công');
        } catch (\Exception $e) {
            deleteImage($logo);
            deleteImage($favicon);
            deleteImage($banner);
            deleteImage($about_us_image);
            Log::info($e->getMessage());
        }
    }

    public function maintenance(Request $request){
        $config = Config::first();
       if($config->maintenance == 1){
         $config->maintenance = 0;
       }else{
         $config->maintenance = 1;
        }

        $config->save();
        return redirect()->back()->with('success', 'Cập nhật cấu hình thành công');
    }
}
