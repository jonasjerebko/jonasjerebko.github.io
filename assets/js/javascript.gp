function geoplugin_request() { return '104.236.205.233';} 
function geoplugin_status() { return '200';} 
function geoplugin_credit() { return 'Some of the returned data includes GeoLite data created by MaxMind, available from <a href=\'http://www.maxmind.com\'>http://www.maxmind.com</a>.';} 
function geoplugin_delay() { return '2ms';} 
function geoplugin_city() { return 'Clifton';} 
function geoplugin_region() { return 'New Jersey';} 
function geoplugin_regionCode() { return 'NJ';} 
function geoplugin_regionName() { return 'New Jersey';} 
function geoplugin_areaCode() { return '';} 
function geoplugin_dmaCode() { return '501';} 
function geoplugin_countryCode() { return 'US';} 
function geoplugin_countryName() { return 'United States';} 
function geoplugin_inEU() { return 0;} 
function geoplugin_euVATrate() { return ;} 
function geoplugin_continentCode() { return 'NA';} 
function geoplugin_latitude() { return '40.8344';} 
function geoplugin_longitude() { return '-74.1377';} 
function geoplugin_locationAccuracyRadius() { return '1000';} 
function geoplugin_timezone() { return 'America/New_York';} 
function geoplugin_currencyCode() { return 'USD';} 
function geoplugin_currencySymbol() { return '&#36;';} 
function geoplugin_currencySymbol_UTF8() { return '$';} 
function geoplugin_currencyConverter(amt, symbol) { 
	if (!amt) { return false; } 
	var converted = amt * 1; 
	if (converted <0) { return false; } 
	if (symbol === false) { return Math.round(converted * 100)/100; } 
	else { return '&#36;'+(Math.round(converted * 100)/100);} 
	return false; 
} 
