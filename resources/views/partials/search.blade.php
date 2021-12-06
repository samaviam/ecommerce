<div class="wrap-search-form">
    <form action="{{ route('search') }}" id="form-search-top" name="form-search-top">
        <input type="text" name="search" id="search" placeholder="Search here...">
        <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
        <div class="wrap-list-cate">
            <input type="hidden" name="product_cate" id="product-cate">
            <input type="hidden" name="product_cate_id" id="product-cate-id">
            <a href="#" class="link-control">All Category</a>
            <ul class="list-cate">
                <li class="level-0">All Category</li>
                @foreach ($searchCate as $category)
                    <li class="level-1" data-id="{{ $category->id }}">{{ $category->name }}</li>
                    {{-- @foreach ($category->subcategory as $sub)
                        <li class="level-2" data-id="{{ $sub->id }}">{{ $sub->name }}</li>
                    @endforeach --}}
                @endforeach
            </ul>
        </div>
    </form>
    <ul id="suggestions"></ul>
</div>