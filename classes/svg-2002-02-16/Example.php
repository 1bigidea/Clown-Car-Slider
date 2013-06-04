<?php
/**
 * Example.php
 *
 * @since 4.1.1
 *
 * To view this example you need a native SVG viewer or plug-in.
 * Try Mozilla http://www.mozilla.org/svg/ or Adobe http://www.adobe.com/svg/.
 */


// *** Define the path to the SVG class dir. ***
define("SVG_CLASS_BASE", 
        $_SERVER["DOCUMENT_ROOT"]."chapter_code/Ch15/svg_classes/");

// Include the class files.
require_once(SVG_CLASS_BASE."Svg.php");

// Create an instance of SvgDocument. All other objects will be added to this
// instance for printing.
// Set the height and width of the viewport.
$svg =& new SvgDocument("400", "200");


// Create an instance of SvgGroup.
// Set the style, transforms for child objects.
$g =& new SvgGroup("stroke:black", "translate(200 100)");


// Add a parent to the g instance.
$g->addParent($svg);
// The same results can be accomplished by making g a child of the svg.
//$svg->addChild($g);

// Create and animate a circle.
$circle = new SvgCircle("0", "0", "100", "stroke-width:3", "");
$circle->addChild(new SvgAnimate("r", "XML", "0", "75", "", "3s", "freeze"));
$circle->addChild(new SvgAnimate("fill", "CSS", "green", "red", "", "3s",
                                 "freeze"));

// Make the circle a child of g.
$g->addChild($circle);


// Create and animate some text.
$text = new SvgText("0", "0", "SVG and PHP",
                    "font-size:20;text-anchor:middle;", "");
$text->addChild(new SvgAnimate("font-size", "auto", "0", "20", "", "3s",
                               "freeze"));

// Make the text a child of g.
$g->addChild($text);

// Send a message to the svg instance to start printing.
$svg->printElement();


/**
    The following is outputed:

<?xml version="1.0" encoding="iso-8859-1"? >
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN"
	        "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<svg width="400" height="200" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
<g style="stroke:black" transform="translate(200 100)" >
<circle cx="0" cy="0" r="100" style="stroke-width:3" >
<animate attributeName="r" attributeType="XML" from="0" to="75" dur="3s"
         fill="freeze" />
<animate attributeName="fill" attributeType="CSS" from="green" to="red"
         dur="3s" fill="freeze" />
</circle>
<text x="0" y="0" style="font-size:20;text-anchor:middle;" >
SVG and PHP
<animate attributeName="font-size" attributeType="auto" from="0" to="20"
         dur="3s" fill="freeze" />
</text>
</g>
</svg>

 */

?>
