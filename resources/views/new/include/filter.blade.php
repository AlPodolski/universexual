<div onclick="showFilter()" class="toggle-filter d-none">Показать фильтр</div>

<form action="/poisk-po-parametram" class="filter-wrap d-flex position-relative">
    <div class="close-panel d-none" onclick="showFilter(this)">
        <img src="/img/close.svg" alt="">
    </div>
    @csrf

    @if($data['metro']->first())
        <div class="filter-item custom-select position-relative">
            <select name="metro" id="">
                <option>Метро</option>
                @foreach($data['metro'] as $metroItem)
                    <option value="{{ $metroItem->id }}">{{ $metroItem->value }}</option>
                @endforeach
            </select>
        </div>
    @endif




    <div class="filter-item custom-select position-relative">
        <select name="national_id" id="">
            <option>Национальность</option>
            @foreach($data['national'] as $nationalItem)
                <option value="{{ $nationalItem->id }}">{{ $nationalItem->value }}</option>
            @endforeach
        </select>
    </div>

    <div class="filter-item">
        <div class="bold-text slider-item-text">Возраст</div>
        <div class="filter-item-slide" id="age"></div>
        <div class="inputs">
            <input type="text" readonly id="age-from" name="age-from">
            <input type="text" readonly class="right-input" id="age-to" name="age-to">
        </div>
    </div>

    <div class="filter-item">
        <div class="bold-text slider-item-text">Вес</div>
        <div class="filter-item-slide" id="ves"></div>
        <div class="inputs">
            <input type="text" readonly id="ves-from" name="ves-from">
            <input type="text" readonly class="right-input" id="ves-to" name="ves-to">
        </div>
    </div>

    <div class="filter-item">
        <div class="bold-text slider-item-text">Грудь</div>
        <div class="filter-item-slide" id="grud"></div>
        <div class="inputs">
            <input type="text" readonly id="grud-from" name="grud-from">
            <input type="text" readonly class="right-input" id="grud-to" name="grud-to">
        </div>
    </div>

    <div class="filter-item">
        <div class="bold-text slider-item-text">Цена</div>
        <div class="filter-item-slide" id="price"></div>
        <div class="inputs">
            <input type="text" readonly id="price-from" name="price-from">
            <input type="text" readonly class="right-input" id="price-to" name="price-to">
        </div>
    </div>

    <button type="submit" class="red-btn">Поиск</button>

</form>
