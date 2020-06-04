@if ($currentCategory)
    {{Form::open(['route' => ['shop_filter_category', 'slug' => $currentCategory->slug], 'method' => 'get' , 'id' => 'filter_form'])}}
@else
    {{Form::open(['route' => 'shop_filter', 'method' => 'get', 'id' => 'filter_form'])}}
@endif
    <div class="sidebar_section filter_by_section">
        <div class="sidebar_title">Фильтр по</div>
        <div class="sidebar_subtitle">Цене</div>
        <div class="filter_price">
            <div id="slider-range" class="slider_range"></div>
            <p> </p>
            <p>
                <input type="text"
                       id="amount"
                       class="amount"
                       readonly style="border:0;
                       font-weight:bold;"
                       name="priceRange"></p>
            @if(\Request::get('priceRange'))
                <input type="hidden" id="price_from" value={{ltrim(preg_split('/ - /', \Request::get('priceRange'))[0], '₽')}}>
                <input type="hidden" id="price_to" value={{ltrim(preg_split('/ - /', \Request::get('priceRange'))[1], ' ₽')}}>
            @else
                <input type="hidden" id="price_from" value='0'>
                <input type="hidden" id="price_to" value='100000'>
            @endif

        </div>
    </div>

    <div class="sidebar_section">
        <div class="sidebar_subtitle brands_subtitle">Бренды</div>
        <ul class="brands_list" name="brandsList"><li class="brand"></li>
            @foreach($brands as $brand)
                <li class="brand">
                    {{ Form::label('brand[]', $brand->name)}}
                    @if(\Request::get('brand'))
                        {{Form::checkbox('brand[]', $brand->id, in_array($brand->id, \Request::get('brand')) ? true : false)}}
                    @else
                        {{Form::checkbox('brand[]', $brand->id)}}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    @if(\Request::get('sort'))
        <input type="hidden" id="sort_select_hidden" name="sort" value={{\Request::get('sort')}}>
    @else
        <input type="hidden" id="sort_select_hidden" name="sort" value='id'>
    @endif

    <div class="sidebar_section">
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </div>
{{Form::close()}}
