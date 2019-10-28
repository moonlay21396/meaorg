<?php

namespace App\Http\Controllers;

use App\AdminGallery;
use App\Blog;
use App\Company;
use App\CustomClass\BlogData;
use App\CustomClass\CompanyData;
use App\CustomClass\Path;
use App\CustomClass\SubcategoryData;
use App\CustomClass\WebSiteInfo;
use App\CustomClass\WebSiteInfoData;
use App\Event;
use App\SubCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Contact;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function test(){
       $ads=AdsController::ads_by_page(1);
       return $ads;

    }

    function show_view(){
        $gallery=AdminGallery::all();
        $web_info = \App\WebSiteInfo::all();
        return view('admin.site_admin.admin.admin_gallery')->with([
            'url' => 'gallery',
            'web_info' => $web_info,
            'gallery'=>$gallery
        ]);
    }

    function all_admin_gallery(){
        $gallery=AdminGallery::all();
        $arr=[];
        foreach ($gallery as $item){
            $item['photo_url']=Path::$domain_url."upload/admin_gallery/".$item['photo'];
            array_push($arr,$item);
        }
        return $arr;
    }

    function insert_gallery(Request $request){
        $logo = $request->file('photo');
        $logoName = uniqid() . '_' . $logo->getClientOriginalName();
        $logo->move(public_path() . '/upload/admin_gallery/', $logoName);
        AdminGallery::create([
            'photo'=>$logoName,
            'title'=>$request->get('title')
        ]);
    }

    function delete_gallery($id){
        $data = AdminGallery::find($id);
        $image_path=public_path().'/upload/admin_gallery/'.$data->photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->delete();
    }

    function get_sub_category($id){
        $sub=SubCategory::where('main_id',$id)->get();
        $sub_categories=SubcategoryData::getCustomLimitSubCategory($sub);
        return $sub_categories;
    }

    public function store(Request $request){
        Contact::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'subject'=>$request->get('subject'),
            'message'=>$request->get('message')
        ]);

        return redirect('contact')->with('msg','success');


    }


}
