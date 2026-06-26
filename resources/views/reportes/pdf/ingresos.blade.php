<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Ingresos Estimados</title>
<style>
    body{font-family:Arial,sans-serif;font-size:11px;}
    h1{color:#198754;text-align:center;}
    .total{font-size:18px;text-align:center;color:#198754;font-weight:bold;margin:15px 0;}
    table{width:100%;border-collapse:collapse;margin-top:15px;}
    th{background:#6f7f5d;color:white;padding:8px;text-align:left;}
    td{padding:6px;border-bottom:1px solid #ddd;}
    tr:nth-child(even){background:#f9f9f9;}
    .fecha{text-align:right;font-size:10px;color:#999;}
</style></head>
<body>
    <h1>Ingresos Estimados</h1>
    <p class="fecha">Generado: {{ now()->format('d/m/Y H:i') }}</p>
    <div class="total">Total: ${{ number_format($ingresos, 0, ',', '.') }}</div>
    <table>
        <tr><th>Servicio</th><th>Precio</th></tr>
        @foreach($citas as $c)
        <tr>
            <td>{{ $c->service->name ?? 'N/A' }}</td>
            <td>${{ number_format($c->service->price ?? 0, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr style="font-weight:bold;"><td>Total</td><td>${{ number_format($ingresos, 0, ',', '.') }}</td></tr>
    </table>
    <p style="text-align:center;margin-top:20px;color:#999;">LAS DIVINAS SPA</p>
</body>
</html>
