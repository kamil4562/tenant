@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-hover">

                            <thead>

                            <th>User</th>

                            <th>Email</th>

                            <th>Tenant ID</th>

                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td>{{$user['name']}} </td>

                                    <td>{{$user['email']}} </td>

                                    <td>{{$user['tenant_id']}} </td>


                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
