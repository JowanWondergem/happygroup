(function($){var increments=0;function addDescribedBy(elem,id){var describedby=(elem.attr("aria-describedby")||"").split(/\s+/);describedby.push(id);elem
.data("ui-tooltip-id",id)
.attr("aria-describedby",$.trim(describedby.join(" ")));}
function removeDescribedBy(elem){var id=elem.data("ui-tooltip-id"),describedby=(elem.attr("aria-describedby")||"").split(/\s+/),index=$.inArray(id,describedby);if(index!==-1){describedby.splice(index,1);}
elem.removeData("ui-tooltip-id");describedby=$.trim(describedby.join(" "));if(describedby){elem.attr("aria-describedby",describedby);}else{elem.removeAttr("aria-describedby");}}
$.widget("ui.tooltip",{version:"@VERSION",options:{content:function(){return $(this).attr("title");},hide:true,items:"[title]",position:{my:"left+15 center",at:"right center",collision:"flipfit flipfit"},show:true,tooltipClass:null,track:false,close:null,open:null},_create:function(){this._on({mouseover:"open",focusin:"open"});this.tooltips={};},_setOption:function(key,value){var that=this;if(key==="disabled"){this[value?"_disable":"_enable"]();this.options[key]=value;return;}
this._super(key,value);if(key==="content"){$.each(this.tooltips,function(id,element){that._updateContent(element);});}},_disable:function(){var that=this;$.each(this.tooltips,function(id,element){var event=$.Event("blur");event.target=event.currentTarget=element[0];that.close(event,true);});this.element.find(this.options.items).andSelf().each(function(){var element=$(this);if(element.is("[title]")){element
.data("ui-tooltip-title",element.attr("title"))
.attr("title","");}});},_enable:function(){this.element.find(this.options.items).andSelf().each(function(){var element=$(this);if(element.data("ui-tooltip-title")){element.attr("title",element.data("ui-tooltip-title"));}});},open:function(event){var target=$(event?event.target:this.element)
.closest(this.options.items);if(!target.length){return;}
if(this.options.track&&target.data("ui-tooltip-id")){this._find(target).position($.extend({of:target},this.options.position));return;}
if(target.attr("title")){target.data("ui-tooltip-title",target.attr("title"));}
target.data("tooltip-open",true);this._updateContent(target,event);},_updateContent:function(target,event){var content,contentOption=this.options.content,that=this;if(typeof contentOption==="string"){return this._open(event,target,contentOption);}
content=contentOption.call(target[0],function(response){if(!target.data("tooltip-open")){return;}
that._delay(function(){this._open(event,target,response);});});if(content){this._open(event,target,content);}},_open:function(event,target,content){var tooltip,positionOption;if(!content){return;}
tooltip=this._find(target);if(tooltip.length){tooltip.find(".ui-tooltip-content").html(content);return;}
if(target.is("[title]")){if(event&&event.type==="mouseover"){target.attr("title","");}else{target.removeAttr("title");}}
tooltip=this._tooltip(target);addDescribedBy(target,tooltip.attr("id"));tooltip.find(".ui-tooltip-content").html(content);function position(event){positionOption.of=event;tooltip.position(positionOption);}
if(this.options.track&&/^mouse/.test(event.originalEvent.type)){positionOption=$.extend({},this.options.position);this._on(this.document,{mousemove:position});position(event);}else{tooltip.position($.extend({of:target},this.options.position));}
tooltip.hide();this._show(tooltip,this.options.show);this._trigger("open",event,{tooltip:tooltip});this._on(target,{mouseleave:"close",focusout:"close",keyup:function(event){if(event.keyCode===$.ui.keyCode.ESCAPE){var fakeEvent=$.Event(event);fakeEvent.currentTarget =target[0];this.close(fakeEvent,true);}}});},close:function(event,force){var that=this,target=$(event?event.currentTarget:this.element),tooltip=this._find(target);if(this.closing){return;}
if(!force&&event&&event.type!=="focusout"&&this.document[0].activeElement===target[0]){return;}
if(target.data("ui-tooltip-title")){target.attr("title",target.data("ui-tooltip-title"));}
removeDescribedBy(target);tooltip.stop(true);this._hide(tooltip,this.options.hide,function(){$(this).remove();delete that.tooltips[this.id];});target.removeData("tooltip-open");this._off(target,"mouseleave focusout keyup");this._off(this.document,"mousemove");this.closing=true;this._trigger("close",event,{tooltip:tooltip});this.closing=false;},_tooltip:function(element){var id="ui-tooltip-"+increments++,tooltip=$("<div>")
.attr({id:id,role:"tooltip"})
.addClass("ui-tooltip ui-widget ui-corner-all ui-widget-content "+(this.options.tooltipClass||""));$("<div>")
.addClass("ui-tooltip-content")
.appendTo(tooltip);tooltip.appendTo(this.document[0].body);if($.fn.bgiframe){tooltip.bgiframe();}
this.tooltips[id]=element;return tooltip;},_find:function(target){var id=target.data("ui-tooltip-id");return id?$("#"+id):$();},_destroy:function(){$.each(this.tooltips,function(id){$("#"+id).remove();});}});}(jQuery));