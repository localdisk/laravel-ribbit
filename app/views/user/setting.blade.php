@extends('layouts.default')

@section('title', 'Setting')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-title">Setting</h3>
                    <?= Form::open(['url' => 'user/setting', 'files' => true]) ?>
                    <div class="form-group">
                        <label for="picture">picture</label>
                        <p>
                            @if(empty($user->picture))
                            <img src="http://placehold.jp/70x70.png" class="img-rounded" width="70" height="70" alt="default image"/>
                            @else
                            <?=
                            HTML::image($user->photo, $user->username, ['class' => 'img-rounded', 'width' => 70, 'height' => 70])
?>
                            @endif
                        </p>
                        <p><?= Form::file('picture') ?></p>
                    </div>
                    <div class="form-group">
                        <label for="username">username</label>
                        <?= Form::text('username', Auth::user()->username, ['id' => 'username', 'class' => 'form-control']) ?>
                        <div class="error"><?= e($errors->first('username')) ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <?= Form::text('email', Auth::user()->email, ['id' => 'email', 'class' => 'form-control']) ?>
                        <div class="error"><?= e($errors->first('email')) ?></div>
                    </div>
                    <button id="submit" class="btn btn-primary" type="button"  data-toggle="modal" data-target="#myModal">
                        Save
                    </button>
                    <!-- Modal -->
                    <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Password?</h4>
                                </div>
                                <div class="modal-body">
                                    <?= Form::password('password', ['id' => 'password', 'class' => 'form-control']) ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= Form::close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function() {
        $('#password').focus();
    });
</script>
@stop