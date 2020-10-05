<?php

namespace RadmelPacks\Feeds\Heureka\Downloader;

/**
 * @author Ivan Puskajler aka Bonsai
 */
class HeurekaCategoryTreeDownloader implements HeurekaCategoryTreeDownloaderInterface
{
    use HeurekaCategoryXmlParserTrait;

    /**
     * Stores instance of xml reader to work with
     *
     * @var XMLReader
     */
    private $xmlReader;

    /**
     * Stores result data
     *
     * @var array
     */
    private $dataArray = [];

    function __construct()
    {
        $this->xmlReader = new \XMLReader();
        $this->xmlReader->open(self::HEUREKA_TREE_CATEGORY_URL);

        $this->getArrayData();
    }

    private function getArrayData(): void
    {
        //Store last found category id. It is before the category name, so we can do it like that
        $lastCategoryId = null;

        while ($this->xmlReader->read()) {
            if ($this->elementIsCategoryId()) {
                $lastCategoryId = $this->xmlReader->readString();
            } elseif ($this->elementIsCategoryName()) {
                $this->dataArray[$lastCategoryId] = $this->xmlReader->readString();
            }
        }
    }

    public function toJson(): string
    {
        return json_encode($this->dataArray);
    }

    public function toArray(): array
    {
        return $this->dataArray;
    }
}
