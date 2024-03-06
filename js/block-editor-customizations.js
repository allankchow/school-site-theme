wp.domReady(() => {
    // Change the placeholder of "Add title" for a specific CPT
    wp.data.dispatch('core/editor').editPost({title: 'Add student name'});

    // Locking blocks from being moved, added, or removed.
    wp.data.dispatch('core/block-editor').lockBlocks();
});