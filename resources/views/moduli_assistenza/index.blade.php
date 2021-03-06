@extends('layouts.app')

@section('thousand_sunny_content')
    <a href="/home" class="btn btn-outline-secondary">Indietro</a>
    <br>
    <br>    
    <a href="/moduli_assistenza/create" class="btn btn-primary float-right">Invia una richiesta</a>
    <h1>Le tue richieste di assistenza</h1>
    <br>
    @if (count($moduli_assistenza) > 0)
        <div class="card">
            <div class="card-body">
                <table id="" class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tipologia di assistenza</th>
                            <th>Oggetto</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($moduli_assistenza as $modulo_assistenza)
                            <tr>
                                <td width=30%>
                                    {{ $modulo_assistenza->tipologia }}
                                </td>
                                <td width=30%>
                                    {{ $modulo_assistenza->oggetto }}
                                </td>
                                <td width=30%>
                                    {{ \Carbon\Carbon::parse($modulo_assistenza->created_at)->format('Y/m/d H:i') }}
                                </td>
                                <td width=10%>
                                    <div class="d-flex justify-content-around">
                                        <a button href="/moduli_assistenza/{{ $modulo_assistenza->id }}"
                                            data-toggle="tooltip" data-placement="top" title="Visualizza"
                                            class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p>Nessuna richiesta di assistenza effettuata</p>
    @endif

@endsection
