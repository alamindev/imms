/************************************************************************
Note :Following code is required in jsp form
<div id="progressWin" style="display: block; top: 0; left: 0; width: 100%; height: 100%; position: absolute;">
    <div id="progressBg" style=" background-image: url('${pageContext.request.contextPath}/styles/ui-lightness/images/ui-bg_diagonals-thick_20_666666_40x40.png'); opacity: 0.6; filter: alpha(opacity=60); background-repeat: repeat; top: 0; left: 0; width: 100%; height: 100%; position: absolute;  z-index: 1;"></div>
    <div id="progressTxt" style="position: absolute; top: 40%; width: 100%; overflow: visible; z-index: 2;" align="center">
        <table width="350px" align="center" bgcolor="grey" style="height: 80px; border-color: black; border-width: medium; border-style: solid; font-weight: bold;">
            <tr>
                <td valign="middle" align="center">
                    <img src="${pageContext.request.contextPath}/images/loading.gif" border="0"/>
                    <BR>
                    <fmt:message key="login.wait"/>
                </td>
            </tr>
        </table>
    </div>
</div>
***********************************************************************/

$(function(){

    $('form input:submit').each(function() {
        $($(this)).bind('click',function(event) {
            $($('form')).bind('submit',function(event) {
                showProgressScr();
            });
        });
    });

    $($('form')).bind('submit',function(event) {
        showProgressScr();
    });

});

$(window).scroll(function()
{
    $('#progressWin').animate({top:$(window).scrollTop()+"px"},{queue: false, duration: 250});
});

$(window).load(function () {
    hideProgressScr();
});

function showProgressScr(){

    var vScrollTop = $(window).scrollTop();

    $('#progressWin').attr("style", "display: block; top: "+vScrollTop+"px; left: 0; width: 100%; height: 100%; position: absolute;");

    $("#progressWin").show();
}

function hideProgressScr(){

    $("#progressWin").hide();
}
