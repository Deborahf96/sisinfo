@extends('layouts.app')

@section('thousand_sunny_content')
<a href="/attivita" class="btn btn-outline-secondary" style="margin-left: 10px">Indietro</a>
<br>
<br>
{!! Form::open(['action' => ['AttivitaController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Aggiungi una nuova attività</h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('ditta_esterna_partita_iva', 'Ditta esterna')}}}
                                {{{Form::select('ditta_esterna_partita_iva', $ditte_esterne, '', [ 'class' => 'form-control', 'placeholder' => 'Seleziona una ditta esterna' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('data', 'Data')}}}
                                {{{Form::date('data', '', [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('ora', 'Ora')}}}
                                {{{Form::time('ora', '', [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('destinazione', 'Luogo di destinazione')}}}
                                {{{Form::text('destinazione', '', [ 'class' => 'form-control' ])}}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{{Form::label('costo', 'Costo')}}}
                                {{{Form::number('costo', '', [ 'class' => 'form-control' ])}}}
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