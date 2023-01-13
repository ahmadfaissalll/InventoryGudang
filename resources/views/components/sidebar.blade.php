@php
    $isLinkActive = fn($url) => Request::is($url) ? 'active' : '';
@endphp

{{-- SIDE BAR --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="/img/AdminLTELogo.webp" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Inventory Gudang</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Icall</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ $isLinkActive('/') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/notes" class="nav-link {{ $isLinkActive('notes') }}">
                        <i class="nav-icon far fa-sticky-note"></i>
                        <p>
                            Notes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/barang" class="nav-link {{ $isLinkActive('barang') }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/barang-keluar" class="nav-link {{ $isLinkActive('barang-keluar') }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Barang Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
