<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\UserAvater;
use App\VendorLogo;
use App\prevWorkImage;

class ImageController extends Controller
{
      /**
     * @access public
     *
     * @static
     * 
     * @var $file
     * 
     * @return image name
     */
    public static function userImageUpload(Request $request)
    {   $file = $request->file('avatar');
        $UniqueNoGen = time().mt_rand();
            $destinationPath = 'images/user';
            //$fileName = $file->getClientOriginalName();
            $fileExte = $file->getClientOriginalExtension();
            $newFileName = $UniqueNoGen.'.'.$fileExte;
            $uploadSuccess = $file->move($destinationPath, $newFileName);
            return $newFileName;

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
    public static function prevWorkImg($file)
    {  
    	foreach ($file as $files) {
           $UniqueNoGen = time().mt_rand();
            $destinationPath = 'images/prevwork';
            //$fileName = $files->getClientOriginalName();
            $fileExte = $files->getClientOriginalExtension();
            $newFileName = $UniqueNoGen.'.'.$fileExte;
            $uploadSuccess = $files->move($destinationPath, $newFileName);
            return $newFileName;
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
