YUI.add("powereduc-availability_date-form",function(o,e){M.availability_date=M.availability_date||{},M.availability_date.form=o.Object(M.core_availability.plugin),M.availability_date.form.initInner=function(e,a){this.html=e,this.defaultTime=a},M.availability_date.form.getNode=function(e){var t,i,a='<span class="col-form-label pr-3">'+M.util.get_string("direction_before","availability_date")+'</span> <span class="availability-group"><label><span class="accesshide">'+M.util.get_string("direction_label","availability_date")+' </span><select name="direction" class="custom-select"><option value="&gt;=">'+M.util.get_string("direction_from","availability_date")+'</option><option value="&lt;">'+M.util.get_string("direction_until","availability_date")+"</option></select></label></span> "+this.html,n=o.Node.create("<span>"+a+"</span>");return e.t!==undefined?(n.setData("time",e.t),n.all("select:not([name=direction])").each(function(e){e.set("disabled",!0)}),a=M.cfg.wwwroot+"/availability/condition/date/ajax.php?action=fromtime&time="+e.t,o.io(a,{on:{success:function(e,a){var t,i,l=o.JSON.parse(a.responseText);for(t in l)(i=n.one("select[name=x\\["+t+"\\]]")).set("value",""+l[t]),i.set("disabled",!1)},failure:function(){window.alert(M.util.get_string("ajaxerror","availability_date"))}}})):n.setData("time",this.defaultTime),e.d!==undefined&&n.one("select[name=direction]").set("value",e.d),M.availability_date.form.addedEvents||(M.availability_date.form.addedEvents=!0,(a=o.one(".availability-field")).delegate("change",function(){M.core_availability.form.update()},".availability_date select[name=direction]"),a.delegate("change",function(){M.availability_date.form.updateTime(this.ancestor("span.availability_date"))},".availability_date select:not([name=direction])")),n.one("a[href=#]")&&(M.form.dateselector.init_single_date_selector(n),t=n.one("select[name=x\\[year\\]]"),i=t.set,t.set=function(e,a){i.call(t,e,a),"selectedIndex"===e&&setTimeout(function(){M.availability_date.form.updateTime(n)},0)}),n},M.availability_date.form.updateTime=function(t){var e=M.cfg.wwwroot+"/availability/condition/date/ajax.php?action=totime&year="+t.one("select[name=x\\[year\\]]").get("value")+"&month="+t.one("select[name=x\\[month\\]]").get("value")+"&day="+t.one("select[name=x\\[day\\]]").get("value")+"&hour="+t.one("select[name=x\\[hour\\]]").get("value")+"&minute="+t.one("select[name=x\\[minute\\]]").get("value");o.io(e,{on:{success:function(e,a){t.setData("time",a.responseText),M.core_availability.form.update()},failure:function(){window.alert(M.util.get_string("ajaxerror","availability_date"))}}})},M.availability_date.form.fillValue=function(e,a){e.d=a.one("select[name=direction]").get("value"),e.t=parseInt(a.getData("time"),10)},M.availability_date.form.convertTreeDateValue=function(e,a,t){var i=!1;return e.forEach(function(e){i||("date"===e.type?e.t!==parseInt(t.getData("time"),10)||t.one("select[name=direction]").get("value")!=e.d?a.push(e):i=!0:e.type===undefined&&M.availability_date.form.convertTreeDateValue(e.c,a,t))}),a},M.availability_date.form.checkConditionDate=function(e){var a,t,i,l=!1;return"&"===M.core_availability.form.rootList.getValue().op?(a=M.core_availability.form.rootList.getValue().c,a=M.availability_date.form.convertTreeDateValue(a,[],e),t=e.one("select[name=direction]").get("value"),i=parseInt(e.getData("time"),10),a.forEach(function(e){return"<"===e.d?">="===t&&i>=e.t&&(l=!0):"<"===t&&i<=e.t&&(l=!0),l})):e.one("div > .badge-warning")&&e.one("div > .badge-warning").remove(),l},M.availability_date.form.fillErrors=function(e,a){M.availability_date.form.checkConditionDate(a)&&e.push("availability_date:error_dateconflict")}},"@VERSION@",{requires:["base","node","event","io","powereduc-core_availability-form"]});