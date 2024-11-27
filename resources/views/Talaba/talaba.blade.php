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
                <div class="col-5">
                    <div class="table-responsive">
                        <!-- table-responsive qo'shildi -->
                        <form action="/talabastore" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Talaba Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Talaba age</label>
                                <input type="age" class="form-control" name="age">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Talaba Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Talaba Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>
                        
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Talabalar ro'yxati</h3>
                            </div>
                            <!-- Jadval ichida ma'lumot -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ismi</th>
                                            <th>Yoshi</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Misol uchun ma'lumotlar -->
                                        @foreach($talabalar as $talaba)
                                            
                                        <tr>
                                            <td>{{$talaba->id}}</td>
                                            <td>{{$talaba->name}}</td>
                                            <td>{{$talaba->age}}</td>
                                            <td>{{$talaba->email}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection