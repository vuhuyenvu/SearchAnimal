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
use Illuminate\Support\Collection;
session_start();

class AdminController extends Controller
{

    public function AuthLogin(){
        $admin = Session::get('ad_ma');
        if($admin){
            return Redirect::to('/admin-dashboard');
        }
        else{
            return Redirect::to('/admin-login')->send();
        }
    }

    public function log_out_admin(){
        Session::put('ad_ma',null);
        return Redirect::to('/admin-login');
    }

    public function admin_login(){
        return view('admin.home.admin_login');
    }



    public function dang_nhap_admin(Request $request){
        $sdt = $request->get('sdt');
        $mk = md5($request->get('mk'));
        if(DB::table('admin')->where('ad_sdt',$sdt)->where('ad_mk',$mk)->count() > 0){
            $ad = DB::table('admin')->where('ad_sdt',$sdt)->where('ad_mk',$mk)->first();
            Session::put('ad_ma',$ad->ad_ma);
            return Redirect::to('/admin-dashboard');
        }
        else{
            return Redirect::to('/admin-login');
        }
    }

    public function index(){
        $this->AuthLogin();
        $cnt_dv = DB::table('dongvat')->count();
        $cnt_gioi = DB::table('gioi')->count();
        $cnt_bo = DB::table('bo')->count();
        $user = DB::table('user')->count();

        return view('admin.home.index')->with('cnt_dv',$cnt_dv)->with('cnt_gioi',$cnt_gioi)->with('cnt_bo',$cnt_bo)->with('cnt_user',$user);
    }
    //
    public function bo(){
        $this->AuthLogin();
        $ds_bo = DB::table('bo')->get();
        $ma_bo_moi_nhat = DB::table('bo')->OrderBy('bo_ma','desc')->first();
        $cnt_bo_ma = DB::table('bo')->count();
        if($cnt_bo_ma == 0){
            $mana = view('admin.home.bo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',1);
        }else{
            $mana = view('admin.home.bo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',++$ma_bo_moi_nhat->bo_ma);
        }
        return view('admin.template.master')->with('admin.home.bo',$mana);
    }

    public function them_bo(Request $request){
        $this->AuthLogin();
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
        $this->AuthLogin();
        $bo = array();
        $bo['bo_ten'] = $request->get('bo_ten');

        if(DB::table('bo')->where('bo_ma',$request->get('bo_ma'))->update($bo)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/bo');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/bo');
        }
        
    }
    public function xoa_bo(Request $request){
        $this->AuthLogin();
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
        $this->AuthLogin();
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
    
    public function diadiem(){
        $this->AuthLogin();
        $ds_diadiem = DB::table('diadiem')->get();
        $ma_diadiem_moi_nhat = DB::table('diadiem')->OrderBy('dd_ma','desc')->first();
        $cnt_diadiem_ma = DB::table('diadiem')->count();
        if($cnt_diadiem_ma == 0){
            $mana = view('admin.home.diadiem')->with('ds_diadiem',$ds_diadiem)->with('ma_diadiem_moi_nhat',1);
        }else{
            $mana = view('admin.home.diadiem')->with('ds_diadiem',$ds_diadiem)->with('ma_diadiem_moi_nhat',++$ma_diadiem_moi_nhat->dd_ma);
        }
        return view('admin.template.master')->with('admin.home.dia_diem',$mana);
    }

    public function them_diadiem(Request $request){
        $this->AuthLogin();
        $diadiem = array();
        $diadiem['dd_ma'] = $request->get('diadiem_ma');
        $diadiem['dd_ten'] = $request->get('diadiem_ten');

        if(DB::table('diadiem')->insert($diadiem)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/diadiem');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/diadiem');
        }
        
    }
    public function sua_diadiem(Request $request){
        $this->AuthLogin();
        $dia_diem = array();
        $dia_diem['dd_ten'] = $request->get('diadiem_ten');

        if(DB::table('diadiem')->where('dd_ma',$request->get('diadiem_ma'))->update($dia_diem)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/diadiem');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/diadiem');
        }
        
    }

    public function xoa_diadiem(Request $request){
        $this->AuthLogin();
        if(DB::table('diadiem')->where('dd_ma',$request->get('diadiem_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/diadiem');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/diadiem');
        }
        
    }
    public function tim_kiem_diadiem(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('timdiadiem');
        if($tu_khoa){
            $ds_diadiem = DB::table('diadiem')
            ->where('dd_ma','like','%'.$tu_khoa.'%')
            ->orWhere('dd_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_diadiem = DB::table('diadiem')->get();
        }
        $ma_diadiem_moi_nhat = DB::table('diadiem')->OrderBy('dd_ma','desc')->first();
        $ma_diadiem_moi_nhat->dd_ma++;
        $mana = view('admin.home.diadiem')->with('ds_diadiem',$ds_diadiem)->with('ma_diadiem_moi_nhat',$ma_diadiem_moi_nhat->dd_ma);
        return view('admin.template.master')->with('admin.home.diadiem',$mana);
    }
    
    public function ho(){
        $this->AuthLogin();
        $ds_ho = DB::table('ho')->get();
        $ma_ho_moi_nhat = DB::table('ho')->OrderBy('ho_ma','desc')->first();
        $cnt_ho_ma = DB::table('ho')->count();
        if($cnt_ho_ma == 0){
            $mana = view('admin.home.ho')->with('ds_ho',$ds_ho)->with('ma_ho_moi_nhat',1);
        }else{
            $mana = view('admin.home.ho')->with('ds_ho',$ds_ho)->with('ma_ho_moi_nhat',++$ma_ho_moi_nhat->ho_ma);
        }
        return view('admin.template.master')->with('admin.home.ho',$mana);
    }

    public function them_ho(Request $request){
        $this->AuthLogin();
        $ho = array();
        $ho['ho_ma'] = $request->get('ho_ma');
        $ho['ho_ten'] = $request->get('ho_ten');

        if(DB::table('ho')->insert($ho)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/ho');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/ho');
        }
        
    }

    public function sua_ho(Request $request){
        $this->AuthLogin();
        $ho = array();
        $ho['ho_ten'] = $request->get('ho_ten');

        if(DB::table('ho')->where('ho_ma',$request->get('ho_ma'))->update($ho)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/ho');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/ho');
        }
        
    }
    public function xoa_ho(Request $request){
        $this->AuthLogin();
        if(DB::table('ho')->where('ho_ma',$request->get('ho_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/ho');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/ho');
        }
        
    }

    public function tim_kiem_ho(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('timho');
        if($tu_khoa){
            $ds_ho = DB::table('ho')
            ->where('ho_ma','like','%'.$tu_khoa.'%')
            ->orWhere('ho_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_ho = DB::table('ho')->get();
        }
        $ma_ho_moi_nhat = DB::table('ho')->OrderBy('ho_ma','desc')->first();
        $ma_ho_moi_nhat->ho_ma++;
        $mana = view('admin.home.ho')->with('ds_ho',$ds_ho)->with('ma_ho_moi_nhat',$ma_ho_moi_nhat->ho_ma);
        return view('admin.template.master')->with('admin.home.ho',$mana);
    }

    public function gioi(){
        $this->AuthLogin();
        $ds_gioi = DB::table('gioi')->get();
        $ma_gioi_moi_nhat = DB::table('gioi')->OrderBy('gioi_ma','desc')->first();
        $cnt_gioi_ma = DB::table('gioi')->count();
        if($cnt_gioi_ma == 0){
            $mana = view('admin.home.gioi')->with('ds_gioi',$ds_gioi)->with('ma_gioi_moi_nhat',1);
        }else{
            $mana = view('admin.home.gioi')->with('ds_gioi',$ds_gioi)->with('ma_gioi_moi_nhat',++$ma_gioi_moi_nhat->gioi_ma);
        }
        return view('admin.template.master')->with('admin.home.gioi',$mana);
    }

    public function them_gioi(Request $request){
        $this->AuthLogin();
        $gioi = array();
        $gioi['gioi_ma'] = $request->get('gioi_ma');
        $gioi['gioi_ten'] = $request->get('gioi_ten');

        if(DB::table('gioi')->insert($gioi)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/gioi');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/gioi');
        }
        
    }

    public function sua_gioi(Request $request){
        $this->AuthLogin();
        $gioi = array();
        $gioi['gioi_ten'] = $request->get('gioi_ten');

        if(DB::table('gioi')->where('gioi_ma',$request->get('gioi_ma'))->update($gioi)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/gioi');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/gioi');
        }
        
    }
    public function xoa_gioi(Request $request){
        $this->AuthLogin();
        if(DB::table('gioi')->where('gioi_ma',$request->get('gioi_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/gioi');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/gioi');
        }
        
    }

    public function tim_kiem_gioi(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('timgioi');
        if($tu_khoa){
            $ds_gioi = DB::table('gioi')
            ->where('gioi_ma','like','%'.$tu_khoa.'%')
            ->orWhere('gioi_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_gioi = DB::table('gioi')->get();
        }
        $ma_gioi_moi_nhat = DB::table('gioi')->OrderBy('gioi_ma','desc')->first();
        $ma_gioi_moi_nhat->gioi_ma++;
        $mana = view('admin.home.gioi')->with('ds_gioi',$ds_gioi)->with('ma_gioi_moi_nhat',$ma_gioi_moi_nhat->gioi_ma);
        return view('admin.template.master')->with('admin.home.gioi',$mana);
    }

    public function lop(){
        $this->AuthLogin();
        $ds_lop = DB::table('lop')->get();
        $ma_lop_moi_nhat = DB::table('lop')->OrderBy('lop_ma','desc')->first();
        $cnt_lop_ma = DB::table('lop')->count();
        if($cnt_lop_ma == 0){
            $mana = view('admin.home.lop')->with('ds_lop',$ds_lop)->with('ma_lop_moi_nhat',1);
        }else{
            $mana = view('admin.home.lop')->with('ds_lop',$ds_lop)->with('ma_lop_moi_nhat',++$ma_lop_moi_nhat->lop_ma);
        }
        return view('admin.template.master')->with('admin.home.lop',$mana);
    }

    public function them_lop(Request $request){
        $this->AuthLogin();
        $lop = array();
        $lop['lop_ma'] = $request->get('lop_ma');
        $lop['lop_ten'] = $request->get('lop_ten');

        if(DB::table('lop')->insert($lop)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/lop');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/lop');
        }
        
    }

    public function sua_lop(Request $request){
        $this->AuthLogin();
        $lop = array();
        $lop['lop_ten'] = $request->get('lop_ten');

        if(DB::table('lop')->where('lop_ma',$request->get('lop_ma'))->update($lop)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/lop');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/lop');
        }
        
    }
    public function xoa_lop(Request $request){
        $this->AuthLogin();
        if(DB::table('lop')->where('lop_ma',$request->get('lop_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/lop');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/lop');
        }
        
    }

    public function tim_kiem_lop(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('timlop');
        if($tu_khoa){
            $ds_lop = DB::table('lop')
            ->where('lop_ma','like','%'.$tu_khoa.'%')
            ->orWhere('lop_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_lop = DB::table('lop')->get();
        }
        $ma_lop_moi_nhat = DB::table('lop')->OrderBy('lop_ma','desc')->first();
        $ma_lop_moi_nhat->lop_ma++;
        $mana = view('admin.home.lop')->with('ds_lop',$ds_lop)->with('ma_lop_moi_nhat',$ma_lop_moi_nhat->lop_ma);
        return view('admin.template.master')->with('admin.home.lop',$mana);
    }

    public function nganh(){
        $ds_nganh = DB::table('nganh')->get();
        $ma_nganh_moi_nhat = DB::table('nganh')->OrderBy('nganh_ma','desc')->first();
        $cnt_nganh_ma = DB::table('nganh')->count();
        if($cnt_nganh_ma == 0){
            $mana = view('admin.home.nganh')->with('ds_nganh',$ds_nganh)->with('ma_nganh_moi_nhat',1);
        }else{
            $mana = view('admin.home.nganh')->with('ds_nganh',$ds_nganh)->with('ma_nganh_moi_nhat',++$ma_nganh_moi_nhat->nganh_ma);
        }
        return view('admin.template.master')->with('admin.home.nganh',$mana);
    }

    public function them_nganh(Request $request){
        $nganh = array();
        $nganh['nganh_ma'] = $request->get('nganh_ma');
        $nganh['nganh_ten'] = $request->get('nganh_ten');

        if(DB::table('nganh')->insert($nganh)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/nganh');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/nganh');
        }
        
    }

    public function sua_nganh(Request $request){
        $this->AuthLogin();
        $nganh = array();
        $nganh['nganh_ten'] = $request->get('nganh_ten');

        if(DB::table('nganh')->where('nganh_ma',$request->get('nganh_ma'))->update($nganh)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/nganh');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/nganh');
        }
        
    }
    public function xoa_nganh(Request $request){
        $this->AuthLogin();

        if(DB::table('nganh')->where('nganh_ma',$request->get('nganh_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/nganh');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/nganh');
        }
        
    }

    public function tim_kiem_nganh(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('timnganh');
        if($tu_khoa){
            $ds_nganh = DB::table('nganh')
            ->where('nganh_ma','like','%'.$tu_khoa.'%')
            ->orWhere('nganh_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_nganh = DB::table('nganh')->get();
        }
        $ma_nganh_moi_nhat = DB::table('nganh')->OrderBy('nganh_ma','desc')->first();
        $ma_nganh_moi_nhat->nganh_ma++;
        $mana = view('admin.home.nganh')->with('ds_nganh',$ds_nganh)->with('ma_nganh_moi_nhat',$ma_nganh_moi_nhat->nganh_ma);
        return view('admin.template.master')->with('admin.home.nganh',$mana);
    }

    public function tinhtrangmauvat(){
        $this->AuthLogin();
        $ds_tinhtrangmauvat = DB::table('tinhtrangmauvat')->get();
        $ma_tinhtrangmauvat_moi_nhat = DB::table('tinhtrangmauvat')->OrderBy('ttmv_ma','desc')->first();
        $cnt_tinhtrangmauvat_ma = DB::table('tinhtrangmauvat')->count();
        if($cnt_tinhtrangmauvat_ma == 0){
            $mana = view('admin.home.tinhtrangmauvat')->with('ds_tinhtrangmauvat',$ds_tinhtrangmauvat)->with('ma_tinhtrangmauvat_moi_nhat',1);
        }else{
            $mana = view('admin.home.tinhtrangmauvat')->with('ds_tinhtrangmauvat',$ds_tinhtrangmauvat)->with('ma_tinhtrangmauvat_moi_nhat',++$ma_tinhtrangmauvat_moi_nhat->ttmv_ma);
        }
        return view('admin.template.master')->with('admin.home.tinhtrangmauvat',$mana);
    }

    public function them_tinhtrangmauvat(Request $request){
        $this->AuthLogin();
        $tinhtrangmauvat = array();
        $tinhtrangmauvat['ttmv_ma'] = $request->get('tinhtrangmauvat_ma');
        $tinhtrangmauvat['ttmv_ten'] = $request->get('tinhtrangmauvat_ten');

        if(DB::table('tinhtrangmauvat')->insert($tinhtrangmauvat)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/tinhtrangmauvat');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/tinhtrangmauvat');
        }
        
    }

    public function sua_tinhtrangmauvat(Request $request){
        $this->AuthLogin();
        $tinhtrangmauvat = array();
        $tinhtrangmauvat['ttmv_ten'] = $request->get('tinhtrangmauvat_ten');

        if(DB::table('tinhtrangmauvat')->where('ttmv_ma',$request->get('tinhtrangmauvat_ma'))->update($tinhtrangmauvat)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/tinhtrangmauvat');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/tinhtrangmauvat');
        }
        
    }
    public function xoa_tinhtrangmauvat(Request $request){
        $this->AuthLogin();

        if(DB::table('tinhtrangmauvat')->where('ttmv_ma',$request->get('tinhtrangmauvat_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/tinhtrangmauvat');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/tinhtrangmauvat');
        }
        
    }

    public function tim_kiem_tinhtrangmauvat(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('timtinhtrangmauvat');
        if($tu_khoa){
            $ds_tinhtrangmauvat = DB::table('tinhtrangmauvat')
            ->where('ttmv_ma','like','%'.$tu_khoa.'%')
            ->orWhere('ttmv_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_tinhtrangmauvat = DB::table('tinhtrangmauvat')->get();
        }
        $ma_tinhtrangmauvat_moi_nhat = DB::table('tinhtrangmauvat')->OrderBy('ttmv_ma','desc')->first();
        $ma_tinhtrangmauvat_moi_nhat->ttmv_ma++;
        $mana = view('admin.home.tinhtrangmauvat')->with('ds_tinhtrangmauvat',$ds_tinhtrangmauvat)->with('ma_tinhtrangmauvat_moi_nhat',$ma_tinhtrangmauvat_moi_nhat->ttmv_ma);
        return view('admin.template.master')->with('admin.home.tinhtrangmauvat',$mana);
    }

    public function bao_ton_theo_vn(){
        $this->AuthLogin();
        $ds_bttvn = DB::table('baotontheovn')->get();
        $ma_bttvn_moi = DB::table('baotontheovn')->OrderBy('bt_ma','desc')->first();
        $cnt_bttvn = DB::table('baotontheovn')->count();
        if($cnt_bttvn == 0){
            $mana = view('admin.home.baotontheovn')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',1);
        }else{
            $mana = view('admin.home.baotontheovn')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',++$ma_bttvn_moi->bt_ma);
        }
        return view('admin.template.master')->with('admin.home.baotontheovn',$mana);
    }

    public function them_bao_ton_theo_vn(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ma'] = $request->get('bt_ma');
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheovn')->insert($bt)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/bao-ton-theo-vn');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/bao-ton-theo-vn');
        }
    }

    public function sua_bao_ton_theo_vn(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheovn')->where('bt_ma',$request->get('bt_ma'))->update($bt)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/bao-ton-theo-vn');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/bao-ton-theo-vn');
        }
    }

    public function xoa_bao_ton_theo_vn(Request $request){
        $this->AuthLogin();
        if(DB::table('baotontheovn')->where('bt_ma',$request->get('bt_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/bao-ton-theo-vn');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/bao-ton-theo-vn');
        }
    }

    public function tim_kiem_bao_ton_theo_vn(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('tim_bt');
        if($tu_khoa){
            $ds_bt = DB::table('baotontheovn')
            ->where('bt_ma','like','%'.$tu_khoa.'%')
            ->orWhere('bt_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_bt = DB::table('baotontheovn')->get();
        }
        $ma_bttvn_moi = DB::table('baotontheovn')->OrderBy('bt_ma','desc')->first();
        
        $mana = view('admin.home.baotontheovn')->with('ds_bttvn',$ds_bt)->with('ma_bttvn_moi',$ma_bttvn_moi->bt_ma++);
        return view('admin.template.master')->with('admin.home.baotontheovn',$mana);
    }

    
    public function bao_ton_theo_nghi_dinh(){
        $this->AuthLogin();
        $ds_bttvn = DB::table('baotontheonghidinh')->get();
        $ma_bttvn_moi = DB::table('baotontheonghidinh')->OrderBy('bt_ma','desc')->first();
        $cnt_bttvn = DB::table('baotontheonghidinh')->count();
        if($cnt_bttvn == 0){
            $mana = view('admin.home.baotontheonghidinh')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',1);
        }else{
            $mana = view('admin.home.baotontheonghidinh')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',++$ma_bttvn_moi->bt_ma);
        }
        return view('admin.template.master')->with('admin.home.baotontheonghidinh',$mana);
    }

    public function them_bao_ton_theo_nghi_dinh(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ma'] = $request->get('bt_ma');
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheonghidinh')->insert($bt)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/bao-ton-theo-nghi-dinh');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/bao-ton-theo-nghi-dinh');
        }
    }

    public function sua_bao_ton_theo_nghi_dinh(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheonghidinh')->where('bt_ma',$request->get('bt_ma'))->update($bt)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/bao-ton-theo-nghi-dinh');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/bao-ton-theo-nghi-dinh');
        }
    }

    public function xoa_bao_ton_theo_nghi_dinh(Request $request){
        $this->AuthLogin();
        if(DB::table('baotontheonghidinh')->where('bt_ma',$request->get('bt_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/bao-ton-theo-nghi-dinh');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/bao-ton-theo-nghi-dinh');
        }
    }

    public function tim_kiem_bao_ton_theo_nghi_dinh(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('tim_bt');
        if($tu_khoa){
            $ds_bt = DB::table('baotontheonghidinh')
            ->where('bt_ma','like','%'.$tu_khoa.'%')
            ->orWhere('bt_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_bt = DB::table('baotontheonghidinh')->get();
        }
        $ma_bttvn_moi = DB::table('baotontheonghidinh')->OrderBy('bt_ma','desc')->first();
        
        $mana = view('admin.home.baotontheonghidinh')->with('ds_bttvn',$ds_bt)->with('ma_bttvn_moi',$ma_bttvn_moi->bt_ma++);
        return view('admin.template.master')->with('admin.home.baotontheonghidinh',$mana);
    }


    public function bao_ton_theo_uicn(){
        $this->AuthLogin();
        $ds_bttvn = DB::table('baotontheouicn')->get();
        $ma_bttvn_moi = DB::table('baotontheouicn')->OrderBy('bt_ma','desc')->first();
        $cnt_bttvn = DB::table('baotontheouicn')->count();
        if($cnt_bttvn == 0){
            $mana = view('admin.home.baotontheouicn')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',1);
        }else{
            $mana = view('admin.home.baotontheouicn')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',++$ma_bttvn_moi->bt_ma);
        }
        return view('admin.template.master')->with('admin.home.baotontheouicn',$mana);
    }

    public function them_bao_ton_theo_uicn(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ma'] = $request->get('bt_ma');
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheouicn')->insert($bt)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/bao-ton-theo-uicn');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/bao-ton-theo-uicn');
        }
    }

    public function sua_bao_ton_theo_uicn(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheouicn')->where('bt_ma',$request->get('bt_ma'))->update($bt)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/bao-ton-theo-uicn');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/bao-ton-theo-uicn');
        }
    }

    public function xoa_bao_ton_theo_uicn(Request $request){
        $this->AuthLogin();
        if(DB::table('baotontheouicn')->where('bt_ma',$request->get('bt_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/bao-ton-theo-uicn');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/bao-ton-theo-uicn');
        }
    }

    public function tim_kiem_bao_ton_theo_uicn(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('tim_bt');
        if($tu_khoa){
            $ds_bt = DB::table('baotontheouicn')
            ->where('bt_ma','like','%'.$tu_khoa.'%')
            ->orWhere('bt_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_bt = DB::table('baotontheouicn')->get();
        }
        $ma_bttvn_moi = DB::table('baotontheouicn')->OrderBy('bt_ma','desc')->first();
        
        $mana = view('admin.home.baotontheouicn')->with('ds_bttvn',$ds_bt)->with('ma_bttvn_moi',$ma_bttvn_moi->bt_ma++);
        return view('admin.template.master')->with('admin.home.baotontheouicn',$mana);
    }


    public function bao_ton_theo_cites(){
        $this->AuthLogin();
        $ds_bttvn = DB::table('baotontheocites')->get();
        $ma_bttvn_moi = DB::table('baotontheocites')->OrderBy('bt_ma','desc')->first();
        $cnt_bttvn = DB::table('baotontheocites')->count();
        if($cnt_bttvn == 0){
            $mana = view('admin.home.baotontheocites')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',1);
        }else{
            $mana = view('admin.home.baotontheocites')->with('ds_bttvn',$ds_bttvn)->with('ma_bttvn_moi',++$ma_bttvn_moi->bt_ma);
        }
        return view('admin.template.master')->with('admin.home.baotontheocites',$mana);
    }

    public function them_bao_ton_theo_cites(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ma'] = $request->get('bt_ma');
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheocites')->insert($bt)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/bao-ton-theo-cites');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/bao-ton-theo-cites');
        }
    }

    public function sua_bao_ton_theo_cites(Request $request){
        $this->AuthLogin();
        $bt = array();
        $bt['bt_ten'] = $request->get('bt_ten');

        if(DB::table('baotontheocites')->where('bt_ma',$request->get('bt_ma'))->update($bt)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/bao-ton-theo-cites');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/bao-ton-theo-cites');
        }
    }

    public function xoa_bao_ton_theo_cites(Request $request){
        $this->AuthLogin();
        if(DB::table('baotontheocites')->where('bt_ma',$request->get('bt_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/bao-ton-theo-cites');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/bao-ton-theo-cites');
        }
    }

    public function tim_kiem_bao_ton_theo_cites(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('tim_bt');
        if($tu_khoa){
            $ds_bt = DB::table('baotontheocites')
            ->where('bt_ma','like','%'.$tu_khoa.'%')
            ->orWhere('bt_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_bt = DB::table('baotontheocites')->get();
        }
        $ma_bttvn_moi = DB::table('baotontheocites')->OrderBy('bt_ma','desc')->first();
        
        $mana = view('admin.home.baotontheocites')->with('ds_bttvn',$ds_bt)->with('ma_bttvn_moi',$ma_bttvn_moi->bt_ma++);
        return view('admin.template.master')->with('admin.home.baotontheocites',$mana);
    }


    public function sinh_canh(){
        $this->AuthLogin();
        $ds_bo = DB::table('sinhcanh')->get();
        $ma_bo_moi_nhat = DB::table('sinhcanh')->OrderBy('sc_ma','desc')->first();
        $cnt_bo_ma = DB::table('sinhcanh')->count();
        if($cnt_bo_ma == 0){
            $mana = view('admin.home.sinhcanh')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',1);
        }else{
            $mana = view('admin.home.sinhcanh')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',++$ma_bo_moi_nhat->sc_ma);
        }
        return view('admin.template.master')->with('admin.home.sinhcanh',$mana);
    }

    public function them_sinh_canh(Request $request){
        $bo = array();
        $bo['sc_ma'] = $request->get('sc_ma');
        $bo['sc_ten'] = $request->get('sc_ten');

        if(DB::table('sinhcanh')->insert($bo)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/sinh-canh');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/sinh-canh');
        }
        
    }

    public function sua_sinh_canh(Request $request){
        $bo = array();
        $bo['sc_ten'] = $request->get('sc_ten');

        if(DB::table('sinhcanh')->where('sc_ma',$request->get('sc_ma'))->update($bo)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/sinh-canh');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/sinh-canh');
        }
        
    }
    public function xoa_sinh_canh(Request $request){

        if(DB::table('sinhcanh')->where('sc_ma',$request->get('sc_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/sinh-canh');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/sinh-canh');
        }
        
    }

    public function tim_kiem_sinh_canh(Request $request){
        $tu_khoa = $request->get('timbo');
        if($tu_khoa){
            $ds_bo = DB::table('sinhcanh')
            ->where('sc_ma','like','%'.$tu_khoa.'%')
            ->orWhere('sc_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_bo = DB::table('sinhcanh')->get();
        }
        $ma_bo_moi_nhat = DB::table('sinhcanh')->OrderBy('sc_ma','desc')->first();
        $ma_bo_moi_nhat->sc_ma++;
        $mana = view('admin.home.sinhcanh')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',$ma_bo_moi_nhat->sc_ma);
        return view('admin.template.master')->with('admin.home.sinhcanh',$mana);
    }


    public function phan_bo(){
        $this->AuthLogin();
        $ds_bo = DB::table('phanbo')->get();
        $ma_bo_moi_nhat = DB::table('phanbo')->OrderBy('pb_ma','desc')->first();
        $cnt_bo_ma = DB::table('phanbo')->count();
        if($cnt_bo_ma == 0){
            $mana = view('admin.home.phanbo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',1);
        }else{
            $mana = view('admin.home.phanbo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',++$ma_bo_moi_nhat->pb_ma);
        }
        return view('admin.template.master')->with('admin.home.phanbo',$mana);
    }

    public function them_phan_bo(Request $request){
        $this->AuthLogin();
        $bo = array();
        $bo['pb_ma'] = $request->get('pb_ma');
        $bo['pb_ten'] = $request->get('pb_ten');

        if(DB::table('phanbo')->insert($bo)){
            Session::put('message','Thêm thành công');
            return Redirect::to('/phan-bo');
        }
        else{
            Session::put('fail','Thêm thất bại');
            return Redirect::to('/phan-bo');
        }
        
    }

    public function sua_phan_bo(Request $request){
        $this->AuthLogin();
        $bo = array();
        $bo['pb_ten'] = $request->get('pb_ten');

        if(DB::table('phanbo')->where('pb_ma',$request->get('pb_ma'))->update($bo)){
            Session::put('message','Sửa thành công');
            return Redirect::to('/phan-bo');
        }
        else{
            Session::put('fail','Sửa thất bại');
            return Redirect::to('/phan-bo');
        }
        
    }
    public function xoa_phan_bo(Request $request){
        $this->AuthLogin();

        if(DB::table('phanbo')->where('pb_ma',$request->get('pb_ma'))->delete()){
            Session::put('message','Xóa thành công');
            return Redirect::to('/phan-bo');
        }
        else{
            Session::put('fail','Xoá thất bại');
            return Redirect::to('/phan-bo');
        }
        
    }

    public function tim_kiem_phan_bo(Request $request){
        $this->AuthLogin();
        $tu_khoa = $request->get('timbo');
        if($tu_khoa){
            $ds_bo = DB::table('phanbo')
            ->where('pb_ma','like','%'.$tu_khoa.'%')
            ->orWhere('pb_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_bo = DB::table('phanbo')->get();
        }
        $ma_bo_moi_nhat = DB::table('phanbo')->OrderBy('pb_ma','desc')->first();
        $ma_bo_moi_nhat->pb_ma++;
        $mana = view('admin.home.phanbo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',$ma_bo_moi_nhat->pb_ma);
        return view('admin.template.master')->with('admin.home.phanbo',$mana);
    }

    public function dong_vat(){
        $this->AuthLogin();
        $nguoithumau = DB::table('admin')->get();
        $gioi = DB::table('gioi')->get();
        $nganh = DB::table('nganh')->get();
        $lop = DB::table('lop')->get();
        $ho = DB::table('ho')->get();
        $bo = DB::table('bo')->get();
        $baotontheouicn = DB::table('baotontheouicn')->get();
        $baotontheovn = DB::table('baotontheovn')->get();
        $baotontheonghidinh = DB::table('baotontheonghidinh')->get();
        $baotontheocites = DB::table('baotontheocites')->get();
        $phanbo = DB::table('phanbo')->get();
        $tinhtrangmauvat = DB::table('tinhtrangmauvat')->get();

        $ma_dv_moi_nhat = DB::table('dongvat')->OrderBy('dv_ma','desc')->first();
        $cnt_dv_ma = DB::table('dongvat')->count();
        if($cnt_dv_ma == 0){
            $mana = view('admin.home.dongvat')->with('ma_dv_moi_nhat',1)
            ->with('nguoithumau',$nguoithumau)
            ->with('gioi',$gioi)
            ->with('nganh',$nganh)
            ->with('lop',$lop)
            ->with('ho',$ho)
            ->with('bo',$bo)
            ->with('baotontheouicn',$baotontheouicn)
            ->with('baotontheovn',$baotontheovn)
            ->with('baotontheonghidinh',$baotontheonghidinh)
            ->with('baotontheocites',$baotontheocites)
            ->with('phanbo',$phanbo)
            ->with('tinhtrangmauvat',$tinhtrangmauvat);
        }
        else{
            $mana = view('admin.home.dongvat')->with('ma_dv_moi_nhat',++$ma_dv_moi_nhat->dv_ma)
            ->with('nguoithumau',$nguoithumau)
            ->with('gioi',$gioi)
            ->with('nganh',$nganh)
            ->with('lop',$lop)
            ->with('ho',$ho)
            ->with('bo',$bo)
            ->with('baotontheouicn',$baotontheouicn)
            ->with('baotontheovn',$baotontheovn)
            ->with('baotontheonghidinh',$baotontheonghidinh)
            ->with('baotontheocites',$baotontheocites)
            ->with('phanbo',$phanbo)
            ->with('tinhtrangmauvat',$tinhtrangmauvat);
        }
        return view('admin.template.master')->with('admin.home.dongvat',$mana);
    }

    public function lay_danh_sach_dv(){
        $this->AuthLogin();
        $ds_dv = DB::table('dongvat')
        ->select('dv_ma','dv_tenkhoahoc', 'dv_tentiengviet','dv_tendiaphuong')
        ->get();

        return DataTables::of($ds_dv)
        ->addColumn('dongvatdiadiem',function($ds_dv){
            return '<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#diadiemdv" data-role="diadiem" diadiem="'.$ds_dv->dv_ma.'">Xem</button>';
        })
        ->addColumn('dongvatsinhcanh',function($ds_dv){
            return '<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#sinhcanh" data-role="sinhcanh" sinhcanh="'.$ds_dv->dv_ma.'">Xem</button>';
        })
        ->addColumn('hinhanh',function($ds_dv){
            return '<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#hinhanhdv" data-role="hinhanhdv" hinhanhdv="'.$ds_dv->dv_ma.'">Xem</button>';
        })
        ->addColumn('chitiet',function($ds_dv){
            return '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#chitietdv" data-role="chitietdv" chitietdv="'.$ds_dv->dv_ma.'">Chi Tiết</button>';
        })
        ->addColumn('action',function($ds_dv){
            return '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sua" data-role="sua"
            dv_ma="'.$ds_dv->dv_ma.'"
            >Sửa</button>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalxoadv" data-role="modalxoadv" modalxoadv="'.$ds_dv->dv_ma.'">Xóa</button>';
        })
        ->rawColumns(['dongvatdiadiem','dongvatsinhcanh','hinhanh','video', 'chitiet','action'])
        ->make(true);
    }

    public function them_dv(Request $request){
        $this->AuthLogin();
        $dongvat = array();
        $dongvat['dv_ma'] = $request->get('dv_ma');
        $dongvat['dv_tenkhoahoc'] = $request->get('dv_tenkhoahoc');
        $dongvat['dv_tentiengviet'] = $request->get('dv_tentiengviet');
        $dongvat['dv_tendiaphuong'] = $request->get('dv_tendiaphuong') ;
        $dongvat['dv_gioi'] = $request->get('dv_gioi') ;
        $dongvat['dv_nganh'] = $request->get('dv_nganh') ;
        $dongvat['dv_lop'] = $request->get('dv_lop') ;
        $dongvat['dv_ho'] = $request->get('dv_ho') ;
        $dongvat['dv_bo'] = $request->get('dv_bo') ;
        $dongvat['dv_dacdiemhinhthai'] = $request->get('dv_dacdiemhinhthai') ;
        $dongvat['dv_dacdiemsinhthai'] = $request->get('dv_dacdiemsinhthai') ;
        $dongvat['dv_giatrisudung'] = $request->get('dv_giatrisudung') ;
        $dongvat['dv_baotontheouicn'] = $request->get('dv_baotontheouicn') ;
        $dongvat['dv_baotontheovn'] = $request->get('dv_baotontheovn') ;
        $dongvat['dv_baotontheonghidinh'] = $request->get('dv_baotontheonghidinh') ;
        $dongvat['dv_baotontheocites'] = $request->get('dv_baotontheocites') ;
        $dongvat['dv_phanbo'] = $request->get('dv_phanbo') ;
        $dongvat['dv_tinhtrangmauvat'] = $request->get('dv_tinhtrangmauvat') ;
        $dongvat['dv_ngaythumau'] = $request->get('dv_ngaythumau') ;
        $dongvat['dv_nguoithumau'] = $request->get('dv_nguoithumau') ;

        if(DB::table('dongvat')->insert($dongvat)){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }

    public function xem_chi_tiet(Request $request){
        $this->AuthLogin();
        $chitiet = DB::table('dongvat')->where('dv_ma',$request->get('dv_ma'))
        ->leftJoin('gioi','dongvat.dv_gioi','=','gioi.gioi_ma')
        ->leftJoin('nganh','dongvat.dv_nganh','=','nganh.nganh_ma')
        ->leftJoin('lop','dongvat.dv_lop','=','lop.lop_ma')
        ->leftJoin('bo','dongvat.dv_bo','=','bo.bo_ma')
        ->leftJoin('ho','dongvat.dv_ho','=','ho.ho_ma')
        ->leftJoin('phanbo','dongvat.dv_phanbo','=','phanbo.pb_ma')
        ->leftJoin('tinhtrangmauvat','dongvat.dv_tinhtrangmauvat','=','tinhtrangmauvat.ttmv_ma')
        ->leftJoin('admin','dongvat.dv_nguoithumau','=','admin.ad_ma')
        ->first();

        $output = "";
        $output .= '<tbody>';
        $output .= '<tr>';
        $output .= '<th scope="col">Giới</th>';
        $output .= '<td>'.$chitiet->gioi_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Ngành</th>';
        $output .= '<td>'.$chitiet->nganh_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Lớp</th>';
        $output .= '<td>'.$chitiet->lop_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Bộ</th>';
        $output .= '<td>'.$chitiet->bo_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Họ</th>';
        $output .= '<td>'.$chitiet->ho_ten.'</td>';
        $output .= '</tr>';

        $baotontheouicn = DB::table('baotontheouicn')->where('bt_ma',$chitiet->dv_baotontheoUICN)->first();
        $baotontheovn = DB::table('baotontheovn')->where('bt_ma',$chitiet->dv_baotontheoVN)->first();
        $baotontheonghidinh = DB::table('baotontheonghidinh')->where('bt_ma',$chitiet->dv_baotontheoNGHIDINH)->first();
        $baotontheocites = DB::table('baotontheocites')->where('bt_ma',$chitiet->dv_baotontheoCITES)->first();
        $output .= '<tr>';
        $output .= '<th scope="col">Bảo Tồn Theo UICN</th>';
        $output .= '<td>'.$baotontheouicn->bt_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Bảo Tồn Theo VN</th>';
        $output .= '<td>'.$baotontheovn->bt_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Bảo Tồn Theo Nghị Định</th>';
        $output .= '<td>'.$baotontheonghidinh->bt_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Bảo Tồn Theo CITES</th>';
        $output .= '<td>'.$baotontheocites->bt_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Phân Bố</th>';
        $output .= '<td>'.$chitiet->pb_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Tình Trạng Mẫu Vật</th>';
        $output .= '<td>'.$chitiet->ttmv_ten.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Ngày Thu Mẫu</th>';
        $output .= '<td>'.$chitiet->dv_ngaythumau.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th scope="col">Người Thu Mẫu</th>';
        $output .= '<td>'.$chitiet->ad_hoten.'</td>';
        $output .= '</tr>';
        $output .= '</tbody>';
        return $output;
    }

    public function xem_hinh_anh_dv(Request $request){
        $this->AuthLogin();
        $ds_hinhanh = DB::table('hinhanh')->where('dv_ma',$request->get('dv_ma'))->get();

        $output = "";
        $output .= "<thead>";
        $output .= "<tr>";
        $output .= "<th>Mã</th>";
        $output .= "<th>Hình Ảnh</th>";
        $output .= "<th>Hành Động</th>";
        $output .= "</tr>";
        $output .= "</thead>";
        $output .= "<tbody>";
        foreach($ds_hinhanh as $key){
            $output .= "<tr>";
            $output .= "<td>".$key->ha_ma."</td>";
            $output .= "<td><img width='300px' height='200px' src='hinhanh/$key->ha_link'></td>";
            $output .= '<td>
            <button type="button"
            class="btn rounded-pill btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#modalxoahinhanh" data-role="xoahinhanh" xoahinhanh="'.$key->ha_ma.'">Xóa</button>
            </td>';
            $output .= "</tr>";
        }
        $output .= "</tbody>";
        echo $output;
    }

    public function them_hinh_anh_moi(Request $request){
        $this->AuthLogin();
        $hinhanh = array();
        $hinhanh['dv_ma'] = $request->get('dv_ma');
        $ha_link = $request->file('ha_link');
        $name_image = time().'.'.$ha_link->getClientOriginalName();
        if($ha_link){
            $name_image = time().'.'.$ha_link->getClientOriginalName();
            $ha_link->move('hinhanh/',$name_image);
                $hinhanh['ha_link'] = $name_image;
                if(DB::table('hinhanh')->insert($hinhanh)){
                    echo 'success';
                }

        }
    }

    public function xoa_hinh_anh(Request $request){
        $this->AuthLogin();
        $hinhanh = DB::table('hinhanh')->where('ha_ma',$request->get('ha_ma'))->First();
        if(DB::table('hinhanh')->where('ha_ma',$request->get('ha_ma'))->delete()){
            File::delete('hinhanh/'.$hinhanh->ha_link);
            echo "success";
        }
    }

    public function lay_cac_field_len_modal(Request $request){
        $this->AuthLogin();
        $data = DB::table('dongvat')->where('dv_ma',$request->get('dv_ma'))
        ->leftJoin('gioi','dongvat.dv_gioi','=','gioi.gioi_ma')
        ->leftJoin('nganh','dongvat.dv_nganh','=','nganh.nganh_ma')
        ->leftJoin('lop','dongvat.dv_lop','=','lop.lop_ma')
        ->leftJoin('bo','dongvat.dv_bo','=','bo.bo_ma')
        ->leftJoin('ho','dongvat.dv_ho','=','ho.ho_ma')
        ->leftJoin('phanbo','dongvat.dv_phanbo','=','phanbo.pb_ma')
        ->leftJoin('tinhtrangmauvat','dongvat.dv_tinhtrangmauvat','=','tinhtrangmauvat.ttmv_ma')
        ->leftJoin('admin','dongvat.dv_nguoithumau','=','admin.ad_ma')
        ->first();

        $output = "";
        $output .= '<input type="text" id="sua_dv_ma1" value="'.$data->dv_ma.'" hidden>';
        $output .= '<input type="text" id="sua_dv_tenkhoahoc1" value="'.$data->dv_tenkhoahoc.'" hidden>';
        $output .= '<input type="text" id="sua_dv_tentiengviet1" value="'.$data->dv_tentiengviet.'" hidden>';
        $output .= '<input type="text" id="sua_dv_tendiaphuong1" value="'.$data->dv_tendiaphuong.'" hidden>';
        $output .= '<input type="text" id="sua_dv_gioi1" value="'.$data->dv_gioi.'" hidden>';
        $output .= '<input type="text" id="sua_dv_nganh1" value="'.$data->dv_nganh.'" hidden>';
        $output .= '<input type="text" id="sua_dv_lop1" value="'.$data->dv_lop.'" hidden>';
        $output .= '<input type="text" id="sua_dv_bo1" value="'.$data->dv_bo.'" hidden>';
        $output .= '<input type="text" id="sua_dv_ho1" value="'.$data->dv_ho.'" hidden>';
        $output .= '<input type="text" id="sua_dv_dacdiemhinhthai1" value="'.$data->dv_dacdiemhinhthai.'" hidden>';
        $output .= '<input type="text" id="sua_dv_dacdiemsinhthai1" value="'.$data->dv_dacdiemsinhthai.'" hidden>';
        $output .= '<input type="text" id="sua_dv_giatrisudung1" value="'.$data->dv_giatrisudung.'" hidden>';
        $output .= '<input type="text" id="sua_dv_baotontheoUICN1" value="'.$data->dv_baotontheoUICN.'" hidden>';
        $output .= '<input type="text" id="sua_dv_baotontheoVN1" value="'.$data->dv_baotontheoVN.'" hidden>';
        $output .= '<input type="text" id="sua_dv_baotontheoNGHIDINH1" value="'.$data->dv_baotontheoNGHIDINH.'"  hidden>';
        $output .= '<input type="text" id="sua_dv_baotontheoCITES1" value="'.$data->dv_baotontheoCITES.'" hidden>';
        $output .= '<input type="text" id="sua_dv_phanbo1" value="'.$data->dv_phanbo.'" hidden>';
        $output .= '<input type="text" id="sua_dv_tinhtrangmauvat1" value="'.$data->dv_tinhtrangmauvat.'" hidden>';
        $output .= '<input type="text" id="sua_dv_ngaythumau1" value="'.$data->dv_ngaythumau.'" hidden>';
        $output .= '<input type="text" id="sua_dv_nguoithumau1" value="'.$data->dv_nguoithumau.'" hidden>';
        echo $output;
    }

    public function sua_dong_vat(Request $request){
        $this->AuthLogin();
        $dongvat = array();
        $dongvat['dv_tenkhoahoc'] = $request->get('dv_tenkhoahoc');
        $dongvat['dv_tentiengviet'] = $request->get('dv_tentiengviet');
        $dongvat['dv_tendiaphuong'] = $request->get('dv_tendiaphuong') ;
        $dongvat['dv_gioi'] = $request->get('dv_gioi') ;
        $dongvat['dv_nganh'] = $request->get('dv_nganh') ;
        $dongvat['dv_lop'] = $request->get('dv_lop') ;
        $dongvat['dv_ho'] = $request->get('dv_ho') ;
        $dongvat['dv_bo'] = $request->get('dv_bo') ;
        $dongvat['dv_dacdiemhinhthai'] = $request->get('dv_dacdiemhinhthai') ;
        $dongvat['dv_dacdiemsinhthai'] = $request->get('dv_dacdiemsinhthai') ;
        $dongvat['dv_giatrisudung'] = $request->get('dv_giatrisudung') ;
        $dongvat['dv_baotontheouicn'] = $request->get('dv_baotontheouicn') ;
        $dongvat['dv_baotontheovn'] = $request->get('dv_baotontheovn') ;
        $dongvat['dv_baotontheonghidinh'] = $request->get('dv_baotontheonghidinh') ;
        $dongvat['dv_baotontheocites'] = $request->get('dv_baotontheocites') ;
        $dongvat['dv_phanbo'] = $request->get('dv_phanbo') ;
        $dongvat['dv_tinhtrangmauvat'] = $request->get('dv_tinhtrangmauvat') ;
        $dongvat['dv_ngaythumau'] = $request->get('dv_ngaythumau') ;
        $dongvat['dv_nguoithumau'] = $request->get('dv_nguoithumau') ;

        if(DB::table('dongvat')->where('dv_ma',$request->get('dv_ma'))->update($dongvat)){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }

    public function xoa_dv(Request $request){
        $this->AuthLogin();
        $dv_ma = $request->get('dv_ma');

        DB::table('dongvatsinhcanh')->where('dv_ma', $dv_ma)->delete();
        DB::table('dongvatdiadiem')->where('dv_ma', $dv_ma)->delete();

        $hinhanh = DB::table('hinhanh')->where('dv_ma',$dv_ma)->get();
        foreach($hinhanh as $key){
            if(DB::table('hinhanh')->where('ha_ma',$key->ha_ma)->delete()){
                File::delete('hinhanh/'.$key->ha_link);
           }
        }

        if(DB::table('dongvat')->where('dv_ma',$dv_ma)->delete()){
            echo "success";
        }
        else{
            echo "fail";
        }
    }

    public function xem_dia_diem(Request $request){
        $this->AuthLogin();
        $diadiem = DB::table('dongvatdiadiem')->where('dv_ma',$request->get('dv_ma'))
        ->leftJoin('diadiem','diadiem.dd_ma','=','dongvatdiadiem.dd_ma')
        ->get();

        $output = "";
        $output .= "<thead>";
        $output .= "<tr>";
        $output .= "<th>Mã Địa Điểm</th>";
        $output .= "<th>Tên Địa Điểm</th>";
        $output .= "<th>Hành Động</th>";
        $output .= "</tr>";
        $output .= "</thead>";
        $output .= "<tbody>";
        foreach($diadiem as $key){
            $output .= "<tr>";
            $output .= "<td>".$key->dd_ma."</td>";
            $output .= "<td>".$key->dd_ten."</td>";
            $output .= '<td>
            <button type="button"
            class="btn rounded-pill btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#modalxoadiadiem" data-role="modalxoadiadiem" modalxoadiadiem="'.$key->dd_ma.'">Xóa</button>
            </td>';
            $output .= "</tr>";
        }
        $output .= "</tbody>";
        echo $output;
    }

    public function lay_ds_diadiem(Request $request){
        $ds_dd = DB::table('diadiem')->get();
        $dongvatdiadiem = DB::table('dongvatdiadiem')->where('dv_ma',$request->get('dv_ma'))->get();
        $ary = array();
        $i=0;
        foreach($dongvatdiadiem as $key){
            $ary[$i++] = $key->dd_ma;
        }
        $list = new Collection($ary);
        $output = "";
        $output .= '<select id="them_diadiem" class="form-control color-dropdown">';
        foreach($ds_dd as $key){
            if (!$list->contains($key->dd_ma)) {
                $output .= '<option value='.$key->dd_ma.'>'.$key->dd_ma. '-' .$key->dd_ten.'</option>';
            }
        }
        $output .= "</select>";
        echo $output;
    }
    public function them_dia_diem(Request $request){
        $this->AuthLogin();
        $dd = array();
        $dd['dv_ma'] = $request->get('dv_ma');
        $dd['dd_ma'] = $request->get('dd_ma');
        if(DB::table('dongvatdiadiem')->insert($dd)){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }

    public function xoa_dia_diem(Request $request){
        $this->AuthLogin();
        if(DB::table('dongvatdiadiem')->where('dd_ma',$request->get('dd_ma'))->where('dv_ma',$request->get('dv_ma'))->delete()){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }
    public function xem_sinh_canh(Request $request){
        $this->AuthLogin();
        $sinhcanh = DB::table('dongvatsinhcanh')->where('dv_ma',$request->get('dv_ma'))
        ->leftJoin('sinhcanh','sinhcanh.sc_ma','=','dongvatsinhcanh.sc_ma')
        ->get();

        $output = "";
        $output .= "<thead>";
        $output .= "<tr>";
        $output .= "<th>Mã Sinh Cảnh</th>";
        $output .= "<th>Tên Sinh Cảnh</th>";
        $output .= "<th>Hành Động</th>";
        $output .= "</tr>";
        $output .= "</thead>";
        $output .= "<tbody>";
        foreach($sinhcanh as $key){
            $output .= "<tr>";
            $output .= "<td>".$key->sc_ma."</td>";
            $output .= "<td>".$key->sc_ten."</td>";
            $output .= '<td>
            <button type="button"
            class="btn rounded-pill btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#modalxoasinhcanh" data-role="modalxoasinhcanh" modalxoasinhcanh="'.$key->sc_ma.'">Xóa</button>
            </td>';
            $output .= "</tr>";
        }
        $output .= "</tbody>";
        echo $output;
    }

    public function lay_ds_sinhcanh(Request $request){
        $this->AuthLogin();
        $ds_sc = DB::table('sinhcanh')->get();
        $dongvatsinhcanh = DB::table('dongvatsinhcanh')->where('dv_ma',$request->get('dv_ma'))->get();
        $ary = array();
        $i=0;
        foreach($dongvatsinhcanh as $key){
            $ary[$i++] = $key->sc_ma;
        }
        $list = new Collection($ary);
        $output = "";
        $output .= '<select id="them_sinhcanh" class="form-control color-dropdown">';
        foreach($ds_sc as $key){
            if (!$list->contains($key->sc_ma)) {
                $output .= '<option value='.$key->sc_ma.'>'.$key->sc_ma. '-' .$key->sc_ten.'</option>';
            }
        }
        $output .= "</select>";
        echo $output;
    }

    public function them_sinhcanh(Request $request){
        $this->AuthLogin();
        $sc = array();
        $sc['dv_ma'] = $request->get('dv_ma');
        $sc['sc_ma'] = $request->get('sc_ma');
        if(DB::table('dongvatsinhcanh')->insert($sc)){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }

    public function xoa_sinhcanh(Request $request){
        $this->AuthLogin();
        if(DB::table('dongvatsinhcanh')->where('sc_ma',$request->get('sc_ma'))->where('dv_ma',$request->get('dv_ma'))->delete()){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }

    public function binh_luan(){
        $this->AuthLogin();
        $bl = DB::table('binhluan')->where('report',1)->
        leftJoin('user','user.user_id','=','binhluan.bl_user')->get();
        $mana = view('admin.home.binhluan')->with('ds_bl',$bl);
        return view('admin.template.master')->with('admin.home.binhluan',$mana)->with('ds_bl',$bl);
    }

    public function xoa_binh_luan($bl_id){
        $this->AuthLogin();
        if(DB::Table('binhluan')->where('bl_id',$bl_id)->delete()){
            Session::put('message','Xóa bình luận thành công');
        }
        else{
            Session::put('fail','Lỗi dữ liệu');
        }
        return Redirect::to('/binh-luan');
    }

}
