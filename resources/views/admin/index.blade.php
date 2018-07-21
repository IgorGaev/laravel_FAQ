@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель администратора</div>
               <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
              <li class="nav-item" style="padding-bottom: 5px; padding-top: 5px ">
                                <a class="btn btn-info" href="{{route('admins.index')}}">
                                    <span data-feather="home"></span>
                                    Администраторы <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item" style="padding-bottom: 5px ">
                                <a class="btn btn-info" href="{{route('categories.index')}}">
                                    <span data-feather="file"></span>
                                    Категории
                                </a>
                            </li>
                            <li class="nav-item" style="padding-bottom: 5px ">
                                <a class="btn btn-info" href="{{route('questionsShowAll')}}">
                                    <span data-feather="shopping-cart"></span>
                                    Вопросы без ответа
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
