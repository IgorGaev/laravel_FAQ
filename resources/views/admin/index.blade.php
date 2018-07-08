@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
               <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
                            <li class="nav-item">
                                <a class="btn btn-link" href="{{route('admins')}}">
                                    <span data-feather="home"></span>
                                    Администраторы <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-link" href="{{route('categories')}}">
                                    <span data-feather="file"></span>
                                    Категории
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-link" href="{{route('questionsShowAll')}}">
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
