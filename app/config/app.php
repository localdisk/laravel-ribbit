<?php

return array(
    /*
      |--------------------------------------------------------------------------
      | アプリケーションのデバッグモード
      |--------------------------------------------------------------------------
      |
      | アプリケーションをデバッグモードにすると、アプリケーションでエラーが発生する
      | たびにスタックトレースともに、詳細なエラーメッセージが表示されます。
      | このモードでない場合、シンプルで一般利用者向きなエラーページが表示されます。
      |
     */

    'debug'     => true,
    /*
      |--------------------------------------------------------------------------
      | アプリケーションURL
      |--------------------------------------------------------------------------
      |
      | このURLはArtisanコマンドラインツールを使用する時に正しい
      | URLを生成するために使用します。アプリケーションのルートのURLを設定してください。
      | Artisanコマンドを実行する時に使用されます。
      |
     */
    'url'       => 'http://localhost',
    /*
      |--------------------------------------------------------------------------
      | アプリケーションタイムゾーン
      |--------------------------------------------------------------------------
      |
      | ここではアプリケーションのデフォルトタイムゾーンを指定します。これは
      | PHPの日付／時間関数で使用されます。最初から未設定でも使用できるように
      | 適切なデフォルトを設定してあります。
      |
     */
    'timezone'  => 'UTC',
    /*
      |--------------------------------------------------------------------------
      | アプリケーションローカル設定
      |--------------------------------------------------------------------------
      |
      | アプリケーションローカルは翻訳サービスプロバイダーにより使用される
      | デフォルトローカルを指定します。アプリケーションで提供するローカルを
      | 自由に設定してください。
      |
     */
    'locale'    => 'ja',
	/*
	|--------------------------------------------------------------------------
	| アプリケーションフォールバック言語
	|--------------------------------------------------------------------------
	|
	| フォールバック言語は現在のローカルが使用できない場合に、
	| 代替として使われます。アプリケーション全体に対して用意されている
	| 言語フォルダーに対応するコードであればどれでも使用可能です。
	|
	*/
	'fallback_locale' => 'en',
    /*
      |--------------------------------------------------------------------------
      | 暗号化キー
      |--------------------------------------------------------------------------
      |
      | このキーはIlluminate暗号化サービスで使用されます。ランダムな32文字を
      | セットしないと安全ではありません。アプリケーションをデプロイ
      | する前に、必ず変更してください。
      |
     */
    'key'       => 'imzhcBu3z7KZUfZuiziGS1DrvKKokeKa',

	'cipher' => MCRYPT_RIJNDAEL_128,
    /*
      |--------------------------------------------------------------------------
      | オートロードサービスプロバイダー
      |--------------------------------------------------------------------------
      |
      | ここにリストしたサービスプロバイダーはアプリケーションのリクエストに対し
      | 自動的にロードされます。アプリケーションの機能を拡張するため、この配列へ
      | 自由に自分のサービスを付け加えてください。
      |
     */
    'providers' => array(
        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        'Illuminate\Cache\CacheServiceProvider',
        'Illuminate\Session\CommandsServiceProvider',
        'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
        'Illuminate\Routing\ControllerServiceProvider',
        'Illuminate\Cookie\CookieServiceProvider',
        'Illuminate\Database\DatabaseServiceProvider',
        'Illuminate\Encryption\EncryptionServiceProvider',
        'Illuminate\Filesystem\FilesystemServiceProvider',
        'Illuminate\Hashing\HashServiceProvider',
        'Illuminate\Html\HtmlServiceProvider',
        'Illuminate\Log\LogServiceProvider',
        'Illuminate\Mail\MailServiceProvider',
        'Illuminate\Database\MigrationServiceProvider',
        'Illuminate\Pagination\PaginationServiceProvider',
        'Illuminate\Queue\QueueServiceProvider',
        'Illuminate\Redis\RedisServiceProvider',
        'Illuminate\Remote\RemoteServiceProvider',
        'Illuminate\Auth\Reminders\ReminderServiceProvider',
        'Illuminate\Database\SeedServiceProvider',
        'Illuminate\Session\SessionServiceProvider',
        'Illuminate\Translation\TranslationServiceProvider',
        'Illuminate\Validation\ValidationServiceProvider',
        'Illuminate\View\ViewServiceProvider',
        'Illuminate\Workbench\WorkbenchServiceProvider',
        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
        'Way\Generators\GeneratorsServiceProvider',
        'Intervention\Image\ImageServiceProvider',
        'Barryvdh\Debugbar\ServiceProvider',
    ),
    /*
      |--------------------------------------------------------------------------
      | サービスプロバイダーマニフェスト
      |--------------------------------------------------------------------------
      |
      | サービスプロバイダーマニフェストはLaravelにより使用され、リクエストのたびに
      | 必要ではないサービスプロバイダーを後からロードするために使用される、
      | 全サービスのリストです。ここでは、保存箇所を指定します。
      |
     */
    'manifest'  => storage_path() . '/meta',
    /*
      |--------------------------------------------------------------------------
      | クラスエイリアス
      |--------------------------------------------------------------------------
      |
      | このクラスエイリアスの配列はこのアプリケーションが開始されると登録されます。
      | エイリアスをどんなに好きなだけ自由に登録しても、「遅延」ロードされるので、
      | パフォーマンスを妨げることはありません。
      |
     */
    'aliases'   => array(
        'App'         => 'Illuminate\Support\Facades\App',
        'Artisan'     => 'Illuminate\Support\Facades\Artisan',
        'Auth'        => 'Illuminate\Support\Facades\Auth',
        'Blade'       => 'Illuminate\Support\Facades\Blade',
        'Cache'       => 'Illuminate\Support\Facades\Cache',
        'ClassLoader' => 'Illuminate\Support\ClassLoader',
        'Config'      => 'Illuminate\Support\Facades\Config',
        'Controller'  => 'Illuminate\Routing\Controller',
        'Cookie'      => 'Illuminate\Support\Facades\Cookie',
        'Crypt'       => 'Illuminate\Support\Facades\Crypt',
        'DB'          => 'Illuminate\Support\Facades\DB',
        'Eloquent'    => 'Illuminate\Database\Eloquent\Model',
        'Event'       => 'Illuminate\Support\Facades\Event',
        'File'        => 'Illuminate\Support\Facades\File',
        'Form'        => 'Illuminate\Support\Facades\Form',
        'Hash'        => 'Illuminate\Support\Facades\Hash',
        'HTML'        => 'Illuminate\Support\Facades\HTML',
        'Input'       => 'Illuminate\Support\Facades\Input',
        'Lang'        => 'Illuminate\Support\Facades\Lang',
        'Log'         => 'Illuminate\Support\Facades\Log',
        'Mail'        => 'Illuminate\Support\Facades\Mail',
        'Paginator'   => 'Illuminate\Support\Facades\Paginator',
        'Password'    => 'Illuminate\Support\Facades\Password',
        'Queue'       => 'Illuminate\Support\Facades\Queue',
        'Redirect'    => 'Illuminate\Support\Facades\Redirect',
        'Redis'       => 'Illuminate\Support\Facades\Redis',
        'Request'     => 'Illuminate\Support\Facades\Request',
        'Response'    => 'Illuminate\Support\Facades\Response',
        'Route'       => 'Illuminate\Support\Facades\Route',
        'Schema'      => 'Illuminate\Support\Facades\Schema',
        'Seeder'      => 'Illuminate\Database\Seeder',
        'Session'     => 'Illuminate\Support\Facades\Session',
        'SSH'         => 'Illuminate\Support\Facades\SSH',
        'Str'         => 'Illuminate\Support\Str',
        'URL'         => 'Illuminate\Support\Facades\URL',
        'Validator'   => 'Illuminate\Support\Facades\Validator',
        'View'        => 'Illuminate\Support\Facades\View',
        'Image'       => 'Intervention\Image\Facades\Image'
    ),
);
