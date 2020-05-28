

<ul>
    @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
        <ul>
            @foreach ($category->childrenCategories as $childCategory)
                @include('layout.categories.child_category', ['layout.categories.child_category' => $childCategory])
            @endforeach
        </ul>
    @endforeach
</ul>
