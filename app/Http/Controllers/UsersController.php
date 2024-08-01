<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UsersController extends Controller
{
    protected $user;
    
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function getReferals(){
        $referals = User::where('parent_id', Auth::user()->id)->get();
        info($referals);
        return Inertia::render('Users/Referals', [
            'referals'=> $referals
        ]);
    }

    public function getReferalLink(){
       return Inertia::render('Users/ReferalLink', [
            'uuid'=> $this->user->uuid
        ]);
    }

    public function getDownlines(Request $request){
        $level = $request->level? $request->level: 0;
        $userIds = array();
        for($i=0;$i<=$level;$i++){
            if($i==0){
                $userIds = User::where('parent_id', $this->user->id)->get(['id'])->toArray();
                continue;
            }
            $userIds = User::whereIn('parent_id', $userIds)->get(['id'])->toArray();
        }
        $users = User::whereIn('id', $userIds)->get();
        return Inertia::render('Users/Downline', [
            'downlines'=> $users,
            'levels' => $this->generateLavel()  
            ]);

    }

    private function generateLavel(){
        $levels = array();
        $userIds = User::where('parent_id', $this->user->id)->get(['id'])->toArray();
        $count = 0;
        while(count($userIds)){
            $levels[] = 'Level '.$count;
            $userIds = User::whereIn('parent_id', $userIds)->get(['id'])->toArray();
            $count++;
        };

        return $levels;
    }
}
