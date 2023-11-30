
@extends('layouts.app')    
@section('content')                           
<div class="page-wrapper mt-5">
    <div class="content container-fluid">
        
        <section class="comp-section">
            {{-- <div class="section-header">
                <h3 class="section-title">Tabs</h3>
                <div class="line"></div>
            </div> --}}
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-header">
                            <h4 class="card-title">Paypal Gateways</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-top nav-justified">
                                <li class="nav-item"><a class="nav-link active" href="#paypal" data-toggle="tab"> Paypal</a></li>
                            </ul>
                            <div class="tab-content">
                                {{-- <div class="container mt-5 text-center">
                                    <h2>Laravel 7 PayPal Integration Example</h2>
                                    <a href="" class="btn btn-primary mt-3">Pay $224 via Paypal</a>
                                </div> --}}
                                <div class="tab-pane show active" id="paypal">
                                      <form action="{{ route('make.payment') }}"  method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" class="form-control" name="price" required>
                                        </div>
                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Pay Via Paypal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-header">
                            <h4 class="card-title">Response</h4>
                        </div>
                        <div class="card-body">
                            <p id="response"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>
@endsection

