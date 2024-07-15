<div onclick="showFilter()" class="toggle-filter">Показать фильтр</div>

<form action="/filter" class="filter-wrap filter-form d-flex" id="filter">
    <div class="close-panel" onclick="showFilter(this)">
        <img src="/img/close.svg" alt="">
    </div>
    @csrf
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

    <button type="submit" class="yellow-btn">Поиск</button>

</form>
