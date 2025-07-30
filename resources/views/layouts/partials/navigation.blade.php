<div class="navbar bg-base-100 shadow-sm select-none">
    <div class="navbar-start">
        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <label for="my-drawer" class="btn btn-outline drawer-button">
                    <x-dynamic-component component="lucide-menu"/>
                </label>
            </div>
            <div class="drawer-side">
                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                @php
                    $menu = json_decode(file_get_contents(resource_path('navigation.json')), true);
                @endphp

                <ul class="menu gap-4 pt-5 bg-base-200 text-base-content min-h-full w-80">
                    @foreach($menu as $item)
                        <x-admin.menu-item :item="$item" />
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="navbar-center">
        <a class="text-xl font-bold">Administration</a>
    </div>
    <div class="navbar-end">
        <a href="https://google.com" class="hidden sm:block"><span class="badge badge-warning">Mise à jour</span></a>
    </div>
</div>
