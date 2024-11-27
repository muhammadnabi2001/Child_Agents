@extends('Layout.main')

@section('title', 'Reioncreate')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Talaba Create Page</h1>
                </div>
            </div>
            <div class="row mb-2">

            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div>
                    <a href="{{route('parentcreate')}}" class="btn btn-primary m-3">Create</a>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Agnets table</h3>
                            </div>
                            <!-- Jadval ichida ma'lumot -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ismi</th>
                                            <th>Tel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Misol uchun ma'lumotlar -->
                                        @foreach($agents as $agent)
                                            
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>

                                                <a href="{{ route('childs', $agent->id) }}">
                                                    {{ $agent->name }}
                                                </a>
                                            </td>
                                                <td>{{$agent->tel}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                {{$agents->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection