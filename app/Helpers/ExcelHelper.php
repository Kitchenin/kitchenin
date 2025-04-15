<?php
namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelHelper
{
    private $spreadsheet;

    public function __construct(UploadedFile $file)
    {
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);

        $this->spreadsheet = $reader->load($file->getRealPath());
    }


    public function getPrices()
    {
        $worksheet = $this->spreadsheet->getActiveSheet();

        $prices = [];
        $nameCol = '';
        $priceCol = '';

        $index = 1;

        foreach ($worksheet->getRowIterator() as $row) {

            $cellIterator = $row->getCellIterator();
            $currentPrice = [];

            foreach ($cellIterator as $cell) {

                if ($cell->getColumn() == $nameCol) {
                    $parsedName = $this->parseName($cell->getValue());

                    if (!empty($parsedName)) {
                        $currentPrice = [
                            'name' => trim($cell->getValue()),
                            'height' => isset($parsedName[0]) ? $parsedName[0] : null,
                            'width' => isset($parsedName[1]) ? $parsedName[1] : null,
                            'depth' => isset($parsedName[2]) ? $parsedName[2] : null,
                        ];
                    }

                }

                if ($cell->getColumn() == $priceCol && !empty($currentPrice)) {
                    $currentPrice['price'] = trim(number_format((double)$cell->getValue(), 2));
                }

                if (trim($cell->getValue()) == 'Height x Width') {
                    $col = $cell->getColumn();
                    $nameCol = $col;
                    $priceCol = ++$col;
                    break;
                }

            }

            if (!empty($currentPrice)) {
                $currentPrice['index'] = $index++;
                $prices[] = $currentPrice;
            }

        }

        return $prices;

    }

    private function parseName($name)
    {
        preg_match_all('/([0-9]*)mm/s', $name, $matches);
        return $matches[1];
    }

}