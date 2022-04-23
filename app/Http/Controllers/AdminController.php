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
        $cnt_bo_ma = DB::table('bo')->count();
        if($cnt_bo_ma == 0){
            $mana = view('admin.home.bo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',1);
        }else{
            $mana = view('admin.home.bo')->with('ds_bo',$ds_bo)->with('ma_bo_moi_nhat',++$ma_bo_moi_nhat->bo_ma);
        }
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
    
    public function diadiem(){
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
        $tu_khoa = $request->get('timdiadiem');
        if($tu_khoa){
            $ds_diadiem = DB::table('diadiem')
            ->where('diadiem_ma','like','%'.$tu_khoa.'%')
            ->orWhere('diadiem_ten','like','%'.$tu_khoa.'%')->get();
        }
        else{
            $ds_diadiem = DB::table('diadiem')->get();
        }
        $ma_diadiem_moi_nhat = DB::table('diadiem')->OrderBy('diadiem_ma','desc')->first();
        $ma_diadiem_moi_nhat->diadiem_ma++;
        $mana = view('admin.home.diadiem')->with('ds_diadiem',$ds_diadiem)->with('ma_diadiem_moi_nhat',$ma_diadiem_moi_nhat->diadiem_ma);
        return view('admin.template.master')->with('admin.home.diadiem',$mana);
    }
    
    public function ho(){
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
        $mana = view('admin.home.dongvat');
        return view('admin.template.master')->with('admin.home.dongvat',$mana);
    }
}
