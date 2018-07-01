/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

String.prototype.trim = function() {
    return this.replace(/^\s*/, "").replace(/\s*$/, "");
}
            
function getAuditXML(){
    var frm = document.forms;
    var audit="";
    with (frm) {
        for (var i=0; i < elements.length; i++) {
            if (elements[i].type != 'button' && elements[i].type != 'hidden') {
                //    alert("nama input "+i+" :"+elements[i].name);
                //    alert("value nama input "+i+" :"+elements[i].value);
                audit += "<"+elements[i].name+">"+elements[i].value+"</"+elements[i].name+">";
            }
        }
        }
    //frm.hdAct.value = "Next"; 
    frm.txn_detail.value = audit;
    alert("auditXML :"+frm.txn_detail.value);
    return audit;
}    

function gen_varpart()
{
    var k = 0;
    var i = 0;
    var genVAR = "";
    var elename = "";
    var trim_value = String("");
  
    for(i=0;i<document.forms.length;++i)				//traverse all forms in document
    {
        for(j=0;j<document.forms[i].elements.length;++j)		//traverse all element in forms
        {
            if (document.forms[i].elements[j].type == "text" ||
//                document.forms[i].elements[j].type == "password" ||
                document.forms[i].elements[j].type == "hidden" ||
                document.forms[i].elements[j].type == "textarea")	//select type:text,password,hidden only
                {
                elename = document.forms[i].elements[j].name;

                if (!"txnDetail".match(elename) && !"button".match(elename) && !"USR_PWD".match(elename) ) {
  
                    genVAR = genVAR + "<" + document.forms[i].elements[j].name + ">";
                    trim_value = document.forms[i].elements[j].value;
                    genVAR = genVAR + trim_value.trim();
                    genVAR = genVAR + "</" + document.forms[i].elements[j].name + ">"; // \n";
                }
            }
        }
    }
    return genVAR;
}

