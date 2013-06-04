<?php
/** 
 *  SvgText.php
 *
 * @since 4.1.1
 */

class SvgText extends SvgElement
{
    var $mX;
    var $mY;
    var $mText;
    
    function SvgText($x=0, $y=0, $text= "", $style="", $transform="")
    {
        // Call the parent class constructor.
        $this->SvgElement();
        
        $this->mX = $x;
        $this->mY = $y;
        $this->mText = $text;
        $this->mStyle = $style;
        $this->mTransform = $transform;
        
    }
    
    function printElement()
    {
        print("<text x=\"$this->mX\" y=\"$this->mY\" ");
        $this->printStyle();
        $this->printTransform();
        print(">\n");
        print($this->mText."\n");
        parent::printElement();
        print("</text>\n");
    }
    
    function setShape($x, $y, $text)
    {
        $this->mX = $x;
        $this->mY = $y;
        $this->mText = $text;
    }
}
?>
