/* Custom block styles */
wp.domReady( function () {
  wp.blocks.unregisterBlockStyle('core/button', 'fill');
  wp.blocks.unregisterBlockStyle('core/button', 'outline');

  wp.blocks.registerBlockStyle( 'core/button', {
    name: 'def-button',
    label: 'Default',
    isDefault: true
});
});