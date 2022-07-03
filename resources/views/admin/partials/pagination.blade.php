@php
    $pagination = $paginator->toArray();
    $urls = [];
    tap($elements[0], function ($elements) use ($pagination, &$urls) {
        $urls = $elements;

        foreach ($elements as $index => $url) {
            if ($pagination['current_page'] == $index && count($elements) > 2) {
                if ($index == 1) {
                    $urls = [1 => $url, $elements[2], $elements[3]];
                } elseif ($pagination['last_page'] == $index) {
                    $urls = [($index - 2) => $elements[$index - 2], $elements[--$index], $url];
                } else {
                    $urls = [($index - 1) => $elements[--$index], $url, $elements[$index + 2]];
                }
            }
        }
    });
@endphp

@if (count($urls) > 1)
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <li class="page-item{{ $pagination['current_page'] == 1 ? ' disabled' : '' }}">
        <a class="page-link" href="{{ $pagination['first_page_url'] }}" title="1" aria-label="First page">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      @foreach ($urls as $index => $url)
          <li class="page-item{{ $pagination['current_page'] == $index ? ' active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $index }}</a></li>
      @endforeach
      <li class="page-item{{ $pagination['current_page'] == $pagination['last_page'] ? ' disabled' : '' }}">
        <a class="page-link" href="{{ $pagination['last_page_url'] }}" title="{{ $pagination['last_page'] }}" aria-label="Last page">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
@endif