@extends('layouts.app')

@section('thousand_sunny_content')
<a href="/prenotazioni" class="btn btn-outline-secondary" style="margin-left: 10px">Indietro</a>
<br>
<br>
{!! Form::open(['action' => ['PrenotazioneController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Inserisci dati prenotazione</h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('camera_numero', 'Camera')}}}
                                {{{Form::select('camera_numero', $camere, '', [ 'class' => 'form-control', 'placeholder' => 'Seleziona una camera' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('data_checkin', 'Data check-in')}}}
                                {{{Form::date('data_checkin', '', [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('data_checkout', 'Data check-out')}}}
                                {{{Form::date('data_checkout', '', [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('cliente', 'Nuovo cliente')}}}
                                {{{Form::text('cliente', '', [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('num_persone', 'Posti letto')}}}
                                {{{Form::number('num_persone', '', [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('metodo_pagamento', 'Metodo di pagamento')}}}
                                {{{Form::select('metodo_pagamento', $metodo_pagamento_enum, '', [ 'class' => 'form-control', 'placeholder' => 'Seleziona un metodo di pagamento' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('cliente_user_id', 'Cliente già registrato')}}}
                                {{{Form::select('cliente_user_id', $clienti, '', [ 'class' => 'form-control', 'placeholder' => 'Seleziona un cliente già registrato' ])}}}
                            </div>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
</div>

{{ Form::submit('Conferma', [ 'class' => 'btn btn-primary float-right', 'style' => 'margin-right: 10px']) }}
{!! Form::close() !!}
@endsection