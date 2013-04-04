/*
* Date validator: accepted dd/mm/yy or dd/mm/yyyy. Date must be present or future. Past dates are invalid
* @fecha: input field to validate
* @oErr: error dialog div
* error requires jquery ui 1.8 
* result grid requires jqGrid 4.3	
*/

var dateValidator = function(fecha, oErr){
	var isOk=null;
	var errorMsg="";
	var errorName="Fecha inválida";
	var yr;
	var mt;
	var dy;
	var strDate;
	var sqlDate;

	var someDate = function () {
		if (fecha[0].value===''){ 
			strDate ='';
			sqlDate ='';
			fecha[0].value ='dd/mm/aaaa';
			if (fecha.hasClass('date-ok')){fecha.removeClass('date-ok')}
			if (fecha.hasClass('date-wrong')){fecha.removeClass('date-wrong')}
			fecha.addClass('date-empty');
			return false;
		}else{
			if (fecha.hasClass('date-empty')){fecha.removeClass('date-empty')}
			return true;
		};
	}
	
	var checkDate =function (event){
		isOk = false;
		if (someDate()){
			if (isDate()){
				freeErr();
				if (fecha.hasClass('date-empty')){fecha.removeClass('date-empty')}
				if (fecha.hasClass('date-wrong')){fecha.removeClass('date-wrong')}
				fecha.addClass('date-ok');
				strDate = formatDate(dy,mt,yr,"txt");
				sqlDate = formatDate(dy,mt,yr,"sql");
				fecha[0].value = strDate; // formated Date
				isOk=true;
			}else{
				isOk=false;
				showError();
				if (fecha.hasClass('date-empty')){fecha.removeClass('date-emtpy')}
				if (fecha.hasClass('date-ok')){fecha.removeClass('date-ok')}
				fecha.addClass('date-wrong');
			}
		}
	}
	
	/*
	* formats d to dd, m to mm, and yy to yyyy adding necesary chars
	*/
	var formatParts = function(value,part){
		var res;
		switch (part){
			case "y":
				res = (value.length == 2) ? "20"+value : value; // siglo
				break;
			case "m": //suma el mes para formato de texto. enero => mt=0; febrero => mt=1;
				value++;
				value = value.toString();
				res = (value.length == 1) ? "0"+value : value; // fmto mm
				break;
			case "d":
				res = (value.length == 1) ? "0"+value : value; // fmto dd
				break;
			default:
				res ="";
			}
			return res+"";
	} 

	/*
	* formatDate accepts @d, @m, @y & @mode. 
	* mode= 'sql' returns format yyyy-mm-dd, otherwise returns 'dd/mm/yyyy'
	*/
	
	var formatDate = function (d,m,y,mode){
		fmtDate=""; 
		switch (mode){
			case 'sql':
				fmtDate = ""+ formatParts(y, 'y')+"-"+formatParts(m, 'm')+"-"+formatParts(d, 'd');
				break;
			default:
				fmtDate = ""+ formatParts(d, 'd')+"/"+formatParts(m, 'm')+"/"+formatParts(y, 'y');
		};
		return fmtDate;
	}
	
	var focusDate =function (event){
		//var el = event.target;
		if (fecha[0].value == 'dd/mm/aaaa'){
			fecha[0].value ='';
			if (fecha.hasClass('date-empty')){fecha.removeClass('date-empty')}
			fecha.addClass('date-ok')
		}
	}

	var isDate = function (){
		/*fechas aceptadas:
		escritas en formato dd/mm/yyyy ó d/m/yy,
		sin espacios,
		iguales o posteriores al día de hoy*/
		isOk=true;
		var val= fecha[0].value;
		//3 valores
		var data=val.split("/");
		if (!(data.length==3)){;
			createErr("Faltan datos. Ingrese dd/mm/aa")
			return isOk;
		};
		//formato 
		var reg1=/^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
		if (!(reg1.test(val))){;
			createErr("Ingrese dd/mm/yy o dd/mm/yyyy. ");
			return isOk;
		};

		if( data[0] && data [1] && data [2]) {
			//valor de día y mes aceptable
			if (data[0]> 31 || data[1]> 12) {
				createErr("Verifique valores para dia y mes. ");
				return isOk;
			};
			//fecha 'real' - no acepta la transformación de 30/2/xx a 1/3/xx 
			yr = formatParts(data[2],'y'); 
			mt = data[1]-1; // enero = 0; febrerro = 1, etc
			dy = data[0];
			var f1 = new Date (yr, mt, dy); 
			if(dy != f1.getDate() || mt !=f1.getMonth()){
				createErr("La fecha " + fecha[0].value + " no existe. ");
				return isOk;
			};
		} else {
			createErr("Ingrese una fecha completa dd/mm/yy. ");
			return isOk;
		}
		//fecha igual o posterior a hoy
		var hoy = new Date();
		hoy=new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());//hoy hora cero
		if (!(f1 >= hoy)){;
			{createErr("No puede ingresar una fecha anterior al día de hoy. ")};
			return isOk;
		}
		// si las fechas están ok las formatea para salvarlas en propiedades del objeto;
		return isOk;
	};
		var freeErr = function(){
			isOk=true;
			errorMsg ="";
		}
		var createErr = function (msg){
			errorMsg = msg;
			isOk=false;
		}
		var showError = function(){
			oErr.html(errorMsg);
			oErr.dialog({title: errorName, modal: true });	
			freeErr();
		}
	
	/*init */
	someDate();
	fecha.bind("blur", checkDate);
	fecha.bind("focus", focusDate);
	
	return {
		is_valid : function(){
			return isOk;
		},
		get_Error : function(){
			return {title:errorName, message:errorMsg};
		},
		get_sqlDate: function(){
			return sqlDate;
		},
		get_strDate: function(){
			return strDate;
		}
	};
};
