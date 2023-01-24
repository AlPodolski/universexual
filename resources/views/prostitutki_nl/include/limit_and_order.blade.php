@php
 /* @var $limit string */
 /* @var $sort string */
@endphp

<div class="sort-block d-flex">
    <div class="order-block">
        <select class="metro-select" name="limit" id="sort-select" onchange="setSort()">
            <option @if($sort == 'default') selected @endif value="default">Сортировать</option>

            <option @if($sort == 'price_asc') selected @endif value="price_asc">От дешевых к дорогим</option>
            <option @if($sort == 'price_desc') selected @endif value="price_desc">От дорогих к дешевым</option>

            <option @if($sort == 'age_asc') selected @endif value="age_asc">От молодых к старым</option>
            <option @if($sort == 'age_desc') selected @endif value="age_desc">От старых к молодым</option>

            <option @if($sort == 'ves_asc') selected @endif value="ves_asc">От худых к толсты</option>
            <option @if($sort == 'ves_desc') selected @endif value="ves_desc">От толстых к худым</option>

            <option @if($sort == 'breast_asc') selected @endif value="breast_asc">От маленькой груди к большой</option>
            <option @if($sort == 'breast_desc') selected @endif value="breast_desc">От большой груди к маленькой</option>
        </select>
    </div>
</div>
