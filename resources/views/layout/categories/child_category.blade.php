@if( $child_category->categories )
    <li class="hassubs"><a href="/shop/{{ $child_category->slug }}">{{ $child_category->name }}<i class="fas fa-chevron-right"></i></a>
    @if (!$child_category->categories->isEmpty())
        <ul>
            @foreach ($child_category->categories as $childCategory)

                @include('layout.categories.child_category', ['child_category' => $childCategory])
            @endforeach
        </ul>

    @endif
    </li>
@else
    <li><a href="/shop/{{ $child_category->slug }}">{{ $child_category->name }}<i class="fas fa-chevron-right"></i></a></li>
@endif
