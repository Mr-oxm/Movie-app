
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-header>
    </x-header>
    <body class="bg-base-300">
        <x-navbar>
        </x-navbar>

        <div  class="grid grid-cols-4 box-border gap-4 ease-in-out w-3/5 m-auto">
            @foreach ($movieList as $movie)
            <!-- movie card -->
            <div class="flex flex-col gap-4 items-center w-full h-auto bg-base-100 scale-100 hover:scale-105 cursor-pointer rounded-md overflow-hidden group transition ease-in-out auto-cols-fr font-[roboto]">
                <a href="#" class="relative">
                    <img class="w-60 h-80 blur-none group-hover:blur-sm	transition ease-in-out" src="{{$movie->url}}" alt="{{$movie->name}}">
                    <div class="absolute  hidden opacity-0 group-hover:opacity-100 group-hover:flex flex-col justify-around bottom-0 w-full h-full bg-black/40 transition ease-in-out">
                        <div class="flex flex-col items-center gap-4">
                            <p class=" px-4 font-bold text-xl text-white  ease-in-out text-center"> {{$movie->name}}</p>
                            <span class=" px-4 text-white/80  ease-in-out text-center">{{\Carbon\Carbon::parse($movie->release_date)->format('Y')}}</span>
                        </div>
                        <div class="flex-row items-center flex justify-between gap-4 box-border w-full px-4 ">
                            <a href="{{route('movies.view_movie', $movie->id)}}" class="btn flex-1 hover:bg-white/80 border-none bg-white text-base-200">
                                Edit
                            </a>
                            <a href="{{route('movies.delete', $movie->id)}}" class="btn flex-1 hover:bg-red-[#ff6b00]/80 border-none bg-red-[#ff6b00] text-white">
                                Delete
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            
            <!-- <x-movie-card title="The Matrix" url="https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg">
            </x-movie-card>  -->
        </div>

        <x-footer>
        </x-footer>
    </body>
</html>
