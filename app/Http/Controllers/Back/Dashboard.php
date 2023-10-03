<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Permission;
class Dashboard extends Controller
{
    public function index(){

        $user = Auth::user();
        // if(!$user->can('create.user')){
        //     abort(404);
        // }
        // Permission::create(['name'=>'create.user']);
        // $user->givePermissionTo('create.user');
        // if($user->can('create.user')){
        //     return 'true';
        // }
        // else{
        //     return 'false';
        // }
        return view('back.dashboard');
    }
}
