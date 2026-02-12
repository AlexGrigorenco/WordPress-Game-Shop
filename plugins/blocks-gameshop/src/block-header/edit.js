import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, TextControl } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { memberLink, cartLink } = attributes;
	return (
		<>
			<InspectorControls>
				<PanelBody title="header Links">
					<TextControl
						label="Member Link"
						value={memberLink}
						onChange={(value) => setAttributes({ memberLink: value })}
					/>
					<TextControl
						label="Cart Link"
						value={cartLink}
						onChange={(value) => setAttributes({ cartLink: value })}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<div className="header_inner">
					<InnerBlocks />
					<div className="header_inner_right-sticky">
						<div className="header-search"></div>
						<div className="header-theme-switcher"></div>

						{cartLink &&
						<div className="header-cart-link"><a href={cartLink} /></div>}
						
						{memberLink &&
						<div className="header-member-link"><a href={memberLink}>Member Area</a></div>}
					</div>
				</div>
			</div>
		</>
	);
}
