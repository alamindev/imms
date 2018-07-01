         if(typeof window.event != undefined)
                document.onkeydown = function()
            {
                var t = event.srcElement.type;
                var kc = event.keyCode;
                var ro = event.srcElement.readOnly;
                if (( t == undefined && (kc == 8 || kc == 13)) || (t == 'text' && kc == 8 && ro) || (t == 'text' && kc == 13) || (t == 'textarea' && ro) || (kc == 8 && (t == 'submit' || t == 'select-one')) )
                    return false;
            }
            //validation carian
            function fnSearchRocNo()
            {
                $("form").unbind("submit");
                var valid = true;

                $(".required").each(function() {
                    $(this).removeClass("errFld");
                });
                
                var applno  = $("#MAD_APPL_NO").val();
                var rocno   = $("#MAD_ROC_NO").val();

            
                
                        if (applno == '' && rocno == ''){

                            $("#MAD_APPL_NO").addClass("errFld");
                            $("#MAD_ROC_NO1").addClass("errFld");
                            $("#MAD_ROC_NO2").addClass("errFld");

                            valid = false;
                        }
            
    
                        if( !valid )
                        {
                            alert("Please insert the required field.");
                        }
                        else {
                            $("#SEARCH_IND").val('NEW');
                        }

                        return valid;
                    }
            
                    function fnSearchAgency()
                    {
                        $("form").unbind("submit");
                        var valid = true;

                        $(".required").each(function() {
                            $(this).removeClass("errFld");
                        });
                
                        var agency  = $("#MAD_GOV_AGCY_CD").val();
                
                        if (agency == ''){

                            $("#MAD_GOV_AGCY_CD").addClass("errFld");

                            valid = false;
                        }
    
                        if( !valid )
                        {
                            alert("Please insert the required field.");
                        }

                        return valid;
                    }
            
                    $(window).load(function ()
                    {
            

                        if ( Number(($('#currentPgNo').val())) == Number(1)  ){
                            $('#next').attr('disabled',true);
                            $('#last').attr('disabled',true);
                        }
                        if ( Number(1) == 1 ){
                            $('#go').attr('disabled',true);
                        }
                        if ( Number(($('#currentPgNo').val())) == 1  ){
                            $('#prev').attr('disabled',true);
                            $('#first').attr('disabled',true);
                        }
                    });

                    function fnPaymentDet( applNo, finNo ){

                        var vConfirmMsg = "You can make payments at the Counter or Online. Confirm to make payments through Online.";

                        var dialogH = 170;
                        var dialogW = 500;
                        //Get the window height and width
                        var winH = ($(window).height()/2)+(dialogH/2);
                        var winW = ($(window).width()/2)-(dialogW/2);

                        var wPymt = window.showModalDialog("/myimms/confirmWin", vConfirmMsg ,"resizable: yes; dialogHeight: "+dialogH+"px; dialogWidth: "+dialogW+"px; dialogTop: "+winH+"px; dialogLeft: "+winW+"px; " );

                        if( wPymt == "Confirm"){
            
                                $("#APPL_NO").val(applNo);
                                $("#FIN_NO").val(finNo);

                                return true;
                            }
                            else{
                                return false;
                            }
                        }

                        function fnPaymentRePrint( applNo, finNo ){

                            var vPymtDet = "MAD_APPL_NO="+applNo+"&MAD_FIN_NO="+finNo+"&RE_PRINT=Y";
                            var wPrint   = window.showModalDialog("/myimms/PRAStatus/praPaymentPrint?"+vPymtDet, "" ,"resizable: yes; dialogHeight: 500px; dialogWidth: 1100px; ");
                        }

            

                function gotoPageNo( type ) {
                    $("form").unbind("submit");

                    var result = fnSearchRocNo();

                    if( result ){

                        var vCurrentPgNo = $('#currentPgNo').val().trim();
                        if ( vCurrentPgNo == '' || Number(vCurrentPgNo) == '0' )
                            $('#currentPgNo').val('1');

                        if( type == 'first'){
                            document.getElementById("currentPgNo").value = '1';
                        }
                        else if( type == 'prev'){
                            var vACT_PAGE = Number(1) - 1;
                            if( '1' == '1' ){
                                vACT_PAGE = '1';
                            }
                            document.getElementById("currentPgNo").value = vACT_PAGE;
                        }
                        else if( type == 'go'){
                            if ( Number(($('#currentPgNo').val())) > Number(1)  ){
                                alert("Maximum page value is"+" "+1);
                                return false;
                            }
                        }
                        else if( type == 'next'){
                            var vACT_PAGE = Number(1) + 1;
                            if( Number(vACT_PAGE) > Number(1) ){
                                vACT_PAGE = '1';
                            }
                            document.getElementById("currentPgNo").value = vACT_PAGE;
                        }
                        else if( type == 'last'){
                            document.getElementById("currentPgNo").value = '1';
                        }

                        $("#SEARCH_IND").val('OLD');

            
                                document.forms[0].txnDetail.value = gen_varpart();
                            }
                            return result;
                        }

                        $(function(){

                            $("#MAD_ROC_NO1")
                            .bind('keyup',function(event) {
                                $("#MAD_ROC_NO2").val('');
                                $("#MAD_ROC_NO2").removeClass("errFld");

                                var eTyp = event.srcElement.type;
                                var eKey = event.keyCode;

                                if( eTyp == 'text' && eKey != 8  ){
                                    validatePhoneNo(this,$('#MAD_ROC_NO1').val());
                          
                                    if( $("#MAD_ROC_NO1").val().length == 6 ){
                                        $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val() + '-');
                                    }
                          
                                    if( $("#MAD_ROC_NO1").val().length == 9 && $("#MAD_ROC_NO1").val().charAt(6) == '-' ){
                                        $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val() + '-');
                                    }
                          
                                }
                                else{
                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().replace("-", "") );
                                }

                                if( $("#MAD_ROC_NO1").val().length > 6 && $("#MAD_ROC_NO1").val().charAt(6) != '-' ){
                                    var part2 = $("#MAD_ROC_NO1").val().substr(6, $("#MAD_ROC_NO1").val().length);
                                    if( part2.indexOf("-") > -1 ){
                                        part2 = part2.replace("-", "");
                                    }

                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().substr(0, 6) + '-' + part2 );
                                }

                                if( $("#MAD_ROC_NO1").val().length > 9 && $("#MAD_ROC_NO1").val().charAt(9) != '-' ){
                                    var part2 = $("#MAD_ROC_NO1").val().substr(9, $("#MAD_ROC_NO1").val().length);
                                    if( part2.indexOf("-") > -1 ){
                                        part2 = part2.replace("-", "");
                                    }
                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().substr(0, 9) + '-' + part2 );
                                }

                                if( $("#MAD_ROC_NO1").val().length > 14){
                                    $("#MAD_ROC_NO1").val( $("#MAD_ROC_NO1").val().substr(0, 14) );
                                }

                                $("#MAD_ROC_NO").val($("#MAD_ROC_NO1").val());
                            });

                            $("#MAD_ROC_NO2")
                            .bind('blur',function(event) {
                                $("#MAD_ROC_NO").val($("#MAD_ROC_NO2").val());
                               
                            });


                            $("#VIEW_IMG")
                            .bind('click',function(event) {
                                window.showModalDialog("images/visapass/AP_SampleApplNo.jpg", "" ,"resizable: yes; dialogHeight: 450px; dialogWidth: 1100px;");
                            });

                            $('#currentPgNo')
                            .bind('keyup',function(event) {
                                validateNumber(this,$('#currentPgNo').val());
                            });

                        });

  if(typeof window.event != undefined)
                document.onkeydown = function()
            {
                var t = event.srcElement.type;
                var kc = event.keyCode;
                var ro = event.srcElement.readOnly;
                if ( ( t == undefined && (kc == 8 || kc == 13)) || (t == 'text' && kc == 8 && ro) || (t == 'text' && kc == 13) || (kc == 8 && (t == 'submit' || t == 'select-one' || t == 'button')) )
                    return false;
            }
            
            $(document).ready(function()
            {
                $.ajax({
                    type: "GET",
                    url: "/myimms/menu_xml.xml",
                    dataType: "xml",
                    success: function(xml) { parseXml(xml); }
                });
            });

            function parseXml(xml)
            {
                var type = '36';
                var _lang = 'en';
                var jList = $("#list");
                var c_lang = '';
                var module = 'pra';
                var subModule = '';

                //alert('type:'+type+">> lang:"+_lang +">> module:"+module);
                if (_lang == ""){
                    _lang = c_lang;
                }

                var urlPath = $(location).attr('pathname');
                var urlBind = urlPath.substring(urlPath.lastIndexOf("https://eservices.imi.gov.my/")+1,urlPath.length);
                
                $(xml).find("Business").each(function()
                {
                    if (type == $(this).attr("name")) {

                        $(xml).find("Module").each(function()
                        {
                            var moduleType = $(this).attr("type");
                            //alert('type : '+type);

                            if (module == moduleType){
                                if (_lang == "ms")
                                    $("#menu").append($(this).find("Title_ms").text() + "<br />");
                                else
                                    $("#menu").append($(this).find("Title_en").text() + "<br />");

                                $(this).find("SubMenus").each(function()
                                {
                                    var arr;
                                    if (_lang == "ms")
                                        arr = $(this).find("menu_ms").text();
                                    else
                                        arr = $(this).find("menu_en").text();

                                    var arrPath = $(this).find("url").text();
                                    var parameter = $(this).find("parameter").text();

                                    var vCls = "";
                                    if( arrPath == urlBind || arrPath == subModule ){
                                        vCls = " class=active ";
                                    }

                                    if (parameter != "")
                                        arrPath += "?type=" + type + "&lang=" + 'en' + "&" + parameter;
                                    else
                                        arrPath += "?type=" + type + "&lang=" + 'en';

                                    jList.append(
                                    $( "<li><span ><a href = " + arrPath + vCls + ">" + arr + "</a></span></li>" )

                                );
                                    
                                         
                                });
                                if ((type =='26' || type == '46') && module != "passport")
                                    {
                                        var link = "http://app.imi.gov.my/feedback/index.php?lang=1";
                                        var target ="_blank";
                                        var lang = "", vLang = "";
                                        
                                        if('true'){
                                            lang = "Question/Suggestion/Complaint";
                                            vLang = "1";
                                        }else{
                                            lang = "Pertanyaan/Aduan/Cadangan";
                                            vLang = "2";
                                        }
                                        jList.append(
                                        $( "<li><span ><a href ="+link+vLang+" target="+target+">"+ lang +"</a></span></li>" )

                                    );
                                    }

                            }
                        });

                    }
                });
            }

            function showClock()
            {
                var clock=new Date();
                var hours=clock.getHours();
                var minutes=clock.getMinutes();
                var seconds=clock.getSeconds();
                // for a nice disply we'll add a zero before the numbers between 0 and 9
                if (hours<10){
                    hours="0" + hours;
                }
                if (minutes<10){
                    minutes="0" + minutes;
                }
                if (seconds<10){
                    seconds="0" + seconds;
                }
                document.getElementById('showText').value=hours+":"+minutes+":"+seconds;
                t=setTimeout('showClock()',500);
            /* setTimeout() JavaScript method is used to call showClock() every 1000 milliseconds (that means exactly 1 second) */
            }
             document.onclick=function() {         
                document.getElementById("popFrame").style.visibility="hidden";
            }