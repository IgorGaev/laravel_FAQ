@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive">

                        {!! Form::open(['url' => route('admins.store'),'class'=>'form-horizontal','method'=>'POST']) !!}

                        <div class="form-group">

                            {!! Form::label('login','Логин:',['class' => 'col-xs-2 control-label'])   !!}
                            <div class="col-xs-8">
                                {!! Form::text('login', old('login'),['class' => 'form-control','placeholder'=>'Логин'])!!}
                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Пароль:',['class'=>'col-xs-2 control-label']) !!}
                            <div class="col-xs-8">
                                {!! Form::password('password' , ['class' => 'form-control','placeholder'=>'Пароль']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div>
                                {!! Form::button('Создать', ['class' => 'btn btn-primary','type'=>'submit']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection