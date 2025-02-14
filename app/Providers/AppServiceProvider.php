<?php

namespace App\Providers;

use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Para asegurarte de que el número total de platos
        //esté disponible en todas las vistas donde
        //el usuario vea el icono del carrito.
        View::composer('*', function ($view) {
            if (Auth::check()) {
                // Llamamos al método contarPlatos del CarritoController
                $carrito = Carrito::where('user_id', Auth::id())->first();
                $totalPlatos = $carrito ? $carrito->items->sum('cantidad') : 0;
            } else {
                $totalPlatos = 0;
            }

            // Compartimos el total de platos con todas las vistas
            $view->with('totalPlatos', $totalPlatos);
        });
    }
}
