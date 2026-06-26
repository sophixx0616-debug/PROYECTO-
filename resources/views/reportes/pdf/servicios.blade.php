<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Servicios Más Solicitados</title>
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
    <h1>Servicios Más Solicitados</h1>
    <p class="fecha">Generado: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <tr><th>#</th><th>Servicio</th><th>Total Reservas</th></tr>
        @foreach($servicios as $i => $s)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $s->service->name ?? 'N/A' }}</td>
            <td>{{ $s->total }}</td>
        </tr>
        @endforeach
    </table>
    <p style="text-align:center;margin-top:20px;color:#999;">LAS DIVINAS SPA</p>
</body>
</html>
