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
            $avatar = Image::make($file->getRealPath())->resize(36, 36)->sharpen(16)->encode('png')->save($path);
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
            $avatar = Image::make($file->getRealPath())->resize(180, 180)->sharpen(16)->encode('png')->save($path);
            return $filename;
        }
        else{
            return false;
        }

    }

     /**
      * This method checks if a particlar
      * user has logo and deletes it from DB
      * and also deltes it from folder
      *
     * @access public
     *
     * @static
     * 
     * @var $file
     * 
     * @return image name
     */
      public static function deleteAvatar($id)
      {
        $image = UserImage::where('user_id', $id)->first();
        if(!empty($image))
        {   
            unlink('images/user/'.$image->logo);
            $image->delete();
            return true;
        }else{
            return true;
        }
      }
}
