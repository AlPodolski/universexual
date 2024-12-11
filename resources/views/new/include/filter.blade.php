
<div id="open-btn" class="open-filter-btn" onclick="openPanel()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 4h18"></path>
        <path d="M6 10h12"></path>
        <path d="M10 16h4"></path>
    </svg>
    Показать фильтр</div>

<form id="slide-panel" action="/poisk-po-parametram" class="filter-wrap d-flex">

    <div id="close-btn" class="close-filter-btn" onclick="closePanel()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </div>
    @csrf

    @if($data['metro']->first())
        <div class="filter-item custom-select position-relative">
            <select name="metro" id="">
                <option value="">Метро</option>
                @foreach($data['metro'] as $metroItem)
                    <option value="{{ $metroItem->id }}">{{ $metroItem->value }}</option>
                @endforeach
            </select>
        </div>
    @endif




    <div class="filter-item custom-select position-relative">
        <select name="national_id" id="">
            <option value="">Национальность</option>
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
