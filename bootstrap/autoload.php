<?php

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Composerのオートローダーを登録する
|--------------------------------------------------------------------------
|
| Composerはアプリケーションのために便利なクラスのオートローダーを
| 自動的に生成する機能を提供してくれています。利用しない手はありません！
| ここでスクリプトをrequireし、クラスを「手動」でロードする手間に
| 悩まないようにしましょう。リラックして行きましょう。
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| コンパイル済みクラスファイルを取り込む
|--------------------------------------------------------------------------
|
| アプリケーションのパフォーマンスを劇的に改善するため、
| リクエストに必要な全クラスをまとめたコンパイル済みクラスファイルを
| 使いましょう。"optimize"Artisanコマンドで生成できます。
|
*/

if (file_exists($compiled = __DIR__.'/compiled.php'))
{
	require $compiled;
}

/*
|--------------------------------------------------------------------------
| Patchwork UTF-8ハンドリングの準備
|--------------------------------------------------------------------------
|
| Patchworkライブラリーは全mb_関数の代わりにUTF-8文字列を確実に
| 処理する機能と、デフォルトのPHPでは用意されていないようなiconv
| タイプの関数を提供しています。ここで準備を行いましょう。
|
*/

Patchwork\Utf8\Bootup::initMbstring();

/*
|--------------------------------------------------------------------------
| Laravelオートローダーの登録
|--------------------------------------------------------------------------
|
| アプリケーションのオートロードファイルを生成しなくても
| モデルクラスのロードができるように、Composerのローダーの
| 「裏」で動作するオートローダーを登録します。スタックに追加しています。
|
*/

Illuminate\Support\ClassLoader::register();

/*
|--------------------------------------------------------------------------
| ワークベンチローダーの登録
|--------------------------------------------------------------------------
|
| Laravelのワークベンチはローカルで開発するために便利な環境を
| 提供してくれます。しかしながらそうしたパッケージを使用するには
| Composerのオートロードファイルで読み込まれる必要があります。
|
*/

if (is_dir($workbench = __DIR__.'/../workbench'))
{
	Illuminate\Workbench\Starter::start($workbench);
}
