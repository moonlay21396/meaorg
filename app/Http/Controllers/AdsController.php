<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Ads_webpage;
use App\CustomClass\AdsData;
use App\CustomClass\Path;
use App\Webpage;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webpages = Webpage::all();

        return view('admin.site_admin.admin.ads')->with([
            'url'=>'ads',
            'webpages'=>$webpages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoname = uniqid() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path() . '/upload/ads/', $photoname);
            $webpages = $request->get('webpage_id');
            $link = $request->get('link');
            $s_date = $request->get('s_date');
            $e_date = $request->get('e_date');

            $ads_id = Ads::create([
                'photo'=>$photoname,
                'link'=>$link,
                's_date'=>$s_date,
                'e_date'=>$e_date,
            ])->id;

            foreach ($webpages as $webpage) {
                Ads_webpage::create([
                    'ads_id'=>$ads_id,
                    'webpage_id'=>$webpage
                ]);
            }

           // return $webpages;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads_obj = new AdsData($id);
        $ads = $ads_obj->getAdsData();
        return json_encode($ads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = uniqid().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('upload/ads/'),$photo_name);
            $ads = Ads::find($id);
            $image_path=public_path().'/upload/ads/'.$ads->photo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            Ads::findOrFail($id)->update([
                'photo'=>$photo_name,
                'link'=>$request->get('link'),
                's_date'=>$request->get('s_date'),
                'e_date'=>$request->get('e_date'),
            ]);
            Ads_webpage::where('ads_id',$id)->delete();
            foreach ($request->get('webpage_id') as $webpage) {
                Ads_webpage::create([
                    'ads_id'=>$id,
                    'webpage_id'=>$webpage
                ]);
            }
        }else {
            Ads::findOrFail($id)->update([
                'link'=>$request->get('link'),
                's_date'=>$request->get('s_date'),
                'e_date'=>$request->get('e_date'),
            ]);
            Ads_webpage::where('ads_id',$id)->delete();
            foreach ($request->get('webpage_id') as $webpage) {
                Ads_webpage::create([
                    'ads_id'=>$id,
                    'webpage_id'=>$webpage
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::find($id);
        $image_path=public_path().'/upload/ads/'.$ads->photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $ads->delete();
        Ads_webpage::where('ads_id',$id)->delete();
    }

    public function get_all_ads()
    {
        $ads_list = Ads::orderBy('id','desc')->get();
        $arr=[];
        foreach ($ads_list as $data) {
            $ads_data = new AdsData($data->id);
            array_push($arr, $ads_data->getAdsData());
        }
        return json_encode($arr);
    }

    static function ads_by_page($page_id,$limit){
        $ads_webpage=Ads_webpage::where('webpage_id',$page_id)->get()->random($limit);
        $ads_arr=[];
        foreach ($ads_webpage as $data){
            $ads=Ads::findOrFail($data->ads_id);
            array_push($ads_arr,$ads);
        }
        $ads_arr=AdsController::show_ads($ads_arr);
        //$active_ads=self::filter_active_ads($ads_arr);
        return $ads_arr;
    }


    public static function filter_active_ads($arr){
        $active_ads=[];
        foreach ($arr as $ads){
            if($ads['status']=="success" || $ads['status']=="warning"){
                array_push($active_ads,$ads);
            }
        }
        return $active_ads;
    }


    private static function show_ads($ads){
        foreach ($ads as $data){
            $data['photo_url']=Path::$domain_url.'upload/ads/'.$data->photo;

//            $arr=[];
//            foreach ($data->webpage as $webpage){
//                $page=Webpage::findOrFail($webpage->webpage_id);
//                array_push($arr,$page->name);
//            }
//            $data['webpage_name']=$arr;
           //compare date
            $today = date('Y-m-d');
            if($today>=$data['s_date'] && $today<=$data['e_date']){
                if(date('Y-m-d',strtotime("+10 day"))>=$data['e_date']){
                    $status="warning";
                }
                else{
                    $status='success';
                }
            }
            else if($data['s_date']>$today){
                $status='primary';
            }
            else{
                $status='danger';
            }

            $data['status']=$status;
        }
        return $ads;
    }



}
