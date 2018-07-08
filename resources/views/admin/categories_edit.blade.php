@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        {!! Form::open(['url' => route('categoriesUpdate',array('category'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST') !!}
                        {!! Form::hidden('_method', 'patch') !!}
                        <div class="form-group">
                            {!! Form::hidden('id', $data['id']) !!}
                            {!! Form::label('category', 'Тема:',['class'=>'col-xs-2 control-label']) !!}
                            <div class="col-xs-8">
                                {!! Form::text('category',  ['class' => 'form-control','placeholder'=>'Новая тема']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                {!! Form::button('Создать', ['class' => 'btn btn-primary','type'=>'submit']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!!  link_to('admin/categories', 'Back') !!}
</div>
@endsection



