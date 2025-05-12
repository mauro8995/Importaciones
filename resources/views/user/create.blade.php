@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content') 
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} User</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                            </div>

                            <div class="form-group">
                                <label for="Apellido">Apellido</label>
                                <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Enter your apellido" required>
                            </div>

                            <div class="form-group">
                                <label for="Telefono">Telefono</label>
                                <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Enter your phone number" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


