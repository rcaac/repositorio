<table class="table">
    <thead>
    <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Categoría</th>
        <th>Sección</th>
        <th>Condición</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->category->category }}</td>
            <td>{{ $user->subject->subject }}</td>
            <td>{{ $user->position->position }}</td>
            <td>{{ $user->role->role }}</td>
            <td>
                <a href="#" OnClick="Mostrar({{$user->id}});" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i class="icon-note"></i></a>
		@if(Auth::user()->role_id==1)
                <a href="#" data-id="{{ $user->id }}" class="btn btn-danger remove-dimension" data-toggle="modal" data-target="#deleteModal"><i class="icon-trash"></i></a>
		@endif
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {{ $users->links('vendor.pagination.bootstrap-4') }}
</div>