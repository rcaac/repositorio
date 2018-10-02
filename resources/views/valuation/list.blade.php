<table class="table">
    <thead>
    <tr>
        <th>Valoración</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($valuations as $valuation)
        <tr>
            <td>{{ $valuation->valuation }}</td>
            <td>
                <a href="#" OnClick="" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i class="icon-note"></i></a>
                <a href="#" data-id="" class="btn btn-danger remove-dimension" data-toggle="modal" data-target="#deleteModal"><i class="icon-trash"></i></a>
            </td>
        </tr>
    @endforeach
</table>