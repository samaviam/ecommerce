@if (count($elements[0]) > 1)
    <div class="wrap-pagination-info">
        <ul class="page-numbers">
            @if ($paginator->currentPage() > 1)
                <li><a class="page-number-item previous-link" href="{{ $paginator->previousPageUrl() }}" >{{ __('Previous') }}</a></li>
            @endif
            @foreach ($elements[0] as $index => $element)
                @if ($index == $paginator->currentPage())
                    <li><span class="page-number-item current">{{ $index }}</span></li>
                @else
                    <li><a class="page-number-item" href="{{ $element }}">{{ $index }}</a></li>
                @endif
            @endforeach
            @if ($paginator->currentPage() < $paginator->lastPage())
                <li><a class="page-number-item next-link" href="{{ $paginator->nextPageUrl() }}" >{{ __('Next') }}</a></li>
            @endif
        </ul>
        <p class="result-count">Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }} result</p>
    </div>
@endif