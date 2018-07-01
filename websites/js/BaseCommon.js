function doThis(doWhat, actionName){
    var hdAct = doWhat.split("&")[0];
    document.forms[0].hdAction.value=hdAct;

    if( hdAct == "create" || hdAct == "update" || hdAct == "createOrUpdate"  || hdAct == "CREATEUPDATE_BLOCKMENU"
        ) {
        if(confirm("Are you sure ?")){
            // genXML(); // uncomment this if audit trails is require
            document.forms[0].submit();
        }
    }
    else if( hdAct == "delete" ||hdAct == "RESET_PASSWORD"||hdAct == "FORCE_LOGOUT" ) {
        if(confirm("Are you sure to "+hdAct+" this record")){
            // genXML(); // uncomment this if audit trails is require
            document.forms[0].action=actionName+"?hdAction="+doWhat;
            document.forms[0].submit();
        }
    }
    else {
        if( hdAct == "getSearchUpdate" ){
            if(confirm("Current setting will be reset, are you sure to get latest schema ?")){
                document.forms[0].submit();
            }
            return;
        }
        else {

            if(hdAct == "getSort"){
                var sortId = doWhat.split("=")[1];
                document.getElementById("hdAction").value=hdAct;
                document.getElementById("sortId").value=sortId;
                document.forms[0].action=actionName;
            }
            else if(hdAct == "getCreate" ||hdAct == "getList" ){
                document.getElementById("hdAction").value=hdAct;
                document.forms[0].action=actionName;
            }
            else {
                document.forms[0].action=actionName+"?hdAction="+doWhat;
            }

            document.forms[0].submit();
        }
    }
}

function openNewWindow(doWhat, actionName){
    newWindow(actionName+"?hdAction="+doWhat,'name','700','400','yes');
}

function newWindow(mypage,myname,w,h,scroll){
    var win= null;
    var winl = (screen.width-w)/2;
    var wint = (screen.height-h)/2;
    var settings ='height='+h+',';
    settings +='width='+w+',';
    settings +='top='+wint+',';
    settings +='left='+winl+',';
    settings +='scrollbars='+scroll+',';
    settings +='resizable=yes';
    win=window.open(mypage,myname,settings);
    if(parseInt(navigator.appVersion) >= 4){
        win.window.focus();
    }
}

function popUpThirdPartyAttach(url){
    popUpWin(url,'upload','900','500','no');//popUpWin(url,'name','500','650','no');

}

function popUpWin(mypage,myname,w,h,scroll){
	var win = null;
	var winl = (screen.width-w)/2;
	var wint = (screen.height-h)/2;
	var settings ='height='+h+',';
	settings +='width='+w+',';
	settings +='top='+wint+',';
	settings +='left='+winl+',';
	settings +='scrollbars='+scroll+',';
	settings +='resizable=no';
	win=window.open(mypage,myname,settings);
	if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
}

function doWorkflow(doWhat, actionName){

    var hdAct = doWhat.split("&")[0];
    if( hdAct == "RELEASE_ME" || hdAct == "ADM_RELEASE_ME") {
        if(confirm("Are you sure ?")){

            document.forms[0].action=actionName+"?hdAction="+doWhat;
            document.forms[0].submit();
        }
    }else {

        document.forms[0].action=actionName+"?hdAction="+doWhat;
        document.forms[0].submit();

    }


}

function getMenuTree(modCd,actionName, isDefault){
    document.forms[0].action=actionName+"/ComMenuControl.mybase?hdAction=GET_MENUS&hdModCd="+modCd+"&hdIsDefault="+isDefault+"";
    document.forms[0].submit();
}

function getMenuPage(doWhat){

    var doAct = doWhat.split("?")[0];
    var doInfo = doWhat.split("?")[1];
     
    var hdActVal = doInfo.split("&")[0].split("=")[1];
    var hdMenuVal = doInfo.split("&")[1].split("=")[1];
    var hdTxnVal = doInfo.split("&")[2].split("=")[1];
     
    document.getElementById("hdAction").value = hdActVal;
    document.getElementById("menuId").value = hdMenuVal;
    document.getElementById("txnId").value = hdTxnVal;
    
    document.forms[0].action=doAct;
    if(document.getElementById("txtSchAll") != null){
        document.getElementById("txtSchAll").value = "";
    }
    document.forms[0].submit();
}


function schAll(){
    document.forms[0].hdAction.value="getList";
    document.forms[0].submit();
   
}
function checkSearchingData(schData){
    if(schData != null && schData.length > 0 ){
        highlightSearchTerms(schData);
    }
}

function doShowAll(){
    document.getElementById("txtSchAll").value = "";
    document.forms[0].hdAction.value="getList";
    document.forms[0].submit();
    
}

/*
* This is the function that actually highlights a text string by
* adding HTML tags before and after all occurrences of the search
* term. You can pass your own tags if you'd like, or if the
* highlightStartTag or highlightEndTag parameters are omitted or
* are empty strings then the default <font> tags will be used.
*/
function doHighlight(bodyText, searchTerm, highlightStartTag, highlightEndTag)
{
    // the highlightStartTag and highlightEndTag parameters are optional
    if ((!highlightStartTag) || (!highlightEndTag)) {
        highlightStartTag = "<font style='color:blue; background-color:yellow;'>";
        highlightEndTag = "</font>";
    }

    // find all occurences of the search term in the given text,
    // and add some "highlight" tags to them (we're not using a
    // regular expression search, because we want to filter out
    // matches that occur within HTML tags and script blocks, so
    // we have to do a little extra validation)
    var newText = "";
    var i = -1;
    var lcSearchTerm = searchTerm.toLowerCase();
    var lcBodyText = bodyText.toLowerCase();

    while (bodyText.length > 0) {
        i = lcBodyText.indexOf(lcSearchTerm, i+1);
        if (i < 0) {
            newText += bodyText;
            bodyText = "";
        } else {
            // skip anything inside an HTML tag
            if (bodyText.lastIndexOf(">", i) >= bodyText.lastIndexOf("<", i)) {
                // skip anything inside a <script> block
                if (lcBodyText.lastIndexOf("/script>", i) >= lcBodyText.lastIndexOf("<script", i)) {
                    newText += bodyText.substring(0, i) + highlightStartTag + bodyText.substr(i, searchTerm.length) + highlightEndTag;
                    bodyText = bodyText.substr(i + searchTerm.length);
                    lcBodyText = bodyText.toLowerCase();
                    i = -1;
                }
            }
        }
    }

    return newText;
}


/*
* This is sort of a wrapper function to the doHighlight function.
* It takes the searchText that you pass, optionally splits it into
* separate words, and transforms the text on the current web page.
* Only the "searchText" parameter is required; all other parameters
* are optional and can be omitted.
*/
function highlightSearchTerms(searchText, treatAsPhrase, warnOnFailure, highlightStartTag, highlightEndTag)
{
    // if the treatAsPhrase parameter is true, then we should search for
    // the entire phrase that was entered; otherwise, we will split the
    // search string so that each word is searched for and highlighted
    // individually
    if (treatAsPhrase) {
        searchArray = [searchText];
    } else {
        searchArray = searchText.split(" ");
    }

    if (!document.body || typeof(document.body.innerHTML) == "undefined") {
        if (warnOnFailure) {
            alert("Sorry, for some reason the text of this page is unavailable. Searching will not work.");
        }
        return false;
    }

    var bodyText = document.body.innerHTML;
    for (var i = 0; i < searchArray.length; i++) {
        bodyText = doHighlight(bodyText, searchArray[i], highlightStartTag, highlightEndTag);
    }

    document.body.innerHTML = bodyText;
    return true;
}


//function gotoPageNo(act, maxPage, hdAction, path){
//alert(hdAction);
//    if(act == "first") {
//        if(document.forms[0].currentPgNo.value=='1'){
//            fnAlert(" Sorry, you are at the first page ");
//            return;
//        } else {
//            document.forms[0].hdPgNo.value = '1';
//        }
//    }
//    else if(act == "last") {
//        if(document.forms[0].currentPgNo.value==maxPage){
//            fnAlert(" Sorry, you are at the last page ");
//            return;
//        } else {
//            document.forms[0].hdPgNo.value = maxPage;
//        }
//    }
//    else if(act == "prev") {
//        if(document.forms[0].currentPgNo.value=='1'){
//            fnAlert(" Sorry, no previous page available because of you are at the first page ");
//            return;
//        } else {
//            document.forms[0].hdPgNo.value = Math.abs(document.forms[0].currentPgNo.value) - 1;
//        }
//    }
//    else if(act == "next") {
//        if(document.forms[0].currentPgNo.value==maxPage){
//            fnAlert(" Sorry, no next page available because of you are at the last page ");
//            return;
//        } else {
//            document.forms[0].hdPgNo.value = Math.abs(document.forms[0].currentPgNo.value) + 1;
//        }
//    }
//    else {
//
//
//        if(CheckEntry("currentPgNo","3","y","N")){
//            if(Math.abs(document.forms[0].currentPgNo.value) > maxPage ){
//                fnAlert(" Sorry, only "+maxPage+" page/s available  ");
//                return;
//            }
//            else {
//                document.forms[0].hdPgNo.value = document.forms[0].currentPgNo.value;
//            }
//        }
//        else {
//            document.getElementById("currentPgNo").value = "1";
//        }
//    }
//
//
//
//    if(maxPage!='1'){
//        //document.forms[0].hdAction.value="getList";
//		alert("2")
//        //document.forms[0].submit(hdAction);
//		document.location.href = path+"/carianLulus?action="+hdAction;
//    } else {
//        fnAlert("Sorry, only one(1) page available");
//        return;
//    }
//
//}


function doDelRow(rowStart, tblID){
    var oMyTable = document.getElementById(tblID);
    if(oMyTable.rows.length==2){
        alert(" Sorry, you cannot delete first row ");
        return false;
    }
    if(confirm("Are you sure to delete this row/s ?"))
    {
        for( a=0 ; a<2 ; a++)
        {
            for( i=rowStart ; i<oMyTable.rows.length ; i++)
            {
                oCheckBox =oMyTable.rows.item(i).cells(0).getElementsByTagName("INPUT").item(0);
                if(oMyTable.rows.length==2){
                    alert(" Sorry, you cannot delete first row ");
                    break;
                }
                if(oCheckBox.checked)
                {
                    oNewRow = oMyTable.rows[i].removeNode(true);
                }
            }
        }
    }
    return false;
}


function doAddWfLevelRow(tblId) {

    var tbl=document.getElementById(tblId);
    var i=document.getElementById("hdTable").rows.length;
    var rowColor = (((i)%2)==0)?"gridnew":"gridnew";

    var tbody = tbl.getElementsByTagName("TBODY")[0];
    var row = document.createElement("TR")
    var td1 = document.createElement("TD")
    var td2 = document.createElement("TD")
    var td3 = document.createElement("TD")
    var td4 = document.createElement("TD")

    td1.innerHTML = "<input type='checkbox' name='level_id' id='level_id_"+i+"' /><input type=\"hidden\" name=\"level_is_new\" value=\"Y\" />";
    td2.innerHTML = "<input type='text' name='level_description' id='level_description_"+i+"' size=\"40\"  />";
    td3.innerHTML = "<input type='text' name='level_flow_no' id='level_flow_no_"+i+"' size=\"5\"/>";
    td4.innerHTML = "<input type='hidden' name='level_sts_id' id='level_sts_id_"+i+"' value=\"R01\"/> Active ";


    td1.className=rowColor;
    td2.className=rowColor;
    td3.className=rowColor;
    td4.className=rowColor;

    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);

    tbody.appendChild(row);
    doAddHiddenTable();

}

function doAddHiddenTable() {

    var tbl=document.getElementById("hdTable");
    var tbody = tbl.getElementsByTagName("TBODY")[0];
    var row = document.createElement("TR")
    var td1 = document.createElement("TD")
    td1.innerHTML = "&nbsp;";
    row.appendChild(td1);
    tbody.appendChild(row);
}

function doDelWfLevelRow(rowStart, tblID){
    var oMyTable = document.getElementById(tblID);
    if(oMyTable.rows.length==2){
        alert(" Sorry, you cannot delete first row ");
        return false;
    }
    if(confirm("Are you sure to delete this row/s ?"))
    {
        for( a=0 ; a<2 ; a++)
        {
            for( i=rowStart ; i<oMyTable.rows.length ; i++)
            {
                oCheckBox =oMyTable.rows.item(i).cells(0).getElementsByTagName("INPUT").item(0);
                if(oMyTable.rows.length==2){
                    alert(" Sorry, you cannot delete first row ");
                    break;
                }
                if(oCheckBox.checked) {
                    oNewRow = oMyTable.rows[i].removeNode(true);
                }
            }
        }
    }
    return false;
}


function populateResult( result, objId){
    //document.getElementById(objId).value = result;
    //document.getElementById(objId).style.width = ""+Math.abs( result.length * 7 )+"px";

    // draw combo box

    var combo = document.getElementById(objId);
    var option = document.createElement("option");

    combo.remove(combo);

    option.text = result.split("-")[1];
    option.value = result.split("-")[0];

    try {
        combo.add(option, null); //Standard
    }catch(error) {
        combo.add(option); // IE only
    }

}

function populateResultUploadPspt(imagePath, imageValName, objId, imageId, gambaId){    
    document.getElementById(objId).src = imageValName;//imagePath;
    document.getElementById(imageId).value = imageValName;
    document.getElementById(gambaId).disabled = false;
}
function populateResultUploadMacs(imagePath, imageValName, objId, imageId, gambaId){
    document.getElementById(objId).src = imageValName;//imagePath;
    document.getElementById(imageId).value = imageValName;
}


function genXML(){
    var frm = document.forms[0];

    var auditXML = "<audit>";
    with (frm) {
        for (i=0; i < elements.length; i++) {
            //if (elements[i].type != 'button' && elements[i].type != 'hidden') {
            if (elements[i].type != 'button') {
                if(!(elements[i].name=='hdAction' || elements[i].name=='hdPgNo' || elements[i].name=='hdAuditDtl')){
                    auditXML += "<"+elements[i].name+">"+elements[i].value+"</"+elements[i].name+">";
                }
               
            }
        }
        }
    auditXML+="</audit>";
    frm.hdAuditDtl.value = auditXML;
//fnAlert("auditXML :"+frm.hdAuditDtl.value);
}

function getMenuTree(menuId){
    alert('menuId >>'+menuId);
    window.location.href=window.location.href+"?menuId=" + menuId;
    document.getElementById("menuId").value = menuId;
    session.setAttribute("REQ_MOD_CODE", menuId);
//    document.forms[0].submit('getMenus');
}