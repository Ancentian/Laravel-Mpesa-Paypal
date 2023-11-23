
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
                            <h4 class="card-title">Mpesa Gateways</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-top nav-justified">
                                <li class="nav-item"><a class="nav-link active" href="#stkpush" data-toggle="tab"> STK Push</a></li>
                                <li class="nav-item"><a class="nav-link" href="#c2b" data-toggle="tab">C2B</a></li>
                                <li class="nav-item"><a class="nav-link" href="#b2c" data-toggle="tab">Reversal</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="stkpush">
                                      <form action="#" id="initiatestk" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" name="phonenumber" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" class="form-control" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="number" class="form-control" name="account_number" required>
                                        </div>
                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="c2b">
                                    <form action="#" id="registerurl" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Shortcode(Paybill/Till)</label>
                                            <input type="number" id="shortcode" name="shortcode" class="form-control" required>
                                        </div>
                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Register URLS</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <form action="#" id="initiatec2b" method="POST">
                                        @csrf
                                        <input type="text" name="shortcode" id="shortcode">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" name="phonenumber" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" class="form-control" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Transaction Type</label>
                                            <select name="command" class="form-control" id="transaction_type">
                                                <option value="tillnumber">Buy Goods and Services</option>
                                                <option value="CustomerPayBillOnline">Pay Bills</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group" id="account">
                                            <label>Account Number</label>
                                            <input type="number" class="form-control" name="account" required>
                                        </div>
                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Simulate C2B</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="b2c">
                                    <form action="#" id="initiateb2c" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" name="phonenumber" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" class="form-control" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label> Remarks</label>
                                            <textarea name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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

