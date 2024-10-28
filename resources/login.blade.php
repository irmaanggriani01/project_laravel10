<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/tailwind.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
</head>

<body>
    <div class="flex h-screen bg-blue-200">
        <div class="w-full max-w-xs m-auto bg-white rounded-lg shadow-lg p-6">
            <header>
                <img class="w-20 mx-auto mb-5" src="https://img.icons8.com/fluent/344/year-of-tiger.png" />
            </header>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-blue-600" for="email">Email</label>
                    <input
                        class="w-full p-2 mb-4 text-gray-700 border-b-2 border-blue-400 outline-none focus:border-blue-600 focus:bg-blue-50"
                        type="email" value="{{ old('email') }}" name="email" required>
                </div>
                <div>
                    <label class="block mb-2 text-blue-600" for="password">Password</label>
                    <input
                        class="w-full p-2 mb-6 text-gray-700 border-b-2 border-blue-400 outline-none focus:border-blue-600 focus:bg-blue-50"
                        type="password" name="password" required>
                </div>
                <div>
                    <input class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
