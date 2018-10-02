<table class="table">
    <thead>
    <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>email</th>
        <th>Categoría</th>
        <th>Sección</th>
        <th>Condición</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{ $result->username }}</td>
            <td>{{ $result->firstname }}</td>
            <td>{{ $result->lastname }}</td>
            <td>{{ $result->email }}</td>
            <td>{{ $result->category->category }}</td>
            <td>{{ $result->subject->subject }}</td>
            <td>{{ $result->position->position }}</td>
            <td>{{ $result->role->role }}</td>
            <td>
                <a href="#" OnClick="Mostrar({{$result->id}});" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i class="icon-note"></i></a>
		@if(Auth::user()->role_id==1)
                <a href="#" data-id="{{ $result->id }}" class="btn btn-danger remove-dimension" data-toggle="modal" data-target="#deleteModal"><i class="icon-trash"></i></a>
		@endif
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {{ $results->links('vendor.pagination.bootstrap-4') }}
</div>