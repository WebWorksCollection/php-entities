<?php

require_once 'Control.php';

class Button extends Control
{
	public function __construct($NewName, $NewText, $NewWidth, $NewHeight)
	{
		parent::__construct($NewName, $NewText, $NewWidth, $NewHeight);
	}

	public function Render($Context)
	{
		// JQX
		// $Text = "$(\"#" . $this->Name . "\").jqxButton({ width: '" . $this->Width . "', height: '" . $this->Height . "', theme: theme });\n";
		$Text = "$(\"#" . $this->Name . "\").jqxButton({ width: '" . $this->Width . "', height: '" . $this->Height . "' });\n";
		$Context->AddControlText($Text);

		$Text = "";
		$Text .= "$(\"#" . $this->Name . "\").bind('click', function()\n";
		$Text .= "{\n";
		$Text .= "	" . $this->GetEventString($Context, 'click', $this->Param);
		$Text .= "});\n";
		$Context->AddControlText($Text);

		// HTML
		$Text = "<div><input type='button' value='" . $this->Text . "' id='" . $this->Name . "'/></div>\n";
		$Context->AddText($Text);
	}
}

?>
