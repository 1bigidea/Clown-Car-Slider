<?php
/** 
 *  SvgGroup.php
 *
 * @since 4.1.1
 */

class SvgGroup extends SvgElement
{
    function SvgGroup($style="", $transform="")
    {
        // Call the parent class constructor.
        $this->SvgElement();
        
        $this->mStyle = $style;
        $this->mTransform = $transform;
        
    }
    
    function printElement()
    {
        print("<g ");
        $this->printStyle();
        $this->printTransform();
        print(">\n");
        parent::printElement();
        print("</g>\n");
    }
}
?>
