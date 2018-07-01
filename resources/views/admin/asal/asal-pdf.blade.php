<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
  <style> 
  .d-block{display: block;}
    p{font-size: 12px; margin-bottom: 0px; padding-bottom: 0px}
    h1{
      text-transform: uppercase;
    }
    .main-side{
      font-size: 14px;
      list-style: none;
    }
    main{
      margin-top: 15px;
    }
    .main-side .side{
      line-height: 18px;
    }
    .bank_draf{
      margin: 0;
      padding: 0;
      list-style-type: none; 
    }
   .bank_draf .draf {
    margin-right: 30px;
    display: inline-block; 
  }
  .watermark{ 
  position: relative;
  top: 54%;
  left: 25%;
  z-index: -55555555;
  transform: rotate(-20deg); 
  }
  .watermark h1{ 
    text-transform: uppercase;
    font-size: 150px;
    font-weight: bold;
    color: #fff;
    text-shadow: 0px 0px 0px rgba(0,0,0,.5);
  } 
  </style>
</head>
<body>
  <header>
    <table style="width: 100%;">
      <tbody>
        <tr>
          <td style="text-align: center">
            <img src="{{ public_path().'/images/logo-2.jpg' }}" alt="logo" width="100">
          </td>
          <td style="text-align: center">
            <h2>kerajaan malaysia</h2>
            <h4 style="text-transform:capitalize">resit Rasmi</h4>
            <h2 style="text-transform: capitalize">Asal</h2>
          </td>
          <td>
            <ul style="list-style: none;font-size: 14px;line-height: 32px;">
              <li>({{ $asal->im }})</li>
              <li>No.Resit: &nbsp;{{ $asal->no_resit }}</li>
              <li>Tarikh: &nbsp;{{ \Carbon\Carbon::parse($asal->date)->format('d/m/Y/ ')}}</li>
              <li>Masa &nbsp;{{ substr($asal->created_at,10,20) }}</li>
            </ul>
          </td>
        </tr>
      </tbody>
    </table>
  </header>
  <main>
    <table style="width: 100%">
      <tbody>
        <tr>
          <td style="width: 450px">
              <ul class="main-side">
                <li class="side">Diterima daripada: &nbsp;&nbsp;&nbsp;<span style="text-transform: capitalize;">{{ $asal->daripada }}</span></li>
             
                <li class="side" style="padding-bottom: 15px;">No. Kad Pengenalan/No. Dartar Perniagaan: &nbsp;&nbsp; <span>{{ $asal->perniagaan }}</span></li>
                <li class="side">Nama Majikan : &nbsp; &nbsp;<span style="text-transform: capitalize;">{{ $asal->daripada }}</span> </li>
                
                <li class="side"> 
                  <table>
                    <tr>
                      <td style="width: 10px;">Alamat:</td>
                      <td style="width: 120px; float: left;"> {{ $asal->alamat }} </td>
                    </tr>
                  </table>
                </li>
                
                <li class="side">No. Rujukan: &nbsp; &nbsp; <span>{{ $asal->application_number }}</span></li>
              </ul>
          </td>
          <td>
            <img src="{{ public_path().'/images/body-logo.png' }}" alt="logo 2" width="120">
          </td>
        </tr>
      </tbody>
    </table>
  </main>
  <section>
    <table style="width: 100%;">
      <thead style="background: #ccc">
          <tr>
          <th>Bil.</th>
          <th>Kod IMM</th>
          <th>Keterangan</th>
          <th width="40">Kod OSOL/Amanah/ Deposit</th>
          <th>Kader(RM)</th>
          <th>Kuantiti</th>
          <th>Jumlah(RM)</th>
        </tr>
      </thead>
      <tbody> 
        @php 
         $i = 1;
        @endphp
        @foreach($asalBills as $data)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->cod_imm }}</td>
            <td>{{ $data->keterangan }}</td>
            <td>{{ $data->deposit }}</td>
            <td>******{{ $data->kadar }}</td>
            <td>{{ $data->kuantiti }}</td>
            <td>*****{{ $data->kadar * $data->kuantiti }}</td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr><td colspan="6" style="text-align: right;">Jumlah</td>
        <td>****{{ $sum }}</td>
      </tr></tfoot>
    </table>
  </section>
  <br>
  <br>
  <section>
    <table> 
      <tbody>
        <tr>
          <td width="250">
            <ul style="list-style-type: none; line-height: 22px; margin: 0; padding: 0;">
              <li>RINGGIT MALAYSIA: <span> {{ $asal->ringgit }}</span></li>
              <li>
                Notis Makluman: {{ $asal->notis_makluman }}<span></span>
              </li>
            </ul>
          </td>
          <td style="padding-left: 50px;">
            <table>
              <tr>
                <td> <p style="font-size: 14px">kaedah Bayaran: </p></td>
              </tr>
              <tr>
                <td width="50">{{ $asal->bayaran_name }}</td>
                <td width="100" style="text-align: center;"> {{ $asal->bayaran_number }}</td>
                <td width="50">{{ $sum }}</td> 
              </tr>
            </table> 
          </td> 
        </tr>  
      </tbody>
    </table>
  </section>
  <br><br> 
  <section>
    <table>
        <tbody style="line-height: 24px;">
          <tr>
            <td>
              <p>PTJ:  {{ $asal->ptj }}</p>
            </td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>
             {{ $asal->mashana_name }} &nbsp;&nbsp;&nbsp; <span>{{ $asal->mashana_no }}</span>
            </td>
            <td>
              <span>{{ \Carbon\Carbon::parse($asal->date)->format('d/m/Y/ ')}}</span>&nbsp; <span>{{ substr($asal->created_at,10,20) }}</span>&nbsp;&nbsp;&nbsp;
            </td>
            <td>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>{{ $asal->mashana_no }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $asal->n_name }}</span>&nbsp;&nbsp;&nbsp;
              <span>{{ $asal->n_number }}</span>
            </td>
          </tr>
          <tr>
            <td colspan="4">ini adalah cetakan komputer dan tandatagan tidak diperlukan</td>
          </tr>
          <tr>
            <td colspan="4">No. Kelulusan perbendharaan:<span>{{ $asal->kelulusan }}</span></td>
          </tr>
        </tbody>
    </table>
     <div class="watermark">
      <h1>Asal</h1>
    </div>
  </section>
</body></html>