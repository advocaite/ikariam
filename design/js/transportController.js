// JavaScript Document

function transportController(freeTrans, capacity, displayElem, defaultLoad) {
	var defload=0;
	if (typeof defaultLoad != "undefined") {
		defload=defaultLoad;
		} 
	var that = this;
	var display=displayElem;
    var registeredSliders= new Array();
	var disableChanged = false;
	var totalCapacity=freeTrans*capacity;;
	var usedCapacity=defload;
	
	this.getMaxLoadable = function(s) {
		return Math.min(s.maxValue, (totalCapacity-(usedCapacity-s.actualValue)));
    };
		
	this.registerSlider = function(s) {
		registeredSliders.push(s);
		s.adjustSliderRange(that.getMaxLoadable(s)); 
		usedCapacity+= s.actualValue;
		s.subscribe("valueChange", that.sliderChanged);
		s.subscribe("valueChange", that.sliderEnd);
    };
	this.sliderChanged =function() {
		usedCapacity = defload; 
		for(i=0; i<registeredSliders.length; i++) {
			usedCapacity+=registeredSliders[i].actualValue;
		}
		display.value = Math.ceil( usedCapacity / capacity);
    };
	this.sliderEnd =function() {
		if (disableChanged==false) {
			disableChanged = true;
			for(i=0; i<registeredSliders.length; i++) {
				registeredSliders[i].adjustSliderRange(that.getMaxLoadable(registeredSliders[i])); 
			}
			disableChanged = false; 
		}
    };
}

function upkeepController(upkeepMultiplier, sumMultiplier, displayUpkeepElem, displaySumElem) {
	var that               = this;
	var displayUpkeep      = Dom.get(displayUpkeepElem);
	var displaySum         = Dom.get(displaySumElem);
    var registeredSliders  = new Array();
	var totalUpkeep        = 0;
	var totalCosts         = 0;
	this.sumMultiplier     = sumMultiplier;
	this.upkeepMultiplier  = upkeepMultiplier;
	
	this.getMaxLoadable    = function(s) {
		return Math.min(s.maxValue, (totalCapacity-(usedCapacity-s.actualValue)));
    };
		
	this.registerSlider    = function(s) {
		registeredSliders.push(s);
		s.subscribe("valueChange", that.sliderChanged, that, true);
    };
    
	this.sliderChanged     = function() {
		totalUpkeep   = 0;
		totalCosts    = 0;
		
		for(i=0; i<registeredSliders.length; i++) {
			totalUpkeep  += Math.floor(registeredSliders[i].actualValue * registeredSliders[i].upkeep);
			totalCosts   += Math.floor(registeredSliders[i].actualValue * (registeredSliders[i].upkeep * this.upkeepMultiplier));
		}
		displayUpkeep.innerHTML   = totalUpkeep;
		displaySum.innerHTML      = totalCosts;
    };
}



function armyTransportController(freeTrans, 
								 capacity, 
								 displayElem, 
								 extraTransporterElem, 
								 sumTransporterElem, 
								 totalFreightElem,
								 transportJourneyTime, 
								 journeyTimeElem, 
								 returnTimeElem,
								 upkeepPerHourElem,
								 estimatedTotalCostsElem,
								 displayWeightElem,
								 missionTimeParam,
								 sendButtonElem,
								 defaultLoad) {
	
	
	
	
	var defload=0;
	if (typeof defaultLoad != "undefined") {
		defload=defaultLoad;
		} 
	var that = this;
	var display=displayElem;
  
    var registeredSliders= new Array();
	var disableChanged = false;
	 
	var totalCapacity=freeTrans*capacity;
	
	var usedCapacity=defload;
	var extraTransporter= extraTransporterElem; 
	var sumTransporterValue = 0;
	
	if(extraTransporterElem != null) var sumTransporterValue = extraTransporter.value;
	var sumTransporter = sumTransporterElem;
		
	var totalFreight = totalFreightElem;
	var transportJourneyTimeValue = transportJourneyTime;
	var journeyTime = journeyTimeElem;
	var returnTime = returnTimeElem; 
	var displayUpkeep = upkeepPerHourElem;
	var displaySum = estimatedTotalCostsElem;
	var displayWeight = displayWeightElem;
	var missionTime = 0;
	if (typeof missionTimeParam != "undefined") {
		missionTime = missionTimeParam;
	}
	var sendButton = sendButtonElem;
	
	
	
	this.getMaxLoadable = function(s) {
	    //alert(Math.min(s.maxValue, Math.floor((totalCapacity - usedCapacity)/(s.weight)) ));
	    if(s.weight == 0) {
	    	return s.maxValue;
	    };
		return Math.min(s.maxValue, Math.floor((totalCapacity - (usedCapacity-s.actualValue*s.weight) )/(s.weight)) );
    };
		
	this.registerSlider = function(s) {
		
		registeredSliders.push(s);
		s.adjustSliderRange(that.getMaxLoadable(s)); 
		usedCapacity+= s.actualValue* s.weight;
		s.subscribe("valueChange", that.sliderChanged);
		s.subscribe("valueChange", that.sliderEnd);
		
    };
	
	this.sliderChanged =function() {
		
		
		
		usedCapacity = 0; 
		tempJourneyTime = 0;
		totalUpkeep   = 0;
		totalCosts    = 0;
		var totalWeight   = 0;
		
		
		
		for(i=0; i<registeredSliders.length; i++) {
			
			usedCapacity+= (registeredSliders[i].actualValue * registeredSliders[i].weight);
			if(registeredSliders[i].unitJourneyTime > tempJourneyTime && registeredSliders[i].actualValue > 0) 
				tempJourneyTime = registeredSliders[i].unitJourneyTime;
			totalUpkeep  += Math.floor(registeredSliders[i].actualValue * registeredSliders[i].upkeep);
			totalWeight  += Math.floor(registeredSliders[i].actualValue * registeredSliders[i].weight);
		}
		
		
		tempUnitTime = tempJourneyTime;
		
		if(display != null) display.innerHTML = Math.ceil( usedCapacity / capacity);
		tempExtraTransporter = 0;
		if(extraTransporter != null) tempExtraTransporter = parseInt(extraTransporter.value); 
		sumTransporterValue = Math.ceil( usedCapacity / capacity) + tempExtraTransporter;
		if(sumTransporterValue > freeTrans) {
			if(extraTransporter != null) 
				extraTransporter.value = Math.min(extraTransporter.value, freeTrans-Math.ceil( usedCapacity / capacity));
			sumTransporterValue = freeTrans;
		}
		
		
		
		if(sumTransporterValue > 0 && transportJourneyTimeValue > tempJourneyTime) tempJourneyTime = transportJourneyTimeValue;
		if(sumTransporter != null) sumTransporter.innerHTML = sumTransporterValue;
		if(totalFreight != null) totalFreight.innerHTML = sumTransporterValue*capacity;
		if(journeyTime != null) journeyTime.innerHTML = (tempJourneyTime > 0) ? getTimestring(tempJourneyTime*1000, 3) : '-';
		if(returnTime != null) returnTime.innerHTML = (tempJourneyTime > 0) ? getTimestring(tempJourneyTime*2000, 3) : '-';
		if(displayUpkeep != null) displayUpkeep.innerHTML   = (totalUpkeep);
		if(displaySum != null) displaySum.innerHTML      = Math.ceil((totalUpkeep/3600)*(tempJourneyTime+missionTime));
		if(displayWeight != null) displayWeight.innerHTML   = totalWeight;
		
		
		
		if(sendButton != null) {
			if(sumTransporterValue > 0 && totalUpkeep > 0){
				sendButton.className = jsClassOk;
				sendButton.title = textOk;
			} else if(sumTransporterValue <= 0  && totalUpkeep > 0) {
				sendButton.className = jsClassNoTransporters;
				sendButton.title = textNoTransporters;
			} else {
				sendButton.className =jsClassNoTroops;
				sendButton.title = textNoTroops;
			}
		}
		
		
		
    };
	this.sliderEnd =function() {
		if (disableChanged==false) {
			disableChanged = true;
			for(i=0; i<registeredSliders.length; i++) {
				registeredSliders[i].adjustSliderRange(that.getMaxLoadable(registeredSliders[i])); 
			}
			disableChanged = false; 
		}
    };
    
    this.missionTimeChanged = function(newTime) {
    	missionTime = Number(newTime);
    	this.sliderChanged();
    };
}




function weightController(upkeepMultiplier, sumMultiplier, displayUpkeepElem, displaySumElem, displayWeightElem) {
	var that               = this;
	var displayUpkeep      = Dom.get(displayUpkeepElem);
	var displaySum         = Dom.get(displaySumElem);
	var displayWeight	   = Dom.get(displayWeightElem);
    var registeredSliders  = new Array();
	var totalUpkeep        = 0;
	var totalCosts         = 0;
	var totalWeight		   = 0;
	this.sumMultiplier     = sumMultiplier;
	this.upkeepMultiplier  = upkeepMultiplier;
	
	this.getMaxLoadable    = function(s) {
		return Math.min(s.maxValue, (totalCapacity-(usedCapacity-s.actualValue)));
    };
		
	this.registerSlider    = function(s) {
		registeredSliders.push(s);
		s.subscribe("valueChange", that.sliderChanged, that, true);
    };
    
	this.sliderChanged     = function() {
		totalUpkeep   = 0;
		totalCosts    = 0;
		totalWeight   = 0;
		
		for(i=0; i<registeredSliders.length; i++) {
			totalUpkeep  += Math.floor(registeredSliders[i].actualValue * registeredSliders[i].upkeep);
			totalCosts   += Math.floor(registeredSliders[i].actualValue * (registeredSliders[i].upkeep * this.upkeepMultiplier));
			totalWeight  += Math.floor(registeredSliders[i].actualValue * registeredSliders[i].weight);
		}
		
		
		displayUpkeep.innerHTML   = totalUpkeep;
		//displaySum.innerHTML      = totalCosts;
		//alert(totalWeight);
		displayWeight.innerHTML   = totalWeight;
		
    };
}