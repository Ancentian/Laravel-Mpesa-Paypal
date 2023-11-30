
	@extends('layouts.app')

    @section('content')
    <div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Payment GateWays</h3>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-6 ">
						<div class="card card-chart shadow p-3 mb-5 bg-body rounded">
							<div class="card-header">
								<h4 class="card-title">Mpesa</h4> </div>
							<div class="card-body">
								<img src="{{asset('img/mpesa.png')}}" alt="Mpesa" width="200px" height="200px">
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-6">
						<div class="card card-chart shadow p-3 mb-5 bg-body rounded">
							<div class="card-header">
								<h4 class="card-title">Paypal</h4> </div>
							<div class="card-body">
								<img src="{{asset('img/paypal.png')}}" alt="Mpesa" width="300px" height="200px">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection