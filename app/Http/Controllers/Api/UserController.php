<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function users()
    {
        $twoweeks=Carbon::today()->subDay(12);

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
                                        ->whereDate('race_day', '>=', $twoweeks)
                                        ->where("round", "予選")
                                        ->orderBy("group")
                                        ->orderBy("course")
                                        ->get();
        

        
        return response()->json($users);
    }
}
