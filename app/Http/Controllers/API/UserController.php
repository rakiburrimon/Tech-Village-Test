<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->q);

        $users = DB::table('users')->select('uuid')->selectRaw("CONCAT(first_name, ' ', last_name) as name");

        if($request->q){
            $users = $users->where('first_name', 'like', '%' . $request->q . '%')->orwhere('last_name', 'like', '%' . $request->q . '%')->orwhere('email', 'like', '%' . $request->q . '%');
        }

        $users = $users->paginate(30);


        $totalpages = $users->lastPage();
        $currenturl = url()->current();
        $nexturl = $users->nextPageUrl();

        // dd($users);

        return [
            'items' => $users,
            'metadata' => [
                'current_url' => $currenturl,
                'next_url'   => $nexturl,
                'total_page'   => $totalpages,
            ],
        ];
    }
}
