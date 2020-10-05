<?php

namespace RadmelPacks\Feeds\Heureka\Downloader;

/**
 * @author Ivan Puskajler aka Bonsai
 */
trait HeurekaCategoryXmlParserTrait
{
    private function elementIsCategoryId()
    {
        return $this->xmlReader->name == 'CATEGORY_ID' && $this->xmlReader->nodeType !== \XMLReader::END_ELEMENT;
    }

    private function elementIsCategoryName()
    {
        return in_array($this->xmlReader->name, ['CATEGORY_FULLNAME', 'CATEGORY_NAME']) && $this->xmlReader->nodeType !== \XMLReader::END_ELEMENT;
    }
}
