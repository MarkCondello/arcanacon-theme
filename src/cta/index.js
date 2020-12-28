const { registerBlockType } = wp.blocks; 
const { 
    RichText,  
    InspectorControls,
    URLInputButton,
} = wp.editor;

const { 
    PanelBody,
    SelectControl
} = wp.components;

registerBlockType('arcanacon/custom-cta', {
    //built-in attrs
    title: 'CTA',
    description: 'Call to action button feature.',
    icon: 'megaphone',
    category: 'formatting',
    //custom attrs
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            default: 'CTA title',
            selector: '.cta-block a',
        },
        link: {
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            default: '#',
            selector: '.cta-block a',
        },
        alignment: {
            type: 'string',
            default: 'left-align'
        },
    },
 

    edit:( props => {
        const {
            attributes: {
                title,
                link,
                alignment,
             },
            setAttributes
        } = props;

        let onChangeTitle = (value) => {
            setAttributes({ title : value });
        }

        let onChangeUrl = (value) => {
            setAttributes({ link: value})
        }

        let onChangeAlignment = (value) => {

            console.log({value})
            setAttributes({alignment: value})
        }

        let alignmentOptions = [
            {label: "Left", value: "left-align"},
            {label: "Center", value: "center-align"},
            {label: "Right", value: "right-align"},
        ]

        return ([
            <div class={`cta-block ${alignment}`}>
                <a href={link} class="cta">{title}</a>
            </div>,
            <InspectorControls>
                <PanelBody title={'CTA link'}>
                    <URLInputButton 
                        onChange={onChangeUrl}
                        url={link}
                        />
                </PanelBody>
                <PanelBody title={'CTA title'}> 
                    <RichText key="editable"
                            placeholder="CTA title"
                            value={title}
                            onChange={onChangeTitle}
                    />
                </PanelBody>
                <PanelBody title={'CTA alignment'}>
                    <SelectControl
                        options={alignmentOptions}
                        onChange={onChangeAlignment}
                        value={alignment}
                    ></SelectControl>
                </PanelBody>
            </InspectorControls>
         ])
        
    }),
    save:( props => {
        const {
            attributes: {
                title,
                link,
                alignment,
            },
        } = props;

        return (
            <div class={`cta-block ${alignment}`}>
                <a href={link} class="cta">{title}</a>
            </div>
        )
    }),
});

//this block is registered through theme-support.php