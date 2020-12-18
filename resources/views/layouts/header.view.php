<header class="shadow">
    <nav class="py-4 mx-auto px-20">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a class="text-gray-800 text-xl font-bold md:text-2xl hover:text-gray-700" href="/">Nested List</a>
                </div>
            </div>

            <div class="md:flex items-center">
                <div class="flex items-center py-2 -mx-1 md:mx-0">
                    <?php if (isset($_SESSION['auth'])): ?>
                        <p class="block w-1/2 py-2 mx-1 font-medium">Hello <?php echo $_SESSION['auth']->name() ?></p>
                        <a href="/logout"
                           class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium
                           text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                        >
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="/login"
                           class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium
                           text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                        >
                            Login
                        </a>
                        <a href="/register"
                           class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium
                           text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto"
                        >
                            Register
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>