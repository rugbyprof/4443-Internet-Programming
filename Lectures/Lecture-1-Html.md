### Root element

| Element | Description |
|---------|-------------|
| **`<html>`** | Represents the root of an HTML or XHTML document. All other elements must be descendants of this element. |

### Document metadata

| Element |	Description |
|---------|-------------|
| **`<head>`** |	Represents a collection of metadata about the document, including links to, or definitions of, scripts and style sheets. |
| **`<title>`** |	Defines the title of the document, shown in a browser's title bar or on the page's tab. It can only contain text and any contained tags are not interpreted. |
| `<base>` |	Defines the base URL for relative URLs in the page. |
| **`<link>`** |	Used to link JavaScript and external CSS with the current HTML document. |
| **`<meta>`** |	Defines metadata that can't be defined using another HTML element. |
| **`<style>`** |	Used to write inline CSS. |

### Scripting

| Element |	Description |
|---------|-------------|
|**`<script>`**|	Defines either an internal script or a link to an external script. The script language is JavaScript.|

### Sections

| Element | Description |
|---------|-------------|
|**`<body>`** |	Represents the content of an HTML document. There is only one `<body>` element in a document.|
|`<section> ` |	This element has been added in HTML5	Defines a section in a document.|
|`<nav>` |	 This element has been added in HTML5	Defines a section that contains only navigation links.|
|`<article>` |	 This element has been added in HTML5	Defines self-contained content that could exist independently of the rest of the content.|
|`<aside>` |	 This element has been added in HTML5	Defines some content loosely related to the page content. If it is removed, the remaining content still makes sense.|
|**`<h1>,<h2>,<h3>,<h4>,<h5>,<h6>`**|	Heading elements implement six levels of document headings; `<h1>` is the most important and `<h6>` is the least. A heading element briefly describes the topic of the section it introduces.|
|`<header>` |	 This element has been added in HTML5	Defines the header of a page or section. It often contains a logo, the title of the Web site, and a navigational table of content.|
|`<footer>` |	 This element has been added in HTML5	Defines the footer for a page or section. It often contains a copyright notice, some links to legal information, or addresses to give feedback.|
|`<address>` |		Defines a section containing contact information.|
|`<main>` |	This element has been added in HTML5	Defines the main or important content in the document. There is only one `<main>` element in the document.|


### Grouping content

| Element | Description |
|---------|-------------|
|**`<p>	`**|	Defines a portion that should be displayed as a paragraph. |
|**`<hr>`** |		Represents a thematic break between paragraphs of a section or article or any longer content. |
|**`<pre>`**|		Indicates that its content is preformatted and that this format must be preserved. |
|`<blockquote>` |		Represents a content that is quoted from another source. |
|**`<ol>`** |		Defines an ordered list of items. | 
|**`<ul>`** |		Defines an unordered list of items. |
|**`<li>`**|		Defines a item of an enumeration list. |
|`<dl>` |		Defines a definition list, that is, a list of terms and their associated definitions. |
|`<dt>` |		Represents a term defined by the next `<dd>`. |
|`<dd>` |		Represents the definition of the terms immediately listed before it. |
|`<figure> ` |	This element has been added in HTML5	Represents a figure illustrated as part of the document. |
|`<figcaption>` |	 This element has been added in HTML5	Represents the legend of a figure. |
|**`<div>	`**|	Represents a generic container with no special meaning. |



### Text-level semantics

| Element | Description |
|---------|-------------|
|**`<a>`**|		Represents a hyperlink , linking to another resource. |
|**`<em>`**|		Represents emphasized text, like a stress accent. |
|**`<strong>`**|		Represents especially important text. |
|**`<small>`**|		Represents a side comment , that is, text like a disclaimer or a copyright, which is not essential to the comprehension of the document. |
|`<s>` |		Represents content that is no longer accurate or relevant . |
|**`<cite>`**|		Represents the title of a work . |
|`<q>` |		Represents an inline quotation . |
|`<dfn>	` |	Represents a term whose definition is contained in its nearest ancestor content. |
|`<abbr>` |		Represents an abbreviation or an acronym ; the expansion of the abbreviation can be represented in the title attribute. |
|`<data>` |	 This element has been added in HTML5	Associates to its content a machine-readable equivalent . (This element is only in the WHATWG version of the HTML standard, and not in the W3C version of HTML5). |
|`<time> ` |	This element has been added in HTML5	Represents a date and time value; the machine-readable equivalent can be represented in the datetime attribute. |
|**`<code>`**|		Represents computer code . |
|`<var>	` |	Represents a variable, that is, an actual mathematical expression or programming context, an identifier representing a constant, a symbol identifying a physical quantity, a function parameter, or a mere placeholder in prose. |
|`<samp>` |		Represents the output of a program or a computer. |
|`<kbd>	` |	Represents user input , often from the keyboard, but not necessarily; it may represent other input, like transcribed voice commands. |
|**`<sub>,<sup>	`**|	Represent a subscript , or a superscript. |
|**`<i>`** |		Represents some text in an alternate voice or mood, or at least of different quality, such as a taxonomic designation, a technical term, an idiomatic phrase, a thought, or a ship name. |
|**`<b>`**|		Represents a text which to which attention is drawn for utilitarian purposes . It doesn't convey extra importance and doesn't imply an alternate voice. |
|**`<u>`**|		Represents a non-textual annoatation for which the conventional presentation is underlining, such labeling the text as being misspelt or labeling a proper name in Chinese text. |
|`<mark>` |	 This element has been added in HTML5	Represents text highlighted for reference purposes, that is for its relevance in another context. |
|`<ruby> ` |	This element has been added in HTML5	Represents content to be marked with ruby annotations , short runs of text presented alongside the text. This is often used in conjunction with East Asian language where the annotations act as a guide for pronunciation, like the Japanese furigana . |
|`<rt> ` |	This element has been added in HTML5	Represents the text of a ruby annotation . |
|`<rp> ` |	This element has been added in HTML5	Represents parenthesis around a ruby annotation, used to display the annotation in an alternate way by browsers not supporting the standard display for annotations. |
|`<bdi> ` |	This element has been added in HTML5	Represents text that must be isolated from its surrounding for bidirectional text formatting. It allows embedding a span of text with a different, or unknown, directionality. |
|`<bdo>` |		Represents the directionality of its children, in order to explicitly override the Unicode bidirectional algorithm. |
|**`<span>`** |		Represents text with no specific meaning. This has to be used when no other text-semantic element conveys an adequate meaning, which, in this case, is often brought by global attributes like class, lang, or dir.
|**`<br>`**|		Represents a line break . |
|`<wbr> ` |	This element has been added in HTML5	Represents a line break opportunity , that is a suggested point for wrapping text in order to improve readability of text split on several lines. |

### Edits
| Element | Description |
|---------|-------------|
|`<ins>	` |	Defines an addition to the document. |
|`<del>	` |	Defines a removal from the document. |

### Embedded content
| Element | Description |
|---------|-------------|
|**`<img>	`** |	Represents an image . |
|**`<iframe>`** |		Represents a nested browsing context , that is an embedded HTML document. |
|`<embed> ` |	This element has been added in HTML5	Represents a integration point for an external, often non-HTML, application or interactive content. |
|**`<object>`** |		Represents an external resource , which is treated as an image, an HTML sub-document, or an external resource to be processed by a plug-in. |
|**`<param>	`**|	Defines parameters for use by plug-ins invoked by `<object>` elements. |
|**`<video> `** |	This element has been added in HTML5	Represents a video , and its associated audio files and captions, with the necessary interface to play it. |
|**`<audio> `** |	This element has been added in HTML5	Represents a sound , or an audio stream . |
|**`<source> `**|	This element has been added in HTML5	Allows authors to specify alternative media resources for media elements like `<video>` or `<audio>`. |
|**`<track> `**|	This element has been added in HTML5	Allows authors to specify timed text track for media elements like `<video>` or `<audio>`. |
|**`<canvas> `** |	This element has been added in HTML5	Represents a bitmap area that scripts can be used to render graphics, like graphs, game graphics, or any visual images on the fly. |
|**`<map>	`**|	In conjunction with `<area>`, defines an image map . |
|**`<area>`** |		In conjunction with `<map>`, defines an image map . |
|`<svg> ` |	This element has been added in HTML5	Defines an embedded vectorial image . |
|`<math> ` |	This element has been added in HTML5	Defines a mathematical formula . |

### Tabular data
| Element | Description |
|---------|-------------|
|**`<table>`** |		Represents data with more than one dimension . |
|`<caption>` |		Represents the title of a table . |
|`<colgroup>` |		Represents a set of one or more columns of a table. |
|`<col>` |		Represents a column of a table. |
|**`<tbody>`**|		Represents the block of rows that describes the concrete data of a table. |
|**`<thead>`**|		Represents the block of rows that describes the column labels of a table. |
|**`<tfoot>`** |		Represents the block of rows that describes the column summaries of a table. |
|**`<tr>`**|		Represents a row of cells in a table. |
|**`<td>`**|		Represents a data cell in a table. |
|**`<th>`**|		Represents a header cell in a table. |

### Forms
| Element | Description |
|---------|-------------|
|**`<form>`** |		Represents a form , consisting of controls, that can be submitted to a server for processing. |
|**`<fieldset>`**|		Represents a set of controls . |
|**`<legend>`**|		Represents the caption for a `<fieldset>`. |
|**`<label>`**|		Represents the caption of a form control. |
|**`<input>`** |		Represents a typed data field allowing the user to edit the data. |
|**`<button>`** |		Represents a button . |
|**`<select>`** |		Represents a control allowing selection among a set of options . |
|`<datalist>` |	 This element has been added in HTML5	Represents a set of predefined options for other controls. |
|`<optgroup>` |		Represents a set of options , logically grouped. |
|**`<option>`** |		Represents an option in a `<select>` element, or a suggestion of a `<datalist>` element. |
|**`<textarea>`** |		Represents a multiline text edit control . |
|`<keygen> ` |	This element has been added in HTML5	Represents a key-pair generator control . |
|`<output>` |	 This element has been added in HTML5	Represents the result of a calculation . |
|`<progress> ` |	This element has been added in HTML5	Represents the completion progress of a task. |
|`<meter>` |	 This element has been added in HTML5	Represents a scalar measurement (or a fractional value), within a known range. |

### Interactive elements
| Element | Description |
|---------|-------------|
|`<details>` |	 This element has been added in HTML5	Represents a widget from which the user can obtain additional information or controls. |
|`<summary> ` |	This element has been added in HTML5	Represents a summary , caption , or legend for a given <details>. |
|`<menuitem> ` |	This element has been added in HTML5	Represents a command that the user can invoke. |
|`<menu> ` |	This element has been added in HTML5	Represents a list of commands . |


Source: https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5/HTML5_element_list
