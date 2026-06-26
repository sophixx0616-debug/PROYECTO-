<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Inventory;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Si es administrador
        if ($user->role && $user->role->name === 'admin') {
            $usuarios = User::count();
            $citas = Appointment::count();
            $servicios = Service::count();
            $productos = Inventory::count();

            $ultimasCitas = Appointment::with(['user', 'service'])
                ->latest()
                ->take(5)
                ->get();

            return view('dashboard', compact(
                'usuarios',
                'citas',
                'servicios',
                'productos',
                'ultimasCitas'
            ));
        }

        // Usuario normal
        $misCitas = Appointment::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('misCitas'));
    }

    public function reportes()
    {
        $citas = Appointment::with(['user', 'service'])
            ->latest()
            ->take(20)
            ->get();

        return view('reportes.citas', compact('citas'));
    }
    public function serviciosMasSolicitados()
{
    $servicios = \App\Models\Appointment::selectRaw(
        'service_id, COUNT(*) as total'
    )
    ->with('service')
    ->groupBy('service_id')
    ->orderByDesc('total')
    ->get();

    return view(
        'reportes.servicios',
        compact('servicios')
    );
}
public function especialistasMasSolicitadas()
{
    $especialistas = \App\Models\Appointment::selectRaw(
        'worker, COUNT(*) as total'
    )
    ->groupBy('worker')
    ->orderByDesc('total')
    ->get();

    return view(
        'reportes.especialistas',
        compact('especialistas')
    );
}
public function inventarioBajo()
{
    $productos = \App\Models\Inventory::where('stock', '<=', 5)
        ->orderBy('stock')
        ->get();

    return view(
        'reportes.inventario-bajo',
        compact('productos')
    );
}
public function ingresosEstimados()
{
    $citas = \App\Models\Appointment::with('service')->get();

    $ingresos = 0;

    foreach ($citas as $cita) {

        if ($cita->service) {

            $ingresos += $cita->service->price;
        }
    }

    return view(
        'reportes.ingresos',
        compact('ingresos', 'citas')
    );
}

private function buildExcelResponse(string $html, string $filename)
{
    return response($html)
        ->header('Content-Type', 'application/vnd.ms-excel')
        ->header('Content-Disposition', 'attachment; filename="' . $filename . '.xls"')
        ->header('Cache-Control', 'max-age=0');
}

private function excelHeader(string $title): string
{
    return '<html xmlns:o="urn:schemas-microsoft-com:office:office"
            xmlns:x="urn:schemas-microsoft-com:office:excel"
            xmlns="http://www.w3.org/TR/REC-html40">
            <head><meta charset="UTF-8">
            <style>td,th{border:1px solid #ccc;padding:6px;text-align:left;}
            th{background:#6f7f5d;color:white;font-weight:bold;}
            table{border-collapse:collapse;width:100%;font-family:Arial;font-size:12px;}
            h2{color:#6f7f5d;font-family:Arial;}</style>
            </head><body>
            <h2>' . $title . '</h2>
            <table>';
}

private function excelFooter(): string
{
    return '</table></body></html>';
}

public function exportCitasPDF()
{
    $citas = Appointment::with(['user', 'service'])->latest()->get();
    $pdf = Pdf::loadView('reportes.pdf.citas', compact('citas'));
    return $pdf->download('reporte-citas.pdf');
}

public function exportCitasExcel()
{
    $citas = Appointment::with(['user', 'service'])->latest()->get();
    $html = $this->excelHeader('Reporte de Citas - LAS DIVINAS SPA');
    $html .= '<tr><th>ID</th><th>Cliente</th><th>Servicio</th><th>Fecha</th><th>Hora</th><th>Especialista</th><th>Estado</th></tr>';
    foreach ($citas as $c) {
        $html .= '<tr>';
        $html .= '<td>' . $c->id . '</td>';
        $html .= '<td>' . ($c->user->name ?? 'N/A') . '</td>';
        $html .= '<td>' . ($c->service->name ?? 'N/A') . '</td>';
        $html .= '<td>' . $c->date . '</td>';
        $html .= '<td>' . $c->time . '</td>';
        $html .= '<td>' . $c->worker . '</td>';
        $html .= '<td>' . $c->status . '</td>';
        $html .= '</tr>';
    }
    $html .= $this->excelFooter();
    return $this->buildExcelResponse($html, 'reporte-citas');
}

public function exportServiciosPDF()
{
    $servicios = Appointment::selectRaw('service_id, COUNT(*) as total')
        ->with('service')->groupBy('service_id')->orderByDesc('total')->get();
    $pdf = Pdf::loadView('reportes.pdf.servicios', compact('servicios'));
    return $pdf->download('reporte-servicios.pdf');
}

public function exportServiciosExcel()
{
    $servicios = Appointment::selectRaw('service_id, COUNT(*) as total')
        ->with('service')->groupBy('service_id')->orderByDesc('total')->get();
    $html = $this->excelHeader('Servicios Más Solicitados - LAS DIVINAS SPA');
    $html .= '<tr><th>#</th><th>Servicio</th><th>Total Reservas</th></tr>';
    foreach ($servicios as $i => $s) {
        $html .= '<tr>';
        $html .= '<td>' . ($i + 1) . '</td>';
        $html .= '<td>' . ($s->service->name ?? 'N/A') . '</td>';
        $html .= '<td>' . $s->total . '</td>';
        $html .= '</tr>';
    }
    $html .= $this->excelFooter();
    return $this->buildExcelResponse($html, 'reporte-servicios');
}

public function exportEspecialistasPDF()
{
    $especialistas = Appointment::selectRaw('worker, COUNT(*) as total')
        ->groupBy('worker')->orderByDesc('total')->get();
    $pdf = Pdf::loadView('reportes.pdf.especialistas', compact('especialistas'));
    return $pdf->download('reporte-especialistas.pdf');
}

public function exportEspecialistasExcel()
{
    $especialistas = Appointment::selectRaw('worker, COUNT(*) as total')
        ->groupBy('worker')->orderByDesc('total')->get();
    $html = $this->excelHeader('Especialistas Más Solicitadas - LAS DIVINAS SPA');
    $html .= '<tr><th>#</th><th>Especialista</th><th>Total Citas</th></tr>';
    foreach ($especialistas as $i => $e) {
        $html .= '<tr>';
        $html .= '<td>' . ($i + 1) . '</td>';
        $html .= '<td>' . $e->worker . '</td>';
        $html .= '<td>' . $e->total . '</td>';
        $html .= '</tr>';
    }
    $html .= $this->excelFooter();
    return $this->buildExcelResponse($html, 'reporte-especialistas');
}

public function exportInventarioPDF()
{
    $productos = Inventory::where('stock', '<=', 5)->orderBy('stock')->get();
    $pdf = Pdf::loadView('reportes.pdf.inventario', compact('productos'));
    return $pdf->download('reporte-inventario-bajo.pdf');
}

public function exportInventarioExcel()
{
    $productos = Inventory::where('stock', '<=', 5)->orderBy('stock')->get();
    $html = $this->excelHeader('Inventario Bajo - LAS DIVINAS SPA');
    $html .= '<tr><th>ID</th><th>Producto</th><th>Stock</th></tr>';
    foreach ($productos as $p) {
        $html .= '<tr>';
        $html .= '<td>' . $p->id . '</td>';
        $html .= '<td>' . $p->product_name . '</td>';
        $html .= '<td>' . $p->stock . '</td>';
        $html .= '</tr>';
    }
    $html .= $this->excelFooter();
    return $this->buildExcelResponse($html, 'reporte-inventario-bajo');
}

public function exportIngresosPDF()
{
    $citas = Appointment::with('service')->get();
    $ingresos = 0;
    foreach ($citas as $c) { if ($c->service) $ingresos += $c->service->price; }
    $pdf = Pdf::loadView('reportes.pdf.ingresos', compact('ingresos', 'citas'));
    return $pdf->download('reporte-ingresos.pdf');
}

public function exportIngresosExcel()
{
    $citas = Appointment::with('service')->get();
    $ingresos = 0;
    foreach ($citas as $c) { if ($c->service) $ingresos += $c->service->price; }
    $html = $this->excelHeader('Ingresos Estimados - LAS DIVINAS SPA');
    $html .= '<tr><th>Servicio</th><th>Precio</th></tr>';
    foreach ($citas as $c) {
        $html .= '<tr>';
        $html .= '<td>' . ($c->service->name ?? 'N/A') . '</td>';
        $html .= '<td>$' . number_format($c->service->price ?? 0, 0, ',', '.') . '</td>';
        $html .= '</tr>';
    }
    $html .= '<tr style="font-weight:bold;"><td>Total</td><td>$' . number_format($ingresos, 0, ',', '.') . '</td></tr>';
    $html .= $this->excelFooter();
    return $this->buildExcelResponse($html, 'reporte-ingresos');
}
}
