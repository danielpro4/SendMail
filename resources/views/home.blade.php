@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Mensajes programados</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Contacto</th>
                                    <th>Programado</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($schedules as $i => $schedule)
                                    <tr>
                                        <td>{{$schedule->id}}</td>
                                        <td>{{$schedule->message->email}}</td>
                                        <td>{{$schedule->scheduled_at->toDayDateTimeString()}}</td>
                                        <td>{!!
                                            $schedule->status == 'SENDED'
                                                ? '<span class="text-success">Enviado</span>'
                                                : '<span class="text-warning">Pendiente</span>'
                                            !!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">
                                            <img class="uk-svg" width="50" height="50" src="/imgs/funnel.svg">
                                            <p>Data not found.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div>
                            {{$schedules->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
