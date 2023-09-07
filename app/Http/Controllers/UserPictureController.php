<?php

namespace App\Http\Controllers;

use App\Models\UserPicture;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;







class UserPictureController extends Controller
{

    //profile picture store method
    public function store(Request $request)
    {
        $title = Auth::user()->name;
        $id = Auth::id();
        if ($request->image) {
            $image = $this->uploadImage($title, $request->image);
        }
        UserPicture::create([
            'user_id' => $id,
            'image' => $image

        ]);

        return redirect()->route('dashboard');
    }
    public function update(Request $request)
    {
        try {
            $id = Auth::id();
            $title = Auth::user()->name;
            $data = $request->except('_token');


            if ($request->hasFile('image')) {
                $user = UserPicture::where('user_id', $id)->first();

                $this->unlink($user->image);

                $data['image'] = $this->uploadImage($title, $request->image);
            }
            UserPicture::where('user_id', $id)->update($data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('dashboard');
    }
    public function remove()
    {
        $id = Auth::id();
        $user =  UserPicture::where('user_id', $id)->first();



        if ($user->image) {
            $this->unlink($user->image);
        }

        $user->delete();

        return redirect()->back();
    }

    public function uploadImage($title, $image)
    {

        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());


        $file_name = $timestamp . '-' . $title . '.' . $image->getClientOriginalExtension();

        $pathToUpload = storage_path() . '/app/public/users/';  // image  upload application save korbo

        if (!is_dir($pathToUpload)) {

            mkdir($pathToUpload, 0755, true);
        }

        Image::make($image)->resize(500, 500)->save($pathToUpload . $file_name);

        return $file_name;
    }
    private function unlink($image)
    {
        $pathToUpload = storage_path() . '/app/public/users/';
        if ($image != '' && file_exists($pathToUpload . $image)) {
            @unlink($pathToUpload . $image);
        }
    }
}
