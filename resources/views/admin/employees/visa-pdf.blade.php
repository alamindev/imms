<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
  <style> 
  .d-block{display: block;}
    p{font-size: 12px; margin-bottom: 0px; padding-bottom: 0px}
    h1{
      text-transform: uppercase;
    }
	.container{
		margin-left: 20px;
	}
  </style>
</head>
<body>
<div class="container">
<header>
	<table>
		<tr>
			<td>
				<img width="250px;" src="{{ public_path().'/images/male.png' }}" alt="header logo">
			</td>
			<td>
				<h2>{{ $employee->vd }}</h2>
			</td>
			<td>
				<img style="width: 200px;" src="{{ public_path().'/images/right.png' }}" alt="header logo right">
			</td>
		</tr>
	</table>
</header>
<section style="margin-top: 50px">
	<table> 
		<tbody>
			<tr>
				<td>
					<table style="text-align: center;">
						<tr>
							<td>
								<img src="{{ public_path().'/uploads/'. $employee->picture }}" width="
								80">

							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ public_path().'/uploads/'. $employee->signature }}" width="50" style="margin: 10px 0px;"> 
							</td>
						</tr>
						<tr>
							<td>
								<span style="font-size: 10px;">**************</span>
							</td>
						</tr>
						<tr>
							<td>
								<span style="font-size: 12px;">Directory General</span>
							</td>
						</tr><tr>
							<td width="120">
								<span style="font-size: 10px;">VP.No : &nbsp; <b style=" text-transform: uppercase;">{{ $employee->vp_no }}</b></span>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table style="padding-left: 45px;">
						<tr style="font-size: 14px;">
							<td style="text-align: center">
								<span style="text-transform: uppercase; font-weight: bold">malaysia immigration</span><br> [Section 2(2),Passport Act 1966] <br>
								<span style="text-transform: uppercase;"> Single entry visa</span>
							</td>
							<td style="padding-left: 40px; font-size: 12px; width: 200px">
								<ul style="list-style-type: none;">
									<li>Receipt No: <span style=" text-transform: uppercase;"><b>{{ $employee->receipt_no }}</b></span></li>
									<li>Fee Paid: <span style=" text-transform: uppercase;"><b>{{ $employee->fee_paid }}</b></span></li>
								</ul>
							</td>
						</tr> 
					</table>
					<table width="260" style="text-align: center; margin-top: 10px; margin-bottom: 10px; font-size: 12px;">
						<tr>
							<td>Good for a single journey to Malaysia within 3 Months from Date hereof, provided this passport Remains valid</td>
						</tr>
					</table>
					<table style="font-size: 10px; line-height: 10px;">
						<tr>
							<td>Name</td>
							<td>: </td>
							<td style=" text-transform: uppercase;">&nbsp;&nbsp;<b>{{ $employee->last_name }}&nbsp; {{ $employee->first_name }}</b></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>: </td>
							<td style=" text-transform: uppercase;"><span style="line-height: 16px;">&nbsp;&nbsp;<b>{{ $employee->gender }}</b></span>
								<table style="float: right; margin-left: 75px;font-size: 10px; line-height: 0px; position: relative; top: -7px;">
									<tr>
										<td width="50">Passport No</td>
										<td>:</td>
										<td style=" text-transform: uppercase; width: 100px">&nbsp;&nbsp;<b>{{ $employee->doc_number }}</b></td>
									</tr>
								</table>
							</td> 
						</tr>
						<tr>
							<td>Nationality</td>
							<td>:</td>
							<td style=" text-transform: uppercase;">&nbsp;&nbsp;<b>{{ $employee->nationality }}</b></td>
						</tr>
						<tr>
							<td>remark</td>
							<td>:</td>
							<td style=" text-transform: uppercase;">&nbsp;&nbsp;<b>{{ $employee->remarks }}</b></td>
						</tr>
						<tr>
							<td>Ref.No.</td>
							<td>:</td>
							<td style=" text-transform: uppercase;">&nbsp;&nbsp;<b>{{ $employee->ref_no }}</b></td>
						</tr>
						<tr>
							<td>Date Of Issue</td>
							<td>:</td>
							<td style=" text-transform: uppercase;">&nbsp;&nbsp;<b>{{ \Carbon\Carbon::parse($employee->date)->format('d F Y ')}}</b></td>
						</tr>
						<tr>
							<td>Place Of Issue</td>
							<td>:</td>
							<td style=" text-transform: uppercase;">&nbsp;&nbsp;<b>{{ $employee->place_issue }}</b></td>
						</tr>
					</table>
				</td> 
			</tr> 
		</tbody>
	</table>
</section>
<section>
	<table>
		 <tr>
		 	<td style=" text-transform: uppercase; font-weight: bold; font-size: 14px; width: 500px">vsbgd<span>{{ $employee->last_name }}</span>&lt;<span>{{ $employee->first_name }}</span>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</td>
		 </tr> 
		 <tr>
		 	<td style="text-transform: uppercase; font-weight: bold; font-size: 14px; width: 500px"><span>{{ $employee->doc_number }} {{ $employee->application_number }}</span>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</td>
		 </tr>
	</table>
</section>
</div>
</body>
</html>