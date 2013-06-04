<?php
/** 
 *  SvgRect.php
 *
 * @since 4.1.1
 */

class SvgRect extends SvgElement
{
    var $mX;
    var $mY;
    var $mWidth;
    var $mHeight;
    
    function SvgRect($x=0, $y=0, $width=0, $height=0, $style="", $transform="")
    {
        // Call the parent class constructor.
        $this->SvgElement();
        
        $this->mX = $x;
        $this->mY = $y;
        $this->mWidth  = $width;
        $this->mHeight  = $height;
        $this->mStyle = $style;
        $this->mTransform = $transform;
        
    }
    
    function printElement()
    {
        print("<rect x=\"$this->mX\" y=\"$this->mY\" width=\"$this->mWidth\" height=\"$this->mHeight\" ");
        
        if (is_array($this->mElements)) { // Print children, start and end tag.
            
            $this->printStyle();
            $this->printTransform();
            print(">\n");
            parent::printElement();
            print("</rect>\n");
            
        } else { // Print short tag.
            
            $this->printStyle();
            $this->printTransform();
            print("/>\n");
            
        } // end else
        
    }
    
    function setShape($x, $y, $width, $height)
    {
        $this->mX = $x;
        $this->mY = $y;
        $this->mWidth  = $width;
        $this->mHeight  = $height;
    }
}
?>
