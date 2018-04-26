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
            $destinationPath = 'images/user';
            $file = $request->file('avatar');
            $avatar = time().'.'.$file->getClientOriginalExtension();
            Image::make($avatar)->resize(450, 450)->save($destinationPath);
            return $avatar;
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

            $destinationPath = 'images/prevwork';
            $photo = time().'.'.$file->getClientOriginalExtension();
            Image::make($photo)->resize(350,350)->brightness(13)->text("Bido Works", 15, 15)->save($destinationPath);
            return true;

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
