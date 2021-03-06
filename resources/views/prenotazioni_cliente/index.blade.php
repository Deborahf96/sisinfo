@extends('layouts.app')

@section('thousand_sunny_content')
    <a href="/home" class="btn btn-outline-secondary">Indietro</a>
    <br>
    <br>
    <a href="/prenotazioni_cliente/prenota" class="btn btn-primary float-right">Effettua una nuova prenotazione</a>
    <h1>Storico prenotazioni</h1>
    <br>
    @if (count($prenotazioni) > 0)
        <div class="card">
            <div class="card-body">
                <table id="" class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Data check-in</th>
                            <th>Data check-out</th>
                            <th>Importo</th>
                            <th>Camera</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prenotazioni as $prenotazione)
                            <tr>
                                <td width=20%>
                                    {{ $prenotazione->data_checkin }}
                                </td>
                                <td width=20%>
                                    {{ $prenotazione->data_checkout }}
                                </td>
                                <td width=20%>
                                    {{ $prenotazione->importo }} €
                                </td>
                                <td width=20%>
                                    {{ $prenotazione->camera->numero }}
                                </td>
                                <td width=20%>
                                    <div class="d-flex justify-content-around">
                                        <a button href="/prenotazioni_cliente/{{ $prenotazione->id }}"
                                            data-toggle="tooltip" data-placement="top" title="Visualizza"
                                            class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></button></a>
                                        @php $giorni_di_differenza = (\Carbon\Carbon::now()->diffinDays(\Carbon\Carbon::parse($prenotazione->data_checkout), false)) @endphp
                                        @if($giorni_di_differenza>=14)
                                        {!! Form::open(['action' => ['PrenotazioneClienteController@destroy',
                                            $prenotazione->id], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::button('<i class="fa fa-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'data-toggle' => 'tooltip',
                                                    'data-placement' => 'top',
                                                    'title' => 'Annulla',
                                                    'onclick' => "return confirm('Confermi di voler annullare questa prenotazione?')",
                                                ]) }}
                                            {!! Form::close() !!}
                                        @else
                                        <a button data-toggle="tooltip" data-placement="top" title="Annulla"
                                            class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p>Nessuna prenotazione effettuata</p>
    @endif

@endsection
