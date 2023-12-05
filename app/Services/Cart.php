<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class Cart
{
    const MIN_QTY = 1;
    const DEFAULT_INSTANCE = 'shopping-cart';

    protected $session, $instance;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    protected function getContent(): Collection
    {
        return $this->session->has(self::DEFAULT_INSTANCE) ? $this->session->get(self::DEFAULT_INSTANCE) : collect([]);
    }

    protected function createCartItem(string $menu_id, string $name, string $price, string $quantity, array $options): Collection
    {
        $price = floatval($price);
        $quantity = intval($quantity);

        if ($quantity < self::MIN_QTY) {
            $quantity = self::MIN_QTY;
        }

        return collect([
            'menu_id'   => $menu_id,
            'name'      => $name,
            'price'     => $price,
            'qty'       => $quantity,
            'options'   => $options,
        ]);
    }

    public function add($id, $name, $price, $quantity, $options = []): void
    {
        $cartItem = $this->createCartItem($id, $name, $price, $quantity, $options);

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('qty', $content->get($id)->get('qty') + $quantity);
        }

        $content->put($id, $cartItem);

        $this->session->put(self::DEFAULT_INSTANCE, $content);
    }

    public function update(string $id, string $action): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem = $content->get($id);

            switch ($action) {
                case 'plus':
                    $cartItem->put('qty', $content->get($id)->get('qty') + 1);
                    break;
                case 'minus':
                    $updatedQuantity = $content->get($id)->get('qty') - 1;

                    if ($updatedQuantity < self::MIN_QTY) {
                        $updatedQuantity = self::MIN_QTY;
                    }

                    $cartItem->put('qty', $updatedQuantity);
                    break;
            }

            $content->put($id, $cartItem);

            $this->session->put(self::DEFAULT_INSTANCE, $content);
        }
    }

    public function remove(string $id): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $this->session->put(self::DEFAULT_INSTANCE, $content->except($id));
        }
    }

    public function clear(): void
    {
        $this->session->forget(self::DEFAULT_INSTANCE);
    }

    public function content(): Collection
    {
        return is_null($this->session->get(self::DEFAULT_INSTANCE)) ? collect([]) : $this->session->get(self::DEFAULT_INSTANCE);
    }

    public function total(): string
    {
        $content = $this->getContent();

        $total = $content->reduce(function ($total, $item) {
            return $total += $item->get('price') * $item->get('quantity');
        });

        return rupiah($total);
    }
}
