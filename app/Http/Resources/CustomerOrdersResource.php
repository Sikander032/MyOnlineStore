<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'status' => 'In Progress',
            'total' => $this->getCartTotal(json_decode($this->cart_data)),
            'date_purchased' => $this->created_at->format('M-d-Y')
        ];
    }

    private function getCartTotal($cartData): int
    {
        $total  = 0;
        foreach ($cartData as $item) {
             $total += $item->price;
        }
        return $total;
    }
}
