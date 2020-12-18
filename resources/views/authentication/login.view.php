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
                        <span class="font-normal">Sign In To Your Account</span>
                    </h1>
                    <form method="post" action="/login" name="login" class="mt-6">
                        <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">
                            E-mail
                        </label>
                        <input id="email" type="email" name="email" placeholder="john.doe@example.com"
                               class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none
                               focus:bg-gray-300 focus:shadow-inner"
                        />
                        <label for="password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">
                            Password
                        </label>
                        <input id="password" type="password" name="password" placeholder="********"
                               class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none
                               focus:bg-gray-300 focus:shadow-inner"
                        />
                        <button type="submit"
                                class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black
                                shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none"
                        >
                            Continue
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