@extends('layouts.app')

@section('thousand_sunny_content')
    <a href="/" class="btn btn-outline-secondary">Indietro</a>
    <br>
    <br>
    <a href="/prenotazioni/create" class="btn btn-primary float-right">Aggiungi una nuova prenotazione</a>
    <h1>Elenco prenotazioni</h1>
    <br>
    @if (count($prenotazioni) > 0)
        <div class="card">
            <div class="card-body">
                <table id="" class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Camera</th>
                            <th>Data check-in</th>
                            <th>Data check-out</th>
                            <th>Importo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prenotazioni as $prenotazione)
                            <tr>
                                <td width=20%>
                                    {{ $prenotazione->camera->numero }}
                                </td>
                                <td width=20%>
                                    {{ $prenotazione->data_checkin }}
                                </td>
                                <td width=20%>
                                    {{ $prenotazione->data_checkout }}
                                </td>
                                <td width=20%>
                                    {{ $prenotazione->importo }}
                                </td>
                                <td width=20%>
                                    <div class="d-flex justify-content-around">
                                        <a button href="/prenotazioni/{{ $prenotazione->id }}"
                                            data-toggle="tooltip" data-placement="top" title="Visualizza"
                                            class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></button></a>
                                        <a button href="/prenotazioni/{{ $prenotazione->id }}/edit"
                                            data-toggle="tooltip" data-placement="top" title="Modifica"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                        {!! Form::open(['action' => ['PrenotazioneController@destroy',
                                        $prenotazione->id], 'method' => 'POST']) !!}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::button('<i class="fa fa-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'data-toggle' => 'tooltip',
                                                'data-placement' => 'top',
                                                'title' => 'Elimina',
                                                'onclick' => "return confirm('Confermi di voler eliminare questa prenotazione?')",
                                            ]) }}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p>Nessuna prenotazione inserita</p>
    @endif

@endsection