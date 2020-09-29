<?php

namespace RadmelPacks\Feeds\Heureka\Downloader;

interface HeurekaCategoryTreeDownloaderInterface
{
    const HEUREKA_TREE_CATEGORY_URL = 'https://www.heureka.cz/direct/xml-export/shops/heureka-sekce.xml';
    
    public function toJson();
    public function toArray();
}
