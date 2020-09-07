@extends('layouts.app')

<title> Thousand Sunny B&B | Prenotazioni </title>

@section('thousand_sunny_content')
<a href="/prenotazioni/{{$prenotazione->id}}" class="btn btn-outline-secondary" style="margin-left: 10px">Indietro</a>
<br>
<br>
{!! Form::open(['action' => ['PrenotazioneController@update', $prenotazione->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Modifica una prenotazione</h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('camera_numero', 'Camera')}}}
                                {{{Form::select('camera_numero', $camere, $prenotazione->camera_numero, [ 'class' => 'form-control', 'placeholder' => 'Seleziona una camera' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('data_checkin', 'Data checkin')}}}
                                {{{Form::date('data_checkin', $prenotazione->data_checkin, [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('data_checkout', 'Data checkout')}}}
                                {{{Form::date('data_checkout', $prenotazione->data_checkout, [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('num_persone', 'Numero di persone')}}}
                                {{{Form::number('num_persone', $prenotazione->num_persone, [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('cliente', 'Nome e cognome')}}}
                                {{{Form::text('cliente', $attivita->destinazione, [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('metodo_pagamento', 'Metodo di pagamento')}}}
                                {{{Form::select('metodo_pagamento', $metodo_pagamento_enum, $prenotazione->metodo_pagamento, [ 'class' => 'form-control', 'placeholder' => 'Seleziona un metodo di pagamento' ])}}}
                            </div>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
</div>

{{ Form::hidden('_method','PUT' )}}
{{ Form::submit('Conferma', [ 'class' => 'btn btn-primary float-right', 'style' => 'margin-right: 10px']) }}
{!! Form::close() !!}
@endsection