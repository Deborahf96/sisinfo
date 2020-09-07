<?php

namespace App\Providers;

use App\Attivita;
use App\Prenotazione;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
        $this->date_greater_than();
        $this->unique_ditta_data_ora();
        $this->unique_camera_datain_dataout();
    }

    private function date_greater_than()
    {
        Validator::extend('date_greater_than', function ($attribute, $value, $parameters, $validator) {
            $first = Carbon::parse($value);
            $second = Carbon::parse($parameters[0]);
            return $first->greaterThan($second);
        }, "La data di fine deve essere maggiore della data di inizio");
    }

    private function unique_ditta_data_ora()
    {
        Validator::extend('unique_ditta_data_ora', function ($attribute, $value, $parameters, $validator) {
            $count = Attivita::where('ditta_esterna_partita_iva', $value)
                             ->where('data', $parameters[0])
                             ->where('ora', $parameters[1])
                             ->where('id', '!=', $parameters[2])
                             ->count();
            return $count === 0;
        }, "La combinazione di attributi 'Ditta esterna, data, ora' esiste già");
    }

    private function unique_camera_datain_dataout()
    {
        Validator::extend('unique_camera_datain_dataout', function ($attribute, $value, $parameters, $validator) {
            $count = Prenotazione::where('camera_numero', $value)
                             ->where('data_checkin', $parameters[0])
                             ->where('data_checkout', $parameters[1])
                             ->where('id', '!=', $parameters[2])
                             ->count();
            return $count === 0;
        }, "La combinazione di attributi 'Camera, data checkin, data checkout' esiste già");
    }
}
