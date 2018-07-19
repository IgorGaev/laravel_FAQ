@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive">

                        @if($categories)
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Вопросов</th>
                                    <th>Опубликованно</th>
                                    <th>Без ответа</th>
                                    <th>Создана</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $k => $category)
                                <tr>
                                    <td>{{ $k=$k+1 }}</td>
                                    <td>{!! Html::link(route('questions.index',['category'=>$category->id]),$category->name,['alt'=>$category->name]) !!}</td>
                                    <td>{{ $category->questions->count() }}</td>
                                    <td>{{ $category->questions->where('public',1)->count() }}</td>
                                    <td>{{ $category->questions->where('answer', null)->count() }}</td>
                                    <td>
                                        {!! Form::open(['url'=>route('categories.destroy',['category'=>$category->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
                                        {!! Form::hidden('_method', 'delete') !!}
                                        {!! Form::button('Удалить',['class'=>'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        
                        {!! Html::link(route('categories.create'),'Создать тему',['class'=>' btn btn-primary btn-sm']) !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Html::link(route('adminpanel'),'Back') !!}
</div>

@endsection

