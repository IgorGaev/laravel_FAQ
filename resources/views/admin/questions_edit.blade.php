@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        {!! Form::open(['url' => route('questions.update',array('question'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST']) !!}
                        {!! Form::hidden('_method', 'patch') !!}
                        {!! Form::hidden('id', $data['id']) !!}

                        <div class="form-group">
                            {!! Form::label('username', 'Автор:',['class'=>'col-xs-2 control-label']) !!}
                            <div class="col-xs-8">
                                {!! Form::text('username', $data['username'], ['class' => 'form-control','placeholder'=>'Имя автора']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class = "col-xs-2 control-label"> Тема вопроса:</label>
                            <select class = "form-control" name="category_id">
                                @foreach($categories as $category)
                                <option  label="{{$category->name}}" value="{{$category->id}}"></option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('question', 'Вопрос:',['class'=>'col-xs-2 control-label']) !!}
                            <div class="col-xs-8">
                                {!! Form::textarea('question', $data['question'], ['class' => 'form-control','placeholder'=>'Текст вопроса']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('answer', 'Ответ:',['class'=>'col-xs-2 control-label']) !!}
                            <div class="col-xs-8">
                                {!! Form::textarea('answer', $data['answer'], ['class' => 'form-control','placeholder'=>'Текст ответа']) !!}
                            </div>
                        </div>

                        <table>
                            <tr>
                                <td>
                                    {!! Form::button('Сохранить изменения', ['class' => 'btn btn-primary','type'=>'submit']) !!}
                                </td>
                               {!! Form::close() !!} 
                            </tr>
                        </table>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
     {!! Html::link(route('categories.index'),'Back') !!}
</div>
@endsection

