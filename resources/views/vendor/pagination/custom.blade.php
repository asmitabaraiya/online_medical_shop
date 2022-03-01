@if($paginator->onFirstPage())

<li class="page-item">
    <a href="#" class="page-link" aria-label="Previous">
        <span aria-hidden="true">
            <span class="lnr lnr-chevron-left"><</span>
        </span>
    </a>
</li>

@else

<li class="page-item">
    <a href="{{$paginator->previousPageUrl()}}" class="page-link" aria-label="Previous">
        <span aria-hidden="true">
            <span class="lnr lnr-chevron-left"><</span>
        </span>
    </a>
</li>

@endif

    @if (is_array($elements[0]))
        @foreach ($elements[0] as $page=>$url)
            @if ($page==$paginator->currentPage()) 
                <li class="page-item active" aria-current="page">
                    <a href="{{$url}}" class="page-link">{{$page}}</a>
                </li>
            @else
                <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
            @endif
        @endforeach
    @endif


@if ($paginator->hasMorePages())

<li class="page-item">
    <a href="{{$paginator->nextPageUrl()}}" class="page-link" aria-label="Next">
        <span aria-hidden="true">
            <span class="lnr lnr-chevron-right">></span>
        </span>
    </a>
</li>
    
@else
<li class="page-item" >
    <a href="{{$paginator->nextPageUrl()}}" class="page-link" aria-label="Next">
        <span aria-hidden="true">
            <span class="lnr lnr-chevron-right">></span>
        </span>
    </a>
</li>
    
@endif