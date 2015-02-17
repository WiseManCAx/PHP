/**
 * jsOpenSliderbar 1.0
 * (c) by Mathias Krebs, mathias.krebs(at)gmail.com, 2008
 * 170grad.com/software
 * license: LGPL
 */

// Drag drop functions *******************************************************/
dd_is_active=0; dd_obj=0; dd_mobj=0
function lib_dd()
{
  dd_is_active=1
  if(bw.ns4){
    document.captureEvents(Event.MOUSEMOVE|Event.MOUSEDOWN|Event.MOUSEUP)
  }
  document.onmousemove=lib_dd_move;
  document.onmousedown=lib_dd_down
  document.onmouseup=lib_dd_up
}

//Drag drop event functions
function lib_dd_over(obj){dd_mobj=obj}
function lib_dd_up(e){dd_obj=0}
function lib_dd_down(e){ //Mousedown
  if(dd_mobj){
    x=(bw.ns4 || bw.ns6)?e.pageX:event.x||event.clientX
    y=(bw.ns4 || bw.ns6)?e.pageY:event.y||event.clientY
    dd_obj=dd_mobj
    dd_obj.clX=x-dd_obj.x; 
    dd_obj.clY=y-dd_obj.y
  }
}

function lib_dd_move(e,y,rresize)
{
  x=(bw.ns4 || bw.ns6)?e.pageX:event.x||event.clientX
  y=(bw.ns4 || bw.ns6)?e.pageY:event.y||event.clientY
  if(dd_obj)
  {
    nx=x-dd_obj.clX;
    ny=y-dd_obj.clY;
    if(dd_obj.ddobj)
    {
      dd_obj.ddobj.moveIt(nx,ny,1,1);
    }
    else
    {
      dd_obj.moveIt(nx,ny,1,1);
    }
  }
  if(!bw.ns4) return false      
}

/* Html drawing functions. ***************************************************/
function drawSliderHtml(fieldIDs,aSliderPanel,checkboxIDs,aCheckboxPanel,labels,aObjectName,sliderIDs,xSize)
{
   var checkboxes = "", areas = "", sliders = "";
   
   for (var i=0;i<labels.length;i++)
   {
      checkboxes += "<tr>";
      checkboxes += "<td>" + labels[i] + "</td>";
      checkboxes += "<td><input name='" + checkboxIDs[i] + "' onclick='" + aObjectName + ".updateCheckboxes();' type='checkbox'></td>";
      checkboxes += "</tr>";
      
      areas += "<div class='colorField' id='" + fieldIDs[i] + "' style='top:4px;height:15px;width:0px;left:0px;'>";
      areas += labels[i];
      areas += "</div>";
   }
   
   for (var i=0;i<sliderIDs.length;i++)
   {
      sliders += "<div style='top:1px;left:" + (i*xSize) + "px;'  class='slider' id='" + sliderIDs[i] + "'></div>";
   }
   
   areas += sliders;
   
   checkboxes = "<table>" + checkboxes + "</table>";
   document.getElementById(aCheckboxPanel).innerHTML = checkboxes;
   document.getElementById(aSliderPanel).innerHTML   = areas;
}

/* slideBar object ************************************************************/

// Constructor of the slidebar.
// Parameter:
// aObjectName    -> The string representation of the object name of the current object.
// aCheckboxPanel -> Id of the div to put the checkboxes into.
// aSliderPanel   -> Id of the div to put the sliderbar into.
// aFormId        -> Name of the field to store the comma seperated result list into.
// aFormName      -> Name of the form the element is placed in.
// x              -> Left position of the slidebar.
// y              -> Top position of the slidebar.
// l              -> Length of the slidebar.
// xSize          -> x size of the slider.
// ySize          -> y size of the slider.
function slideBar(aObjectName,aCheckboxPanel,aSliderPanel,aFormId,aFormName,labels,x,y,l,xSize,ySize)
{
   // Compose the unique ids of the sliders.
   sliderIDs = Array();
   for (var i=0;i<labels.length-1;i++)
   {
      sliderIDs[i] = aObjectName + "_slider_" + i;
   }
   // Compose the unique ids of the checkboxes.
   checkboxIDs = Array();
   for (var i=0;i<labels.length;i++)
   {
      checkboxIDs[i] = aObjectName + "_checkbox_" + i;
   }
   // Compose the unique ids of the slide areas.
   fieldIDs = Array();
   for (var i=0;i<labels.length;i++)
   {
      fieldIDs[i] = aObjectName + "_area_" + i;
   }
   
   drawSliderHtml(fieldIDs,aSliderPanel,checkboxIDs,aCheckboxPanel,labels,aObjectName,sliderIDs,xSize);
   
   this.sliderX = xSize;
   this.sliderY = ySize;
   this.xLoc = x;
   this.yLoc = y;
   
   this.colFields   = [];
   this.sliders     = [];
   this.checkboxes  = checkboxIDs;
   this.unused      = [];
   
   this.formId   = aFormId;
   this.formName = aFormName;
   
   this.numOfSliders = sliderIDs.length;
   this.size = l;
   this.freeSize = l - this.numOfSliders*xSize;
   this.widths = [];
   
   if (parent.document.forms[this.formName].elements[this.formId].value != "")
   {
      var aArray= parent.document.forms[this.formName].elements[this.formId].value.split(";",fieldIDs.length);
      for (i=0; i<this.numOfSliders+1; i++)
      {
         this.widths[i] = parseFloat(aArray[i]);
         if (this.widths[i] > 0)
         {
            this.unused[i] = 0;
         }
         else
         {
            this.unused[i] = 1;
         }
      }
   }
   else
   { 
      for (i=0; i<this.numOfSliders+1; i++)
      {
         this.unused[i] = 1;
         this.widths[i] = 0;
      }
   }
   
   var aL = this.xLoc;
   for (i=0; i<this.numOfSliders; i++)
   {
      aL = aL + Math.round(this.widths[i]*this.freeSize);
      this.sliders[i] = new slider(sliderIDs[i],aL,y+1,i,this);
      aL = aL + xSize;
   }
   
   for (i=0; i<this.numOfSliders; i++)
   {
      this.setLimits(this.sliders[i]);
   }
   
   for (i=0;i<fieldIDs.length;i++)
   {
      this.colFields[i] = new colorField(fieldIDs[i],y,ySize);
   }
      
   return this;
}

slideBar.prototype.initCheckboxes = function()
{
   this.automode = 1;
   for (i=0; i<this.numOfSliders+1; i++)
   {
      if (this.unused[i] == 0)
      {
         parent.document.forms[this.formName].elements[this.checkboxes[i]].click();
      }
   }
   this.automode = 0;
}

slideBar.prototype.updateCheckboxes = function()
{  
   if (this.automode == 0)
   {  
      var j = 0;
      
      for (i=0; i<this.numOfSliders+1; i++)
      {
         if (parent.document.forms[this.formName].elements[this.checkboxes[i]].checked)
         {
            this.unused[i] = 0;
            j++;
         }
         else
         {
            this.unused[i] = 1;
         }
      }
                  
      var aPropo = 1.0/j;    
   
      for (i=0; i<this.numOfSliders+1; i++)
      {      
         if (parent.document.forms[this.formName].elements[this.checkboxes[i]].checked)
         {
            this.widths[i] = aPropo;
         }
         else
         {
            this.widths[i] = 0;
         }
      }
         
      var aL = this.xLoc;
      
      for (i=0; i<this.numOfSliders; i++)
      {  
         aL = aL + Math.round(this.widths[i]*this.freeSize);
         this.sliders[i].jump(aL,this.yLoc+1);
         aL = aL + this.sliderX;
      }
   
      for (i=0; i<this.numOfSliders; i++)
      {
         this.setLimits(this.sliders[i]);
      }
   
      this.redrawAll();
   }
}

slideBar.prototype.setLimits = function(aSlider)
{
   if (aSlider.id < this.sliders.length-1)
   {
      this.sliders[aSlider.id+1].setLeftLimit(aSlider.x);
   }
   if (aSlider.id > 0)
   {
      this.sliders[aSlider.id-1].setRightLimit(aSlider.x);
   }
}

slideBar.prototype.getWidth = function(aID)
{  
   if (aID == 0)
   {
      return this.sliders[0].x - this.xLoc;
   }
   else if (aID == this.numOfSliders)
   {
      aVal = Math.max(0,this.xLoc + this.size - this.sliders[aID-1].x - this.sliderX);
      return (aVal);
   }
   else
   {
      return (this.sliders[aID].x - this.sliders[aID-1].x - this.sliderX);
   }
}


slideBar.prototype.getProportions = function(aSlider)
{
   for(i=0; i<this.numOfSliders+1; i++)
   {
      this.widths[i] = this.getWidth(i)/this.freeSize;
   }
}

// redraw the scene
slideBar.prototype.redrawAll = function()
{ 
   var aL = this.xLoc;
   var aString = "";
   var aSum = 0;
   
   for(i=0; i<this.numOfSliders+1; i++)
   {
      aSum = aSum + this.unused[i];
      aWidth = this.getWidth(i);
      this.colFields[i].evnt.innerHTML = "<b>" + Math.round(this.widths[i]*100) + "%</b> " + this.colFields[i].caption;
      this.colFields[i].css.width = aWidth;
      this.colFields[i].css.left  = aL;
      aL = aL + aWidth + this.sliderX;
      aString = aString + this.widths[i] + ";";
   }
   
   parent.document.forms[this.formName].elements[this.formId].value = aString;
   
   // check if at least one element is selected
   if (this.numOfSliders-aSum+1 > 0)
   {
      this.colFields[this.numOfSliders].css.visibility = "visible";
   }
   else
   {
      this.colFields[this.numOfSliders].css.visibility = "hidden";
   }
}

/* colorField object *********************************************************/
function colorField(obj,y,ySize)
{
  this.evnt=bw.dom? document.getElementById(obj):
    bw.ie4?document.all[obj]:bw.ns4?eval(nest+"document.layers." +obj):0;	
  
  this.caption = this.evnt.innerHTML;
      
  this.css = bw.dom||bw.ie4?this.evnt.style:this.evnt;
  this.css.top    = y+4;
  this.css.height = ySize;
  return this;
}

/* slider object *************************************************************/
function slider(obj,xI,yI,sliderID,suberObject)
{
  this.evnt=bw.dom? document.getElementById(obj):
  bw.ie4?document.all[obj]:bw.ns4?eval(nest+"document.layers." +obj):0;
  
  this.css=bw.dom||bw.ie4?this.evnt.style:this.evnt; 
  this.superObj = suberObject;
  
  this.jump(xI,yI);

  this.x0 = this.superObj.xLoc;
  this.x1 = this.superObj.xLoc + this.superObj.size - this.superObj.sliderX;
   
  this.id = sliderID;
  
  this.obj = obj + "Object";
  eval(this.obj + "=this");
  
  this.dragdrop();
  return this;
}

slider.prototype.setLeftLimit = function(aX)
{
   this.x0 = aX + this.superObj.sliderX;
}

slider.prototype.setRightLimit = function(aX)
{
   this.x1 = aX - this.superObj.sliderX;
}

// moving object whitout constraints
slider.prototype.jump = function(x,y)
{
  this.y=y;
  this.css.top=y;
  this.x=x;
  this.css.left=x;
}

slider.prototype.moveLeftNeighbour = function(x,y)
{
   if (this.id > 0)
   {
      targetX = x-this.superObj.sliderX;      
      if (targetX > this.superObj.sliders[this.id-1].x)
      {
         return true;
      }
      else
      {
         return this.superObj.sliders[this.id-1].moveIt(targetX,y,1,0);
      }
   }
   return true;
}

slider.prototype.moveRightNeighbour = function(x,y)
{
   if (this.id < (this.superObj.sliders.length - 1))
   {
      targetX = x+this.superObj.sliderX;
      if (targetX < this.superObj.sliders[this.id+1].x)
      {
         return true;
      }
      else
      {
         return this.superObj.sliders[this.id+1].moveIt(targetX,y,1,0);
      }
   }
   return true;
}

slider.prototype.askRightNeighbour = function(x,y)
{  
   if (this.id+1 < this.superObj.numOfSliders)
   {
      if (this.superObj.unused[this.id + 1] == 1)
      {
         targetX = x + this.superObj.sliderX;      
         return this.superObj.sliders[this.id+1].moveIt(targetX,y,0,1);
      }
      else
      {
         return true;
      }
   }
   else if (this.superObj.unused[this.id+1] == 1)
   {
      return false;
   }
   else
   {
      return true;
   }
}

slider.prototype.askLeftNeighbour = function(x,y)
{
   if (this.id > 0)
   {
      if (this.superObj.unused[this.id] == 1)
      {
         targetX = x - this.superObj.sliderX;      
         return this.superObj.sliders[this.id-1].moveIt(targetX,y,0,1);
      }
      else
      {
         return true;
      }
   }
   else if (this.superObj.unused[this.id] == 1)
   {
      return false;
   }
   else
   {
      return true;
   }
}

slider.prototype.checkPushLeft = function(x)
{
   if (this.id > 0)
   {
      targetX = x-this.superObj.sliderX;
      if (targetX <= this.superObj.sliders[this.id-1].x)
      {
         return this.superObj.sliders[this.id-1].checkPushLeft(targetX);
      }
      return true;
   }
   else
   {
      if (x > 0)
      {
         return true;
      }
      return false;
   }
}

slider.prototype.checkPushRight = function(x,y)
{
   if (this.id < (this.superObj.sliders.length - 1))
   {
      targetX = x+this.superObj.sliderX;
      if (targetX >= this.superObj.sliders[this.id+1].x)
      {
         return this.superObj.sliders[this.id+1].checkPushRight(targetX);
      }
      return true;
   }
   else
   {
      if (x < (this.superObj.size-this.superObj.sliderX))
      {
         return true;
      }
      return false;
   }
}

slider.prototype.pushLeft = function(x)
{
   this.x = x;
   this.css.left = this.x;
   if (this.id > 0)
   {
      targetX = x-this.superObj.sliderX;      
      if (targetX <= this.superObj.sliders[this.id-1].x)
      {
         this.superObj.sliders[this.id-1].pushLeft(targetX);
      }
   }
}

slider.prototype.pushRight = function(x)
{
   this.x = x;
   this.css.left = this.x;
   if (this.id < (this.superObj.sliders.length - 1))
   {
      targetX = x+this.superObj.sliderX;      
      if (targetX >= this.superObj.sliders[this.id+1].x)
      {
         this.superObj.sliders[this.id+1].pushRight(targetX);
      }
   }
}

slider.prototype.checkPullRight = function(x)
{
   if (this.id+1 < this.superObj.numOfSliders)
   {
      if (this.superObj.unused[this.id + 1] == 1)
      {
         targetX = x + this.superObj.sliderX;      
         return this.superObj.sliders[this.id+1].checkPullRight(targetX);
      }
      return true;
   }
   else if (this.superObj.unused[this.id+1] == 1)
   {
      return false;
   }
   return true;
}

slider.prototype.pullRight = function(x)
{
   if (this.id+1 < this.superObj.numOfSliders)
   {
      if (this.superObj.unused[this.id + 1] == 1)
      {
         targetX = x + this.superObj.sliderX;
         this.superObj.sliders[this.id+1].x = targetX;
         this.superObj.sliders[this.id+1].css.left = targetX;
         this.superObj.sliders[this.id+1].pullRight(targetX);
      }
   }
}

slider.prototype.checkPullLeft = function(x)
{
   if (this.id > 0)
   {
      if (this.superObj.unused[this.id] == 1)
      {
         targetX = x - this.superObj.sliderX;
         return this.superObj.sliders[this.id-1].checkPullLeft(targetX);
      }
      return true;
   }
   else if (this.superObj.unused[this.id] == 1)
   {
      return false;
   }
   return true;
}

slider.prototype.pullLeft = function(x)
{
   if (this.id > 0)
   {
      if (this.superObj.unused[this.id] == 1)
      {
         targetX = x - this.superObj.sliderX;
         this.superObj.sliders[this.id-1].x = targetX;
         this.superObj.sliders[this.id-1].css.left = targetX;
         this.superObj.sliders[this.id-1].pullLeft(targetX);
      }
   }
}

// moving object
slider.prototype.moveIt = function(newX,y,push,pull)
{ 
  if (newX < 0 || (newX > (this.superObj.size-this.superObj.sliderX)))
  {
    return false;
  }
  else
  {
    if (newX < this.x)
    {
      if (this.checkPushLeft(newX) && this.checkPullRight(newX))
      {
         this.pushLeft(newX);
         this.pullRight(newX);
      }
    }
    else
    {
      if (this.checkPushRight(newX) && this.checkPullLeft(newX))
      {
         this.pushRight(newX);
         this.pullLeft(newX);
      }
    }

    this.superObj.getProportions(this);
    this.superObj.redrawAll();    
  }
}

slider.prototype.dragdrop = function(obj)
{
  if(!dd_is_active) lib_dd()
  this.evnt.onmouseover=new Function("lib_dd_over("+this.obj+")")
  this.evnt.onmouseout=new Function("dd_mobj=0")
  if(obj) this.ddobj=obj
}