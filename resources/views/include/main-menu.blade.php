<div class="header-bottom-area">
    <div class="container">
        <div class="d-flex">
            <div class="all-menu position-relative" id="all-menu" >
                <div class="open-menu-btn" onclick="toggle_class_to_block('all-menu', 'open-menu')">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24.75px" height="24.75px" viewBox="0 0 24.75 24.75" style="enable-background:new 0 0 24.75 24.75;" xml:space="preserve"	><g>	<path d="M0,3.875c0-1.104,0.896-2,2-2h20.75c1.104,0,2,0.896,2,2s-0.896,2-2,2H2C0.896,5.875,0,4.979,0,3.875z M22.75,10.375H2		c-1.104,0-2,0.896-2,2c0,1.104,0.896,2,2,2h20.75c1.104,0,2-0.896,2-2C24.75,11.271,23.855,10.375,22.75,10.375z M22.75,18.875H2		c-1.104,0-2,0.896-2,2s0.896,2,2,2h20.75c1.104,0,2-0.896,2-2S23.855,18.875,22.75,18.875z"/></g></svg>
                    Все категории
                </div>
                <nav class="sub-menu position-absolute">
                    <div class="sub-menu-item-wrap">
                        <a href="#" class="sub-menu-item">Национальность
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                        <div class="sub-menu-list position-absolute">
                            @foreach($data['national'] as $item)
                                @php
                                    /* @var $item \App\Models\National */
                                @endphp
                                <a href="/{{ $item->url }}" class="sub-menu-list-item">{{ $item->value }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="sub-menu-item-wrap">
                        <a href="#" class="sub-menu-item">Цвет волос
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                        <div class="sub-menu-list position-absolute">
                            @foreach($data['hair'] as $item)
                                @php
                                    /* @var $item \App\Models\HairColor */
                                @endphp
                                <a href="/{{ $item->url }}" class="sub-menu-list-item">{{ $item->value }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 2</a></div>
                    <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 3</a></div>
                    <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 4</a></div>
                    <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 5</a></div>
                    <div class="sub-menu-item-wrap"><a href="#" class="sub-menu-item">Меню 6</a></div>
                </nav>
            </div>
            <nav class="main-menu">
                <a href="#" class="main-menu-item">Главная</a>
                <a href="#" class="main-menu-item">Еще страница</a>
                <a href="#" class="main-menu-item">Еще страница 2</a>
                <a href="#" class="main-menu-item">Блог</a>
            </nav>
        </div>
    </div>
</div>
