YUI.add("powereduc-tool_monitor-dropdown",function(o,e){function t(){t.superclass.constructor.apply(this,arguments)}var n="#id_plugin",i="#id_eventname",s="option";o.extend(t,o.Base,{plugin:null,eventname:null,initializer:function(){this.plugin=o.one(n),this.eventname=o.one(i);var e=this.eventname.get("value");this.updateEventsList(),this.updateSelection(e),this.plugin.on("change",this.updateEventsList,this)},updateEventsList:function(){var n,e,t=this.plugin.get("value"),i="\\"+t+"\\";this.eventname.all(s).remove(!0),t=this.get("eventlist"),(e=o.Node.create('<option value="">'+t[""]+"</option>")).set("selected","selected"),this.eventname.appendChild(e),o.Object.each(t,function(e,t){t.substring(0,i.length)===i&&(n=o.Node.create('<option value="'+t+'">'+e+"</option>"),this.eventname.appendChild(n))},this)},updateSelection:function(t){this.eventname.get("options").each(function(e){e.get("value")===t&&e.set("selected","selected")},this)}},{NAME:"dropDown",ATTRS:{eventlist:null}}),o.namespace("M.tool_monitor.DropDown").init=function(e){return new t(e)}},"@VERSION@",{requires:["base","event","node"]});