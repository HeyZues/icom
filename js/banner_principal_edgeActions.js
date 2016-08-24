/***********************
* Acciones de composición de Adobe Edge Animate
*
* Editar este archivo con precaución, teniendo cuidado de conservar 
* las firmas de función y los comentarios que comienzan con "Edge" para mantener la 
* capacidad de interactuar con estas acciones en Adobe Edge Animate
*
***********************/
(function($, Edge, compId){
var Composition = Edge.Composition, Symbol = Edge.Symbol; // los alias más comunes para las clases de Edge

   //Edge symbol: 'stage'
   (function(symbolName) {
      
      
      

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 24244, function(sym, e) {
         // introducir código aquí
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(251);

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         
         // Ir a una etiqueta o a un momento específicos y parar. Por ejemplo:
         // sym.stop(500); o sym.stop("miEtiqueta");
         sym.stop(250);

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle2}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(3250);
         

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle4}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(6250);
         

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle6}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(9250);
         

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle7}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(12250);
         

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle8}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(15250);
         

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle9}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(18250);
         

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle10}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(21250);
         

      });
      //Edge binding end

   })("stage");
   //Edge symbol end:'stage'

   //=========================================================
   
   //Edge symbol: 'Precargador'
   (function(symbolName) {   
   
   })("Precargador");
   //Edge symbol end:'Precargador'

   //=========================================================
   
   //Edge symbol: 'boton_servicios'
   (function(symbolName) {   
   
      Symbol.bindElementAction(compId, symbolName, "${_link}", "mouseover", function(sym, e) {
         // introducir código que se ejecute cuando se sitúe el ratón sobre el objeto
         // Reproducir la línea de tiempo en un momento o etiqueta específicos. Por ejemplo:
         // sym.play(500); o sym.play("myLabel");
         sym.play(10);
         

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_link}", "click", function(sym, e) {
         // introducir aquí código para clic de ratón
         // Ir a una nueva dirección URL en la ventana actual
         // (sustituya "_self" por el atributo de destino correspondiente)
         window.open("../servicios/", "_self");
         

      });
      //Edge binding end

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 0, function(sym, e) {
         // introducir código aquí
         sym.stop();

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_link}", "mousemove", function(sym, e) {
         // introducir código que se ejecute cuando se mueva el ratón sobre el objeto
         sym.playReverse();
         

      });
      //Edge binding end

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 677, function(sym, e) {
         // introducir código aquí
         sym.stop();

      });
      //Edge binding end

   })("boton_servicios");
   //Edge symbol end:'boton_servicios'

})(jQuery, AdobeEdge, "EDGE-5077574");