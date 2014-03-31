@extends('layouts.default')

@section('title', 'Sign Up')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-title">Sign up</h3>
                    <?= Form::open(['url' => 'user/register']) ?>
                    <div class="form-group">
                        <label for="username">username</label>
                        <?= Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) ?>
                        <div class="error"><?= e($errors->first('username')) ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <?= Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) ?>
                        <div class="error"><?= e($errors->first('email')) ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <?= Form::password('password', ['id' => 'password', 'class' => 'form-control']) ?>
                        <div class="error"><?= e($errors->first('password')) ?></div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" />
                    <?= Form::close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop