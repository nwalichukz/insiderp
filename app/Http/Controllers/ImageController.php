<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserImage;
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
            $avatar = Image::make($file->getRealPath())->resize(36, 36)->save($path);
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
    public static function postImageUpload($image)
    {
        if (!empty($image))
        {    
            $file = $image;//$request->file('image');
            $filename = rand().time().'.'.$file->getClientOriginalExtension();
            $path = public_path('images/post/'.$filename);
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height();
            if($width > 500 && $height > 600){
            Image::make($file->getRealPath())->resize(600, 700)->save($path);
            return $filename;
           }else{
            Image::make($file->getRealPath())->save($path);
            return $filename;
          }
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
    public static function optionImageUpload(Request $request)
    {
        if ($request->hasFile('image'))
        {    
            $file = $request->file('image');
            $filename = rand().time().'.'.$file->getClientOriginalExtension();
            $path = public_path('images/option/'.$filename);
            $avatar = Image::make($file->getRealPath())->resize(80, 100)->encode('png')->save($path);
            return $filename;
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
        {   unlink('images/user/'.$image->logo);
            $image->delete();
            return true;
        }else{
            return true;
        }
      }
}
