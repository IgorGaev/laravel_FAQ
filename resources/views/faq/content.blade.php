<div class="cd-faq-items">
    @foreach($categories as $category)
    <ul id="{{$category->name}}" class="cd-faq-group">
        <li class="cd-faq-title"><h2>{{$category->name}}</h2></li>
        @foreach($category->questions->where('answer', '!=' , 'null')->where('public', '=' , '1') as $question)
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

