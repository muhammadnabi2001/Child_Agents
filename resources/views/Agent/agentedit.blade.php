@extends('Layout.main')

@section('title', 'Ingredients')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editparentpage</h1>
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
                        <form action="{{route('parentupdate',$agent->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Parentname</label>
                                <input type="text" class="form-control" name="name" value="{{$agent->name}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Parent tel</label>
                                <input type="text" class="form-control" name="tel" value="{{$agent->tel}}">
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection