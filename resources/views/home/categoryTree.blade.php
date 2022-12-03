@foreach($children as $subcategory)
    <div class="col-md-4">
        <ul class="list-links">
            @if(count($subcategory->children))
                <li>
                    <h3 class="list-links-title">{{$subcategory->title}}</h3>
                </li>
                <div class="col-md-4">
                    <ul class="list-links">'
                        @include('home.categoryTree', ['children' => $subcategory->children])
                    </ul>
                    <hr class="hidden-md hidden-lg">
                </div>
            @else
                <li><a href="{{route('categoryproducts',['id' => $subcategory->id, 'slug' => $subcategory->title]) }}">{{$subcategory->title}}</a></li>
            @endif
        </ul>
    </div>
@endforeach
