ID          User ID  	   Course ID    Order ID    Amount   Status    Transaction Date   Gateway Message    Integration_type
<?php
 foreach ($data as $row):
	foreach ($row['TransactionLog'] as $cell):
		// Escape double quotation marks
		$cell = '"' . preg_replace('/"/','"   "',$cell) . '"';
		//pr($row['TransactionLog']); die;
	endforeach;
	echo implode(',', $row['TransactionLog']) . "\n";
endforeach
?>
