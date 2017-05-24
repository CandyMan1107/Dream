$( function() {
  $( ".draggable" ).draggable();

  $( ".droppable" ).droppable({
     drop: function( event, ui ) {
       //Get the position before changing the DOM
       var p1 = ui.draggable.parent().offset();
       //Move to the new parent
       $(this).append(ui.draggable);
       //Get the postion after changing the DOM
       var p2 = ui.draggable.parent().offset();
       //Set the position relative to the change
       ui.draggable.css({
         top: parseInt(ui.draggable.css('top')) + (p1.top - p2.top),
         left: parseInt(ui.draggable.css('left')) + (p1.left - p2.left)
       });
     }
   });
} );

// d3.js
