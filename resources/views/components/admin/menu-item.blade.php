@props(['item'])

<li>
    @if(isset($item['children']))
        <details @if(!empty($item['open'])) open @endif>
            <summary>
                @isset($item['icon'])
                    <x-dynamic-component :component="$item['icon']" class="inline-block mr-2"/>
                @endisset
                {{ $item['title'] }}
            </summary>
            <ul class="pl-4">
                @foreach($item['children'] as $child)
                    <x-admin.menu-item :item="$child" />
                @endforeach
            </ul>
        </details>
    @else
        <a href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
            @isset($item['icon'])
                <x-dynamic-component :component="$item['icon']" class="inline-block mr-2"/>
            @endisset
            {{ $item['title'] }}
        </a>
    @endif
</li>
