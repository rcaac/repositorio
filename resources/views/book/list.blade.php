<table class="table">
    <thead>
    <tr>
        <th>Libro</th>
        <th>Título</th>
        <th>Autor</th>
        <th>ISBN</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>
               <img style="width: 120px; height: 150px;" src="{{ asset($book->cover) }}">
            </td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->isbn }}</td>
            <td>
                <a href="#" OnClick="Mostrar({{$book->id}});" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i class="icon-note"></i></a>
                <a href="#" data-id="{{ $book->id }}" class="btn btn-danger remove-dimension" data-toggle="modal" data-target="#deleteModal"><i class="icon-trash"></i></a>
                <a href="{{route('book.detail', $book->id)}}" class="btn btn-secondary"><i class="icon-chart"></i></a>
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {{ $books->links('vendor.pagination.bootstrap-4') }}
</div>
