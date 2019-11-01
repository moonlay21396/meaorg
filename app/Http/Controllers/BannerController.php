<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    public function index(){
        $banner = Banner::orderBy('id', 'desc')->get();
        $arr = [];
        foreach ($banner as $banner_data) {
            array_push($arr, $banner_data);
        }
        // return $arr;
        return view('admin.site_admin.admin.banner')->with([
            'url' => 'banner',
            'banner' => $arr
        ]);
    }
    public function insert_banner(Request $request){
        if ($photo = $request->file('photos')) {
            foreach ($photo as $photo_data) {
                $photoName = uniqid() . '_' . $photo_data->getClientOriginalName();
                $photo_data->move(public_path() . '/upload/banner/', $photoName);
                Banner::create([
                    'photos' => $photoName
                ]);
            }
        }else{
            echo "NO IMAGE";
        }
    }
    public function delete_banner($id){
        $delete_banner = Banner::find($id);
        $image_path = public_path() . '/upload/banner/' . $delete_banner->photos;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $delete_banner->delete();
    }
   
}
