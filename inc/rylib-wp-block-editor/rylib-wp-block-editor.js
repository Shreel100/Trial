wp.domReady( function() {
  wp.blocks.registerBlockStyle( 'core/button', {
    name: 'white-on-ryerson-blue',
    label: 'White on Ryerson Blue',
    isDefault: true
  } );
  
  wp.blocks.registerBlockStyle( 'core/button', {
    name: 'black-on-ryerson-gold',
    label: 'Black on Ryerson Gold',
  } );

  wp.blocks.unregisterBlockStyle( 'core/button', [ 'fill', 'outline' ] );

  wp.blocks.registerBlockStyle( 'core/list', {
    name: 'rylib-list-style-none',
    label: 'No List Styling'
  })

  wp.blocks.registerBlockStyle( 'core/rss', {
    name: 'rylib-white-background-rylib-list-style-none',
    label: 'White Background with No List Styling'
  })

  wp.blocks.registerBlockStyle( 'core/group', {
    name: 'rylib-white-background',
    label: 'White Background',
  })

  wp.blocks.registerBlockStyle( 'core/group', {
    name: 'rylib-white-background-rylib-border-bottom-blue',
    label: 'White Background with Blue Bottom Border'
  })

  wp.blocks.registerBlockStyle( 'core/paragraph', {
    name: 'rylib-white-background',
    label: 'White Background'
  })

  wp.blocks.registerBlockStyle( 'core/paragraph', {
    name: 'rylib-white-background-rylib-border-bottom-blue',
    label: 'White Background with Blue Bottom Border'
  })

  wp.blocks.registerBlockStyle( 'core/column', {
    name: 'rylib-white-background',
    label: 'White Background'
  })

  wp.blocks.registerBlockStyle( 'core/column', {
    name: 'rylib-white-background-rylib-border-bottom-blue',
    label: 'White Background with Blue Bottom Border'
  })

} );