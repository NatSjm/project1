@if($tours->lastPage() > 1)
<ul class="pagination">
    @if(!$tours->onFirstPage())
    <li><a href="{{$tours->previousPageUrl()}}" class="pagination_item"><</a></li>
    <li><a href="{{$tours->url(1)}}" class="pagination_item">1</a></li>
    <li><span class="dots">...</span></li>
    @endif
    <li><a href="" class="pagination_item active">{{$tours->currentPage()}}</a></li>
        @if(!($tours->currentPage() == $tours->lastpage()))
    <li><span class="dots">...</span></li>
    <li><a href="{{$tours->url($tours->lastPage())}}" class="pagination_item">{{$tours->lastPage()}}</a></li>
    <li><a href="{{$tours->nextPageUrl()}}" class="pagination_item">></a></li>
        @endif
</ul>
@endif