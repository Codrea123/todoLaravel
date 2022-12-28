<?php

namespace App\Http\Controllers;

use App\Http\Requests\subTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\VendorRequest;
use App\Models\SubTask;
use App\Models\Task;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index')->with([
            'user'=>auth()->user(),
            'numberOfUsers'=>User::all()->count(),
            'numberOfTasks'=>Task::all()->count(),
        ]);
    }

    public function update(UserUpdateRequest $request){
        try {
            $user = auth()->user();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if($request->get('password') != null){
                $user->password = bcrypt($request->get('password'));
            }
            $user->save();
            return redirect()->back()->with('success','Profile Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
