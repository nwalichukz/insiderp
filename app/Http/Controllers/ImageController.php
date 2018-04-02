<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
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
}
