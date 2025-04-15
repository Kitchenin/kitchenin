<div class="side-nav-head">
    <button class="fa fa-bars"></button>
    <h4>PRODUCTS</h4>
</div>

<ul class="list-group list-group-bordered list-group-noicon uppercase">

    @foreach($categories as $mainCategory)
        <li class="list-group-item active">
            <a @if($mainCategory->hasChildren())class="dropdown-toggle"@endif href="/admin/categories/{{ $mainCategory->id }}/products">{{ $mainCategory->name }}</a>
            @if($mainCategory->hasChildren())
                <ul>
                    @foreach($mainCategory->children()->get() as $childCategory)
                        <li><a href="/admin/categories/{{ $childCategory->id }}/products">{{ $childCategory->name }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach


</ul>