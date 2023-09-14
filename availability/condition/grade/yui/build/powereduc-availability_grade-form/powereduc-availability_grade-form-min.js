YUI.add("powereduc-availability_grade-form",function(r,a){M.availability_grade=M.availability_grade||{},M.availability_grade.form=r.Object(M.core_availability.plugin),M.availability_grade.form.grades=null,M.availability_grade.form.initInner=function(a){this.grades=a,this.nodesSoFar=0},M.availability_grade.form.getNode=function(a){var e,i,l,t,n;for(this.nodesSoFar++,e='<label class="form-group"><span class="pr-3">'+M.util.get_string("title","availability_grade")+'</span> <span class="availability-group"><select name="id" class="custom-select"><option value="0">'+M.util.get_string("choosedots","powereduc")+"</option>",i=0;i<this.grades.length;i++)e+='<option value="'+(l=this.grades[i]).id+'">'+l.name+"</option>";return e+='</select></span></label> <br><span class="availability-group form-group"><label><input type="checkbox" class="form-check-input mx-1" name="min"/>'+M.util.get_string("option_min","availability_grade")+'</label> <label><span class="accesshide">'+M.util.get_string("label_min","availability_grade")+'</span><input type="text" class="form-control mx-1" name="minval" title="'+M.util.get_string("label_min","availability_grade")+'"/></label>%</span><br><span class="availability-group form-group"><label><input type="checkbox" class="form-check-input mx-1" name="max"/>'+M.util.get_string("option_max","availability_grade")+'</label> <label><span class="accesshide">'+M.util.get_string("label_max","availability_grade")+'</span><input type="text" class="form-control mx-1" name="maxval" title="'+M.util.get_string("label_max","availability_grade")+'"/></label>%</span>',t=r.Node.create('<div class="d-inline-block form-inline">'+e+"</div>"),a.id!==undefined&&t.one("select[name=id] > option[value="+a.id+"]")&&t.one("select[name=id]").set("value",""+a.id),a.min!==undefined&&(t.one("input[name=min]").set("checked",!0),t.one("input[name=minval]").set("value",a.min)),a.max!==undefined&&(t.one("input[name=max]").set("checked",!0),t.one("input[name=maxval]").set("value",a.max)),n=function(a,e){var i=a.ancestor("label").next("label").one("input"),a=a.get("checked");return i.set("disabled",!a),e&&a&&i.focus(),a},t.all("input[type=checkbox]").each(n),M.availability_grade.form.addedEvents||(M.availability_grade.form.addedEvents=!0,(a=r.one(".availability-field")).delegate("change",function(){M.core_availability.form.update()},".availability_grade select[name=id]"),a.delegate("click",function(){n(this,!0),M.core_availability.form.update()},".availability_grade input[type=checkbox]"),a.delegate("valuechange",function(){M.core_availability.form.update()},".availability_grade input[type=text]")),t},M.availability_grade.form.fillValue=function(a,e){a.id=parseInt(e.one("select[name=id]").get("value"),10),e.one("input[name=min]").get("checked")&&(a.min=this.getValue("minval",e)),e.one("input[name=max]").get("checked")&&(a.max=this.getValue("maxval",e))},M.availability_grade.form.getValue=function(a,e){a=e.one("input[name="+a+"]").get("value");return!/^[0-9]+([.,][0-9]+)?$/.test(a)||(e=parseFloat(a.replace(",",".")))<0||100<e?a:e},M.availability_grade.form.fillErrors=function(a,e){var i={};this.fillValue(i,e),0===i.id&&a.push("availability_grade:error_selectgradeid"),i.min!==undefined&&"string"==typeof i.min||i.max!==undefined&&"string"==typeof i.max?a.push("availability_grade:error_invalidnumber"):i.min!==undefined&&i.max!==undefined&&i.max<=i.min&&a.push("availability_grade:error_backwardrange")}},"@VERSION@",{requires:["base","node","event","powereduc-core_availability-form"]});