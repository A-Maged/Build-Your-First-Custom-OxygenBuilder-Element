<?php

class CM_Test_Element extends CUSTOM_OXY_BASE_ELEMENT
{
    public function name(){
        return 'Test Element';
    }

    public function controls()
    {
        /*
         * Adds a control to the element or a section (depends on the caller)
         */
        
        /* Dropdown */
        $this->addOptionControl([
            /* "dropdown" is a predefined type in Oxygen. There's a list of defined types(more on that later) */
            "type" => "dropdown",  
            "name" => "Dropdown",
            "slug" => "my_dropdown",
            "value" => ["one", "two", "three"]
        ]);

        /* 
         * Creates a section to group multiple controls
         * @param {string} $id
         * @param {string} $title
         * @param {string} $icon
         * @param {OxyEl} $OxyEl
         * @param {OxygenElementControlsSection} $parentSection
         * @return {OxygenElementControlsSection}
         */
        $first_section = $this->addControlSection("first_section_slug", __("First Section"), "assets/icon.png", $this);
  
        /* TextField */
        $first_section->addOptionControl([
            "type" => "textfield",
            "name" => "button text",
            "slug" => "btn_text",
            "value" => "Click Here" // default value
        ]);

    }

    /*
     * @param {array} $options   values you set in the controls
     * @param {array} $defaults  default values for all controls
     * @param {array} $content   shortcode that holds all nested elements (more on this later)
     */
    public function render($options, $defaults, $content)
    {
        /* 
         * access values previously defined in controls like this $options['control_slug']
         */
        echo "<button>". $options['btn_text'] ."</button>";
    }
}

new CM_Test_Element();