
{{-- Tailwindcss--}}

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/tailwind.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <div class="flex h-screen bg-indigo-700">
        <div class="w-full max-w-xs m-auto bg-indigo-100 rounded p-5">   
              <header>
                <img class="w-20 mx-auto mb-5" src="https://img.icons8.com/fluent/344/year-of-tiger.png" />
              </header>
              @if($errors->any())
              <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $item)
                  <li>{{$item}}</li>
                  @endforeach
              </ul>
          </div>
          @endif  
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-2 text-indigo-500" for="email">Email</label>
                <input class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="email" value="{{ old('email')}}" name="email">
            </div>
            <div>
                <label class="block mb-2 text-indigo-500" for="password">Password</label>
                <input class="w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password">
            </div>
            <div>
                <input class="w-full bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="submit" value="Login">
            </div>
        </form>
        
        
            </div>
        </div>
  </body>
</html>

{{-- End Tailwindcss--}}