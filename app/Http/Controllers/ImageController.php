<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\UserAvater;
use App\VendorLogo;
use App\prevWorkImage;
use Image;

class ImageController extends Controller
{
      /**
     * @access public
     *
     * @static
     * 
     * @var $file
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
            $avatar = Image::make($file->getRealPath())->resize(350, 300)->sharpen(16)->encode('png')->save($path);
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
     * @var $file
     * 
     * @return image name
     */
    public static function prevWorkImg($files)
    {
        foreach ($files as $file) {

          $watermark = Image::make('images/watermark/watermark.png')->greyscale()->resize(100, 40)->opacity(10);
            $filename = rand().time().'.'.$file->getClientOriginalExtension();
            $path = public_path('images/prev/'.$filename);
            $avatar = Image::make($file->getRealPath())->resize(450, 450)->sharpen(16)->encode('png')
            ->insert($watermark, 'bottom-right', 10, 10)->save($path);
            return $filename;

        }
    }

      /**
      * This method checks if a particlar
      * user has avater and deletes it
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
        $image = UserAvater::where('user_id', $id)->first();
        if(!empty($image))
        {
            unlink('images/user/'.$image->avater);
            $image->delete();
            return true;
        }else{
            return true;
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
      public static function deleteLogo($id)
      {
        $image = VendorLogo::where('service_id', $id)->first();
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
