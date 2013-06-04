<?php
/** 
 *  SvgPath.php
 *
 * @since 4.1.1
 */

class SvgPath extends SvgElement
{
    var $mD;
    
    function SvgPath($d="", $style="", $transform="")
    {
        // Call the parent class constructor.
        $this->SvgElement();
        
        $this->mD = $d;
        $this->mStyle = $style;
        $this->mTransform = $transform;
        
    }
    
    function printElement()
    {
        print("<path d=\"$this->mD\" ");
        
        if (is_array($this->mElements)) { // Print children, start and end tag.
            
            $this->printStyle();
            $this->printTransform();
            print(">\n");
            parent::printElement();
            print("</path>\n");
            
        } else { // Print short tag.
            
            $this->printStyle();
            $this->printTransform();
            print("/>\n");
            
        } // end else
    }
    
    function setShape($d)
    {
        $this->mD = $d;
    }
}
?>
