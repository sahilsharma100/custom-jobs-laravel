<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Jobs - Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.6.0/tailwind.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,400&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="app" class="flex items-center bg-gray-900 w-screen h-screen text-center justify-center">
        <div class="font-semibold text-white">
            <div class="w-full max-w-xs">

                @if (Session::has('success'))
                    <div class="bg-teal-900 text-center py-4 lg:px-4">
                        <div class="p-2 bg-teal-800 items-center text-teal-100 leading-none lg:rounded-full flex lg:inline-flex"
                            role="alert">
                            <span
                                class="flex rounded-full bg-teal-500 uppercase px-2 py-1 text-xs font-bold mr-3">Success</span>
                            <span class="font-semibold mr-2 text-left flex-auto">
                                {{ Session::get('success') }}
                            </span>
                            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                            </svg>
                        </div>
                    </div>
                @endif

                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST"
                    action="{{ route('add-fake-data-in-queue') }}">
                    @csrf
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Add Data To Queue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
