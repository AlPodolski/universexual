<form action="/filter" class="filter-wrap d-flex" id="filter">
    @csrf
    @if($data['metro'])
        <div class="filter-item">
            <div class="bold-text">Метро</div>
            <select class="metro-select" name="metro" id="">
                <option value="">Выбрать метро</option>
                @foreach($data['metro'] as $item)
                    @php
                        /* @var $item \App\Models\Metro */
                    @endphp
                    <option value='{{ $item->id }}'>{{ $item->value }}</option>
                @endforeach
            </select>
        </div>
    @endif
    <div class="filter-item">
        <div class="bold-text">Возраст</div>
        <div class="filter-item-slide" id="age"></div>
        <div class="inputs">
            <input type="text" readonly id="age-from" name="age-from">
            <input type="text" readonly class="right-input" id="age-to" name="age-to">
        </div>
    </div>

    <div class="filter-item">
        <div class="bold-text">Рост</div>
        <div class="filter-item-slide" id="rost"></div>
        <div class="inputs">
            <input type="text" readonly id="rost-from" name="rost-from">
            <input type="text" readonly class="right-input" id="rost-to" name="rost-to">
        </div>
    </div>

    <div class="filter-item">
        <div class="bold-text">Вес</div>
        <div class="filter-item-slide" id="ves"></div>
        <div class="inputs">
            <input type="text" readonly id="ves-from" name="ves-from">
            <input type="text" readonly class="right-input" id="ves-to" name="ves-to">
        </div>
    </div>

    <div class="filter-item">
        <div class="bold-text">Грудь</div>
        <div class="filter-item-slide" id="grud"></div>
        <div class="inputs">
            <input type="text" readonly id="grud-from" name="grud-from">
            <input type="text" readonly class="right-input" id="grud-to" name="grud-to">
        </div>
    </div>

    <div class="filter-item">
        <div class="bold-text">Цена</div>
        <div class="filter-item-slide" id="price"></div>
        <div class="inputs">
            <input type="text" readonly id="price-from" name="price-from">
            <input type="text" readonly class="right-input" id="price-to" name="price-to">
        </div>
    </div>

    <button type="submit" class="yellow-btn">Поиск</button>

</form>
