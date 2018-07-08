<ul class="cd-faq-categories">
    @foreach($categories as $category)
    <li><a class="selected" href="#{{$category->name}}">{{$category->name}}</a></li>
    @endforeach
</ul> 

