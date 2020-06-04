
<div class="shop_bar clearfix">
    <div class="shop_product_count">По вашему запросу найдено <span>{{$count}}</span> продуктов</div>
    <div class="shop_sorting">
        <span>Сортировать по:</span>
        <select class="custom-select sort_select" id="sort_select">
            <option selected value="id"> id </option>
            <option {{\Request::get('sort') == 'price' ? 'selected' : ''}} value="price"> Цене </option>
            <option {{\Request::get('sort') == 'name' ? 'selected' : ''}} value="name"> Названию </option>
            <option {{\Request::get('sort') == 'date' ? 'selected' : ''}} value="date"> Дате </option>
        </select>
    </div>
</div>
