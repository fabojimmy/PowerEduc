YUI.add("powereduc-availability_completion-form",function(o,e){M.availability_completion=M.availability_completion||{},M.availability_completion.form=o.Object(M.core_availability.plugin),M.availability_completion.form.initInner=function(e){this.cms=e},M.availability_completion.form.getNode=function(e){for(var i,l,t='<span class="col-form-label pr-3"> '+M.util.get_string("title","availability_completion")+'</span> <span class="availability-group form-group"><label><span class="accesshide">'+M.util.get_string("label_cm","availability_completion")+' </span><select class="custom-select" name="cm" title="'+M.util.get_string("label_cm","availability_completion")+'"><option value="0">'+M.util.get_string("choosedots","powereduc")+"</option>",a=0;a<this.cms.length;a++)t+='<option value="'+(i=this.cms[a]).id+'">'+i.name+"</option>";return t+='</select></label> <label><span class="accesshide">'+M.util.get_string("label_completion","availability_completion")+' </span><select class="custom-select" name="e" title="'+M.util.get_string("label_completion","availability_completion")+'"><option value="1">'+M.util.get_string("option_complete","availability_completion")+'</option><option value="0">'+M.util.get_string("option_incomplete","availability_completion")+'</option><option value="2">'+M.util.get_string("option_pass","availability_completion")+'</option><option value="3">'+M.util.get_string("option_fail","availability_completion")+"</option></select></label></span>",l=o.Node.create('<span class="form-inline">'+t+"</span>"),e.cm!==undefined&&l.one("select[name=cm] > option[value="+e.cm+"]")&&l.one("select[name=cm]").set("value",""+e.cm),e.e!==undefined&&l.one("select[name=e]").set("value",""+e.e),M.availability_completion.form.addedEvents||(M.availability_completion.form.addedEvents=!0,o.one(".availability-field").delegate("change",function(){M.core_availability.form.update()},".availability_completion select")),l},M.availability_completion.form.fillValue=function(e,i){e.cm=parseInt(i.one("select[name=cm]").get("value"),10),e.e=parseInt(i.one("select[name=e]").get("value"),10)},M.availability_completion.form.fillErrors=function(i,e){var l=parseInt(e.one("select[name=cm]").get("value"),10);0===l&&i.push("availability_completion:error_selectcmid"),2!==(e=parseInt(e.one("select[name=e]").get("value"),10))&&3!==e||this.cms.forEach(function(e){e.id===l&&null===e.completiongradeitemnumber&&i.push("availability_completion:error_selectcmidpassfail")})}},"@VERSION@",{requires:["base","node","event","powereduc-core_availability-form"]});