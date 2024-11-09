<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <a href="{{ route('books.index') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md">
                    See All Book
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h2 class="text-center text-2xl font-semibold mb-6">Add Book Details</h2>
                    
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Book Image</label>
                            <input type="file" id="image" name="image_path" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-500 file:text-white hover:file:bg-blue-600 @error('image_path') is-invalid @enderror"/>
                            @error('image_path')
                                <div class="mt-2 px-4 py-3 bg-gray-800 text-white text-base rounded">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Book Name</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') is-invalid @enderror" placeholder="Enter Book name"/>
                            @error('name')
                                <div class="mt-2 px-4 py-3 bg-gray-800 text-white text-base rounded">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Release Year</label>
                            <input type="number" name="release_year" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('release_year') is-invalid @enderror" placeholder="Enter release year"/>
                            @error('release_year')
                                <div class="mt-2 px-4 py-3 bg-gray-800 text-white text-base rounded">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Book Description</label>
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('description') is-invalid @enderror" placeholder="Enter book description"></textarea>
                            @error('description')
                                <div class="mt-2 px-4 py-3 bg-gray-800 text-white text-base rounded">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
