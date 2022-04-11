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

        $mana = view('admin.home.bo')->with('ds_bo',$ds_bo);
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
