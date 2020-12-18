<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Nested List</title>
</head>
<body>
<div class="flex flex-col h-screen justify-between">
    <?php require_once 'resources/views/layouts/header.view.php'; ?>

    <main class="mb-auto">

        <?php if(isset($_SESSION['auth'])): ?>
            <div class="mx-auto px-4 sm:px-8 text-center">
                <div class="mt-4">
                    <form action="/section/create" method="get">
                        <input type="hidden" name="parent_id" value="<?php echo $parentId ?>">
                        <button type="submit"
                                class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-black
                                uppercase transition bg-transparent border-2 border-black rounded-full ripple
                                hover:bg-gray-100 focus:outline-none"
                        >
                            Add new Subsection
                        </button>
                    </form>
                </div>
                <div class="grid grid-cols-8 gap-4 items-start mx-auto px-8">
                    <?php foreach ($sections as $section): ?>
                        <div class="col-span-6 sm:col-span-6 md:col-span-6 lg:col-span-2 xl:col-span-2">
                            <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
                                <div class="mx-auto h-40 bg-gray-200 rounded-md flex items-center justify-center">
                                    <div><?php echo $section->description(); ?></div>
                                </div>
                                <div class="h-6 mt-6 block mx-auto rounded-sm">
                                    <?php echo $section->name(); ?>
                                </div>
                                <div class="flex justify-center mt-4">
                                    <a href="/section/<?php echo $section->id(); ?>"
                                       class="block h-8 w-full px-3 py-2 mx-1 mx-1 rounded text-center text-sm
                                       bg-gray-200 font-medium leading-5 hover:bg-blue-600 md:mx-0 md:w-auto
                                       hover:text-white">
                                        Show
                                    </a>
                                    <a href="/section/<?php echo $section->id(); ?>/edit"
                                       class="block h-8 w-full px-3 py-2 mx-1 rounded text-center text-sm bg-gray-200
                                       font-medium leading-5 hover:bg-blue-600 md:mx-2 md:w-auto hover:text-white">
                                        Edit
                                    </a>
                                    <form method="post" action="/section/<?php echo $section->id(); ?>">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" onclick="return confirm('Are you sure ?');"
                                                class="block h-8 w-full px-3 py-2 mx-2 rounded text-center text-sm
                                                bg-red-300 font-medium leading-5 hover:bg-red-600 md:mx-0 md:w-auto
                                                hover:text-white">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        <?php endif; ?>
    </main>

    <?php require_once 'resources/views/layouts/footer.view.php'; ?>
</div>
</body>
</html>