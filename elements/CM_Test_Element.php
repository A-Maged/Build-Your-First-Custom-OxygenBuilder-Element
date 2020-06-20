<?php

class CM_Test_Element extends CUSTOM_OXY_BASE_ELEMENT
{
    public $js_added = false;

    public function name()
    {
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
        echo "<button class='cm-btn'>". $options['btn_text'] ."</button>";
    }

    public function afterInit()
    {
        /* inlineJS: can only be called once to print js code inside script tag after every element */

        /* Add raw js (after every element) */
        $js_dynamic_element_id = '%%ELEMENT_ID%%';
        $this->El->inlineJS("alert('$js_dynamic_element_id')");

        /* Add js file only once (in footer) */
        if ($this->js_added !== true) {
            $this->output_js();
            $this->js_added = true;
        }
    }
    
    /*
     * Enqueue JS (Footer)
     */
    public function output_js()
    {
        add_action('wp_footer', function () {
            $js = file_get_contents(__DIR__ . '/CM_Test_Element.js');

            echo "<script type='text/javascript'>{$js}</script>";
        });
    }

    /*
     * Enqueue Styles (Head)
     * @returns {string} css
     */
    public function defaultCSS()
    {
        return file_get_contents(__DIR__ . '/CM_Test_Element.css');
    }
}

new CM_Test_Element();
