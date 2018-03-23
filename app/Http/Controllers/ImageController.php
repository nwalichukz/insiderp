<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;y

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
    public static function userImageUpload($file)
    {   
        $UniqueNoGen = time().mt_rand();
         //$file = Image::make($file)->fit(250);
        	
            $destinationPath = 'images/user';
            $fileName = $file->getClientOriginalName();
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
    public static function prevWorkImg(Request $request, $file, $user_id, $service_id)
    {   foreach ($file as $files) {
           $UniqueNoGen = time().mt_rand();
         //$file = Image::make($file)->fit(250);
        //$file = $request->file('images');
            $destinationPath = 'images/prevwork';
            $fileName = $files->getClientOriginalName();
            $fileExte = $files->getClientOriginalExtension();
            $newFileName = $UniqueNoGen.'.'.$fileExte;
            $uploadSuccess = $files->move($destinationPath, $newFileName);
             $save = new prevWorkImage;
     		 $save->user_id = $user_id;
     		 $save->service_id = $service_id;
     		 $save->name = $newFileName;
     		 $save->description = $request['description'];
     		 $save->save();
        }
    }
}
