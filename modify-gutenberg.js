//console.log( "I'm loaded!" );
wp.domReady( () => {
	const { removeEditorPanel } = wp.data.dispatch('core/edit-post');
    console.log( "dom read" );
	// Remove featured image panel from sidebar.
    removeEditorPanel( 'taxonomy-panel-category' ) ; // category
    removeEditorPanel( 'taxonomy-panel-TAXONOMY-NAME' ) ; // custom taxonomy
    removeEditorPanel( 'taxonomy-panel-post_tag' ); // tags
    removeEditorPanel( 'featured-image' ); // featured image
    //removeEditorPanel( 'post-link' ); // permalink
    removeEditorPanel( 'page-attributes' ); // page attributes
    removeEditorPanel( 'post-excerpt' ); // Excerpt
    removeEditorPanel( 'discussion-panel' ); // Discussion
} );



