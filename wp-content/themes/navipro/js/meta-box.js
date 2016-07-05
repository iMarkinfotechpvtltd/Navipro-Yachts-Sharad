var link = "http://northside.imarkclients.com/";
// jQuery(document).ready(function(){
// jQuery('.selected_city').each(function(){
	// var selected_value = jQuery(this).val();
	// alert(selected_value);
	// jQuery(this).next('#myplugin_new_field').val(selected_value);
	// });
// });


jQuery(document).ready(function(){
	jQuery('.delete_row').each(function(){
		jQuery(this).click(function(){
			var selct_var = jQuery(this).siblings('#myplugin_new_field').val();
			var post_id = jQuery('.post_id_id').val();
			var selct_input = jQuery(this).siblings('#myplugin_new_field_1').val();
			jQuery(this).parent().remove();
		});
	});
});

