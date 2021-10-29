<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
				<div class="row">
					<div class="col-md-2">
						<img src="{{asset('admin/assets/img/Mobilepedia.png')}}" alt="" style="width:100%;">
					</div>
				<div class="col-md-9">
    				<h1>Commission Slip</h1>
				</div>
				</div>
				{{-- <h3 class="pull-right">Order # 12345</h3> --}}
    		</div>
			<div style="border-bottom:3px solid darkblue;"></div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<h3 style="color:darkblue;">MobliePedia Network</h3><br>
    					<h4 style="color:rgb(152 149 149);">QD TINKET 3 PLAZA ALAM SENTRAL,</h4>
    					<h4 style="color:rgb(152 149 149);">JALAN MAJLIS SEKSYAN 14,40000 SHAH ALAM,SELANGOR</h4>

    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<h5 style="color:darkblue"><strong>Month:-February 2021</strong></h5>
        			<h5 style="color:darkblue"><strong>Dealer Id:-SFR535</strong></h5>
    					
    				</address>
    			</div>
    		</div>
			<div style="border-bottom:3px solid darkblue;padding-bottom:10px;"></div>
			
    		<div class="row" >
    			<div class="col-xs-6">
    				<address>
						<strong style="text-transform: uppercase;">
    					<h5 ><span style="color:darkblue;">Name:</span></h5>
    					<h5 ><span style="color:darkblue;">Address:</span></h5>
    					<h5 ><span style="color:darkblue;">Bank:</span></h5>
    					<h5 ><span style="color:darkblue;">Account No. :</span></h5>
					</strong>
    				</address>
    			</div>
    			{{-- <div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					March 7, 2014<br><br>
    				</address>
    			</div> --}}
    		</div>
    	</div>
    </div>
	<div>
		<div style="color:darkblue;padding-top:10px;">
			Position
		</div>
		<div>Dealer</div>
	</div>
     
    <div class="row" style="padding-top:70px;">
    	<div class="col-md-12">
    		<div class="panel panel-default" style="border:none;">
    			{{-- <div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div> --}}
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed table-bordered">
    						<thead>
                                <tr>
        							<td><strong>No</strong></td>
        							<td class="text-center"><strong>Description</strong></td>
        							<td class="text-center"></td>
        							<td class="text-right"><strong>Line Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>1</td>
    								<td class="text-center">Commission</td>
    								<td class="text-center"></td>
    								<td class="text-right">$10.99</td>
    							</tr>
                                <tr>
        							<td>2</td>
    								<td class="text-center">Bonus</td>
    								<td class="text-center"></td>
    								<td class="text-right">$60.00</td>
    							</tr>
                                <tr>
            						<td>3</td>
    								<td class="text-center">Fine</td>
    								<td class="text-center"></td>
    								<td class="text-right">$600.00</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$685.99</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</body>
</html>