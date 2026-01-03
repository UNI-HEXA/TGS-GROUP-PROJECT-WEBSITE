<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Pastikan model Merchandise sudah dibuat
        $totalProducts = Merchandise::count();
        $lowStock = Merchandise::where('stock', '<', 10)->count();
        $monthlySales = Merchandise::count();

        return view('admin.admindashboard', compact(
            'totalProducts',
            'lowStock',
            'monthlySales'
        ));
    }
}
