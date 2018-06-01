@extends('faq/layouts/layout')

@section('head')
    @parent
@endsection

@section('sidebar')
<ul class="cd-faq-categories">
    @foreach($categories as $category)
        <li><a class="selected" href="#basics">{{$category->name}}</a></li>
    @endforeach
</ul> <!-- cd-faq-categories -->
@endsection

@section('content')
<div class="cd-faq-items">
    <ul id="basics" class="cd-faq-group">
        @foreach($categories as $category)
        <li class="cd-faq-title"><h2>{{$category->name}}</h2></li>
            @foreach($category->questions as $question)
            <li>
                <a class="cd-faq-trigger" href="#0">{{$question->question}}</a>
                <div class="cd-faq-content">
                    <p>{{$question->answer}}</p>
                </div> <!-- cd-faq-content -->
            </li>
            @endforeach
        @endforeach
    </ul> <!-- cd-faq-group -->
</div> <!-- cd-faq-items -->    
@endsection