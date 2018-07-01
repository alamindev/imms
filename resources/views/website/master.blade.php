
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    
<!-- Mirrored from eservices.imi.gov.my/myimms/PRAStatus?type=36&lang=en by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Mar 2018 14:26:53 GMT -->
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>.: MyIMMs - e-Services :.</title>
        <link rel="shortcut icon" href="{{ asset('websites') }}/images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="{{ asset('websites') }}/styles/jquery-tab-ui.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('websites') }}/styles/page.css" /> 
        <style type="text/css">
            .style1 {color: #0000FF}
            .labelM_3{padding-left:10px;background-color: #B3D9FF;font-size: 12px;line-height: 18px;width: 180px;border-bottom: 0px dotted #E0E0E0;}
        </style>  
  </head>

  <body onload="javascript:showClock();">
       @include('website.includes.header')
      <div id="boxmaster-b" >
          <div id="boxmain" >
              <div id="boxmenu">
                  <div id="box_menucontentPublic" >
                      <div id="box_menucontainerPublic">
                    <br>
                    <li><span id="menu" class="submenu">MyONLINE*Foreign Maids / Foreign Workers<br></span>
                    <ul>
                        <ol id="list" style="text-transform: uppercase">
                        <!-- List items will be added dynamically. -->
                        <li><span><a href="" class="active">Application Status Inquiry</a></span></li><li><span><a href="">Video Tutorial</a></span></li></ol>
                    </ul>
                    </li>
                      </div>
                  </div>
              </div>

              <div id="box_contentPublic">
                  <div id="msg" >

                      
                      
                  </div>
                  
        
<div class="form_container"> 
           <!--  <input type="hidden" name="txnDetail">
            <input type="hidden" name="SEARCH_IND" id="SEARCH_IND"  value=""/>

            <input type="hidden" name="APPL_NO" id="APPL_NO" />
            <input type="hidden" name="FIN_NO" id="FIN_NO" />
            <input type="hidden" name="VSTR_TYP" id="VSTR_TYP" value="M"/>
            <input type="hidden" name="CurrLang" id="CurrLang" value="en" /> -->

            <div id="progressWin" style="display: block; top: 0; left: 0; width: 100%; height: 100%; position: absolute;">
                <div id="progressBg" style=" background-image: url('styles/ui-lightness/{{ asset('websites') }}/images/ui-bg_diagonals-thick_20_666666_40x40.png'); opacity: 0.6; filter: alpha(opacity=60); background-repeat: repeat; top: 0; left: 0; width: 100%; height: 100%; position: absolute; z-index: 1;"></div>
                <div id="progressTxt" style="font-size: 15px; font-weight: bold; position: absolute; top: 40%; width: 100%; overflow: visible; z-index: 2;" align="center">
                    <table width="350px" align="center" bgcolor="grey" style="height: 80px; border-color: black; border-width: medium; border-style: solid; ">
                        <tr>
                            <td valign="middle" align="center">
                                <img src="{{ asset('websites') }}/images/loading.gif" border="0"/>
                                <BR>
                                Processing In Progress. Please Wait . . .
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div>
                <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
                    <tr>
                        <td colspan="5" class="rowheader">APPLICATION STATUS FOR FOREIGN MAIDS / FOREIGN WORKERS</td>
                    </tr>
                    <tr>
                        <td width="20%" >&nbsp;</td>
                        <td width="20%" >&nbsp;</td>
                        <td width="7%" >&nbsp;</td>
                        <td width="20%" >&nbsp;</td>
                        <td width="33%" >&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5" bgcolor="#FFFF00" >
                            <table border="0" style="font-weight: bold;">
                                <tr>
                                    <td width="9%" >&nbsp;</td>
                                    <td width="1%" >&nbsp;</td>
                                    <td width="60%" >&nbsp;</td>
                                </tr>
                                <tr valign="top">
                                    <td colspan="3">
                                        <span style="text-transform: uppercase;">Status :</span>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <td>APPLICATION RECEIVED</td><td>-</td><td>Application is received.</td>
                                </tr>
                                <tr valign="top">
                                    <td>NEW</td><td>-</td><td>Application has been received and are being processed by the Immigration Department of Malaysia. Please send the original copy of supporting documents if still not do so.</td>
                                </tr>
                                <tr valign="top">
                                    <td>APPROVE</td><td>-</td><td>Application has been approved by the Immigration Department of Malaysia and is ready for Payment and print Stickers. Please make the FOMEMA check up if  still not do so.</td>
                                </tr>
                                <tr valign="top">
                                    <td>REJECT</td><td>-</td><td>Application has been rejected by the Immigration Department of Malaysia.</td>
                                </tr>
                                <tr>
                                    <td>CANCEL</td><td>-</td><td>Application has been canceled by the Immigration Department of Malaysia.</td>
                                </tr>
                                <tr valign="top">
                                    <td>PAY</td><td>-</td><td>Application has been paid and ready to print Stickers.</td>
                                </tr>
                                <tr valign="top">
                                    <td>PRINT</td><td>-</td><td>Stickers have been printed and ready to be collected.</td>
                                </tr>
                                <tr valign="top">
                                    <td>POSTPONE</td><td>-</td><td>Application has been postponed by the Immigration Department of Malaysia.</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                <form method="post" action="{{ route('search') }}" id="PRAStatus" class="submit-data">
                     {{ csrf_field() }}
                    <input type="hidden" name="MAD_ROC_NO" id="MAD_ROC_NO" value=""/>
                    <td class="labelM_3">Employer Identification Card No.</td>
                    <td><input name="employee_identy" type="text" id="MAD_ROC_NO1" value="" size="35" maxlength="20" style="text-transform: uppercase"><BR>( Format Example : 999999-99-9999 )</td>
                    <td align="center"><B>OR</B></td>
                    <td class="labelM_3">Company Registration No.</td>
                    <td><input name="company_reg_no" type="text" id="MAD_ROC_NO2" value="" size="35" maxlength="20" style="text-transform: uppercase"></td>
                    </tr>
                    <tr>
                        <td class="labelM_3">Application Number</td>
                        <td colspan="3">
                            <input name="application_number" type="text" id="MAD_APPL_NO" value="" size="51" maxlength="45" style="text-transform: uppercase" class="required"/>
                            <div id="VIEW_IMG" style="position: absolute; cursor: hand;"><img src="{{ asset('websites') }}/images/search_icon.png" border="0" alt="View Sample">View Sample</div>
                        </td>
                        <td ><input name="agencyIndicator" type="hidden" id="agencyIndicator" value="1"/></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    
                        <tr>
                            <td colspan="5">
                                <input type="submit" name="searchStatusPRA" id="searchStatusPRA" value="Search"  onclick="return fnSearchRocNo();" style="width: 100px;" />
                                 <a href="{{ route('home') }}" class="button" style="width: 100px;
                                    background: #e7e7e7;
                                    padding: 2px 29px;
                                    border: 1px solid #a4a4a4;
                                    color: #000;
                                    font-weight: bold;
                                    font-size: 12px;">reset</a>
                            </td>
                        </tr>
                    </form>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div>
                <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
                    <thead>
                        <tr class="subheader">
                        <td width="5%">No</td>
                        <td width="20%">Application Number</td>
                        <td width="11%">Company Registration No.</td>
                        <td width="25%">Employee Name</td>
                        <td width="15%">Document Number</td>
                        <td width="14%">Status</td> 
                    </tr> 
                    </thead>
                    <tbody>
                        @if(isset($details)) 
                        @php 
                         $i = 1;
                         @endphp
                           @foreach($details as $data)
                            <tr class="grida">
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->application_number }}</td> 
                                <td>{{ $data->company_reg_no }}</td>
                                <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                <td>{{ $data->doc_number }}</td>
                                <td>Pay</td>
                            </tr>
                           @endforeach 
                           <td colspan="6" height="20px"> {{ $details->render() }} </td> 
                        @elseif(isset($message))
                            <tr class="grida">
                                <td colspan="6" style="text-align: center; color:red; font-size: 16px;">{{ $message }}</td>
                            </tr>

                        @endif  
                        <tr class="grida">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>  
                </table>
            </div>
         
</div>


    
              </div>
          </div>
      </div>
      <script type="text/javascript" src="{{ asset('websites') }}/js/jQuery-2.2.0.min.js" ></script>
      <script type="text/javascript" src="{{ asset('websites') }}/js/jquery.js" ></script>
        
        <script type="text/javascript" src="{{ asset('websites') }}/js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/jquery-plugin-validate.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/validation.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/BaseCommon.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/BaseSession.js" ></script>        
        <script type="text/javascript" src="{{ asset('websites') }}/js/audittrail.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/datetimepicker.js"></script>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="{{ asset('websites') }}/js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/jquery-plugin-validate.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/audittrail.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/progressScreen.js"></script>
        <script type="text/javascript" src="{{ asset('websites') }}/js/custom.js"></script>
        <script type="text/javascript">
         
        </script>
    </BODY>

<!-- Mirrored from eservices.imi.gov.my/myimms/PRAStatus?type=36&lang=en by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Mar 2018 14:27:02 GMT -->
</HTML>

