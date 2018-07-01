
function isValidInt(s){

	return !(isNaN(parseInt(s)) || isNaN(Number(s))); 

}





function isValidIntVal(s,val){

	if (isValidInt(s))

		return parseInt(s) > val;

}





function isValidIntValue(s, lVal, uVal){

	if (isValidInt(s))

		return !(parseInt(s) < lVal || parseInt(s) > uVal); 

}





function isNonNegInt(s){

	return (isValidInt(s) && Number(s) >= 0)

}



function isPositiveInt(s){

	return (isValidInt(s) && Number(s) > 0)

}





function isPositiveIntValue(s, lVal, uVal){

	if (isNonNegInt(s))

		return !(parseInt(s) < lVal || parseInt(s) > uVal);

}





function isPositive1Gt2(val1, val2){

	if (isNonNegInt(val1) && isNonNegInt(val2))

		return !(parseInt(val1) >  parseInt(val2));

}





function isPositive2Gt1(val1, val2){

	if (isNonNegInt(val1) && isNonNegInt(val2))

		return (parseInt(val2) >  parseInt(val1));

}





function isPositiveIntValue1(s, lVal, uVal){

	var flag = true;

	if(isNonEmptyTrimmed(s)){

		if (isNonNegInt(s))

			flag = !(parseInt(s) < lVal || parseInt(s) > uVal);

		else

			flag = false;

	}

	return flag;

}





function isValidFloat(s){

	return !(isNaN(parseFloat(s)) || isNaN(Number(s)));

}





function isNonNegFloat(s){

	return (isValidFloat(s) && Number(s) >= 0);

}





function isPositiveFloat(s){

	return (isValidFloat(s) && Number(s) > 0);

}







function trim(s){

	return s.replace(/^\s*/, "").replace(/\s*$/, "");

}





function trim(s) {

	while (s.substring(0,1) == ' ') {

		s = s.substring(1,s.length);

	}

	while (s.substring(s.length-1,s.length) == ' ') {

		s = s.substring(0,s.length-1);

	}

	return s;

}





function Trim(s) {

	// Remove leading spaces and carriage returns

	while ((s.substring(0,1) == ' ') || (s.substring(0,1) == '\n') || (s.substring(0,1) == '\r')){

		s = s.substring(1,s.length);

	}



	// Remove trailing spaces and carriage returns

	while ((s.substring(s.length-1,s.length) == ' ') || (s.substring(s.length-1,s.length) == '\n') || (s.substring(s.length-1,s.length) == '\r')){

		s = s.substring(0,s.length-1);

	}

	return s;

}







function isNonEmpty(s){

	return (s.length > 0);

}



function isNonEmptyTrimmed(s){

	return isNonEmpty(trim(s));

}





function isEmailAddr(email){

	var result = false;

	var theStr = new String(email)

	var index = theStr.indexOf("@");

	if (index > 0){

		var pindex = theStr.indexOf(".",index);

		if ((pindex > index+1) && (theStr.length > pindex+1))

			result = true;

	}

	return result;

}



	

function isSingleQuote(val){

	var index = val.indexOf("'");

	if (index > 0)

		return false;

	else

		return true;

}





function isSelected(elem, val){

	var result = false;

	if(elem.options[elem.selectedIndex].value == val)

		result = false;

	else

		result = true;

	return result;

}





function validate(elem, func, message, focus){

	if (!func(elem.value)) {

		window.alert(message);

		if (focus)

			elem.focus();

		return false;

	}

	else

		return true;

}





function validate1(elem, elem1, func, message, focus){

	if (!func(elem.value, elem1.value))  {

		window.alert(message);

		if (focus)

			elem1.focus();

		return false;

	}

	else

		return true;

}





function validate2(elem, p1, p2, func, message, focus){

	if (!func(elem.value, p1, p2)) {

		window.alert(message);

		if (focus)

			elem.focus();

		return false;

	}

	else

		return true;

}





function validate3(elem1, elem2, func, message, focus){

	if (!func(elem1.value, elem2.value)) {

		window.alert(message);

		if (focus)

			elem1.focus();

		return false;

	}

	else

		return true;

}





function validate4(elem1, elem2, func, message, focus){

	if (!func(elem1, elem2)) {

		window.alert(message);

		if (focus)

			elem1.focus();

		return false;

	}

	else

		return true;

}





function validate5(elem, p1, func, message, focus){

	if (!func(elem.value, p1)) {

		window.alert(message);

		if (focus)

			elem.focus();

		return false;

	}

	else

		return true;

}





function validate6(elem, func, message, focus){

	if (!func(elem)) {

		window.alert(message);

		if (focus)

			elem.focus();

		return false;

	}

	else

		return true;

}





function validate7(elem, func, message, focus){

	var theStr = new String(elem.value);  

	if (theStr.length > 0) {

		if (!func(elem.value)) {

			window.alert(message);

			if (focus)

				elem.focus();

			return false;

		}

		else

			return true;

	}

	else

		return true; 	    

}





function isValidate(elem, val, func, message, focus){

	if (!func(elem, val)) {

		window.alert(message);

		if (focus)

			elem.focus();

	return false;

	}

	else

		return true;

}





function isDate2Gt1(s1, s2){

	var flag = false;

	var s11 = parseMDY(s1);

	var s22 = parseMDY(s2);

	var d1 = new Date(s11);

	var d2 = new Date(s22);

	flag = d1 < d2;

	return flag;

}





function isDate2GtEq1(s1, s2){

	var flag = false;

	var s11 = parseMDY(s1);

	var s22 = parseMDY(s2);  

	var d1 = new Date(s11);

	var d2 = new Date(s22);

	flag = d1 <= d2;

	return flag;

}





function isDate2Lt1(s1, s2){

	var flag = false;

	var s11 = parseMDY(s1);

	var s22 = parseMDY(s2);  

	var d1 = new Date(s11);

	var d2 = new Date(s22);

	flag = d1 > d2;

	return flag;

}





function parseMDY(s1){

	//var d1 = s1.substring(0,2);

	//var m1 = s1.substring(3,5);

	//var y1 = s1.substring(6,10);

	//var mdy = m1 + "/" + d1 + "/" + y1;

	//return mdy;

	

	var d1 = s1.substring(0,s1.indexOf('https://eservices.imi.gov.my/'));

	var v1 = s1.substring(s1.indexOf('https://eservices.imi.gov.my/')+1,s1.length);

	var m1 = v1.substring(0,v1.indexOf('https://eservices.imi.gov.my/'));

	v1 = v1.substring(v1.indexOf('https://eservices.imi.gov.my/')+1,v1.length);

	var y1 = v1;

	var mdy = m1 + "/" + d1 + "/" + y1;

	return mdy;

}





function isDate2NNGt1(s1, s2){

	var flag = false;

	flag = !isNonEmptyTrimmed(s2);

	if( !flag ){

		var d1 = new Date(s1);

		var d2 = new Date(s2);

		flag = d1 < d2;

	}

	return flag;

}







function disableOthers(frm){

	if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==1){

		frm.txtDate.disabled=false;

		frm.txtWeek.disabled=true;

		frm.drpMonth.disabled=true;

		frm.drpYear.disabled=true;

	}

	else if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==2){

		frm.txtDate.disabled=true;

		frm.txtWeek.disabled=false;

		frm.drpMonth.disabled=true;

		frm.drpYear.disabled=true;

	}else if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==3){

		frm.txtDate.disabled=true;

		frm.txtWeek.disabled=true;

		frm.drpMonth.disabled=false;

		frm.drpYear.disabled=false;

	}else if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==4){

		frm.txtDate.disabled=true;

		frm.txtWeek.disabled=true;

		frm.drpMonth.disabled=true;

		frm.drpYear.disabled=false;

	}else{

		frm.txtDate.disabled=true;

		frm.txtWeek.disabled=true;

		frm.drpMonth.disabled=true;

		frm.drpYear.disabled=true;

	}

}





function checkCal(frm, val){

	if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==1 && val == 1){

		newCalenderWindow(frm.txtDate,'Date')

	}

	else if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==2  && val == 2){

		newCalenderWindow(frm.txtWeek,'Date')

	}

}





function purgeData(elem,number,message,blnfocus,check){

	if (check=="min"){

		if(parseInt(elem.value)<number){

			alert(message+' '+number);

			if(blnfocus){

				elem.focus()

				return false

			}

		}

		return true

	}else{

		if(parseInt(elem.value)>number){

			alert(message+' '+number);

			if(blnfocus){

				elem.focus()

				return false

			}

		}

		return true

	}

}







function isValidHour(s){

	var flag = false;

	if(parseInt(s)<=23){

		flag=true

	}

	return flag;

}





function disableOthersBbbr(frm){

	if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==1){

		frm.txtDate.disabled=false;

		frm.txtWeek.disabled=true;

		frm.txtStartDate.disabled=false;

		frm.txtEndDate.disabled=false;

		frm.drpMonth.disabled=true;

		frm.drpYear.disabled=true;

		frm.txtStartTime.disabled=false;

		frm.txtEndTime.disabled=false;

	}else if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==2){

		frm.txtDate.disabled=true;

		frm.txtWeek.disabled=false;

		frm.txtStartDate.disabled=false;

		frm.txtEndDate.disabled=false;

		frm.drpMonth.disabled=true;

		frm.drpYear.disabled=true;

		frm.txtStartTime.disabled=true;

		frm.txtEndTime.disabled=true;

	}else if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==3){

		frm.txtDate.disabled=true;

		frm.txtWeek.disabled=true;

		frm.txtStartDate.disabled=false;

		frm.txtEndDate.disabled=false;

		frm.drpMonth.disabled=false;

		frm.drpYear.disabled=false;

		frm.txtStartTime.disabled=true;

		frm.txtEndTime.disabled=true;

	}else if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value==4){

		frm.txtDate.disabled=true;

		frm.txtWeek.disabled=true;

		frm.txtStartDate.disabled=false;

		frm.txtEndDate.disabled=false;

		frm.drpMonth.disabled=true;

		frm.drpYear.disabled=false;

		frm.txtStartTime.disabled=true;

		frm.txtEndTime.disabled=true;

	}else{

	}

}





function startCal(frm,val){

	if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value == 1){

	}else{

		if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value == 0){

		}else{

			newCalenderWindow(frm.txtStartDate,'Date');

		}

	}

}





function endCal(frm,val){

	if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value == 1){

	}else{

		if(frm.drpPeriod.options[frm.drpPeriod.options.selectedIndex].value == 0){

		}else{

			newCalenderWindow(frm.txtEndDate,'Date');

		}

	}

}





function isTime2GtEq1(s1, s2){

	var flag = false;

	var d1 = s1;

	var d2 = s2;

	if(d1 <= d2)

		flag=true

	return flag;

}





function isTextLessThanN(pVal, pN) {

	var theStr = new String(pVal);

	if ((theStr.length < pN)) 

		return true;

	else 

		return false;

}







//To check whether the given string format is valid date format or not



var dtCh="https://eservices.imi.gov.my/";

var minYear=1900;

var maxYear=2100;	



function isInteger(s){

	var i;

	for (i = 0; i < s.length; i++){   

		// Check that current character is number.

		var c = s.charAt(i);

		if (((c < "0") || (c > "9"))) return false;

	}

	// All characters are numbers.

	return true;

}



function stripCharsInBag(s, bag){

	var i;

	var returnString = "";

	// Search through string's characters one by one.

	// If character is not in bag, append to returnString.

	for (i = 0; i < s.length; i++){   

		var c = s.charAt(i);

		if (bag.indexOf(c) == -1) returnString += c;

	}

	return returnString;

}





function daysInFebruary (year){

	// February has 29 days in any year evenly divisible by four,

	// EXCEPT for centurial years which are not also divisible by 400.

	return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );

}





function DaysArray(n) {

	for (var i = 1; i <= n; i++) {

		this[i] = 31

		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}

		if (i==2) {this[i] = 29}

	} 

	return this

}





function isDate(dtStr){

	var daysInMonth = DaysArray(12)

	var pos1=dtStr.indexOf(dtCh)

	var pos2=dtStr.indexOf(dtCh,pos1+1)

	var strDay=dtStr.substring(0,pos1)

	var strMonth=dtStr.substring(pos1+1,pos2)

	var strYear=dtStr.substring(pos2+1)

	strYr=strYear

	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)

	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)

	for (var i = 1; i <= 3; i++) {

		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)

	}

        var hdCurrLang = document.getElementById("hdCurrLang").value;

	month=parseInt(strMonth)

	day=parseInt(strDay)

	year=parseInt(strYr)

	if (pos1==-1 || pos2==-1){

		if( hdCurrLang == "en" || hdCurrLang == "EN" )
                    alert(" The date format should be : DD/MM/YYYY")
                else
                    alert(" Format tarikh ialah : HH/BB/TTTT")
		return false

	}

	if (strMonth.length<1 || month<1 || month>12){

		if( hdCurrLang == "en" || hdCurrLang == "EN" )
                    alert(" Please enter a valid month")
                else
                    alert(" Sila masukkan nilai bulan yang sah")
		return false

	}

	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){

		if( hdCurrLang == "en" || hdCurrLang == "EN" )
                    alert(" Please enter a valid day")
                else
                    alert(" Sila masukkan nilai hari yang sah ")
		return false

	}

	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){

		if( hdCurrLang == "en" || hdCurrLang == "EN" )
                    alert(" Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
                else
                    alert(" Sila masukkan 4 digit nombor diantara tahun "+minYear+" dan "+maxYear)

		return false

	}

	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){

		if( hdCurrLang == "en" || hdCurrLang == "EN" )
                    alert(" Please enter a valid date")
                else
                    alert(" Sila masukkan tarikh yang sah")
		return false

	}

	return true

}

//end





function checkMandatory(formObj) {

	var noOfField=formObj.length; 

	for(var i=0;i<noOfField;i++) {

		if(formObj.elements[i].mandatory && formObj.elements[i].mandatory=="true") {

			//	alert(formObj.elements[i].name +" >> "+formObj.elements[i].value)

			if(trim(formObj.elements[i].value) == "" || formObj.elements[i].value == "Select") {

				if(formObj.elements[i].label) alert("Please fill up "+formObj.elements[i].label+" field.");

				else alert("Please fill up all mandatory field(s).");

				formObj.elements[i].focus();

				return false;

			}

		}

	}

	return true;

}





function validateForm(formObj) {

	var res=true;

	var msg="";

	var noOfField=formObj.length;

	for(var i=0;i<noOfField;i++) {

		if(formObj.elements[i].mandatory && formObj.elements[i].mandatory=="true") {

			if(trim(formObj.elements[i].value) == "" || formObj.elements[i].value == "Select") {

				if(formObj.elements[i].label) alert("Please fill up "+formObj.elements[i].label+".");

				else alert("Please fill up all mandatory field(s).");

				formObj.elements[i].style.backgroundColor = 'yellow';

				formObj.elements[i].focus();

				return false;

			}

			else{

				formObj.elements[i].style.backgroundColor = '';

			}

		}

		

		var fldTp=(formObj.elements[i].fldTp?formObj.elements[i].fldTp:"");

		var fldVal=trim(formObj.elements[i].value);

		

		//if(fldVal!="") {	

		//	if(fldVal.indexOf("'") >= 0) {

		//		alert("Single quotes are not allowed. \n " + formObj.elements[i].label + " having single quotes in its value. \n Please avoid them from its value.");

		//		formObj.elements[i].focus();

		//	return false;

		//	}

		//}

				

		if(fldTp!="" && fldVal!="") {	

			if(fldTp=="int") {

				res=isValidInt(fldVal);

				if (!res) msg="Please enter valid integer value.";

			}else if(fldTp=="decimal") {

				res=isValidFloat(fldVal);

				if (!res) msg="Please enter valid decimal value.";

			}else if(fldTp=="email") {

				res=isEmailAddr(fldVal);

				if (!res) msg="Please enter valid email address.";

			}else if(fldTp=="date") {

				//res=isDate(fldVal);

				if (isDate(fldVal)==false){

					formObj.elements[i].style.backgroundColor = 'yellow';

					formObj.elements[i].focus();

					return false;

				}else{

					formObj.elements[i].style.backgroundColor = '';

				}



				/*

				var now = new Date();

			    var today = new Date(now.getYear(),now.getMonth(),now.getDate());

				if(fldVal.length == 9)

					var date = new Date(fldVal.substring(5,9), fldVal.substring(3,4)-1, fldVal.substring(0,2));

				else

					var date = new Date(fldVal.substring(6,10), fldVal.substring(3,5)-1, fldVal.substring(0,2));

						

				if (date > today){

					alert(formObj.elements[i].label + " should not be greater than today's date.");

					formObj.elements[i].style.backgroundColor = 'yellow';

					formObj.elements[i].focus();

			        return false;

			    }else{

					formObj.elements[i].style.backgroundColor = '';

				}	

				*/

			}

			if (!res) {

				alert(msg);

				formObj.elements[i].style.backgroundColor = 'yellow';

				formObj.elements[i].focus();

				break;

			}else{

				formObj.elements[i].style.backgroundColor = '';

			}

		}

		

		

	}

	return res;

}







function setFocus(formObj) {

	var noOfField=formObj.length;

	for(var i=0;i<noOfField;i++) {

		if(formObj.elements[i].setfocus && formObj.elements[i].setfocus=="true") {

			formObj.elements[i].focus();

		}

	}

}









function checkTextArea(formObj) {

	var noOfField=formObj.length;

	for(var i=0;i<noOfField;i++) {

		if(formObj.elements[i].mandatory && formObj.elements[i].mandatory=="true") {

			//alert(formObj.elements[i].name +" >> "+formObj.elements[i].value)

			//alert("type   "+formObj.elements[i].type);

			if(formObj.elements[i].type == "textarea"){	

				var txtAreaValue = trim(formObj.elements[i].value);

				if(txtAreaValue == "" || txtAreaValue == "<P>&nbsp;</P>") {

					if(formObj.elements[i].label) alert("Please fill up "+formObj.elements[i].label+" field.");

					return false;

				}

			}

		}

	}

	return true;

}







function checkDateFormat(formObj) {

	var noOfField=formObj.length; 

	for(var i=0;i<noOfField;i++) {

		if(formObj.elements[i].checkFormat=="yes") {

			if(trim(formObj.elements[i].value) == ""){

			}else {

				if (isDate(trim(formObj.elements[i].value))==false){

					formObj.elements[i].focus();

					return false;

				}

			}

		}

	}

	return true;

}







function checkEditorValue(frmObjName){

	if(frmObjName.value ==""){

		alert("Please enter value for "+frmObjName.label);

		return false;

	}else {

		return true;

	}

}







function checkPercentage(fldObj){

	if(fldObj!=null && fldObj.value!=""){

		if(fldObj.value > 100){

			fldObj.focus();

			alert(" Percentage should be less than or equal to 100 ");

			return false;

		}else {

			return true;

		}

	}

}





function checkOneAtleast(frm , nameOfField , msg){

	var checkFound = false;

	for (var counter=0; counter < frm.length; counter++) {

		if ((frm.elements[counter].name == nameOfField) && (frm.elements[counter].checked == true)) {

			checkFound = true;

		}

	}

			

	if (checkFound != true) {

		alert (msg);

		return false;

	}else{

		return true;

	} 

}





// floating header

var timer

function scrolltop(){

	document.getElementById('scrollmenu').style.pixelTop=document.body.scrollTop

	timer=setTimeout("scrolltop()",1)

}



function stoptimer(){

	clearTimeout(timer)

}



//end of floating header



//to allow only numbers into the field

function maskKeyPress(objEvent) {

	var iKeyCode;  	

	iKeyCode = objEvent.keyCode;			

	if(iKeyCode>=48 && iKeyCode<=57) return true;

	return false;

}



function numbersOnly(objEvent) {

	var iKeyCode;  	

	iKeyCode = objEvent.keyCode;			

	if(iKeyCode>=48 && iKeyCode<=57) return true;

	else return false;

}



function numbersAndDigitsOnly(objEvent) {

	var iKeyCode;  	

	iKeyCode = objEvent.keyCode;			

	if(iKeyCode>=48 && iKeyCode<=57) return true;

	else if(iKeyCode==46) return true;

	else return false;

}

//end of code







function openWindow(name, url) {

	var hWnd = window.open(url,name,'width=450,height=200,resizable=no,scrollbars=auto');

	if ((document.window != null) && (!hWnd.opener))

	hWnd.opener = document.window;

	if (hWnd.focus != null) hWnd.focus();

}

function check_date(field){

    /*
     * utk format : ddmmyy
     * ddmmyyyy
     * ddXmmXyy
     * ddXmmXyyyy
     *
     *( X = sign selain 0-9 )
     */
    var hdCurrLang = document.getElementById("hdCurrLang").value;
    var checkstr = "0123456789";
    var DateField = field;
    var DateValue = "";
    var DateTemp = "";
    var seperator = "https://eservices.imi.gov.my/";
    var day;
    var month;
    var year;
    var leap = 0;
    var err = 0;
    var i;
       err = 0;
       DateValue = DateField.value;
       /* Delete all chars except 0..9 */
       for (i = 0; i < DateValue.length; i++) {
              if (checkstr.indexOf(DateValue.substr(i,1)) >= 0) {
                 DateTemp = DateTemp + DateValue.substr(i,1);
              }
       }
       DateValue = DateTemp;
       /* Always change date to 8 digits - string*/
       /* if year is entered as 2-digit / always assume 20xx */
       if (DateValue.length == 6) {
          DateValue = DateValue.substr(0,4) + '20' + DateValue.substr(4,2);}
       if (DateValue.length != 8) {
          err = 19;}
       /* year is wrong if year = 0000 */
       year = DateValue.substr(4,4);
       if (year == 0) {
          err = 20;
       }
       /* Validation of month*/
       month = DateValue.substr(2,2);
       if ((month < 1) || (month > 12)) {
          err = 21;
       }
       /* Validation of day*/
       day = DateValue.substr(0,2);
       if (day < 1) {
         err = 22;
       }
       /* Validation leap-year february / day */
       if ((year % 4 == 0) || (year % 100 == 0) || (year % 400 == 0)) {
          leap = 1;
       }
       if ((month == 2) && (leap == 1) && (day > 29)) {
          err = 23;
       }
       if ((month == 2) && (leap != 1) && (day > 28)) {
          err = 24;
       }
       /* Validation of other months */
       if ((day > 31) && ((month == "01") || (month == "03") || (month == "05") || (month == "07") || (month == "08") || (month == "10") || (month == "12"))) {
          err = 25;
       }
       if ((day > 30) && ((month == "04") || (month == "06") || (month == "09") || (month == "11"))) {
          err = 26;
       }
       /* if 00 ist entered, no error, deleting the entry */
       if ((day == 0) && (month == 0) && (year == 00)) {
          err = 0;day = "";month = "";year = "";seperator = "";
       }
       /* if no error, write the completed date to Input-Field (e.g. 13.12.2001) */
       if (err == 0) {

          if ( isDate( day + seperator + month + seperator + year ) ){
              DateField.value = day + seperator + month + seperator + year;
          }
          else{
              DateField.value = "";
              return false;
          }
       }
       /* Error-message if err != 0 */
       else {
           if( hdCurrLang == "en" || hdCurrLang == "EN" )
                alert("Please enter a valid date.");
           else
               alert("Sila masukkan tarikh dengan betul.");
          DateField.value = "";
          return false;
       }
       return true;
    }

    function validateName(elmnt,content) {
        //if it is character, then remove it..
        elmnt.value = content.replace(/[^a-z\\^A-Z\\@\\ \\/]/g, '');
        elmnt.value = stripCharsInBag(elmnt.value,'^\\');
        return;
    }

    function validateCharacter(elmnt,content) {
        //if it is character, then remove it..
        elmnt.value = content.replace(/[^a-z\\^A-Z\\@\\'\\ \\.\\/]/g, '');
        elmnt.value = stripCharsInBag(elmnt.value,'^\\');
        return;
    }
    function validateCharacterOnly(elmnt,content) {
        //if it is character, then remove it..
        elmnt.value = content.replace(/[^a-z\\ \\^A-Z]/g, '');
        elmnt.value = stripCharsInBag(elmnt.value,'^\\');
        return;
    }
    function validatePhoneNo(elmnt,content) {
        //if it is character, then remove it..
        elmnt.value = content.replace(/[^0-9\\-]/g, '');
        elmnt.value = stripCharsInBag(elmnt.value,'\\');
        return;
    }
    function validateNumber(elmnt,content) {
        //if it is character, then remove it..
        if (isNaN(content)) {
                elmnt.value = content.replace(/[^0-9]/g, '');
                elmnt.value = stripCharsInBag(elmnt.value,'\\');
                return;
        }
    }
    function validateInteger(elmnt,content) {
        //if it is character, then remove it..
        if (isNaN(content)) {
            elmnt.value = content.replace(/[^0-9]/g, '');
        }
        elmnt.value = stripCharsInBag(elmnt.value,'.\\');
        return;
    }
    function validateNumChar(elmnt,content) {
        //if it is character, then remove it..
        elmnt.value = content.replace(/[^a-z\\ \\^A-Z\\^0-9\\-]/g, '');
        elmnt.value = stripCharsInBag(elmnt.value,'^\\');
        return;
    }
    
    function validateNumCharDashUScore(elmnt,content) {
        //if it is character, then remove it..
        elmnt.value = content.replace(/[^a-z\\^A-Z\\^0-9\\_\\.\\@\\-]/g, '');
        elmnt.value = stripCharsInBag(elmnt.value,'^\\');
        return;
    }
    
   
    function validateNumDt(elmnt,content) {
        elmnt.value = content.replace(/[^0-9/]/g, '');
        return;
    }
    function validateDec(elmnt,content) {
        //if it is character, then remove it..
        elmnt.value = content.replace(/[^0-9\\.]/g, '');
        elmnt.value = stripCharsInBag(elmnt.value,'\\');
        return;
    }
    function validateEmail(str) {

        var at="@"
        var dot="."
        var lat=str.indexOf(at)
        var lstr=str.length
        var ldot=str.indexOf(dot)

        if (str.indexOf(at)==-1){
            alert("Invalid E-mail ID");
            return false;
        }

        if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr || (str.indexOf(at)+1)==lstr){
            alert("Invalid E-mail ID");
            return false;
        }

        if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
            alert("Invalid E-mail ID");
            return false;
        }

        if (str.indexOf(at,(lat+1))!=-1){
            alert("Invalid E-mail ID");
            return false;
        }

        if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
            alert("Invalid E-mail ID");
            return false;
        }

        if (str.indexOf(dot,(lat+2))==-1){
            alert("Invalid E-mail ID");
            return false;
        }

        if (str.indexOf(" ")!=-1){
            alert("Invalid E-mail ID");
            return false;
        }

        return true;
    }

function validateTime(field)
{
    var strval = field;
    var strval1;
    
    //minimum lenght is 8. example 1:2:2 AM
    if(strval.length < 8)
    {
        alert("Invalid time. Time format should be HH:MM:SS AM/PM.");
        return false;
    }

    //Maximum length is 10. example 10:45:00 AM
    if(strval.lenght > 10)
    {
        alert("Invalid time. Time format should be HH:MM:SS AM/PM.");
        return false;
    }

    //Removing all space
    strval = trimAllSpace(strval);

    //Checking AM/PM
    if(strval.charAt(strval.length - 1) != "M" && strval.charAt(strval.length - 1) != "m")
    {
        alert("Invalid time. Time should be end with AM or PM.");
        return false;

    }
    else if(strval.charAt(strval.length - 2) != 'A' && strval.charAt(strval.length - 2) != 'a' && strval.charAt(strval.length - 2) != 'p' && strval.charAt(strval.length - 2) != 'P')
    {
        alert("Invalid time. Time should be end with AM or PM.");
        return false;
    }

    //Give one space before AM/PM

    strval1 =  strval.substring(0,strval.length - 2);
    strval1 = strval1 + ' ' + strval.substring(strval.length - 2,strval.length)

    strval = strval1;

    var pos1 = strval.indexOf(':');
    var pos2 = strval.indexOf(':',pos1 + 1);
    field = strval;

    if (pos1 < 0 )
    {
        alert("Invalid time. A color(:) is missing between hour and minute and second.");
        return false;
    }
    else if (pos1 > 3 || pos1 < 2)
    {
        alert("Invalid time. Time format should be HH:MM:SS AM/PM.");
        return false;
    }

    //Checking hours
    var hourval =  trimString(strval.substring(0,pos1));
				

    if(hourval == -100)
    {
        alert("Invalid time. Hour should contain only integer value (0-11).");
        return false;
    }

    if(hourval > 12)
    {
        alert("invalid time. Hour can not be greater that 12.");
        return false;
    }
    else if(hourval < 0)
    {
        alert("Invalid time. Hour can not be hours less than 0.");
        return false;
    }
    //Completes checking hours.

    //Checking minutes.
    var minval =  trimString(strval.substring(pos1+1,pos1 + 3));

    if(minval == -100)
    {
        alert("Invalid time. Minute should have only integer value (0-59).");
        return false;
    }
    
    if(minval > 59)
    {
        alert("Invalid time. Minute can not be more than 59.");
        return false;
    }
    else if(minval < 0)
    {
        alert("Invalid time. Minute can not be less than 0.");
        return false;
    }

    //Checking minutes completed.
	
    //Checking second.
    var secval =  trimString(strval.substring(pos2 + 1, pos2 + 3));

    if(secval == -100)
    {
        alert("Invalid time. Second should have only integer value (0-59).");
        return false;
    }
    
    if(secval > 59)
    {
        alert("Invalid time. Second can not be more than 59.");
        return false;
    }
    else if(secval < 0)
    {
        alert("Invalid time. Second can not be less than 0.");
        return false;
    }

    //Checking second completed.

    //Checking one space after the second
    secpos = pos2 + secval.length + 1;
    if(strval.charAt(secpos) != ' ')
    {
        alert("Invalid time. Space missing after second. Time should have HH:MM:SS AM/PM format.");
        return false;
    }

    return true;
}

function trimAllSpace(str) 
{
    var str1 = '';
    var i = 0;
    while(i != str.length)
    {
        if(str.charAt(i) != ' ')
            str1 = str1 + str.charAt(i);
        i ++;
    }
    return str1;
}

function trimString(str) 
{
    var str1 = '';
    var i = 0;
    while ( i != str.length)
    {
        if(str.charAt(i) != ' ') str1 = str1 + str.charAt(i);
        i++;
    }
    var retval = IsNumeric(str1);
    if(retval == false)
        return -100;
    else
        return str1;
}

function IsNumeric(strString) 
{
    var strValidChars = "0123456789";
    var strChar;
    var blnResult = true;
    //test strString consists of valid characters listed above
    if (strString.length == 0)
        return false;
    for (i = 0; i < strString.length && blnResult == true; i++)
    {
        strChar = strString.charAt(i);
        if (strValidChars.indexOf(strChar) == -1)
        {
            blnResult = false;
        }
    }
    return blnResult;
}

function validateMaxCurrencyValue( field, maxValue, msg ){
    var vAmt = field.value;
    vAmt = vAmt.toString().replace(/\$|\,/g,'');
    var vMax = maxValue.toString().replace(/\$|\,/g,'');
    if( parseFloat(vAmt) > parseFloat(vMax) ){
        alert(msg + maxValue);
        field.value = "0.00";
    }
}

function compareFloatVal( vAmt, maxValue ){
    vAmt = vAmt.toString().replace(/\$|\,/g,'');
    var vMax = maxValue.toString().replace(/\$|\,/g,'');
    if( parseFloat(vAmt) > parseFloat(vMax) ){
        return false;
    }
    return true;
}

function fnFormatNewLine( strTextArea )
{
    while ( strTextArea.indexOf('^') > 0 )
    {
        strTextArea = strTextArea.replace('^','\n');
    }
    return strTextArea;
}

function validatePhoneNo1(objEvent) {
    if( objEvent.keyCode == 8 ){
        return true;
    }
    else if( objEvent.keyCode == 45){ //-
        return true;
    }
    else if( numbersOnly(objEvent) ){
        return true;
    }
    else{
        return false;
    }
}

function validateNumDt1(objEvent) {
    if( objEvent.keyCode == 8 ){
        return true;
    }
    else if( objEvent.keyCode == 47){ // /
        return true;
    }
    else if( numbersOnly(objEvent) ){
        return true;
    }
    else{
        return false;
    }
}

function validateDec1(objEvent) {
    if( objEvent.keyCode == 8 ){
        return true;
    }
    else if( objEvent.keyCode == 46){ //.
        return true;
    }
    else if( numbersOnly(objEvent) ){
        return true;
    }
    else{
        return false;
    }
}

function validateCurr(objEvent) {
    if( objEvent.keyCode == 8 ){
        return true;
    }
    else if( objEvent.keyCode == 44){ //,
        return true;
    }
    else if( objEvent.keyCode == 46){ //.
        return true;
    }
    else if( numbersOnly(objEvent) ){
        return true;
    }
    else{
        return false;
    }
}

function characterOnly1(objEvent) {
    if( objEvent.keyCode >= 65 && objEvent.keyCode <= 90 ){
        return true;
    }
    else if( objEvent.keyCode >= 97 && objEvent.keyCode <= 122 ){
        return true;
    }
    else{
        return false;
    }
}

function validateName1(objEvent) {
    if( objEvent.keyCode == 8 ){ //backspace
        return true;
    }
    else if( objEvent.keyCode == 64 ){ //@
        return true;
    }
    else if( objEvent.keyCode == 32 ){ //space
        return true;
    }
    else if( characterOnly1(objEvent) ){
        return true;
    }
    else{
        return false;
    }
}

function validateMyKad(objEvent,objVal) {
    if( objEvent.keyCode == 8 ){
        return true;
    }
    else if( numbersOnly(objEvent) ){
        return true;
    }
    else if( objEvent.keyCode == 45 && objVal.length < 6 ){
        return false;
    }
    else if( objEvent.keyCode == 45 && ( objVal.length == 7 || objVal.length == 8 ) ){
        return false;
    }
    else if( objEvent.keyCode == 45 && ( objVal.length > 9 ) ){
        return false;
    }
    else if( objEvent.keyCode == 45){ //-
        return true;
    }
    else{
        return false;
    }
}

function  trimSpaces(s, content) {
    
    while (content.substring(0,1) == ' ') {

        content = content.substring(1,s.length);

    }

    while (content.substring(content.length-1,content.length) == ' ') {

        content = content.substring(0,content.length-1);

    }
    //remove multiple spaces into single space
    s.value = content.replace(/ +(?= )/g,'');
    return;
}
