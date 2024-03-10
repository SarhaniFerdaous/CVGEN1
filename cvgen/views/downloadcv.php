<?php
require_once '../vendor/autoload.php';

// Capture the entire HTML output
ob_start();
require 'preview_cv.php';
$html = ob_get_clean();

// Parse the HTML and find the element with the class "resume"
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();
$xpath = new DOMXPath($dom);
$resumeElement = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' resume ')]");

// Check if the "resume" element was found
if ($resumeElement->length === 0) {
    die('No element with the class "resume" found');
}

// Extract the HTML of the "resume" element
$resumeHtml = $dom->saveHTML($resumeElement->item(0));

// Convert the "resume" HTML to a PDF
$dompdf = new \Dompdf\Dompdf();
$dompdf->loadHtml($resumeHtml);
$dompdf->render();

// Output the PDF to the browser
$dompdf->stream("cv.pdf", array("Attachment" => 1));
?>