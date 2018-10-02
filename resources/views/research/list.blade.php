<table class="table">
    <thead>
    <tr>
        <th>Título</th>
        <th>Estado</th>
        <th>Archivo</th>
        <th>Tema</th>
        <th>Investigador</th>
        <th>Categoría</th>
        <th width="15%">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($investigations as $investigation)
        <tr>
            <td>{{ $investigation->title }}</td>
            <td>{{ $investigation->state->state }}</td>
            <td>{{ link_to_action('InvestigationController@downloadEvidences', $investigation->file, ['file' => $investigation->file], ['target' => '_blank']) }}</td>
            <td>{{ $investigation->subject->subject }}</td>
            <td>{{ $investigation->user->firstname}}, {{$investigation->user->lastname  }}</td>
            <td>{{ $investigation->user->category->category}}</td>
            <td>
                <a href="{{route('investigation.edit', $investigation->id)}}" class="btn btn-primary"><i class="icon-note"></i></a>
                <a href="#" data-id="{{ $investigation->id }}" class="btn btn-danger remove-investigation" data-toggle="modal" data-target="#deleteModal"><i class="icon-trash"></i></a>
                <a href="{{route('investigation.detail', $investigation->id)}}" class="btn btn-secondary"><i class="icon-chart"></i></a>
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {{ $investigations->links('vendor.pagination.bootstrap-4') }}
</div>