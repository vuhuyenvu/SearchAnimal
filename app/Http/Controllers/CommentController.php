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

class CommentController extends Controller
{
    public function them_comment($id,Request $request){
      
        $comment = array();
        $comment['id'] = 1;
        $comment['Noidung'] = $request->get('noidung');
        $comment['Baocao'] = 0;
        if(DB::table('binhluan')->insert($comment)){
            Session::flash('alert','Thêm thành công!');
            return Redirect::to('/detail');
        }else{
            Session::flash('alert_error','Có lỗi trong quá trình thêm !');
            return Redirect::to('/detail');
        }


    }
}
