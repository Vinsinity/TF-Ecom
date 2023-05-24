@foreach($category as $children)
    <ul>
        <li id="{{ $children->id }}" data-jstree='{ "opened" : true }'>
            {{ $children->name }} - {{ count($children->children) }}
            @if(count($children->children) > 0)
                @include('admin.product.category.child', ['category' => $children->children])
            @endif
        </li>
    </ul>
@endforeach
