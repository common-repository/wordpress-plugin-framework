<?php
/**
 *     ---------------       DO NOT DELETE!!!     ---------------
 * 
 *     Plugin Name:  Wordpress Plugin Framework
 *     Plugin URI:   http://www.doubleblackdesign.com/categories/wordpress-plugins/wordpress-plugin-framework/
 *     Description:  A simple plugin used to demonstrate the Wordpress Plugin Framework.
 *     Version:      0.05
 *     Author:       Double Black Design
 *     Author URI:   http://www.doubleblackdesign.com
 *
 *     ---------------       DO NOT DELETE!!!     ---------------
 *
 *    This is the required license information for a Wordpress plugin.
 *
 *    Copyright 2007  Keith Huster  (email : husterk@doubleblackdesign.com)
 *
 *    This program is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 *     ---------------       DO NOT DELETE!!!     ---------------
 */


/**
 * Include the WordpressPluginFramework.
 */
require_once( "wordpress-plugin-framework.php" ); 



/**
 * DemoPlugin - Simple plugin class used to demonstrate the WordpressPluginFramework.
 *
 * This class creates a simple plugin that demonstrates the capabilities of the WordpressPluginFramework.
 * Currently abilities demonstrated include:
 *
 *    1. Deriving a plugin from the WordpressPluginFramework base class.
 *    2. Creating options for the plugin.
 *    3. Initializing the plugin.
 *    4. Creating content blocks for the plugin's administration page.
 *    5. Registering the plugin's administration page with Wordpress.
 * 
 * @package wordpress-plugin-framework
 * @author Keith Huster
 */
class DemoPlugin extends DemoPlugin_WordpressPluginFramework
{
   // ---------------------------------------------------------------------------
   // Methods used to display content block within the plugin administration page.
   // ---------------------------------------------------------------------------

   /**
	 * HTML_DisplayPluginDescriptionBlock() - Displays the "Plugin Description" content block.
	 *
	 * This function generates the markup required to display the specified content block.
	 *
	 * @param void      None.
	 * 
    * @return void     None.  	 
	 * 
	 * @access private  Access via internal callback only.
	 * @author Keith Huster
	 */
   function HTML_DisplayPluginDescriptionBlock()
   {
      ?>
      <p>Just a simple simple demonstration to verify the Wordpress Plugin Framework is working...</p>
      <?php
   }

   /**
	 * HTML_DisplayPluginOptionsDisplayedBlock() - Displays the "Plugin Options Displayed" content block.
	 *
	 * This function generates the markup required to display the specified content block.
	 *
	 * @param void      None.
	 * 
    * @return void     None.  	 
	 * 
	 * @access private  Access via internal callback only.
	 * @author Keith Huster
	 */
   function HTML_DisplayPluginOptionsDisplayedBlock()
   {
      $this->DisplayPluginOption( 'myTextboxOption' );
      ?>
      <br />
      <br />
      <?php
      $this->DisplayPluginOption( 'myCheckboxOption' );
      ?>
      <br />
      <br />
      <?php
      $this->DisplayPluginOption( 'myRadiobuttonOption' );
      ?>
      <br />
      <br />
      <?php
      $this->DisplayPluginOption( 'myTextareaOption' );
      ?>
      <br />
      <br />
      <?php
      $this->DisplayPluginOption( 'myPasswordboxOption' );
      ?>
      <br />
      <br />
      <?php
      $this->DisplayPluginOption( 'myComboboxOption' );
      ?>
      <br />
      <br />
      <?php
      $this->DisplayPluginOption( 'myFilebrowserOption' );
      ?>
      <br />
      <br />
      <?php
      $this->DisplayPluginOption( 'myHiddenOption' );
   }

   /**
	 * HTML_DisplayPluginOptionsListedBlock() - Displays the "Plugin Options Listed" content block.
	 *
	 * This function generates the markup required to display the specified content block.
	 *
	 * @param void      None.
	 * 
    * @return void     None.  	 
	 * 
	 * @access private  Access via internal callback only.
	 * @author Keith Huster
	 */
   function HTML_DisplayPluginOptionsListedBlock()
   {
      $optionsArray = $this->GetOptionsArray();
      
      if( is_array( $optionsArray ) )
      {
         ?>
         <table>
            <thead>
               <tr>
                  <th>Option Name</th>
                  <th>Option Type</th>
                  <th>Option Value</th>
                  <th>Option Description</th>
                  <th>Option Values Array</th>
               </tr>
            </thead>
            <tbody>
               <?php
               foreach( $optionsArray AS $optionKey=>$optionValueArray )
               {
               ?>
                  <tr>
                     <td><?php echo( $optionKey ); ?></td>
                     <td><?php echo( $this->GetOptionType( $optionKey ) ); ?></td>
                     <td><?php echo( $this->GetOptionValue( $optionKey ) ); ?></td>
                     <td><?php echo( $this->GetOptionDescription( $optionKey ) ); ?></td>
                     <td><?php echo( $this->GetOptionValuesArray( $optionKey ) ); ?></td>
                  </tr>
               <?php 
		      }
		      ?>
		      </tbody>
		   </table>
		   <?php
      }
   }

   /**
	 * HTML_DisplayPluginHelloWorldBlock() - Displays the "Hello World!" content block.
	 *
	 * This function generates the markup required to display the specified content block.
	 *
	 * @param void      None.
	 * 
    * @return void     None.  	 
	 * 
	 * @access private  Access via internal callback only.
	 * @author Keith Huster
	 */
   function HTML_DisplayPluginHelloWorldBlock()
   {
      ?>
      <p>Hello World!</p>
      <?php
   }

   /**
	 * HTML_DisplayPluginHelloAgainBlock() - Displays the "Hello Again!" content block.
	 *
	 * This function generates the markup required to display the specified content block.
	 *
	 * @param void      None.
	 * 
    * @return void     None.  	 
	 * 
	 * @access private  Access via internal callback only.
	 * @author Keith Huster
	 */  
   function HTML_DisplayPluginHelloAgainBlock()
   {
      ?>
      <p>Hello Again!</p>
      <?php
   }
}



/**
 * Demonstration of creating a plugin utilizing the WordpressPlugin Framework.
 */
if( !$myDemoPlugin  )
{
  // Create a new instance of your plugin that utilizes the WordpressPluginFramework and initialize the instance.
  $myDemoPlugin = new DemoPlugin();
  $myDemoPlugin->Initialize( 'Demo Plugin for the Wordpress Plugin Framework',
                             '0.05',
                             'wordpress-plugin-framework',
                             'demo-plugin' );
  
  // Add all of the options specific to your plugin then register the options with the Wordpress core.
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_TEXTBOX,
                            'myTextboxOption',
                            'Hello!',
                            'Simple textbox option for your plugin:' );
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_CHECKBOX,
                            'myCheckboxOption',
                            $myDemoPlugin->CHECKBOX_UNCHECKED,
                            'Simple checkbox option for your plugin.' );
  $myRadiobuttonOptions = array( 'Radio 1', 'Radio 2', 'Radio 3' );
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_RADIOBUTTONS,
                            'myRadiobuttonOption',
                            $myRadiobuttonOptions[0],
                            'Simple radiobutton option for your plugin.',
                            $myRadiobuttonOptions );
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_TEXTAREA,
                            'myTextareaOption',
                            'Hello! This is an example of a multiline text area.',
                            'Simple textarea option for your plugin.' );
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_PASSWORDBOX,
                            'myPasswordboxOption',
                            'password',
                            'Simple passwordbox option for your plugin:' );
  $myComboboxOptions = array( 'Combo 1', 'Combo 2', 'Combo 3', 'Combo 4', 'Combo 5' );
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_COMBOBOX,
                            'myComboboxOption',
                            $myComboboxOptions[0],
                            'Simple combobox option for your plugin: ',
                            $myComboboxOptions );
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_FILEBROWSER,
                            'myFilebrowserOption',
                            '',
                            'Simple filebrowser option for your plugin:' );
  $myDemoPlugin->AddOption( $myDemoPlugin->OPTION_TYPE_HIDDEN,
                            'myHiddenOption',
                            'Hidden Value',
                            'Simple hidden option for your plugin:' );
  
  $myDemoPlugin->RegisterOptions( __FILE__ );
  
  // Add all of the custom content blocks to your plugin's administration page then register your
  // plugin's administration page with the Wordpress core.
  //   - Note: The SIDEBAR and MAIN content blocks will be displayed in the order they are added.
  //   - Note: The SIDEBAR content blocks must be added prior to the MAIN content blocks for proper formatting.
  //   - e.x.
  //              -- MAIN CONTENT AREA --             -- SIDEBAR CONTENT AREA --
  //              -----------------------             --------------------------
  //              'block-description'                 'block-hello-world'
  //              'block-options-displayed'           'block-hello-again'
  //              'block-options-listed'
  $myDemoPlugin->AddAdministrationPageBlock( 'block-hello-world',
                                             'Hello World',
                                             $myDemoPlugin->CONTENT_BLOCK_TYPE_SIDEBAR,
                                             array($myDemoPlugin, 'HTML_DisplayPluginHelloWorldBlock') );
  $myDemoPlugin->AddAdministrationPageBlock( 'block-hello-again',
                                             'Hello Again',
                                             $myDemoPlugin->CONTENT_BLOCK_TYPE_SIDEBAR,
                                             array($myDemoPlugin, 'HTML_DisplayPluginHelloAgainBlock') );
  $myDemoPlugin->AddAdministrationPageBlock( 'block-description',
                                             'Plugin Description',
                                             $myDemoPlugin->CONTENT_BLOCK_TYPE_MAIN,
                                             array($myDemoPlugin, 'HTML_DisplayPluginDescriptionBlock') );
  $myDemoPlugin->AddAdministrationPageBlock( 'block-options-displayed',
                                             'Plugin Options Displayed',
                                             $myDemoPlugin->CONTENT_BLOCK_TYPE_MAIN,
                                             array($myDemoPlugin, 'HTML_DisplayPluginOptionsDisplayedBlock') );
  $myDemoPlugin->AddAdministrationPageBlock( 'block-options-listed',
                                             'Plugin Options Listed',
                                             $myDemoPlugin->CONTENT_BLOCK_TYPE_MAIN,
                                             array($myDemoPlugin, 'HTML_DisplayPluginOptionsListedBlock') );
  
  $myDemoPlugin->RegisterAdministrationPage( $myDemoPlugin->PARENT_MENU_PLUGINS,
                                             $myDemoPlugin->ACCESS_LEVEL_ADMINISTRATOR,
                                             'WPF Demo Plugin',
                                             'WPF Demo Plugin Options Page',
                                             'wpf-demo-plugin-options' );
}

?>
