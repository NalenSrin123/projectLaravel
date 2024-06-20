<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function moveUpload($file){
        $image=time().'-'.$file->getClientOriginalName();
        $path='images';
        $file->move($path,$image);
        return $image;
    }
    public function views(){
        
    }
}
