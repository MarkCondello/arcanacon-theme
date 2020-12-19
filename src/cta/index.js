const { registerBlockType } = wp.blocks; 
const { 
    RichText,  
    InspectorControls,
    ColorPalette,
} = wp.editor;

const { PanelBody} = wp.components;

registerBlockType('arcanacon/custom-cta', {
    //built-in attrs
    title: 'CTA',
    description: 'Block for CTA',
    icon: 'format-image',
    category: 'layout',
    //custom attrs
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2',
        },
        titleColour: {
            type: 'string',
            default: 'black',
        },
        body: {
            type: 'string',
            source: 'html',
            selector: 'p'
        }
    },
    //custom funcs

    //built in funcs
    edit:( props => {
        const {
            attributes: {
                title,
                titleColour, 
                body
            },
            setAttributes
        } = props;

        let onChangeTitle = (value) => {
            setAttributes({ title : value });
        }

        let onChangeBody = (value) => {
            setAttributes({ body: value });
        }

        let onColourChange = (value) => {
            setAttributes({titleColour: value});
        }

        return ([
            <InspectorControls style={{ marginBottom: '40px'}}>
                <PanelBody title={ 'Font colour' }>
                    <p><strong>Select a Title Colour</strong></p>
                    <ColorPalette value={titleColour} onChange={onColourChange}/>
                </PanelBody>
            </InspectorControls>,
            <div class="cta-container">
                <RichText   key="editable"
                            tagName="h2"  
                            placeholder="Your CTA title"
                            value={title}
                            onChange={onChangeTitle}
                            style={{ color: titleColour }}
                />
                <RichText   key="editable"
                            tagName="p"  
                            placeholder="Your CTA body content"
                            value={body}
                            onChange={onChangeBody}
                />
            </div>
         ])
        
    }),
    save:( props => {
        const {
            attributes: {
                title,
                body,
                titleColour
            },
        } = props;

        return (
            <div class="cta-container">
                <h2 style={{ color: titleColour }}>{title}</h2>
                 <RichText.Content tagName="p" value={body} />
            </div>
        )
        
    }),
});

//this block is registered through theme-suppoer.php