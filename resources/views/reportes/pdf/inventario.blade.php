<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Inventario Bajo</title>
<style>
    body{font-family:Arial,sans-serif;font-size:11px;}
    h1{color:#c85c5c;text-align:center;}
    table{width:100%;border-collapse:collapse;margin-top:15px;}
    th{background:#c85c5c;color:white;padding:8px;text-align:left;}
    td{padding:6px;border-bottom:1px solid #ddd;}
    tr:nth-child(even){background:#f9f9f9;}
    .fecha{text-align:right;font-size:10px;color:#999;}
</style></head>
<body>
    <h1>Inventario Bajo - Productos por Agotarse</h1>
    <p class="fecha">Generado: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <tr><th>ID</th><th>Producto</th><th>Stock</th></tr>
        @foreach($productos as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->product_name }}</td>
            <td>{{ $p->stock }}</td>
        </tr>
        @endforeach
    </table>
    <p style="text-align:center;margin-top:20px;color:#999;">LAS DIVINAS SPA</p>
</body>
</html>
