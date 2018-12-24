@php
    $mainColors = ['#FFFFFF'=>'white', '#222222'=>'nero'];
    $accentColors = ['#084599'=>'dark-blue', '#023881'=>'med-blue', '#37DB67'=>'light-green', '#24BF51'=>'med-green'];
    $supplementaryColors = ['#F6FAFB'=>'light-milk', '#F7F7F7'=>'med-milk', '#F2F2F2'=>'dark-milk', '#CCCCCC'=>'light-grey', '#666666'=>'med-grey', '#4D4D4D'=>'dark-grey'];
@endphp


<section class="gydeline-section colors cont ">

    <h2 class="gydeline-headline-2">01. цвета</h2>

    <div class=" colors-section">

        <div class="main-colorss">
            <h3 class="gydeline-headline-3">Основные цвета</h3>
            <div class="colors-line">
                @foreach ($mainColors as $key => $color)
                    <div>
                        <div class="color-box color-{{ $color }}"></div>
                        <p>{{ $key }}</p>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="accent-colorss">
            <h3 class="gydeline-headline-3">Aкцентные цвета</h3>
            <div class="colors-line">
                @foreach ($accentColors as $key => $color)
                    <div>
                        <div class="color-box color-{{ $color }}"></div>
                        <p>{{ $key }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="supplementary-colorss">
            <h3 class="gydeline-headline-3">Вспомогательные цвета</h3>
            <div class="colors-line">
                @foreach ($supplementaryColors as $key => $color)
                    <div>
                        <div class="color-box color-{{ $color }}"></div>
                        <p>{{ $key }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</section>
