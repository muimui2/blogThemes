<?php

$xml = new XmlWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->startDocument('1.0', 'UTF-8');
$xml->startElement('urlset');
$xml->writeAttribute('xmlns', "http://www.sitemaps.org/schemas/sitemap/0.9");
// $contents是从数据库读出来的文章列表
foreach ($contents as $item) {
    $xml->startElement('url');
        $xml->startElement('loc');
        $xml->text("https://www.example.com/");
        $xml->endElement();
        $xml->startElement('lastmod');
        $xml->text(date('Y-m-d', strtotime('2019-03-06 11:11:11')));
        $xml->endElement();
        $xml->startElement('changefreq');
        $xml->text("monthly");
        $xml->endElement();
        $xml->startElement('priority');
        $xml->text("1.0");
        $xml->endElement();
    $xml->endElement();
}
$xml->endElement();
$xml->endDocument();
$xml = $xml->outputMemory();
file_put_contents(
    './sitemap.xml',
    $xml
);