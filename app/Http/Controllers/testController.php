<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;

class testController extends Controller
{
    //
    public function index() {

        $variable = [
                [
                    'title' => 'diaz'
                ],
                [
                    'title' => 'daffa'
                ],
                [
                    'title' => 'zikri'
                ],
        ];

        $datas = [
            $variable
        ];

        foreach ($datas as $data) {
            JavaScript::put([
                'content' => $data
            ]);
        }

        return view('pages.landing');

    }

    //
    public function signin() {

        $variable = [
            [
                'title' => 'diaz'
            ],
            [
                'title' => 'daffa'
            ],
            [
                'title' => 'zikri'
            ],
        ];

        $datas = [
            $variable
        ];

        foreach ($datas as $data) {
            JavaScript::put([
                'content' => $data
            ]);
        }

        return view('pages.signin');

    }

    public function signup() {

        return view('pages.signup');

    }

    public function content() {

        return view('pages.content');

    }

    public function me() {

        return view('pages.profile');

    }

    public function editprofile() {

        return view('pages.editprofile');

    }

    public function create() {

        return view('pages.create');

    }

    public function show() {

        return view('pages.show');

    }
}
