/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function () {
	
	$('.add-to-collection').click(function (e) {
		var list = $($(this).attr('data-list'));
		// Try to find the counter of the list
		var counter = list.children().length;

		// grab the prototype template
		var newWidget = list.attr('data-prototype');
		// replace the "__name__" used in the id and name of the prototype
		// with a number that's unique to your emails
		// end name attribute looks like name="contact[emails][2]"
		newWidget = newWidget.replace(/__name__label__/g, counter).replace(/__name__/g, counter);
		// Increase the counter
		counter++;

		// create a new list element and add it to the list
		var newElem = $(newWidget).addClass('display-item');
		newElem.appendTo(list);
	});
	
	$('.delete-from-collection').click(function (e) {
		var idToDelete = $(this).attr('data-id');

		$('#' + idToDelete).parent().remove();
		$(this).parent().remove();
	});
})();