<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

use File;

use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function update_profile(Request $request)
    {
        $login_admin_id = Auth::user('web')->id;
        $user = new User;
        $user_info = $user->find_user($login_admin_id);
        $profile_image = "";
        $previous_profile_img = $user_info->profile_image;
        if($request->hasFile('profile_image'))
        {
            if($previous_profile_img!='')
            {
                $image_path = "uploads/imgs/".$previous_profile_img;
                File::delete($image_path);
            }
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/imgs/', $filename);
            $profile_image = $filename;
        }
        else
        {
            if($previous_profile_img!='')
            {
                $profile_image = $previous_profile_img;
            }else
            {
                $profile_image = "";     
            }
        }
        $data = [
            'first_name' => $request->f_name,
            'last_name' => $request->l_name,
            'email' => $request->email,
            'profile_image' => $profile_image,
        ];
        $responce = $user->update_user($data,$login_admin_id);
        if($responce){
            session::flash('success','Profile Updated Successfully!');
            return redirect('admin/profile');
        }
    }
}
