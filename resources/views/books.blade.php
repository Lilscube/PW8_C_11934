<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold mb-6 text-center">List Book</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($books as $book)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                                <img class="w-full h-48 object-cover" src="{{ $book->image_path }}" alt="{{ $book->name }}">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">{{ $book->name }}</div>
                                    <p class="text-gray-700 text-base">Release Year: {{ $book->release_year}}</p>
                                    <p class="text-gray-700 text-sm">{{ $book->description }}</p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

