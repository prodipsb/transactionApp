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

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="card" style="margin-top: 100px;">
                <div class="card-header text-center font-weight-bold">
                    Transaction Form
                </div>
                <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('transaction.store')}}">
                @csrf
                    <div class="form-group">
                    <label for="amount">Transaction Amount</label>
                    <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"  style="margin-top: 20px;">Submit</button>
                </form>
                </div>
                </div>


               
                @if (isset($transactions))
                
                <div  style="margin-top: 100px;">
                <h1>Transactions</h1>
                <ul>
                    @foreach ($transactions as $transaction)
                    <li>{{ $transaction->uuid }} <a href="{{ route('transaction.update', ['id' => $transaction->uuid]) }}">Update</a></li>
                    @endforeach
                </ul>     
                </div>
                @endif


        </div>
    </div>
</div>
@endsection
