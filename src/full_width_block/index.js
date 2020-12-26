const { registerBlockType } = wp.blocks;
const { MediaUpload, InspectorControls, InnerBlocks, ColorPalette} = wp.editor;
const { IconButton, CheckboxControl, PanelBody} = wp.components;

registerBlockType('arcanacon/full-width-block', {
    title: 'Full Width Block',
    //Change icon below
    icon:  'format-image',
    category: 'layout',
    attributes: {
        backgroundImage: {
            type: 'string',
        },
        backgroundTitle: {
            type: 'string'
        },
        bgColour: {
            type: 'string',
            default: 'white',
        },
        showDesktopOnly : {
            type: 'boolean',
            default: false
        },
        showMobileOnly : {
            type: 'boolean',
            default: false
        }
    },
    supports: {
        align: ['wide', 'full']
    },
    edit: props => {
 
        const {attributes : {bgColour, backgroundImage, backgroundTitle, showDesktopOnly, showMobileOnly }, setAttributes } = props;

         let onSelectImage = value => {
             setAttributes({bgColour: null})
            setAttributes({ backgroundImage : value.url });
             if(value.caption != ""){
                setAttributes({backgroundTitle : value.caption});
            }
         }

        let setCheckedDesktopOnly = value => {
            setAttributes({ showDesktopOnly : value})
        }

        let setCheckedMobileOnly = value => {
            setAttributes({ showMobileOnly : value})
        }

        let onBgColourChange = (value) => {
            setAttributes({backgroundImage: null})
            setAttributes({bgColour: value});
        }

        let allowedBlocks = [ 
         'core/column',
        ];

        let template = [
            [ 'core/column', {}, [] ],
        ];

        let blockStyles = {
            backgroundSize: "cover",
            backgroundPosition: "center",
        }

        if(bgColour){
           blockStyles.backgroundColor = `${bgColour}`;
        }

        if(backgroundImage){
            blockStyles.backgroundImage = `url(${backgroundImage})`;
        }

        return ([
            <div 
            aria-title={backgroundTitle} 
            className={`${showDesktopOnly ? 'show-for-medium' : ''} ${showMobileOnly ? 'hide-for-medium' : ''} arcanacon-full-width-block`} 
            style={blockStyles}
            > 
              	<div class="grid-container">
			        <div class="grid-x">
				        <div class="small-12">
                            <InnerBlocks 
								allowedBlocks={allowedBlocks}
								template={template}
							/>
                        </div>
                    </div>
                </div>
            </div>,
               <InspectorControls> 
                <PanelBody title={ 'Background colour' }>
                    <p><strong>Select a Background Colour</strong></p>
                    <ColorPalette value={bgColour} onChange={onBgColourChange}/>
                </PanelBody>
               <PanelBody title={ 'Background Image' }>
               <MediaUpload
                   onSelect={ onSelectImage }
                   type="image"
                   render={ ({open}) => (
                       <IconButton
                           onClick={open}
                           icon="format-image"
                           showTooltip="true"
                           label="Add Image"
                       />
                   )}
               />
               </PanelBody>
               <PanelBody title={ 'Background Options' }>
                   <CheckboxControl
                       label="Show on desktop only"
                       help="Display image on desktop screens."
                       checked={ showDesktopOnly }
                       onChange={ setCheckedDesktopOnly }
                   />
                   <CheckboxControl
                       label="Show on mobile only"
                       help="Display image on mobile screens."
                       checked={ showMobileOnly }
                       onChange={ setCheckedMobileOnly }
                   />
               </PanelBody>
           </InspectorControls>
        ]);
    },
    save: props =>{
        const {attributes: {bgColour, backgroundImage, backgroundTitle, showDesktopOnly, showMobileOnly } } = props;

        let blockStyles = {
            backgroundSize: "cover",
            backgroundPosition: "center",
        }

        if(bgColour){
           blockStyles.backgroundColor = `${bgColour}`;
        }

        if(backgroundImage){
            blockStyles.backgroundImage = `url(${backgroundImage})`;
        }
        
        return (
        <div 
            aria-title={backgroundTitle} 
            className={`${showDesktopOnly ? 'show-for-medium' : ''} ${showMobileOnly ? 'hide-for-medium' : ''} arcanacon-full-width-block`} 
            style={blockStyles}
            > 
            <div class="grid-container">
                <div class="grid-x">
                    <div class="small-12">
                        <InnerBlocks.Content />
                    </div>
                </div>
            </div>
        </div>);
    }
});