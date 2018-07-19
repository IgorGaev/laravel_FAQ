<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <div class="table-responsive">

        {!! Form::open(['url' => route('store'),'class'=>'form-horizontal','method'=>'POST']) !!}

        <div class="form-group">
            {!! Form::label('username','Имя:',['class' => 'col-xs-2 control-label'])   !!}
            <div class="col-xs-8">
                {!! Form::text('username', old('username'),['class' => 'form-control','placeholder'=>'Имя'])!!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email','Эл. почта:',['class' => 'col-xs-2 control-label'])   !!}
            <div class="col-xs-8">
                {!! Form::email('email', old('email'),['class' => 'form-control','placeholder'=>'Эл. почта'])!!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('question','Вопрос:',['class' => 'col-xs-2 control-label'])   !!}
            <div class="col-xs-8">
                {!! Form::textarea('question', old('question'),['class' => 'form-control','placeholder'=>'Вопрос'])!!}
            </div>
        </div>
        
        <div>
            <label for="category_id">Категория вопроса</label>
            <select name="category_id">
                @foreach($categories as $category)
                <option label="{{$category->name}}" value="{{$category->id}}"></option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div>
                {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>

