//! moment.js locale configuration
//! locale : spanish (es)
//! author : Julio NapurÃ­ : https://github.com/julionc

(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(require('../moment')) :
    typeof define === 'function' && define.amd ? define(['moment'], factory) :
    factory(global.moment)
 }(this, function (moment) { 'use strict';
 
 
     var monthsShortDot = 'Ene._Feb._Mar._Abr._May._Jun._Jul._Ago._Sep._Oct._Nov._Dic.'.split('_'),
         monthsShort = 'Ene_Feb_Mar_Abr_May_Jun_Jul_Ago_Sep_Oct_Nov_Dic'.split('_');
 
     var es = moment.defineLocale('es', {
         months : 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'.split('_'),
         monthsShort : function (m, format) {
             if (/-MMM-/.test(format)) {
                 return monthsShort[m.month()];
             } else {
                 return monthsShortDot[m.month()];
             }
         },
         weekdays : 'Domingo_Lunes_Martes_MiÃ©rcoles_Jueves_Viernes_SÃ¡bado'.split('_'),
         weekdaysShort : 'Dom._Lun._Mar._MiÃ©._Jue._Vie._SÃ¡b.'.split('_'),
         weekdaysMin : 'Do_Lu_Ma_Mi_Ju_Vi_SÃ¡'.split('_'),
         longDateFormat : {
             LT : 'H:mm',
             LTS : 'H:mm:ss',
             L : 'DD/MM/YYYY',
             LL : 'D [de] MMMM [de] YYYY',
             LLL : 'D [de] MMMM [de] YYYY H:mm',
             LLLL : 'dddd, D [de] MMMM [de] YYYY H:mm'
         },
         calendar : {
             sameDay : function () {
                 return '[hoy a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
             },
             nextDay : function () {
                 return '[maÃ±ana a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
             },
             nextWeek : function () {
                 return 'dddd [a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
             },
             lastDay : function () {
                 return '[ayer a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
             },
             lastWeek : function () {
                 return '[el] dddd [pasado a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
             },
             sameElse : 'L'
         },
         relativeTime : {
             future : 'en %s',
             past : 'hace %s',
             s : 'unos segundos',
             m : 'un minuto',
             mm : '%d minutos',
             h : 'una hora',
             hh : '%d horas',
             d : 'un dÃ­a',
             dd : '%d dÃ­as',
             M : 'un mes',
             MM : '%d meses',
             y : 'un aÃ±o',
             yy : '%d aÃ±os'
         },
         ordinalParse : /\d{1,2}Âº/,
         ordinal : '%dÂº',
         week : {
             dow : 1, // Monday is the first day of the week.
             doy : 4  // The week that contains Jan 4th is the first week of the year.
         }
     });
 
     return es;
 
 }));
 