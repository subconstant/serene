
/* Modifying gutenberg settings for core blocks */
wp.hooks.addFilter(
  'blocks.registerBlockType',
  'serene/buttonfilter',
  removeButtonSettings
);

function removeButtonSettings(settings, name) {
  if (name !== 'core/button') {
      return settings;
  }

  /* console.log(settings) <- use to determine block supports */

  return lodash.assign({}, settings, {
      supports: lodash.assign({}, settings.supports, {
          color: {
            background: false,
            text: false
          },
          typography: false,
          __experimentalBorder: false,
          spacing:{
            padding: false,
          }
      }),
  });
}