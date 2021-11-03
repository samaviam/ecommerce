<div class="wrap-breadcrumb">
    <ul>
        @foreach (json_decode($previousPages) as $link => $name)
            <li class="item-link"><a href="{{ $link }}" class="link">{{ $name }}</a></li>
        @endforeach
        <li class="item-link"><span>{{ $pageName }}</span></li>
    </ul>
</div>