<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Reporte de Citas</title>
<style>
    body{font-family:Arial,sans-serif;font-size:11px;}
    h1{color:#6f7f5d;text-align:center;}
    table{width:100%;border-collapse:collapse;margin-top:15px;}
    th{background:#6f7f5d;color:white;padding:8px;text-align:left;}
    td{padding:6px;border-bottom:1px solid #ddd;}
    tr:nth-child(even){background:#f9f9f9;}
    .fecha{text-align:right;font-size:10px;color:#999;}
</style></head>
<body>
    <h1>Reporte de Citas</h1>
    <p class="fecha">Generado: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <tr><th>ID</th><th>Cliente</th><th>Servicio</th><th>Fecha</th><th>Hora</th><th>Especialista</th><th>Estado</th></tr>
        @foreach($citas as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->user->name ?? 'N/A' }}</td>
            <td>{{ $c->service->name ?? 'N/A' }}</td>
            <td>{{ $c->date }}</td>
            <td>{{ $c->time }}</td>
            <td>{{ $c->worker }}</td>
            <td>{{ $c->status }}</td>
        </tr>
        @endforeach
    </table>
    <p style="text-align:center;margin-top:20px;color:#999;">LAS DIVINAS SPA</p>
</body>
</html>
