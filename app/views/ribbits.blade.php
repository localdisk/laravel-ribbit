@extends('layouts.default')
@section('title', $user->username)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-title">
                        @if(empty($user->picture))
                        <img src="http://placehold.jp/70x70.png" class="img-rounded" width="70" height="70" alt="default image"/>
                        @else
                        <?= HTML::image($user->photo, $user->username, ['class' => 'img-rounded', 'width' => 70, 'height' => 70]) ?>
                        @endif
                        <?= e($user->username) ?>
                    </h3>
                    <dl>
                        <dt>ribbits</dt>
                        <dd><?= e($user->ribbits()->count()) ?></dd>
                        <dt>following</dt>
                        <dd><?= e($user->following()->count()) ?></dd>
                        <dt>followers</dt>
                        <dd><?= e($user->followers()->count()) ?></dd>
                    </dl>
                    @if ($user->username !== Auth::user()->username && !in_array($user->id, $following))
                    <?= Form::open(['url' => 'follow']) ?>
                    <div class="form-group">
                        <?= Form::hidden('user_id', $user->id) ?>
                        <?= Form::submit('Follow', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?= Form::close() ?>
                    @elseif ($user->username !== Auth::user()->username && in_array($user->id, $following))
                    <?= Form::open(['url' => 'unfollow']) ?>
                    <div class="form-group">
                        <?= Form::hidden('user_id', $user->id) ?>
                        <?= Form::submit('Unfollow', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?= Form::close() ?>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                @if ($user->username === Auth::user()->username)
                <div class="panel-body">
                    <h3>Ribitts</h3>
                    @if(!$errors->isEmpty())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= e($errors->first('ribbit')) ?>
                    </div>
                    @endif
                    <?= Form::open(['url' => 'ribbit', 'role' => 'form']) ?>
                    <div class="form-group">
                    <?= Form::textarea('ribbit', null, ['class' => 'form-control', 'rows' => 3]) ?>
                    </div>
                    <div class="form-group">
                        <?= Form::submit('ribbit', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?= Form::close() ?>
                </div>
                <hr class="reset" />
                @endif
                <div class="panel-heading">
                    <div class="panel-title">Ribbits</div>
                </div>
                <div class="panel-body">
                    <?php foreach ($ribbits as $ribbit) : ?>
                        <div class="row">
                            <div class="col-md-2">
                                <p class="pull-right">
                                    <a href="<?= URL::to("/profile/{$ribbit->user->username}") ?>">
                                    @if(empty($ribbit->user->picture))
                                        <img src="http://placehold.jp/30x30.png" class="img-rounded" width="30" height="30" alt="default image"/>
                                    @else
                                        <?= HTML::image($ribbit->user->photo, $ribbit->user->username, ['class' => 'img-rounded', 'width' => 70, 'height' => 70]) ?>
                                    @endif
                                    </a>
                                </p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <strong><?= e($ribbit->user->username) ?></strong>
                            </p>
                            <p><?= e($ribbit->ribbit) ?></p>
                        </div>
                    </div>
                    <hr />
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop