<section class="gydeline-section gydeline-cont typo">
    <h2 class="gydeline-headline-2">02. Типографика</h2>

    <div class="headline-section">
        @for ($i = 1; $i < 5; $i++)
            <h3 class="gydeline-headline-3">Заголовок {{$i}}</h3>
            <div class=" headline headline-{{$i}}">
            <h{{$i}}>Заголовок {{$i}}</h{{$i}}>
            </div>
        @endfor
    </div>

    <div class="typo-elements-section">
        <div class="main_text">
            <h3 class="gydeline-headline-3">Основной текст</h3>
            <div class="text_normal">
                <p>
                    Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе. Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе. Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе. Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе.

                </p>

            </div>
            <div class="text_small">

                <p>
                    Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе. Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе. Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе. Мы предлагаем лучшие варианты для вашего отдыха в Мариуполе.
                </p>
            </div>


        </div>
        <div class="list_marked">
            <h3 class="gydeline-headline-3">Маркированный список</h3>
            <ul>
                <li>Пункт первый</li>
                <li>Пункт второй</li>
                <li>Пункт третий</li>
                <li>Пункт четвертый</li>
            </ul>

        </div>
        <div class="list_numbered">
            <h3 class="gydeline-headline-3">Нумерованный список</h3>
            <ol>
                <li>Пункт первый</li>
                <li>Пункт второй</li>
                <li>Пункт третий</li>
            </ol>

        </div>
    </div>
</section>