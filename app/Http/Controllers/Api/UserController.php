<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\User;

use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    private $privateTermMin = "0"; //表示したい最小日数設定 ( 本日が 9/13 で, 次のレース日が 9/29, その次のレース日が 10/20 とすると. )
    private $privateTermMax = "10"; //表示したい最大日数設定 ( 次の次のレースを入力しない場合は, 上を 0 で, これをコメントアウトすれば良い. )




    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function update()
    {                     
        $users = User::where([
                           ['category', "健常"],
                           ['class', "ジュニア"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 180 + 40;          
            $user->save();
            $i++;
        }
    }


    public function updateThigh()
    {                     
        $users = User::where([
                           ['category', "大腿"],
                           ['class', "ジュニア"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 300 + 40;          
            $user->save();
            $i++;
        }
    }

    public function updateLower()
    {                     
        $users = User::where([
                           ['category', "下腿"],
                           ['class', "ジュニア"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 240 + 40;          
            $user->save();
            $i++;
        }
    }

    public function updateMiddle()
    {                     
        $users = User::where([
                           ['category', "健常"],
                           ['class', "ミドル"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 180 + 10;          
            $user->save();
            $i++;
        }
    }


    public function updateThighM()
    {                     
        $users = User::where([
                           ['category', "大腿"],
                           ['class', "ミドル"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 300 + 10;          
            $user->save();
            $i++;
        }
    }

    public function updateLowerM()
    {                     
        $users = User::where([
                           ['category', "下腿"],
                           ['class', "ミドル"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 240 + 10;          
            $user->save();
            $i++;
        }
    }

    public function updateSenior()
    {                     
        $users = User::where([
                           ['category', "健常"],
                           ['class', "シニア"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 180 + 20;          
            $user->save();
            $i++;
        }
    }


    public function updateThighS()
    {                     
        $users = User::where([
                           ['category', "大腿"],
                           ['class', "シニア"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 300 + 20;          
            $user->save();
            $i++;
        }
    }

    public function updateLowerS()
    {                     
        $users = User::where([
                           ['category', "下腿"],
                           ['class', "シニア"]
                        //])->get();
                        ])//->pluck('point', 'time')
                          //->select('point as time')
                          ->get();

        $i = 0;
        foreach($users as $user) {

            $point = $user->pluck('time');
            $user->point = $point[$i] * 100 + 240 + 20;          
            $user->save();
            $i++;
        }
    }

    public function users()
    {

        $minDay=Carbon::today()->addDay($this -> privateTermMin); //本日から最小として設定した日数を加える
        $maxDay=Carbon::today()->addDay($this -> privateTermMax); //本日から最大として設定した日数を加える ( 次の次のレースを入力しない場合は, これをコメントアウトすれば良い. )




        $users = User::select(['id', 
                               'name', 
                               'created_at', 
                               //'email', 
                               'group', 
                               'course', 
                               'time', 
                               'point', 
                               'race_day', 
                               'round', 
                               //'year', 
                               'category', 
                               'class'])//->where('race_day','>=','2022-09-29')
                                        ->whereDate('race_day', '>=', $minDay) //レース日が設定した日数より後なら
                                        ->whereDate('race_day', '<=', $maxDay) //レース日が設定した日数より前なら ( 次の次のレースを入力しない場合は, これをコメントアウトすれば良い. )
                                        ->where("round", "予選")
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->get(); 
                                            

        
        return response()->json($users);


    }


    public function usersearches()
    {

        //$minDay=Carbon::today()->addDay($this -> privateTermMin); //本日から最小として設定した日数を加える
        //$maxDay=Carbon::today()->addDay($this -> privateTermMax); //本日から最大として設定した日数を加える ( 次の次のレースを入力しない場合は, これをコメントアウトすれば良い. )

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
                               'class'])//->where('race_day','>=','2022-09-29')
                                        //->whereDate('race_day', '>=', $minDay) //レース日が設定した日数より後なら
                                        //->whereDate('race_day', '<=', $maxDay) //レース日が設定した日数より前なら ( 次の次のレースを入力しない場合は, これをコメントアウトすれば良い. )
                                        //->where("round", "予選")
                                        ->orderBy("race_day", 'desc')
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->get();
                                            

        
        return response()->json($users);
    }


    public function usergp1s()
    {
        $minDay=Carbon::today()->addDay($this -> privateTermMin);
        $maxDay=Carbon::today()->addDay($this -> privateTermMax);

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
                                        ->whereDate('race_day', '>=', $minDay)
                                        ->whereDate('race_day', '<=', $maxDay)
                                        ->where("round", "予選")                                        
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->where("group", "1")
                                        ->get();
        

        
        return response()->json($users);
    }


    public function usergp2s()
    {
        $minDay=Carbon::today()->addDay($this -> privateTermMin);
        $maxDay=Carbon::today()->addDay($this -> privateTermMax);

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
                                        ->whereDate('race_day', '>=', $minDay)
                                        ->whereDate('race_day', '<=', $maxDay)
                                        ->where("round", "予選")                                        
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->where("group", "2")
                                        ->get();
        

        
        return response()->json($users);
    }



    
    public function userfinalgp1s()
    {
        $minDay=Carbon::today()->addDay($this -> privateTermMin);
        $maxDay=Carbon::today()->addDay($this -> privateTermMax);

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
                                        ->whereDate('race_day', '>=', $minDay)
                                        ->whereDate('race_day', '<=', $maxDay)
                                        ->where("round", "決勝")                                        
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->where("group", "1")
                                        ->get();
        

        
        return response()->json($users);
    }


}
