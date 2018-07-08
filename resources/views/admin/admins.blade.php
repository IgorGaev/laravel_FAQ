@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive">

                        @if($admins)
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Логин</th>
                                    <th>Создан</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $k => $admin)
                                <tr>
                                    <td>{{ $k=$k+1 }}</td>
                                    <td>{{ $admin->login }}</td>
                                    <!--<td>{!! Html::link(route('adminsEdit',['admin'=>$admin->id]),'Изменить',['alt'=>$admin->password]) !!}</td>-->
                                    <td>{{ $admin->created_at }}</td>
                                    <td>
                                        {!! Form::open(['url'=>route('adminsEdit',['admin'=>$admin->id]), 'class'=>'form-horizontal','method' => 'GET']) !!}
                                        {!! Form::button('Изменить пароль',['class'=>'btn btn-success btn-sm', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['url'=>route('adminsDestroy',['admin'=>$admin->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
                                        {!! Form::hidden('_method', 'delete') !!}
                                        {!! Form::button('Удалить',['class'=>'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                        {!! Form::open(['url'=>route('adminsAdd'), 'class'=>'form-horizontal','method' => 'GET']) !!}
                        {!! Form::button('Новый администратор',['class'=>'btn btn-primary btn-sm', 'type'=>'submit']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!!  link_to('admin', 'Back') !!}
</div>

@endsection

