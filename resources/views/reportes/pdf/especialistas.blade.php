<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Especialistas Más Solicitadas</title>
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
    <h1>Especialistas Más Solicitadas</h1>
    <p class="fecha">Generado: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <tr><th>#</th><th>Especialista</th><th>Total Citas</th></tr>
        @foreach($especialistas as $i => $e)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $e->worker }}</td>
            <td>{{ $e->total }}</td>
        </tr>
        @endforeach
    </table>
    <p style="text-align:center;margin-top:20px;color:#999;">LAS DIVINAS SPA</p>
</body>
</html>
