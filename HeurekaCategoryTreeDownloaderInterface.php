<?php

namespace RadmelPacks\Feeds\Heureka\Downloader;

/**
 * @author Ivan Puskajler aka Bonsai
 */
interface HeurekaCategoryTreeDownloaderInterface
{
    const HEUREKA_TREE_CATEGORY_URL = 'https://www.heureka.cz/direct/xml-export/shops/heureka-sekce.xml';
    
    public function toJson(): string;
    public function toArray(): array;
}
