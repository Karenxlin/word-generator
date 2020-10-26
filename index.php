<?php
require_once 'vendor/autoload.php';

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Adding an empty Section to the document...
$section = $phpWord->addSection();
// Adding $argv element to the Section having font styled by default...
$section->addText($argv['text']);

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
ob_clean();
$objWriter->save("temp.docx");

$attachment_location = $_SERVER["DOCUMENT_ROOT"] . "/temp.docx";

if (file_exists($attachment_location)) {
    header('Content-Description: File Transfer');
    header("Content-Type: application/docx");
    header("Content-Disposition: attachment; filename=\"document.docx\"");
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($attachment_location));
    readfile($attachment_location);
    unlink($attachment_location);
    die();
} else {
    die("Error: File not found at location: $attachment_location");
}
