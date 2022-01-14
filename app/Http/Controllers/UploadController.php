<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Sound;

class UploadController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('layout.empty', ['page' => 'dropArea', 'pageTitle' => 'Upload New Media']);
    }



    // functions for get, upload, store, destroy images

    public function getImages( Request $request ) {
        $result = Image::orderBy('id')->paginate(24);
        if ( $request->ajax() ) {
            $htmlContent = "";
            for ( $i = 0; $i < 24; $i++) {
                if ($result[$i] != null ) {
                    $htmlContent = $htmlContent."<div class='card mediaCard' style='width:180px; height: auto; margin: 10px; position: relative;' data-val='".$result[$i]->name."'><button class='btn btn-danger delImg' style='position:absolute;top:5px; right:5px; display: none; border-radius: 10%; width: 45px;'><i class='fa fa-trash-alt'></i></button>"
                    ."<img src='".$result[$i]->path."'  class='card-image-bottom' style='border-radius: 5%;'><div class='card-body' style='padding: 5px;'>"
                    ."<p style='text-align: center; color: #444; margin-top: 5px;'>".$result[$i]->name."</p></div></div>";
                }
            }
            echo $htmlContent;
        }
        return;
    }


    public function storeMedia( Request $request) {
        $media = $request->file('file');
        $mediaName = time().$media->getClientOriginalName();
        $mimetype = $request->file('file')->getClientMimeType();
        if(strpos($mimetype, 'image') !== false) {  // if media is image file
            echo "image";
            $path = $request->file('file')->storeAs('uploads/Images', $mediaName, 'public');  
            $imageUpload = new Image;
            $imageUpload->name = $mediaName;
            $imageUpload->path = "storage/".$path;
            $imageUpload->save();
            echo json_encode(array(
                'status' => '1',
                'message' => $mediaName
            ));
        } else if (strpos($mimetype, 'audio') !== false) {     // if media is audio file
            echo "sound";
            $path = $request->file('file')->storeAs('uploads/Sounds', $mediaName, 'public');  
            $soundUpload = new Sound;
            $soundUpload->name = $mediaName;
            $soundUpload->path = "storage/".$path;
            $soundUpload->save();
            echo json_encode(array(
                'status' => '1',
                'message' => $mediaName
            ));
        } else {
            echo json_encode(array(
                'status' => '0',
                'message' => $mediaName
            ));
        }
    }

    // functions for get, upload, store, destroy audios

    public function getSounds( Request $request ) {
        $result = Sound::orderBy('id')->paginate(32);
        if ($request->ajax()) {
            $htmlContent = "";
            for ($i = 0 ; $i < 32; $i++) {
                if ($result[$i] != null ) {
                    $htmlContent = $htmlContent."<div class='card mediaCard' style='width:300px; margin-left: 2px;margin-right: 2px; margin-top: 15px; margin-bottom: 15px;' data-val='".$result[$i]->name."'><button class='btn btn-warning delAud' style='display:none; position: absolute; top: 57px;right: 10px; width: 43px;'><i class='fa fa-trash-alt'></i></button>"
                    ."<audio controls src='".$result[$i]->path."' style='border-radius: 5%;'></audio><div class='card-body' style='padding: 5px;'>"
                    ."<p style='text-align: center; color: #444'>".$result[$i]->name."</p></div></div>";
                }
            }
            echo $htmlContent;
        }
        return;
    }

    public function storeSound( Request $request) {
        $sound = $request->file('file');
        $soundName = time().$sound->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads/Sounds', $soundName, 'public');
        
        $soundUpload = new Sound;
        $soundUpload->name = $soundName;
        $soundUpload->path = "storage/".$path;
        $soundUpload->save();
        return response()->json(['success'=>$soundName]);
    }

    public function destroyImage( Request $request) {
        $filename =  $request->get('filename');
        Image::where('name',$filename)->delete();
        $path=public_path()."\storage\uploads\Images\\".$filename;
        if (file_exists($path)) {
            @unlink($path);
            echo "success";
            return;
        }
        echo "failed";
        return;  
    }


    public function destroySound( Request $request) {
        $filename =  $request->get('filename');
        Sound::where('name',$filename)->delete();
        $path=public_path()."\storage\uploads\Sounds\\".$filename;
        if (file_exists($path)) {
            @unlink($path);
            echo "success";
            return;
        }
        echo "failed";
        return;  
    }


}
