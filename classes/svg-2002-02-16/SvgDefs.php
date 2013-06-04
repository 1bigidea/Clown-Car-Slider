<?php
/** 
 *  SvgDefs.php
 *
 * @since 4.1.1
 */

class SvgDefs extends SvgElement
{
    function SvgDefs($style="", $transform="")
    {
        // Call the parent class constructor.
        $this->SvgElement();
        
        $this->mStyle = $style;
        $this->mTransform = $transform;
        
    }
    
    function printElement()
    {
        print("<defs ");
        $this->printStyle();
        $this->printTransform();
        print(">\n");
        parent::printElement();
        print("</defs>\n");
    }
    
}
?>
