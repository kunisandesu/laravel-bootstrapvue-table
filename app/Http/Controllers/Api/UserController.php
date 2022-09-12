<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\User;


class UserController extends Controller
{

    private $privateTermMin = "10"; //表示したい最小日数設定 ( 本日が 9/13 で, 次のレース日が 9/29, その次のレース日が 10/20 とすると. )
    private $privateTermMax = "35"; //表示したい最大日数設定 ( 次の次のレースを入力しない場合は, 上を 0 で, これをコメントアウトすれば良い. )

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function users()
    {

        $MinDay=Carbon::today()->addDay($this -> privateTermMin); //本日から最小として設定した日数を加える
        $MaxDay=Carbon::today()->addDay($this -> privateTermMax); //本日から最大として設定した日数を加える ( 次の次のレースを入力しない場合は, これをコメントアウトすれば良い. )

        $users = User::select(['id', 
                               'name', 
                               'created_at', 
                               'email', 
                               'group', 
                               'course', 
                               'time', 
                               'point', 
                               'race_day', 
                               'round', 
                               'year', 
                               'category', 
                               'class'])//->where('race_day','>=','2022-08-29')
                                        ->whereDate('race_day', '>=', $MinDay) //レース日が設定した日数より後なら
                                        ->whereDate('race_day', '<=', $MaxDay) //レース日が設定した日数より前なら ( 次の次のレースを入力しない場合は, これをコメントアウトすれば良い. )
                                        ->where("round", "予選")
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->get();
                                            

        
        return response()->json($users);
    }

    public function usergp1s()
    {
        $MinDay=Carbon::today()->addDay($this -> privateTermMin);
        $MaxDay=Carbon::today()->addDay($this -> privateTermMax);

        $users = User::select(['id', 
                               'name', 
                               'created_at', 
                               'email', 
                               'group', 
                               'course', 
                               'time', 
                               'point', 
                               'race_day', 
                               'round', 
                               'year', 
                               'category', 
                               'class'])//->where('race_day','>=','2022-08-29')
                                        ->whereDate('race_day', '>=', $MinDay)
                                        ->whereDate('race_day', '<=', $MaxDay)
                                        ->where("round", "予選")                                        
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->where("group", "1")
                                        ->get();
        

        
        return response()->json($users);
    }


    public function usergp2s()
    {
        $MinDay=Carbon::today()->addDay($this -> privateTermMin);
        $MaxDay=Carbon::today()->addDay($this -> privateTermMax);

        $users = User::select(['id', 
                               'name', 
                               'created_at', 
                               'email', 
                               'group', 
                               'course', 
                               'time', 
                               'point', 
                               'race_day', 
                               'round', 
                               'year', 
                               'category', 
                               'class'])//->where('race_day','>=','2022-08-29')
                                        ->whereDate('race_day', '>=', $MinDay)
                                        ->whereDate('race_day', '<=', $MaxDay)
                                        ->where("round", "予選")                                        
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->where("group", "2")
                                        ->get();
        

        
        return response()->json($users);
    }



    
    public function userfinalgp1s()
    {
        $MinDay=Carbon::today()->addDay($this -> privateTermMin);
        $MaxDay=Carbon::today()->addDay($this -> privateTermMax);

        $users = User::select(['id', 
                               'name', 
                               'created_at', 
                               'email', 
                               'group', 
                               'course', 
                               'time', 
                               'point', 
                               'race_day', 
                               'round', 
                               'year', 
                               'category', 
                               'class'])//->where('race_day','>=','2022-08-29')
                                        ->whereDate('race_day', '>=', $MinDay)
                                        ->whereDate('race_day', '<=', $MaxDay)
                                        ->where("round", "決勝")                                        
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->where("group", "1")
                                        ->get();
        

        
        return response()->json($users);
    }


}
