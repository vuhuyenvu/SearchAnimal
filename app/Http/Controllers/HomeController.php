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

class HomeController extends Controller
{
    //
    public function grid(){
        $dsdv = DB::table('dongvat')->orderBy('dv_tentiengviet', 'asc')->get();
       
        return view('client.home.grid2',['dsdv'=>$dsdv]);

    }
    public function getSearch(Request $request)
    {
        return view('client.home.grid_copy');
    }

    function getSearchAjax(Request $request)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
      if($request->get('query'))
        {
           
            $query = $request->get('query');
            $data = DB::table('dongvat')
            ->join('lop', function ($join) {
                $join->on('dongvat.dv_lop', '=', 'lop.lop_ma');
                     
            })
            ->where('dv_tendiaphuong', 'LIKE', "%{$query}%")
            ->orWhere('dv_tenkhoahoc', 'LIKE', "%{$query}%")
            ->orWhere('dv_tendiaphuong', 'LIKE', "%{$query}%")
            ->orWhere('dv_tenkhoahoc', 'LIKE', "%{$query}%")
          
            
            ->orWhere('lop_ten', 'LIKE', "%{$query}%")
            ->get();
            
            
            $output = '<div class="row">';
            foreach($data as $row)
            {
                $out->writeln($row->dv_tendiaphuong);
               $output .= '
               
        <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="product__item">
                    <div class="product__item__pic set-bg">
                    <img src="http://localhost:8000/client-template/img/animal/BIRD1.JPG" alt="">
                                
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">'.$row->dv_tendiaphuong.'</a></h6>
                        <p>'.$row->dv_tenkhoahoc.'</p>
                        
                    </div>
                </div>
            </div>

               ';
           }
           $output .= '</div>';
           echo $output;
       }
    }
    // <li><a href="data/'. $row->id .'">'.$row->name_product.'</a></li>
             
    public function home_loaddata(){
        
        $dsdv = DB::table('dongvat')->get();
        $ds = DB::table('dongvat')->take(3)->get();
        return view('client.home.index',['dsdv'=>$dsdv,'ds'=>$ds]);

    }
    public function home_viewloaddata(){
        
        $dsdv = DB::table('dongvat')->take(3)->get();
        return view('client.home.index',['dsdv'=>$dsdv]);

    }
    public function detail($id){
     
       
        $gioi = DB::table('dongvat')
        ->join('gioi', function ($join) {
            $join->on('dongvat.dv_gioi', '=', 'gioi.gioi_ma');
                 
        })        
        ->get();
        $nganh = DB::table('dongvat')
        ->join('nganh', function ($join) {
            $join->on('dongvat.dv_nganh', '=', 'nganh.nganh_ma');
                 
        })
        ->get();

        $lop = DB::table('dongvat')
        ->join('lop', function ($join) {
            $join->on('dongvat.dv_lop', '=', 'lop.lop_ma');
                 
        })
        ->get();
     

        $ho = DB::table('dongvat')
        ->join('ho', function ($join) {
            $join->on('dongvat.dv_ho', '=', 'ho.ho_ma');
                 
        })
        ->get();
        $bo = DB::table('dongvat')
        ->join('bo', function ($join) {
            $join->on('dongvat.dv_bo', '=', 'bo.bo_ma');
                 
        })
        ->get();
        $ctdv = DB::table('dongvat')->where('dv_ma',$id)->get();
        $new = DB::table('dongvat')->orderBy('dv_ma','DESC')->take(4)->get();
       
        return view('client.home.detail',['bo'=>$bo,'ho'=>$ho,'lop'=>$lop,'detail'=>$ctdv,'new'=>$new,'gioi'=>$gioi,'nganh'=>$nganh]);

    }
    public function animal_newest(){
      }
      public function respond(){
        return view('client.home.respond');

      } 

   
}
