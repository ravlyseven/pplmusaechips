<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;
use App\Order;
use App\Order_Detail;
use App\Spending;


class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }
    public function news()
    {
        return view('news');
    }
    public function finances()
    {
        $spendings = Spending::all();
        $orders = Order::all();
        $omset = 0;
        $pengeluaran = 0;

        foreach ($orders as $order) 
        {
            $omset = $omset + $order->total_price;
        }
        foreach ($spendings as $spending) 
        {
            $pengeluaran = $pengeluaran + $spending->price;
        }

        $laba = $omset - $pengeluaran;

        return view('finances', compact('spendings', 'orders', 'omset', 'pengeluaran', 'laba'));
    }
}
