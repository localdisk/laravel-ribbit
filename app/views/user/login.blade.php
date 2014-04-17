@extends('layouts.default')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-title">Login</h3>
                    <?= Form::open(['url' => 'user/login']) ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <?= Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) ?>
                        <div class="error"><?= e($errors->first('username')) ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <?= Form::password('password', ['id' => 'password', 'class' => 'form-control']) ?>
                        <div class="error"><?= e($errors->first('password')) ?></div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <?= Form::checkbox('remember') ?> Remember Me?
                        </label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" />
                    <?= Form::close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop