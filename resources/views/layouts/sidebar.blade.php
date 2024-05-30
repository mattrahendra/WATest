<!-- resources/views/components/sidebar.blade.php -->
<div class=" card d-flex flex-column py-3 pl-3 mt-3 bg-light vh-100" style="width: 350px;">
    <h4 class="mx-4" style="font-weight: 700;">WMReader</h4>
    <hr class="mx-2 my-2">
    <ul class="nav nav-pills flex-column mb-auto">
        @php
            $activePage = $activePage ?? '';

            $menuItems = [
                'dashboard' => 'Dashboard',
                'status' => 'Status Baterai',
                'data' => 'Data WMReader',
                'user' => 'Data Pelanggan',
                'admin' => 'Data Admin',
            ];

            $activeClass = "nav-link hover:bg-green-500 bg-green-500 text-white font-bold";
            $nonActiveClass = "nav-link hover:bg-green-300 font-bold";
        @endphp

        @foreach ($menuItems as $page => $label)
            @php
                $isActive = $activePage === $page;
                $linkClass = $isActive ? $activeClass : $nonActiveClass;
            @endphp
            <li class="nav-item m-2">
                <a style="color:black; font-weight:600" href="{{ url($page) }}" class="{{ $linkClass }}">{{ $label }}</a>
            </li>
        @endforeach

        <li class="nav-item m-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link hover:bg-green-500 bg-green-500 font-bold" style="border: none; background: none; color:black; font-weight:600">Logout</button>
            </form>
        </li>
    </ul>
</div>
