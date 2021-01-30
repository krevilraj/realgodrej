<div class="offerings container-fluid">
    <div class="offerings_tit">
        <h3>{{getConfiguration('top_product_title')}}</h3>
    </div>

    <div class="offering_secs">
        <div class="rows">
            @foreach(json_decode(getConfiguration('products_section_1')) as $category)
                @php
                    $p_category = getCategoryByName($category);
                @endphp
                <div class="firstoffer">
                    <img src="{{ getFeaturedImage($p_category) }}" alt="{{$p_category->name}}">
                    <div class="offer_paras">
                        <h3>{{$p_category->name}}</h3>
                    </div>
                    <a href="{{route('shop.category',$p_category->slug)}}" class="viewalls">View All</a>
                </div>
            @endforeach

        </div>
    </div>


</div>
