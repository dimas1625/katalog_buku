<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Katalog Buku'))</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background-color: #f4f6f9;
        }

        /* Sidebar */
        #sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: #1a1a2e;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s;
        }

        #sidebar .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        #sidebar .nav-link {
            color: rgba(255,255,255,0.65);
            padding: 0.65rem 1.5rem;
            border-radius: 0;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.2s;
        }

        #sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255,255,255,0.07);
        }

        #sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255,255,255,0.13);
            border-left: 3px solid #0d6efd;
        }

        #sidebar .nav-link i {
            font-size: 1rem;
        }

        #sidebar .sidebar-section {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255,255,255,0.3);
            padding: 1.2rem 1.5rem 0.4rem;
        }

        /* Main content */
        #main-content {
            margin-left: 240px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        #topbar {
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .page-content {
            padding: 1.75rem;
            flex: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #sidebar {
                width: 0;
                overflow: hidden;
            }
            #sidebar.show {
                width: 240px;
            }
            #main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="sidebar-brand">
            <a href="{{ route('books.index') }}" class="text-white text-decoration-none d-flex align-items-center gap-2">
                <i class="bi bi-book-half fs-5"></i>
                <span class="fw-bold fs-6">Katalog Buku</span>
            </a>
        </div>

        <div class="pt-2">
            <div class="sidebar-section">Menu</div>

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="{{ route('books.index') }}"
               class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}">
                <i class="bi bi-journal-bookmarks"></i> Daftar Buku
            </a>

            <div class="sidebar-section">Akun</div>

            <a href="{{ route('profile.edit') }}"
               class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i> Profil
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link w-100 border-0 bg-transparent text-start">
                    <i class="bi bi-box-arrow-left"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content">

        <!-- Topbar -->
        <div id="topbar">
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-sm btn-light d-md-none" id="sidebarToggle">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <span class="fw-semibold text-secondary">@yield('title', 'Halaman')</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-circle text-secondary"></i>
                <span class="small text-secondary">{{ Auth::user()->name }}</span>
            </div>
        </div>

        <!-- Flash Messages -->
        <div class="px-4 pt-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>

        <!-- Page Content -->
        <div class="page-content">
            @yield('content')
        </div>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        const toggle = document.getElementById('sidebarToggle');
        if (toggle) {
            toggle.addEventListener('click', () => {
                document.getElementById('sidebar').classList.toggle('show');
            });
        }
    </script>
</body>
</html>