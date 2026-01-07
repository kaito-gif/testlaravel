<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!!!!!!';
});

Route::get('/about', function () {
    return '<h1>会社概要</h1><p>私たちは素晴らしい会社です。</p>';
});

Route::get('/company', function () {
    return view('company');
});

Route::get('/user/{id}', function ($id) {
    return 'ユーザーID: ' . $id;
});

Route::get('/post/{category}/{id}', function ($category, $id) {
    return "カテゴリ: {$category}, 記事ID: {$id}";
});

// Route::get('/greeting/{name?}', function ($name = 'ゲスト') {
//     return "こんにちは、{$name}さん";
// });

Route::get('/profile/user', function () {
    return 'プロフィールページ';
})->name('profile');

Route::get('/user/{id}', function ($id) {
    return "ユーザーID: {$id}";
})->name('user.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return '管理画面ダッシュボード';
    })->name('dashboard');  // ルート名: admin.dashboard

    Route::get('/users', function () {
        return 'ユーザー管理';
    })->name('users');      // ルート名: admin.users
});

Route::get('/hello', function () {
    return view('hello');
});

// Route::get('/greeting', function () {
//     return view('greeting', ['name' => 'katayama']);
// });

// Route::get('/greeting', function () {
//     return view('greeting')->with('name', '佐藤');
// });

Route::get('/greeting', function () {
    $age = 12;

    return view('greeting', compact('age'));
});

Route::get('/xss-demo', function () {
    // 攻撃者が入力したコメント（本来はフォームから受け取る）
    $comment = '<strong>太字</strong>のテキスト';

    return view('xss-demo', compact('comment'));
});

Route::get('/users', function () {
    $users = [];

    return view('users', compact('users'));
});