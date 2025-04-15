<?php

namespace App\Helpers;

class Basket {

    const SESSION_KEY = 'basket';

    private function __construct()
    {
    }

    public static function Instance()
    {
        static $instance = null;

        if ($instance === null) {
            $instance = new Basket();
        }

        return $instance;
    }

    public function getTotalPrice()
    {
        $items = session(self::SESSION_KEY);
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'];
        }
        return number_format($total, 2, '.', ',');
    }

    public function getItems()
    {
        return session(self::SESSION_KEY);
    }

    public function saveItems($items)
    {
        session([self::SESSION_KEY => $items]);
    }

    public function removeItem($id)
    {
        $items = $this->getItems();

        if (!isset($items[$id])) {
            throw new \Exception("This item does not exist.");
        }

        unset($items[$id]);

        $this->saveItems($items);
    }

    public function updateItem($productId, $quantity)
    {
        $items = $this->getItems();
        if (!isset($items[$productId])) {
            throw new \Exception("This item does not exist.");
        }

        $items[$productId]['quantity'] = $quantity;

        $this->saveItems($items);
    }

    public function addItem($data)
    {
        $productId = $data['product_id'];

        $items = $this->getItems();
        $items[$productId] = $data;

        $this->saveItems($items);
    }

}
