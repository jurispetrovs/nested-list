<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/resources/css/app.css">
    <title>Nested List</title>
</head>
<body>
    <div class="flex flex-col h-screen justify-between">
        <?php require_once 'resources/views/layouts/header.view.php'; ?>

        <main class="mb-auto">

            <div class="grid py-20 place-items-center">
                <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
                    <h1 class="text-xl font-semibold text-center">
                        <span class="font-normal">Create new section</span>
                    </h1>
                    <form method="post" action="/section/create" name="section-create" class="mt-6">
                        <?php if(isset($_GET['parent_id'])): ?>
                            <input type="hidden" name="parent_id" value="<?php echo $_GET['parent_id']; ?>">
                        <?php endif; ?>
                        <?php if(isset($_GET['path'])): ?>
                            <input type="hidden" name="path" value="<?php echo $_GET['path']; ?>">
                        <?php endif; ?>
                        <label for="name" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Name</label>
                        <input id="name" type="text" name="name" placeholder="Section 1"
                               class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none
                               focus:bg-gray-300 focus:shadow-inner"
                        />
                        <label for="description" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">
                            Description
                        </label>
                        <textarea id="description" name="description"
                                  class="block w-full h-40 p-3 mt-2 text-gray-700 bg-gray-200 appearance-none
                                  focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                  placeholder="Description 1"></textarea>
                        <button type="submit"
                                class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black
                                shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none"
                        >
                            Create
                        </button>
                    </form>
                </div>
            </div>

        </main>

        <?php require_once 'resources/views/layouts/footer.view.php'; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="/resources/js/forms-validation.js" type="text/javascript"></script>
</body>
</html>