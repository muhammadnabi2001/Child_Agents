@extends('Layout.main')

@section('title', 'Reioncreate')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agents Page</h1>
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
                                        <th>Add</th>
                                        <th>Sale</th>
                                        <th>Actions</th>
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
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ $agent->id }}">
                                                Add child
                                            </button>
                                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-{{ $agent->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $agent->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="modalLabel-{{ $agent->id }}">Add Child for {{ $agent->name }}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('addchild',$agent->id)}}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="childName-{{ $agent->id }}" class="form-label">Child Name</label>
                                                                    <input type="text" class="form-control" id="childName-{{ $agent->id }}" name="name" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="childTel-{{ $agent->id }}" class="form-label">Child Telephone</label>
                                                                    <input type="text" class="form-control" id="childTel-{{ $agent->id }}" name="tel" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Sale Button trigger modal -->
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#saleModal-{{ $agent->id }}">
                                                Sale
                                            </button>
                                        
                                            <!-- Modal for Sale -->
                                            <div class="modal fade" id="saleModal-{{ $agent->id }}" tabindex="-1" aria-labelledby="saleModalLabel-{{ $agent->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="saleModalLabel-{{ $agent->id }}">Sale for {{ $agent->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('sotish', $agent->id) }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="productSelect" class="form-label">Select Product</label>
                                                                    <select class="form-select" id="productSelect" name="product_id" required>
                                                                        <option value="">Select a product</option>
                                                                        @foreach($products as $product)
                                                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">Sale Price</label>
                                                                    <input type="number" class="form-control" id="price" name="price" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save Sale</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        
                                        <td>
                                            <a href="{{route('agentedit',$agent->id)}}" class="btn btn-success"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                                </svg></a>
                                            <a href="{{route('agentdelete',$agent->id)}}" class="btn btn-danger"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg></a>

                                        </td>
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