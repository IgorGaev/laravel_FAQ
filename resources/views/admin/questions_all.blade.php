@extends('layouts.admin')

@section('content')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Вопрос</th>
                                <th>Добавлен</th>
                                <th>Редактировать</th>
                                <th>Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $k => $question)
                            <tr>
                                <td>{{ $k=$k+1 }}</td>
                                <td>{!! Html::link(route('questionsEdit',['question'=>$question->id]),$question->question,['alt'=>$question->question]) !!}</td>
                                <td>{{ $question->created_at }}</td>
                                <td>
                                    {!! Form::open(['url'=>route('questionsEdit',['question'=>$question->id]), 'class'=>'form-horizontal','method' => 'GET']) !!}
                                    {!! Form::button('Редактировать',['class'=>'btn btn-success btn-sm', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['url'=>route('questionsDestroy',['question'=>$question->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'delete') !!}
                                    {!! Form::button('Удалить',['class'=>'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!!  link_to('admin/categories', 'Back') !!}
</div>
@endsection

