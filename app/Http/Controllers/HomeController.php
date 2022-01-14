<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Sound;

class HomeController extends Controller
{
    //
    public function index() {
        return view('home');
    }

    public function getImage() {

        $rowCnt = Image::count();
        if ($rowCnt == 0 || $rowCnt == null) {
            $msg = array(
                'status' => '0',
                'message' => 'There is no images.'
            );
            echo json_encode($msg);
            return;
        }
        $randomValue = random_int(0, $rowCnt - 1);
        $image = Image::all()->offsetGet($randomValue);
        $msg = array(
            'status' => '1',
            'message' => $image
        );
        echo json_encode($msg);
        return;
    }

    public function getAudio() {
        $rowCnt = Sound::count();
        if ($rowCnt == 0 || $rowCnt == null) {
            $msg = array(
                'status' => '0',
                'message' => 'There is no audios.'
            );
            echo json_encode($msg);
            return;
        }
        $randomValue = random_int(0, $rowCnt - 1);
        $audio = Sound::all()->offsetGet($randomValue);
        $msg = array(
            'status' => '1',
            'message' => $audio
        );
        echo json_encode($msg);
        return;
    }
}
