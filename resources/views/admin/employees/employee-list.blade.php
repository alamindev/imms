<html>
<head>
  <style> 
  .d-block{display: block;}
    p{font-size: 12px; margin-bottom: 0px; padding-bottom: 0px}
    @page { margin: 100px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; height: auto; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    .text-1{padding-left: 30px}
    .page { page-break-after: always; position: relative; top: 220px; left: 40px; }
    .page1 { page-break-after: always; position: relative; top: 250px; }
    .page ul li{  font-size: 14px; position: relative; left: -40px; }
    .page1:last-child { page-break-after: never; }
   .header-1 ul{
    list-style-type: none;
   }
   .header-1 ul li{
    display: inline-block; 
   } 
   .header-1 ul li ul li{
    display: block;
    font-size: 14px;
   }
   table tr td{ 
      font-size: 12px;
    }
    .table{
         border-collapse: collapse;
         width: 100%;
     }
     .table > .tr > .td {
         border: 1px solid #ccc;
         padding: 15px;
         text-align: left;
        }
        .td{
          padding: 5px;
        }
        .body-logo{
          position: relative;
        }
        .body-logo img{
          position: absolute;
          top: -400px;
          right: 300px;

        }
  </style>
</head>
<body>
  <header>
   <div class="header-1">
    <ul style="position: relative;">
      <li style="width:100px; padding-bottom:0px">
        <img src="{{ public_path().'/images/logo-2.jpg' }}" width="120">
      </li> 
      <li style="width: 280px;">
        <ul>
        <li>JABATAN IMIGRESEN MALAYSIA</li>
        <li>NEGERI SELANGOR</li>
        <li>TINGKAT 2, KOMPLEKS PKNS</li>
        <li>40550 SHAH ALAM</li>
        <li>SELEANGOR DARUL EHSAN</li>
      </ul>
      </li> 
      <li style="float:right; padding-right: 50px; position: absolute; top: -15px;" >
         <img src="{{ public_path().'/images/logo-1.png' }}" width="75">
      </li>
    </ul>   
   </div>
   <div class="other-info" style=" position: relative; top: -60px; padding-left: 350px; border-bottom: 1px solid #ccc;">
    <ul style="list-style-type: none;">
      <li>
        <table> 
          <tbody>
            <tr>
              <td>Tel</td>
              <td>:</td>
              <td style="width: 300px; padding-top: 7px;">603-5519 0653/7593/7185/7454/2123 (1MOCC)</td> 
            </tr> 
            <tr>
              <td>Faks</td>
              <td>:</td>
              <td>603-5519 0414</td> 
            </tr>  
            <tr>
              <td style="width: 80px">Laman Web</td>
              <td>:</td>
              <td>http://www.imi.gov.my</td> 
            </tr> 
          </tbody>
        </table>
      </li> 
    </ul>
   </div>  
   <div style="float:right; position: relative; top: -50;">
    <div class="application-num">
      <p style="text-transform: uppercase;">{{ $employee->application_number }}</p>
    </div>
    <div class="barcode" style="position: relative; top: 5px">
      @php
        $dt = new DateTime(); 
    @endphp
    <p style="color: black; padding-left: 15px;">Date: {{ $dt->format('Y-m-d') }}</p> 
        {!! DNS1D::getBarcodeHTML($employee->application_number, "C128",1,50) !!}
        <span><small style="padding-left: 60px; letter-spacing: -2px; font-size: 12px">{{ $employee->application_number }}</small></span>
    </div>
   </div>
  </header>
  <footer>footer on each page</footer>
  <main>
    <div class="page">
      <ul style="list-style-type: none; margin-bottom: 0px !important; padding-bottom: 0px !important;">
        <li style="text-transform: uppercase;">EVERSENDAI CONSTRUCTIONS (M) SDN. BHD. (1014994-T)</li>
        <li style="text-transform: uppercase;">LOT 19956, JALAN INDUSTRI 3/6,</li>
        <li style="text-transform: uppercase;">RAWANG INTERGRATED INDUSTRIAL PARK,</li>
        <li style="text-transform: uppercase;">RAWANG,</li>
        <li style="text-transform: uppercase;">48000, PETALING JAYA</li>
        <li style="text-transform: uppercase;">SELANGOR</li>
      </ul>
      <p>Tuan,</p>
      <h5 style="text-decoration: underline; font-weight: bold; font-size: 16px;">PERMOHONAN VISA DENGAN RUJUKAN</h5>
      <p style="text-justify: center; font-size: 12px; padding-right: 80px;">Dengan hormatnya pohon perhatian tuan kepada perkara di atas. Adalah dimaklumkan bahawa permohonan membawa masuk seramai <b>{{ $employee->seramay }}</b> orang pekerja asing warganegara <b>{{ $employee->country }}</b> telah diluluskan melalui surat <b>{{ $employee->surat }}</b> bertarikh <b>{{ \Carbon\Carbon::parse($employee->issue_date)->format('d/m/Y') }}</b></p>
      <ol start="2" class="order">
        <li style="font-size: 14px; padding-bottom: 5px; padding-right: 80px;">
          Pihak tuan dibenarkan membawa masuk sejumlah <b>{{ $employee->sejumlah }}</b> orang pekerja asing warganegara <b>{{ $employee->country }}</b> seperti senarai di bawah. Sehubungan dengan itu, pihak tuan dikehendaki mematuhi syarat-syarat berikut: 
           <span style="display:block; font-size: 12px; padding-right:80px; padding-bottom: 4px; padding-top: 7px;">2.1 pekerja asing dibenarkan memasuki Malaysia setelah mendapat visa dari pejabat perwakilan Malaysia di luar negara, serta pas khas yang dikeluarkan di mana-mana darat, atau udara yang diwartakan. </span>  
           <span  style="display:block; font-size: 12px; padding-right:80px; padding-bottom: 4px">2.2 &nbsp;  Majaikan hendaklah menunggu di pintu masuk untuk menuntut pekerja asing yang diluluskan semasa pekerja asign tersebut tiba di negara ini. Urusan pengambilan pekerja asing hendaklah dibuat dalam tempoh <b>{{ $employee->tempoh }}</b> sekiranya dihantar manakala majikan akan disenarai hitam dan pekerja asing gantian sama sekali tidak dibenarkan.</span> 
           <span  style="display:block; font-size: 12px; padding-right:80px; padding-bottom: 4px">2.3 &nbsp;  Pemeriksaan kesihatan hendaklah dibuat di negara asal dan juga di klinik-klinik yang berdaftar dengan FOMEMa di negara ini selewat-lewatnya 3 hari selepas ketibaan. Hanya pekerja asing yang disahkan sihat oleh FOMEMA sahaja sebenarkan bekerja manakala pekerja asing yang disahkan tidak sihat hendaklab Gihantar pntang dengan segera ke negara asal menggunakan Memo periksa Keluar.</span>
           <span  style="display:block; font-size: 12px; padding-right:80px; padding-bottom: 4px">2.4 &nbsp;  Majikan dikehendaki menguruskan endosmen PL(KS) di pejabar Imigresn yang mengeluarkan surat VDR ini dalam tempoh 30 hari dari tarikh katibaan </span> 
           <span  style="display:block; font-size: 12px; padding-right:80px; padding-bottom: 4px">2.5 &nbsp; Majikan hendaklah hadir sendiri di Jabatan Imigresen untuk semua srusan berkaitan dengan pekerja asing yang telah diluluskan.</span>
           <span  style="display:block; font-size: 12px; padding-right:80px; padding-bottom: 4px">2.6 &nbsp; Majikan hendaklah membuat permohonan untuk Memo Periksa Kelual sekiranya pekerja asing ingin kembali ke negara asal dan tidak lagi mahu meneruskan perkhidmatannya Jika gagal, pekerja asing ersebut dianggap melarikan diri dari majikan dan wang cagaran akan disita</span>
        </li>
        <li style="font-size: 12px; padding-right: 80px;">Surat kelulusan VDR ini sah selama 4 bulan dari tarikh ia deikeluarkan.</li>
      </ol>
    </div>
    <div class="page1">
    <table border="1" class="table"> 
            <tr class="tr">
                <th>Bill</th>
                <th>Nama</th>
                <th>Jawatan</th>
                <th>Warganegara</th>
                <th>Dokumen Perjalanan</th>
            </tr> 
            @php
                $i = 1;
            @endphp
           @foreach($employees as $data)
            <tr class="tr">
                <td class="td">{{ $i++ }}</td>
                <td class="td">{{ $data->first_name.' '. $data->last_name }}</td>
                <td class="td">{{ $data->jawatan }}</td>
                <td class="td">{{ $data->country }}</td>
                <td class="td">{{ $data->doc_number }}</td>
            </tr> 
            @endforeach 
    </table>
      <div class="text-1">
        <p style="padding-right: 120px;">kami amat menghargai kerjasama tuan dalam memtuhi semua syarat yang ditetapkan. terima kasih kerana menggunakan perkhidmatan di Jabatan Imigresen Malaysia.</p>
        <p class="d-block" style="padding-bottom: 10px;">Sekian, terima kasih</p>
        <span class="d-block" style="text-transform: uppercase; font-size: 12px">"BErkhidmat untuk negara"</span>
        <span class="d-block" style="text-transform: uppercase; font-size: 12px;">"integriti profesional mesara"</span>
        <p>Saya yang menurut perintah,</p>
        <p>pengarah imigresen negeri melaka</p>
        <p style="padding-left: 15px">s.k:</p>
        <table style="padding-left: 20px"> 
          <tbody>
            <tr>
              <td width="7" >1.</td>
              <td>
              <p style="font-size: 12px;  text-transform: uppercase;">jabatan imigresen negeri melaka<br> jabatan imigrasen negeri melaka<br> aras 1-3, blok pentandbiran<br> kompleks kdn, jalan seri negeri<br> ayer keroh, 75300</p>
              </td>
              <td width="7" >2.</td>
              <td>
                 <p style="font-size: 12px;  text-transform: uppercase;">wisma putra<br> ketua setiausaha<br> kementerian luar bahagian konsular<br> no 1, wisma putra presint 2 62602 putrajaya</p>
              </td>
            </tr>
            <tr>
              <td width="7" >3.</td>
              <td><p style="font-size: 12px;  text-transform: uppercase;"> Dhaka <br> House no. 19 road no. 6 <br> barithara, dhaka 1212 <br> The people's republic of bangladesh</p></td>
              <td width="7" >4.</td>
              <td><p style="font-size: 12px;  text-transform: uppercase;"> pejabat imigresen - klia<br> pejabat imigresen <br> lta kuala lumpur (klia) sepang</p></td>
            </tr>
            <tr>
              <td >5.</td>
            </tr>
            <tr> 
              <td></td>
              <td colspan="4">
               <p style="padding-right: 120px; text-transform: uppercase; font-size: 12px;"> - mohon kerjasama pihak pejabat prwakilan untuk memberi kemudahan visa seperti kelulusan yang terdapat dalam sistem komputer jabatan.</p>
              </td> 
           <tr>
              <td colspan="4">No. Rujukan: {{ $employee->surat }} &nbsp;&nbsp;&nbsp;jumlah :  {{ $employee->sejumlah }}</td> 
            </tr>
              <td colspan="4" style="text-align: center;">
                <b>(Perhatian: Ini adalah cetakan berkomputer. Tanda tangan tidak diperlukan)</b>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="body-logo">
          <img src="{{ public_path().'/images/body-logo.png' }}" />
        </div>
      </div>
    </div>
  </main>
</body>
</html>