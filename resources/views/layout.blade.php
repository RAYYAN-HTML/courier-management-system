<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courier Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-black min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo / Brand -->
                <div class="flex-shrink-0">
                    <a href="{{ route('couriers.index') }}" class="text-2xl font-bold text-white hover:text-yellow-400">
                        Courier Management
                    </a>
                </div>
                
                <!-- Links -->
                <div class="flex space-x-4 items-center">
                    <a href="{{ route('couriers.index') }}" class="hover:bg-blue-500 px-3 py-2 rounded-md">Courier List</a>
                    <a href="{{ route('couriers.create') }}" class="hover:bg-blue-500 px-3 py-2 rounded-md">Add Courier</a>

                    <!-- Logout Form -->
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-300 text-black px-3 py-2 rounded-md">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        @yield('content')
    </main>
</body>
</html>
