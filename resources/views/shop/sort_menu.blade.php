
<div class="shop_bar clearfix">
    <div class="shop_product_count"><span>{{$count}}</span> products found</div>
    <div class="shop_sorting">
        <span>Sort by:</span>
        <select class="custom-select sort_select" id="sort_select">
            <option selected value="id"> id </option>
            <option {{\Request::get('sort') == 'price' ? 'selected' : ''}} value="price"> price </option>
            <option {{\Request::get('sort') == 'name' ? 'selected' : ''}} value="name"> name </option>
            <option {{\Request::get('sort') == 'date' ? 'selected' : ''}} value="date"> date </option>
        </select>
    </div>
</div>
