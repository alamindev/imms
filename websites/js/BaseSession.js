var timeoutExpired = 120; // 2 Minutes

function checkSession(uId, ctxPath) {
    if(timeout <= timeoutExpired) {
        displayAlert(uId,ctxPath);
    }
    timeout--;
    window.setTimeout("checkSession('"+uId+"','"+ctxPath+"')",1000);
}

function displayAlert(uId,ctxPath) {

    //var delay = Math.abs(timeoutExpired) * 60;
    var delay = 60000; // 1 Minutes
    var currentDate = new Date();
    var currentTime = currentDate.getTime();
    var hours = convertTimeDisplay(currentDate.getHours());
    var minutes = convertTimeDisplay(currentDate.getMinutes());
    var seconds = convertTimeDisplay(currentDate.getSeconds());

    var vUsrInd = "&agent="+document.getElementById("AGENT_IND").value+"&enf="+document.getElementById("ENF_IND").value;

    if(confirm("WARNING !!!\nYour session will be expired in 1 minutes time start from "+hours+":"+minutes+":"+seconds+".\nPlease click \"OK\" to continue or \"Cancel\" to log out.")) {
        var responseDate = new Date();
        var responseTime = responseDate.getTime();

        if ((parseInt(responseTime) - parseInt(currentTime)) >= parseInt(delay)) {
            alert('Your session has been expired.');
            // if user click ok after 2 minutes prompt session expired, system will sent to session expired page
            document.location.href=ctxPath+"/logout?logoffid="+uId+vUsrInd;
        }
        else {
            // if user immediately click ok after prompt session expired, sistem will pass a small popup screen
            // to the server to acknowledge that user is still want to continue the session, n session should reset back
            // to the original time out
//            var refreshPage = ""+ctxPath+"/WEB-INF/jsp/home/Refresh.jsp";
//            document.location.href=ctxPath+"/refresh";
//            alert('refreshPage=>'+refreshPage);
//            window.open( document.location.href,'popup','location=no,menubar=no,scrollbars=no,status=no,toolbar=no,width=60,height=60');
            myWindow = window.open("", "tinyWindow", 'location=no,menubar=no,scrollbars=no,status=no,toolbar=no,width=60,height=60');
            myWindow.document.write("Refreshing your session...!");
            myWindow.document.bgColor="lightblue";
//            myWindow.document.close();
            myWindow.setTimeout('window.close()', 1);
//            myWindow.close();
//            Page.RegisterStartupScript("CLOSE", "<script language='javascript'>window.opener.location.reload();self.close();</script>");

//            myWindow.document.setTimeout('window.close()', 1);
//            document.location.href=ctxPath+"/refresh";
        }
    }
    else {
        // if user immediately click cancel after prompt session expired, sistem will go to logout function
        document.location.href=ctxPath+"/logout?logoffid="+uId+vUsrInd;
    }
    timeout=sessionExpired;
    return;
}

function convertTimeDisplay(num) {
    if (num < 10)
        return new String("0"+num);
    else
        return new String(num);
}

function fnUpdSession(uId,ctxPath)
{
    $.post("updSession/updateSession",{}, function(data) {
        if( data == 'OK' ){
            timeout=sessionExpired;
        }
        else{
            alert('Your session has been expired.');
            document.location.href=ctxPath+"/logout?logoffid="+uId;
        }
    },"text");
}

var SessTimeOut = 480; //8min
var CurrTimeOut = SessTimeOut;

function fnChkPblcSession()
{
    if(CurrTimeOut <= timeoutExpired) {
        fnUpdPblcSession();
    }
    CurrTimeOut--;
    window.setTimeout("fnChkPblcSession()",1000);
}

function fnUpdPblcSession()
{
    $.post("updPublicSession/updatePublicSession",{}, function(data) {
        if( data == 'OK' ){
            CurrTimeOut = SessTimeOut;
        }
        else{
            alert('Your session has been expired.');
        }
    },"text");
}
