<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image, Auth;

class ImageController extends Controller
{
     /**
     * @access public
     *
     * @static
     * 
     * @var $requuest
     * 
     * @return bool
     */
    public static function userImageUpload(Request $request)
    {
        if ($request->hasFile('avatar'))
        {    
            $file = $request->file('avatar');
            $filename = rand().time().'.'.$file->getClientOriginalExtension();
            $path = public_path('images/user/'.$filename);
            $avatar = Image::make($file->getRealPath())->resize(45, 45)->sharpen(16)->encode('png')->save($path);
            return $filename;
        }
        else{
            return false;
        }

    }


     /**
     * @access public
     *
     * @static
     * 
     * @var $requuest
     * 
     * @return bool
     */
    public static function postImageUpload(Request $request)
    {
        if ($request->hasFile('image'))
        {    
            $file = $request->file('image');
            $filename = rand().time().'.'.$file->getClientOriginalExtension();
            $path = public_path('images/post/'.$filename);
            $avatar = Image::make($file->getRealPath())->resize(200, 200)->sharpen(16)->encode('png')->save($path);
            return $filename;
        }
        else{
            return false;
        }

    }
}
