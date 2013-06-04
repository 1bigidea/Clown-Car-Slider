<?php
/** 
 *  Svg.php
 *
 *  The SVG Class encapsulates the basic SVG elements into individual classes.
 *  It is used to generate well-formed SVG documents.
 *
 *  This file includes all of the files need to create all of the different
 *  SVG objects.
 *
 *  Define() SVG_CLASS_BASE before the inclusion of this file.
 *
 *  Note:
 *  You probably already know that you need a viewer see SVG documents.
 *  Try Mozilla http://www.mozilla.org/svg/ or Adobe http://www.adobe.com/svg/.
 *
 * @since 4.1.1
 */

require_once(SVG_CLASS_BASE."SvgElement.php");
require_once(SVG_CLASS_BASE."SvgFragment.php");
require_once(SVG_CLASS_BASE."SvgDocument.php");
require_once(SVG_CLASS_BASE."SvgGroup.php");
require_once(SVG_CLASS_BASE."SvgText.php");
require_once(SVG_CLASS_BASE."SvgTspan.php");
require_once(SVG_CLASS_BASE."SvgCircle.php");
require_once(SVG_CLASS_BASE."SvgLine.php");
require_once(SVG_CLASS_BASE."SvgRect.php");
require_once(SVG_CLASS_BASE."SvgEllipse.php");
require_once(SVG_CLASS_BASE."SvgPolyline.php");
require_once(SVG_CLASS_BASE."SvgPolygon.php");
require_once(SVG_CLASS_BASE."SvgPath.php");
require_once(SVG_CLASS_BASE."SvgAnimate.php");
require_once(SVG_CLASS_BASE."SvgDefs.php");
require_once(SVG_CLASS_BASE."SvgMarker.php");
require_once(SVG_CLASS_BASE."SvgTitle.php");
require_once(SVG_CLASS_BASE."SvgDesc.php");

?>
