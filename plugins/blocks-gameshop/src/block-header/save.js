import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({attributes}) {
	const { memberLink, cartLink } = attributes;
	return (
		<div { ...useBlockProps.save() }>
			<div className="header_inner">
					<InnerBlocks.Content />
					<div className="header_inner_right-sticky">
						<div className="header-search"></div>
						<div className="header-theme-switcher"></div>

						{cartLink &&
						(<div className="header-cart-link"><a href={cartLink} />cart</div>)}
						
						{memberLink &&
						(<div className="header-member-link"><a href={memberLink}>Member Area</a></div>)}
					</div>
				</div>
		</div>
	);
}
