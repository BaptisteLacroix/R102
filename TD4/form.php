<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Form data display" />
    <meta name="author" content="Jean-Michel Bruneau" />
    <title>My Form Data Display</title>
</head>

<body>
    <!-- Modify your form as follows:
	
		<form id="form" action="form.php" method="post">
		ou
		<form id="form" action="form.php" method="get">
			<fieldset>
				<label for="lastname">Nom</label>
				<input id="lastname" name="lastname" type="text" required="required" />
				ou
				<input id="lastname" name="form[lastname]" type="text" required="required" />
			</fieldset>
			…
			<input id="submit" name="submit" type="submit" value="Valider" />
			ou
			<input id="submit" name="form[submit]" type="submit" value="Valider" />
		</form>
		
	 -->
    <?php

// Get or Post submit method
$form_data = ( isset( $_POST['submit']) || isset( $_POST['form']['submit'])) ? $_POST : $_GET;

$html = "\t\t<h1>My Form Data</h1>";

// Data display with an HTML list
$html .= "\t\t<ul>\n";
foreach( $form_data as $field => $value) {
	if ( is_array($value)) {
		foreach ( $value as $key => $data) {
			$html .= "\t\t\t<li><strong>$key :</strong> $data</li>\n";
		}
	} else {
		$html .= "\t\t\t<li><strong>$field :</strong> $value</li>\n";
	}
}
$html .= "\t\t</ul>\n";

// Display HTML
echo $html;
?>
</body>

</html>
