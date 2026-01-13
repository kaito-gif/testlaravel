<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー一覧を表示
    public function index()
    {
        $users = ['太郎', '花子', '次郎', '三郎'];
        return view('users.index', compact('users'));
    }

    // 個別ユーザーを表示
    public function show($id)
    {
        $user = ['id' => $id, 'name' => '太郎'];
        return view('users.show', compact('user'));
    }
}
