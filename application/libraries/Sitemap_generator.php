<?php
class Sitemap_generator
{
    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function generate_sitemap($article)
    {
        // Path ke file sitemap
        $sitemapPath = FCPATH . 'sitemap.xml';

        // Membuat objek DOMDocument
        $xmlDoc = new DOMDocument('1.0', 'UTF-8');
        $xmlDoc->preserveWhiteSpace = false;
        $xmlDoc->formatOutput = true;

        // Membaca sitemap yang sudah ada jika file tersebut ada
        if (file_exists($sitemapPath)) {
            $xmlDoc->load($sitemapPath);
        } else {
            // Buat elemen <urlset> jika sitemap baru
            $urlset = $xmlDoc->createElement('urlset');
            $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
            $xmlDoc->appendChild($urlset);
        }

        // Membuat elemen <url> untuk artikel baru
        $slug = property_exists($article, 'slug') ? $article->slug : '';
        $date = property_exists($article, 'date') ? $article->date : '';

        $url = $xmlDoc->createElement('url');

        $loc = $xmlDoc->createElement('loc', 'https://floria.id/informasi/' . $slug);
        $url->appendChild($loc);

        if (!empty($date) && strtotime($date) !== false) {
            $lastmod = $xmlDoc->createElement('lastmod', date('c', strtotime($date)));
            $url->appendChild($lastmod);
        }

        $priority = $xmlDoc->createElement('priority', '0.64');
        $url->appendChild($priority);

        // Menambahkan elemen <url> ke dalam <urlset>
        $urlset = $xmlDoc->getElementsByTagName('urlset')->item(0);
        if ($urlset) {
            $urlset->appendChild($url);
        }

        // Save XML to file
        $xmlDoc->save($sitemapPath);
    }

}