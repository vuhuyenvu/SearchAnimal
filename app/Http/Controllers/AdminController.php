<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use DB;
use Page;
use Session;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Mail;
use Yajra\Datatables\Datatables;
session_start();

class AdminController extends Controller
{
    //
    public function bo(){
        $ds_bo = DB::table('bo')->get();
        $ma_bo_moi_nhat = DB::table('bo')->OrderBy('bo_ma','desc')->first();
        $ma_bo_moi_nhat->bo_ma++;
        $mana = view('admin.home.bo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',$ma_bo_moi_nhat->bo_ma);
        return view('admin.template.master')->with('admin.home.bo',$mana);
    }

    public function them_bo(Request $request){
        $bo = array();
        $bo['bo_ma'] = $request->get('bo_ma');
        $bo['bo_ten'] = $request->get('bo_ten');

        if(DB::table('bo')->insert($bo)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/bo');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/bo');
        }
        
    }

    public function sua_bo(Request $request){
        $bo = array();
        $bo['bo_ten'] = $request->get('bo_ten');

        if(DB::table('bo')->where('bo_ma',$request->get('bo_ma'))->insert($bo)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/bo');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/bo');
        }
        
    }
    public function xoa_bo(Request $request){

        if(DB::table('bo')->where('bo_ma',$request->get('bo_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/bo');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/bo');
        }
        
    }

    public function tim_kiem_bo(Request $request){
        $tu_khoa = $request->get('timbo');
        if($tu_khoa){
            $ds_bo = DB::table('bo')
            ->where('bo_ma','like','%'.$tu_khoa.'%')
            ->orWhere('bo_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_bo = DB::table('bo')->get();
        }
        $ma_bo_moi_nhat = DB::table('bo')->OrderBy('bo_ma','desc')->first();
        $ma_bo_moi_nhat->bo_ma++;
        $mana = view('admin.home.bo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',$ma_bo_moi_nhat->bo_ma);
        return view('admin.template.master')->with('admin.home.bo',$mana);
    }
    
    public function dia_diem(){
        $ds_diadiem = DB::table('diadiem')->get();

        $mana = view('admin.home.dia_diem')->with('ds_diadiem',$ds_diadiem);
        return view('admin.template.master')->with('admin.home.dia_diem',$mana);
    }

    public function ho(){
        $ds_ho = DB::table('ho')->get();

        $mana = view('admin.home.ho')->with('ds_ho',$ds_ho);
        return view('admin.template.master')->with('admin.home.ho',$mana);
    }

    public function gioi(){
        $ds_gioi = DB::table('gioi')->get();

        $mana = view('admin.home.gioi')->with('ds_gioi',$ds_gioi);
        return view('admin.template.master')->with('admin.home.gioi',$mana);
    }


    public function lop(){
        $ds_lop = DB::table('lop')->get();

        $mana = view('admin.home.lop')->with('ds_lop',$ds_lop);
        return view('admin.template.master')->with('admin.home.lop',$mana);
    }
}
