<section class="gydeline-section gydeline-cont active-elements">
    <h2 class="gydeline-headline-2">03. Активные элементы и состояния</h2>
    <div class="active-elements_section cont-med">

        <div class="buttons">
            <h3 class="gydeline-headline-3">Кнопки</h3>
            <div class="buttons">
                @include('components/buttons/button-blue')
                @include('components/buttons/button-green')
            </div>
        </div>

        <div class="checkboxes">
            <h3 class="gydeline-headline-3">Чекбоксы</h3>
            @include('./../components.checkboxes.checkbox',['checkbox_name' => 'furniture',
                                                             'checkbox_id' => 'sofa',
                                                              'checkbox_value' => 'sofa',
                                                              'checkbox_label' => 'Диван'
                                                              ])

        </div>



        <div class="links">
            <h3 class="gydeline-headline-3">Ссылки</h3>
            @include('./../components.links.link')
        </div>

        <div class="inputs">
            <h3 class="gydeline-headline-3">Input</h3>
            @include('./../components.input.input')
        </div>

        <div class="paginations">
            <h3 class="gydeline-headline-3">Pagination</h3>
            @include('./../components.pagination.pagination')
        </div>

        <h3 class="gydeline-headline-3">Таблица</h3>
        @include('./../components.table.table')
    </div>
</section>
