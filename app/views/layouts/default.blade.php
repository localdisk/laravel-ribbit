<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8" />
        <title>@yield('title') | Labbit </title>
        <meta name="keywords" content="twitter clone Laravel 4." />
        <meta name="author" content="localdisk" />
        <meta name="description" content="Laravel 4 twitter clone" />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href="<?= URL::to('images/laravel-four-icon.png') ?>">
        <!-- CSS
        ================================================== -->
        <?= HTML::style('css/bootstrap.min.css') ?>
        <?= HTML::style('css/style.css') ?>

        <style>
            @section('styles')
            body {
                padding-top: 80px;
            }
            @show
        </style>

        <!-- Favicons
        ================================================== -->
    </head>

    <body>
        <!-- Navbar -->
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= URL::to('/') ?>">
                        <?= Html::image('images/laravel-four-icon.png', 'logo', ['width' => 25, 'height' => 25]) ?>
                        Labbit
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li <?= (Request::is('/') ? 'class="active"' : '') ?>><a href="<?= URL::to('/') ?>">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                        <li>
                            <a href="<?= URL::to('user/setting') ?>">
                                @if(empty(Auth::user()->picture))
                                <img src="http://placehold.jp/25x25.png" class="img-rounded" width="25" height="25" alt="default image"/>
                                @else
                                <?= HTML::image(Auth::user()->photo, Auth::user()->username, ['class' => 'img-rounded', 'width' => 25, 'height' => 25]) ?>
                                @endif
                                <?= Auth::user()->username ?>
                            </a>
                        </li>
                        <li></li>
                        <li><a href="<?= URL::to('user/logout') ?>">Logout</a></li>
                        @else
                        <li <?= (Request::is('user/login') ? 'class="active"' : '') ?>><a href="<?= URL::to('user/login') ?>">Login</a></li>
                        <li <?= (Request::is('user/signup') ? 'class="active"' : '') ?>><a href="<?= URL::to('user/signup') ?>">Sign Up</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <!-- ./ navbar -->
        <!-- Container -->
        <div class="container">
            <!-- notifications -->
            @include('notifications')
            <!-- ./ notifications -->

            <!-- Content -->
            @yield('content')
            <!-- ./ content -->
        </div>
        <!-- ./ container -->

        <!-- Javascripts
        ================================================== -->
        <?= HTML::script('js/jquery-1.10.2.min.js') ?>
        <?= HTML::script('js/bootstrap.min.js') ?>
        @section('script')
        @show
    </body>
</html>