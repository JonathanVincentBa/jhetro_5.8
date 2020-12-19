<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre de Usuario</th>
            <th>Ip del computador</th>
            <th>Fecha y hora</th>
            <th>Condición</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        {
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->ip_client }}</td>
                <td>{{ $usuario->fecha }}</td>
                <td>{{ $usuario->condicion }}</td>
            </tr>
        }
        @endforeach
    </tbody>
    <tfoot>
    </tfoot>
</table>