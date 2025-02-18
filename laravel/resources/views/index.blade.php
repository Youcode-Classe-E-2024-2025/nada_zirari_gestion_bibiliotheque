@extends('layouts')
@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Liste des livres</h2>
        <a href="{{ route('create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter un livre</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-3">Titre</th>
                    <th class="border p-3">Auteur</th>
                    <th class="border p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr class="text-center">
                        <td class="border p-3">{{ $book->title }}</td>
                        <td class="border p-3">{{ $book->author }}</td>
                        <td class="border p-3 space-x-2">
                            <a href="{{ route('edit', $book->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">Modifier</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
