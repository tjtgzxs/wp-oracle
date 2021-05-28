( function( api ) {

	// Extends our custom "blog-light" section.
	api.sectionConstructor['blog-light'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
