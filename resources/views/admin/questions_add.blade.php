@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive">

                        {!! Form::open(['url' => route('questions.store'),'class'=>'form-horizontal','method'=>'POST']) !!}

                        <div class="form-group">

                            {!! Form::label('question','Вопрос:',['class' => 'col-xs-2 control-label'])   !!}
                            <div class="col-xs-8">
                                {!! Form::textarea('question', old('question'),['class' => 'form-control','placeholder'=>'Текст вопроса'])!!}
                            </div>

                        </div>
                        
                        <div class="form-group">

                            {!! Form::label('username','Имя:',['class' => 'col-xs-2 control-label'])   !!}
                            <div class="col-xs-8">
                                {!! Form::text('username', old('username'),['class' => 'form-control','placeholder'=>'Имя'])!!}
                            </div>

                        </div>



                        <div class="form-group">
                            {!! Form::label('email', 'Эл. почта:',['class'=>'col-xs-2 control-label']) !!}
                            <div class="col-xs-8">
                                {!! Form::email('email' , ['class' => 'form-control','placeholder'=>'Адрес электронной почты']) !!}
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

