@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    @foreach($categories as $category)
                    <h2>{{$category->name}}</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Вопрос</th>
                                <th>Дата создания</th>
                                <th>Статус</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->questions as $k => $question)
                            <tr>
                                <td>{{ $k=$k+1 }}</td>
                                <td>{!! Html::link(route('questionsEdit',['question'=>$question->id]),$question->question,['alt'=>$question->question]) !!}</td>
                                <td>{{ $question->created_at }}</td>
                                <td>
                                    @if($question->answer && $question->public == 1)
                                    Опубликован
                                    @elseif($question->answer && $question->public == 0)
                                    Скрыт
                                    @else
                                    Ожидает ответа
                                    @endif
                                </td>
                                 <td>
                                    {!! Form::open(['url'=>route('publicOff',['question'=>$question->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'patch') !!}
                                    {!! Form::button('Скрыть',['class'=>'btn btn-success btn-sm', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['url'=>route('publicOn',['question'=>$question->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'patch') !!}
                                    {!! Form::button('Опубликовать',['class'=>'btn btn-success btn-sm', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
<!--                                <td>
                                    {!! Form::open(['url'=>route('questionsEdit',['question'=>$question->id]), 'class'=>'form-horizontal','method' => 'GET']) !!}
                                    {!! Form::button('Редактировать',['class'=>'btn btn-success btn-sm', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>-->
                                <td>
                                    {!! Form::open(['url'=>route('questionsDestroy',['question'=>$question->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'delete') !!}
                                    {!! Form::button('Удалить',['class'=>'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
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
